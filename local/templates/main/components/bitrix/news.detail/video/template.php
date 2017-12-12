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
                <? foreach ($arResult['PROPERTIES']['LINK_TO_VIDEO']['VALUE'] as $arLinkVideo): ?>

                    <?if(stristr($arLinkVideo,'youtu.be')){
                        $iCodeYoutubeVideo = str_replace('/','',strrchr($arLinkVideo,'/'));
                        }
                    if(stristr($arLinkVideo,'youtube.com')){
                        $iCodeYoutubeVideo = str_replace('=','',stristr($arLinkVideo,'='));
                    }
                        ?>

                    <div class="col-xs-12 col-sm-6 col-md-4 item">
                        <a href="<?= $arLinkVideo; ?>" data-fancybox="video">
                            <?if($iCodeYoutubeVideo !==''){?>
                                <span style="background-image: url('http://img.youtube.com/vi/<?= $iCodeYoutubeVideo ?>/sddefault.jpg');"></span>
                            <?}else{?>
                                <span style="background-image: url('/YouTube.jpg');"></span>
                            <?}?>
                        </a>
                    </div>
                    <?$iCodeYoutubeVideo='';?>
                <? endforeach; ?>
            </div>
        </section>
    </div>
</div>