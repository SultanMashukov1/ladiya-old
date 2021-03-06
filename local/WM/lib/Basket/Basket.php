<?php

namespace WM\Basket;

use \WM\Common\Helper;
use \WM\Forms\Form,
    \WM\IBlock\Element;


/**
 * Class Basket
 * @package WM\Basket
 */
class Basket extends \WM\Base\StaticInstance
{
    protected $basket = null;
    protected $currency = null;
    protected $lid = null;
    protected $fUserId = null;

    /**
     * Basket constructor.
     */
    public function __construct()
    {
        //load modules
        $this->loadModules(array('sale', 'catalog', 'iblock'));

        //set variables
        $this->setVariables();
    }

    /**
     *
     * @access protected
     *
     * @param array $modules
     */
    protected function loadModules(array $modules = array())
    {
        if(empty($modules))
            return ;
        foreach($modules as $module)
            \Bitrix\Main\Loader::includeModule($module);
    }

    /**
     *
     * @access protected
     *
     * @return void
     */
    protected function setVariables()
    {
        $this->lid = \Bitrix\Main\Context::getCurrent()->getSite();
        $this->currency = \Bitrix\Currency\CurrencyManager::getBaseCurrency();
        $this->fUserId = \Bitrix\Sale\Fuser::getId();

        $this->basket = \Bitrix\Sale\Basket::loadItemsForFUser($this->fUserId, $this->lid);
    }

    /**
     * @return null
     */
    public function getFUserId()
    {
        return $this->fUserId;
    }

    /**
     * @return null
     */
    public function getBasket()
    {
        return $this->basket;
    }

    /**
     * @return int
     */
    public function getItemsCount()
    {
        return count($this->getBasket()->getQuantityList());
    }

    /**
     * @return float|int
     */
    public function getGoodsCount()
    {
        return array_sum($this->getBasket()->getQuantityList());
    }

    /**
     * @param array $items
     * @return bool
     */
    public function add(array $items = array())
    {
        $basket = $this->getBasket();
        if(empty($basket))
            return false;

        $iblockId = null;
        $properties = array();
        foreach($items as $k => $itemInfo)
        {
            $quantity = empty($itemInfo['QUANTITY']) ? 1 : (int) $itemInfo['QUANTITY'];
            $fields = array(
                'QUANTITY' => $quantity,
                'CURRENCY' => (isset($itemInfo['CURRENCY']) ? $itemInfo['CURRENCY'] : $this->currency),
                'LID' => (isset($itemInfo['LID']) ? $itemInfo['LID'] : $this->lid),
                'PRODUCT_PROVIDER_CLASS' => '\\CCatalogProductProvider',
            );
            if(isset($itemInfo['PRICE']))
            {
                $fields['PRICE'] = $itemInfo['PRICE'];
                $fields['CUSTOM_PRICE'] = 'Y';
            }

            $addProps = array();

            if(!empty($itemInfo['PROPERTIES']))
            {

                if(empty($iblockId))
                {
                    $iblockId = Element::getById($itemInfo['PRODUCT_ID']);
                    $iblockId = $iblockId['IBLOCK_ID'];
                }
                if(empty($properties))
                {
                    $res = \CIBlockElement::GetProperty($iblockId, $itemInfo['PRODUCT_ID']);
                    while($ob = $res->GetNext())
                    {
                        $properties[$ob['CODE']] = array(
                            'NAME' => $ob['NAME'],
                            'CODE' => $ob['CODE'],
                            'VALUE' => '',
                            'SORT' => $ob['SORT'],
                        );
                    }
                }
                //var_dump($properties);
                foreach($itemInfo['PROPERTIES'] as $code => $value)
                {
                    if(isset($properties[$code]))
                    {
                        $properties[$code]['VALUE'] = $value;
                        $addProps[] = $properties[$code];
                    }
                }
            }

            if ($item = $this->getBasketItem($itemInfo['PRODUCT_ID'], (isset($fields['PRICE']) ? $fields['PRICE'] : null), $addProps)) {
                $fields['QUANTITY'] = $item->getQuantity() + $quantity;
            }
            else {
                $item = $basket->createItem('catalog', $itemInfo['PRODUCT_ID']);
            }

            $item->setFields($fields);

            if(!empty($addProps))
                $item->getPropertyCollection()->setProperty($addProps);
        }
        return $basket->save();
    }

    /**
     * @param array $itemIds
     * @return bool
     */
    public function delete($itemIds = array())
    {
        $itemIds = (array) $itemIds;

        $basket = $this->getBasket();
        if(empty($basket))
            return false;
        foreach($itemIds as $id)
            $basket->getItemById($id)->delete();
        return $basket->save();
    }

    /**
     * @return mixed
     */
    public function getBasketItems()
    {
        return $this->getBasket()->getBasketItems();
    }

    /**
     * @param $iblockId
     * @return array
     */
    public function getBasketItemsWithFields($iblockId)
    {
        $items = $this->getBasketItems();
        $fields = array();

        foreach($items as $item)
            $fields[$item->getProductId()] = null;

        $fields = Element::getListD7($iblockId, array('filter' => array('ID' => array_keys($fields))));

        return array(
            'items' => $items,
            'fields' => $fields,
        );
    }

    /**
     * @param array $propCodes
     * @return array
     */
    public function getBasketItemsWithProps(array $propCodes)
    {
        $items = array();
        foreach($this->getBasket()->getBasketItems() as $item)
        {
            $props = array();
            foreach($propCodes as $propCode)
                $props[$propCode] = $item->getField($propCode);
            $items[$item->getId()] =$props;
        }
        return $items;
    }

    /**
     * @param $productId
     * @return bool
     */
    public function getBasketItem($productId, $price = NULL, array $props = array())
    {
        $needCheckProps = !empty($props);

        foreach($this->getBasket() as $item)
        {
            if($item->getProductId() == $productId && (isset($price) ? $item->getField('PRICE') == $price : true))
            {
                if($needCheckProps)
                {
                    $found = true;
                    $count = 0;
                    foreach($item->getPropertyCollection() as $prop)
                    {
                        ++$count;
                        $code = $prop->getField('CODE');
                        $found = $found && isset($props[$code]) && $props[$code] == $prop->getField('VALUE');
                    }
                    if($count <= count($props) && $found)
                        return $item;
                }
                else
                    return $item;
            }
        }
        return false;
    }

    /**
     *
     */
    public function clear()
    {
        \CSaleBasket::DeleteAll();
    }

    /**
     * @param Form $form
     * @param $iblockId
     * @param array $addParams
     * @param $messageId
     * @param array $messageParams
     * @param bool $cp1251
     * @return array
     */
    public function fastOrderAction(Form $form, $iblockId, array $addParams, $messageId, array $messageParams=array(), $cp1251 = false)
    {
        if($form->validate())
        {
            $status = true;

            \Bitrix\Main\Loader::includeModule('iblock');

            $res = \CIBlockElement::GetByID((int) $form->getField('PRODUCT_ID'));
            if(!($row = $res->GetNext()))
                $status = false;

            $getFieldMethod = $cp1251 ? 'getFieldCP1251' : 'getField';

            $defMsgParams = array(
                'NAME' => $form->{$getFieldMethod}('NAME'),
                'PHONE' => $form->getField('PHONE'),
                'QUANTITY' => $form->getField('QUANTITY'),
                'PRODUCT' => $this->encodeWithCharset($row['NAME'], $cp1251),
                'PRODUCT_URL' => Helper::getFullUrl($row['DETAIL_PAGE_URL']),
            );
            foreach($defMsgParams as $k => $v)
                if(empty($messageParams[$k]))
                    $messageParams[$k] = $v;

            $status = $status && $form->sendMessage($messageId, $messageParams);

            $status = $status && $form->addRecord($iblockId, $addParams);

            if($status)
                return array('status' => $status);

            return array('errors' => $form->getErrors());
        }
        else
            return array('errors' => $form->getErrors());
    }

    /**
     * @return mixed
     */
    public function getFormattedPrice()
    {
        return SaleFormatCurrency($this->getBasket()->getPrice(), $this->currency);
    }

    /**
     * @return mixed
     */
    public function getFormattedBasePrice()
    {
        return SaleFormatCurrency($this->getBasket()->getBasePrice(), $this->currency);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function addAction(array $data = array())
    {
        return $this->add(array($data));
    }

    /**
     * @param array $data
     * @return bool
     */
    public function deleteAction($data = array())
    {
        return $this->delete(array($data));
    }

    /**
     * @param array $data
     */
    public function compareAction(array $data = array())
    {

    }

    /**
     * @param $value
     * @param bool $cp1251
     * @return string
     */
    public static function encodeWithCharset($value, $cp1251 = false)
    {
        return $cp1251 ? Helper::enc(Helper::utf8ToCP1251($value)) : Helper::enc($value);
    }
}