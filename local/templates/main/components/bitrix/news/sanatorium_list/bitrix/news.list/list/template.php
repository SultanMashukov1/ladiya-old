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
                    <a href="<?= $APPLICATION->GetCurDir() . '?VIEW=0' ?>">
                        <button class="list">
                            <span></span>
                            <span></span>
                        </button>
                    </a>
                    <button class="grid">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div class="row">

        <div id="items" class="col-xs-12 grid">
            <div class="row">
                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="col-xs-12 col-sm-6 tour" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <div class="img" style="background-image: url(<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>)">
                            <? if ($arItem['PROPERTIES']['DISCOUNT']['VALUE']) : ?>
                                <div class="discount">-<?= $arItem['PROPERTIES']['DISCOUNT']['VALUE'] ?>%</div>
                            <? endif; ?>
                            <h3><?= $arItem['NAME'] ?></h3>

                            <div class="text">
                                <div class="table">
                                    <div class="cell">
                                        <? if ($arItem['PREVIEW_TEXT']) : ?>
                                            <p><?= $arItem['PREVIEW_TEXT'] ?></p>
                                        <? endif; ?>
                                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">Подробнее</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="info">
                            <div class="text">

                                <h5>Экскурсионный тур</h5>
                                <div>
                                    <? if ($arItem['PROPERTIES']['DAY']['VALUE']) : ?>
                                        <span><?= $arItem['PROPERTIES']['DAY']['VALUE'] ?></span>
                                    <? endif; ?>
                                    <? if ($arItem['PROPERTIES']['DAY']['VALUE']) : ?>
                                        <span><?= $arItem['PROPERTIES']['NIGHT']['VALUE'] ?></span>
                                    <? endif; ?>
                                </div>

                            </div>

                            <div class="price">
                                <div>
                                    <span><bold><? if ($arItem['PROPERTIES']['PRICE']['VALUE']) : ?>от <?= $arItem['PROPERTIES']['PRICE']['VALUE'] ?><? endif; ?></bold></span>
                                </div>
                            </div>

                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>

    </div>
</div>