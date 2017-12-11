<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
if (empty($arResult['ITEMS']))
    return;

use \WM\Common\Helper,
    \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
$iSectionId = $arResult['ITEMS'][0]['IBLOCK_SECTION_ID'];
$arSection = $arResult['SECTION_LIST'][$iSectionId];
$strEditLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$strDeleteLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$confirmDelete = array('CONFIRM' => \GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'));
?>
<section class="lad-<?=$arSection['CODE'];?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrapper">
                    <div class="<?=$arSection['CODE'];?>">
                        <h2><?=$arSection['NAME'];?></h2>
                        <ul class="grid-4">

                            <? foreach ($arResult["ITEMS"] as $arItem):
                                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strEditLink);
                                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strDeleteLink, $confirmDelete);
                                ?>
                                <li class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                                    <a href="<?=$arSection['URL'],$arItem['PROPERTIES']['LINK']['VALUE'];?>">
                                        <div class="item-block">
                                            <span class="image"
                                                  style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC'];?>');"></span>
                                            <span class="name"><?=$arItem['NAME'];?></span>
                                        </div>
                                    </a>
                                </li>
                            <? endforeach; ?>

                        </ul>
                        <a class="more" href="<?=$arSection['URL'];?>"><?=$arSection['TITLE_URL'];?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
