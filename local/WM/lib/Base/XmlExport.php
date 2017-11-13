<?php

namespace WM\Base;

use \Bitrix\Main\IO\Directory;
use \WM\Common\Server;
use \WM\Common\Helper;
use \WM\IBlock\Element;

class XmlExport
{
    CONST DEFAULT_DIR = '/bitrix/catalog_export/export';

    protected $serverUrl = null;
    protected $storageDir = null;
    protected $productsFile = null;
    protected $sectionsFile = null;

    protected $iblockId = null;
    protected $productIds = array();
    protected $sectionIds = array();

    protected $products = array();
    protected $sections = array();

    protected $needUpdate = false;

    protected $time = null;

    /**
     * XmlExport constructor.
     * @param $iblockId
     * @param array $params
     */
    public function __construct($iblockId, array $params = array())
    {
        $this->iblockId = $iblockId;

        $this->storageDir = rtrim(Server::get()->getDocumentRoot() . (isset($params['storageDir']) ? $params['storageDir'] : static::DEFAULT_DIR), '/');
        if(!is_dir($this->storageDir))
        {
            Directory::createDirectory($this->storageDir);
        }
        $this->productsFile = $this->storageDir . '/products.json';
        $this->sectionsFile = $this->storageDir . '/sections.json';

        $this->serverUrl = rtrim((isset($params['serverUrl']) ? $params['serverUrl'] : Helper::getFullUrl('')), '/');
        if(isset($params['productIds']))
            $this->productIds = (array) $params['productIds'];
        if(isset($params['sectionIds']))
            $this->productIds = (array) $params['sectionIds'];
    }

    /**
     * @param $additional
     * @return bool
     */
    public function setNeedUpdate($additional)
    {
        return $this->needUpdate = $this->needUpdate || $additional;
    }

    /**
     * @param array $params
     * @param bool $return
     * @return array
     */
    public function loadData(array $params = array(), $return = false)
    {
        if($this->isNeedUpdate())
        {
            \Bitrix\Main\Loader::includeModule('iblock');

            $this->sections = $this->products = array();

            $res = \CIBlockSection::GetList(array(), array('IBLOCK_ID' => $this->iblockId, 'ID' => $this->sectionIds));
            while($row = $res->fetch())
            {
                $this->sections[$row['ID']] = array('name' => $row['NAME']);
                $rs = \CIBlockSection::GetList(
                    array('LEFT_MARGIN' => 'ASC'),
                    array(
                        'IBLOCK_ID' => $this->iblockId,
                        '>LEFT_MARGIN' => $row['LEFT_MARGIN'],
                        '<RIGHT_MARGIN' => $row['RIGHT_MARGIN'],
                        '!ID' => $row['ID']
                    )
                );
                while($innerRow = $rs->fetch())
                    $this->sections[$innerRow['ID']] = array('name' => $innerRow['NAME'], 'parentId' => $row['ID']);
            }

            $data = Element::getAll($this->iblockId, $params);

            foreach($data as $info)
            {
                $info['PREVIEW_PICTURE']  = $this->serverUrl . \CFile::GetPath($info['PREVIEW_PICTURE']);
                $info['PREVIEW_PAGE_URL'] = $this->serverUrl . $info['PREVIEW_PAGE_URL'];
                $info['PREVIEW_TEXT'] = preg_replace('~\\R+|&nbsp;~iu', ' ', HTMLToTxt($info['PREVIEW_TEXT']));
                if(isset($params['callback']) && $params['callback'] instanceof \Closure)
                    $info = $params['callback']($info);
                $this->products[$info['ID']] = $info;
            }

            file_put_contents($this->productsFile, json_encode($this->products, JSON_UNESCAPED_UNICODE));
            file_put_contents($this->sectionsFile, json_encode($this->sections, JSON_UNESCAPED_UNICODE));
        }
        else
        {
            $this->sections = json_decode(file_get_contents($this->sectionsFile),  true);
            $this->products = json_decode(file_get_contents($this->productsFile),  true);
        }
        if($return)
        {
            return array(
                'sections' => $this->sections,
                'products' => $this->products,
            );
        }
    }


    /**
     * @TODO add xml struct
     * @param array $params
     * @return mixed
     */
    public function showData(array $params = array())
    {
        if(!empty($params['sendHeader']))
        {
            header('Content-type: text/xml; charset=' . SITE_CHARSET);
        }

        ?>
        <<?php ?>?xml version="1.0" encoding="<?=SITE_CHARSET?>"?>
        ...
        <?php
    }


    /**
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @return array
     */
    public function getSections()
    {
        return $this->sections;
    }


    /**
     * @return bool
     */
    protected function isNeedUpdate()
    {
        $this->needUpdate = !is_file($this->sectionsFile) || !is_file($this->productsFile) || isset($_GET['update']);
        if(!$this->needUpdate)
        {
            $this->time = filectime($this->sectionsFile);
            if(date('Ymd', $this->time) != date('Ymd'))
                $this->needUpdate = true;
        }
        return $this->needUpdate;
    }
}