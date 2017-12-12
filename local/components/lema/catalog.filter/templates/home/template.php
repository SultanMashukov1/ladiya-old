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
<section class="lad-search" style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/images/bg/img_1.jpg');">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrapper">
                    <div class="search">
                        <h2><? includeArea('search_tour'); ?></h2>
                        <form name="<? echo $arResult["FILTER_NAME"] . "_form" ?>" action="/tours<? echo $arResult["FORM_ACTION"] ?>" method="get">
                            <? foreach ($arResult["ITEMS"] as $arItem):
                                if (array_key_exists("HIDDEN", $arItem)):
                                    echo $arItem["INPUT"];
                                endif;
                            endforeach; ?>
                            <div class="group">
                                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                                    <?preg_match('/\[(.+)\]/', $arItem['INPUT_NAME'], $sCode);?>
                                    <? if (!array_key_exists("HIDDEN", $arItem)): ?>
                                        <div class="cell sel<?= $sCode[1]; ?>">
                                            <?= $arItem["INPUT"]; ?>
                                        </div>
                                    <? endif ?>
                                <? endforeach; ?>
                            </div>
                            <div class="group selsubmit">
                                <input class="submit button" type="submit" name="set_filter" value="ПОИСК"><input type="hidden" name="set_filter"
                                                                                                                  value="Y">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>