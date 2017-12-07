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
<div class="text__block__wrap">
    <div class="container">
        <div class="text__block">
            <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arResult["DETAIL_PICTURE"])): ?>
                <img
                        class="detail_picture"
                        border="0"
                        src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>"
                        width="<?= $arResult["DETAIL_PICTURE"]["WIDTH"] ?>"
                        height="<?= $arResult["DETAIL_PICTURE"]["HEIGHT"] ?>"
                        alt="<?= $arResult["DETAIL_PICTURE"]["ALT"] ?>"
                        title="<?= $arResult["DETAIL_PICTURE"]["TITLE"] ?>"
                />
            <? endif ?>
            <? if ($arResult["DETAIL_TEXT"]): ?>
                <? echo $arResult["DETAIL_TEXT"]; ?>
            <? endif ?>
        </div>
    </div>
</div>
<section class="container tour-detail_gallery">

    <div class="row slider">

        <div class="col-xs-12 col-sm-6 col-md-4 item">
            <a href="/upload/iblock/d8c/d8ce19b52993875178e2198749903a78.png" data-fancybox="photo">
                <span style="background-image: url('/upload/iblock/d8c/d8ce19b52993875178e2198749903a78.png');"></span>
            </a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 item">
            <a href="/upload/iblock/fdd/fddde24436b9cb3a76b82af5668086cf.png" data-fancybox="photo">
                <span style="background-image: url('/upload/iblock/fdd/fddde24436b9cb3a76b82af5668086cf.png');"></span>
            </a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 item">
            <a href="/upload/iblock/23d/23d145b7993e91211afb05f74d80c912.png" data-fancybox="photo">
                <span style="background-image: url('/upload/iblock/23d/23d145b7993e91211afb05f74d80c912.png');"></span>
            </a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 item">
            <a href="/upload/iblock/f9f/f9f992c476cb48e456fe8ca37f67f1a8.png" data-fancybox="photo">
                <span style="background-image: url('/upload/iblock/f9f/f9f992c476cb48e456fe8ca37f67f1a8.png');"></span>
            </a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 item">
            <a href="/upload/iblock/23c/23c539741f22880825b484b3b9c4158b.png" data-fancybox="photo">
                <span style="background-image: url('/upload/iblock/23c/23c539741f22880825b484b3b9c4158b.png');"></span>
            </a>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-4 item">
            <a href="/upload/iblock/d90/d90e42356a9a16af56b21a5deda7813a.png" data-fancybox="photo">
                <span style="background-image: url('/upload/iblock/d90/d90e42356a9a16af56b21a5deda7813a.png');"></span>
            </a>
        </div>

    </div>
</section>