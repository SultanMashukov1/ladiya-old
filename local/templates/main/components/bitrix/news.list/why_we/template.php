<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
<ul class="line">
    <?
    $count = 1;
    foreach($arResult["ITEMS"] as $arItem):
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>
	<a href="/o-kompanii/">
    <li class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="item-block">
            <span class="header"><?=$arItem['NAME']?></span>
            <span class="icon <? if (empty($arItem['PREVIEW_PICTURE']['SRC'])) { ?>icon-<?=$count?><? } ?>"
                  <? if (empty($arItem['PREVIEW_PICTURE']['SRC']))
                  { ?>style="background: url('<?= SITE_TEMPLATE_PATH ?>/images/why.png') no-repeat;"<?}
                  else
                  {?> style="background: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>') no-repeat;" <?}?>></span>
            <span class="description"><?=$arItem['PREVIEW_TEXT']?></span>
        </div>
    </li>
	</a>
    <?
    $count++;
    endforeach;
    ?>
</ul>
