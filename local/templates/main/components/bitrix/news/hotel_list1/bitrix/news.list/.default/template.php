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
$this->setFrameMode(true);
?>
<div class="col-xs-12 col-md-8 col-lg-8 results">
    <div class="row">
        <div class="col-xs-12">
            <div class="head">

                <div class="text">
                    <? if (count($arResult["ITEMS"])) : ?>
                        <p>Найдено: <?= count($arResult["ITEMS"]) ?> туров</p>
                    <? else: ?>
                        <p>Туры не найдены</p>
                    <? endif; ?>
                </div>

                <div class="buttons hidden-xs">
                    <button class="list">
                        <span></span>
                        <span></span>
                    </button>
                    <a href="<?= $APPLICATION->GetCurDir() . '?VIEW=1' ?>">
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


    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="item-card" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <div class="item-card__img">
                <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $arItem['NAME']; ?>">
                <!-- <? /* if ($arItem['PROPERTIES']['DISCOUNT']['VALUE']) : */ ?>
                                <div class="discount">-<? /*= $arItem['PROPERTIES']['DISCOUNT']['VALUE'] */ ?>%</div>
                            --><? /* endif; */ ?>
                <div class="item-card__img__name">
                    <?= $arItem['NAME'] ?>
                </div>
            </div>

            <div class="item-card__content">

                <? if ($arItem['PROPERTIES']['ADDRESS']['VALUE']) : ?>
                    <div class="item-card__content__info"><?= $arItem['PROPERTIES']['ADDRESS']['VALUE'] ?></div>
                <? endif; ?>
                <? if ($arItem['PREVIEW_TEXT']) : ?>
                    <p class="item-card__content__text"><?= $arItem['PREVIEW_TEXT'] ?></p>
                <? endif; ?>
                <div class="clearfix">
                    <div class="item-card__content__price">
                        <? if ($arItem['PROPERTIES']['PRICE']['VALUE']) : ?>от <?= $arItem['PROPERTIES']['PRICE']['VALUE'] ?> руб<? endif; ?>
                    </div>
                    <a href="/verstka_o-gostinice/" class="item-card__content__more">подробнее</a>
                    <!--<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="item-card__content__more">подробнее</a>-->
                </div>
            </div>
        </div>
    <? endforeach; ?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>
