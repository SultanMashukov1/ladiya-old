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
<div class="container">
    <div class="text__block">
    <section class="container tour-detail_gallery">

        <div class="row slider">
            <? foreach ($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] as $arImg):
                $arImg = \CFile::GetPath($arImg); ?>
                <div class="col-xs-12 col-sm-6 col-md-4 item">
                    <a href="<?= $arImg; ?>" data-fancybox="photo">
                        <span style="background-image: url('<?= $arImg; ?>');"></span>
                    </a>
                </div>
            <? endforeach; ?>
        </div>
    </section>
</div>
</div>