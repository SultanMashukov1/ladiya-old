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
<? if (empty($arResult['ITEMS']))
    return;

$bCheckSlideActive = $bCheckIndicatorActive = true;
?>
<section class="lad-slideshow">
    <div class="lad-slideshow__block-title">
        <h1 class="lad-slideshow__block-title__h1"><? $APPLICATION->ShowTitle(); ?></h1>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrapper">
                    <div id="slideshow" class="slideshow invert carousel" data-interval="300000"
                         data-ride="carousel">
                        <ul class="slider carousel-inner">
                            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                                <?
                                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                                ?>
                                <li class="item <? if ($bCheckSlideActive) { ?>active<? $bCheckSlideActive = false;}?>"
                                    id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                    <div class="item-block">
                                        <span class="image" style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC'];?>')"></span>
                                        <span class="description"><?=$arItem['NAME'];?></span>
                                    </div>
                                </li>
                            <? endforeach; ?>
                        </ul>

                        <ul class="carousel-indicators carousel-indicators_center">
                            <?for ($i=0;$i<count($arResult["ITEMS"]);$i++):?>
                                <li data-target="#slideshow" data-slide-to="<?=$i;?>" <? if ($bCheckIndicatorActive) { ?>class="active"<? $bCheckIndicatorActive = false;}?>></li>
                            <?endfor;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>