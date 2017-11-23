<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

use \Bitrix\Main\Localization\Loc,
    \WM\Common\Helper;

$this->setFrameMode(true);

$strEditLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$strDeleteLink = \CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$confirmDelete = array('CONFIRM' => \GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'));

$foundCnt = (int) $arResult['NAV_RESULT']->NavRecordCount;

?>
<div class="col-xs-12 col-md-8 col-lg-8 results">
    <div class="row">
        <div class="col-xs-12">
            <div class="head">

                <div class="text">
                    <? if(!empty($arResult['ITEMS'])) : ?>
                        <p>
                            <?=Helper::pluralize($foundCnt, array(
                                Loc::getMessage('TOUR_SEARCH_FOUND_ONE_TITLE'),
                                Loc::getMessage('TOUR_SEARCH_FOUND_MORE_TITLE'),
                                Loc::getMessage('TOUR_SEARCH_FOUND_MORE_TITLE'),
                            ));?>
                            <?=Helper::pluralizeN($foundCnt, array(
                                Loc::getMessage('TOUR_TOUR_ONE'),
                                Loc::getMessage('TOUR_TOUR_TWO'),
                                Loc::getMessage('TOUR_TOUR_MORE'),
                            ));?>
                        </p>
                    <? else: ?>
                        <p><?=Loc::getMessage('TOUR_SEARCH_NOT_FOUND_TITLE');?></p>
                    <? endif; ?>
                </div>

                <div class="buttons hidden-xs">
                    <button class="list">
                        <span></span>
                        <span></span>
                    </button>
                    <a href="<?=$APPLICATION->GetCurPageParam('VIEW=1', array('VIEW'));?>">
                        <button class="grid">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="row">

        <div id="items" class="col-xs-12 list">
            <div class="row">
                <? foreach($arResult["ITEMS"] as $arItem): ?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strEditLink);
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strDeleteLink, $confirmDelete);
                    ?>
                    <div class="col-xs-12 tour" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <div class="img" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>)">
                            <? if(Helper::propFilled('DISCOUNT', $arItem)) : ?>
                                <div class="discount">-<?=Helper::escPropValue('DISCOUNT', $arItem);?>%</div>
                            <? endif; ?>
                            <h3><?=$arItem['NAME']?></h3>
                        </div>

                        <div class="info">

                            <div class="text">
                                <? if(Helper::propFilled('HEADER', $arItem)) : ?>
                                    <h5><?=Helper::escPropValue('HEADER', $arItem);?></h5>
                                <? endif; ?>
                                <? if(!empty($arItem['PREVIEW_TEXT'])) : ?>
                                    <p><?=$arItem['PREVIEW_TEXT']?></p>
                                <? endif; ?>
                            </div>
                            <!--<a href="/verstka_o-ture/">Подробнее</a>-->
                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=Loc::getMessage('TOUR_SEARCH_MORE_BTN_TITLE');?></a>

                            <div class="price">
                                <div>
                                    <? if(Helper::propFilled('NIGHT', $arItem)) : ?>
                                        <span>
                                            <?=Helper::pluralizeN(Helper::escPropValue('NIGHT', $arItem), array(
                                                Loc::getMessage('TOUR_NIGHT_ONE'),
                                                Loc::getMessage('TOUR_NIGHT_TWO'),
                                                Loc::getMessage('TOUR_NIGHT_MORE'),
                                            ));?>
                                        </span>
                                    <? endif; ?>
                                    <? if(Helper::propFilled('DAY', $arItem)) : ?>
                                        <span>
                                            <?=Helper::pluralizeN(Helper::escPropValue('DAY', $arItem), array(
                                                Loc::getMessage('TOUR_DAY_ONE'),
                                                Loc::getMessage('TOUR_DAY_TWO'),
                                                Loc::getMessage('TOUR_DAY_MORE'),
                                            ));?>
                                        </span>
                                    <? endif; ?>
                                </div>
                                <div>
                                    <span>
                                        <bold>
                                            <? if(Helper::propFilled('PRICE', $arItem)) : ?>
                                                <?=Loc::getMessage('TOUR_PRICE_FROM');?>
                                                <?=Helper::escPropValue('PRICE', $arItem)?>
                                            <? endif; ?>
                                        </bold>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>

    </div>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>
