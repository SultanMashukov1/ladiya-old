<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

if(empty($arResult['VARIABLES']['ELEMENT_ID']) && !empty($arResult['VARIABLES']['ELEMENT_CODE']))
{
   \Bitrix\Main\Loader::includeModule('iblock');
    $res = \Bitrix\Iblock\ElementTable::getList(array(
        'select' => array('ID'),
        'filter' => array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'CODE' => $arResult['VARIABLES']['ELEMENT_CODE']),
        'limit' => 1,
    ));
    if($row = $res->fetch())
        $arResult['VARIABLES']['ELEMENT_ID'] = $row['ID'];
}