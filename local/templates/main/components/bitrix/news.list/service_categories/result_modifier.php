<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

$arFilter = Array('IBLOCK_ID'=>16, 'ACTIVE'=>'Y');
$db_list = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter,false,Array("ID","IBLOCK_ID","IBLOCK_TYPE_ID","IBLOCK_SECTION_ID","CODE","SECTION_ID","NAME","UF_LINK","UF_TITLE_LINK"));
$db_list->NavStart(20);
while($ar_result = $db_list->GetNext())
{
    $arResult['SECTION_LIST'][$ar_result['ID']]['NAME'] = $ar_result['NAME'];
    $arResult['SECTION_LIST'][$ar_result['ID']]['CODE'] = $ar_result['CODE'];
    $arResult['SECTION_LIST'][$ar_result['ID']]['URL'] = $ar_result['UF_LINK'];
    $arResult['SECTION_LIST'][$ar_result['ID']]['TITLE_URL'] = $ar_result['UF_TITLE_LINK'];

}