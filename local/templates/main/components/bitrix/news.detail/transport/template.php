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
<!--<div class="text__block__wrap">-->
<!--    <div class="container">-->
<!--        <div class="text__block">-->
<!--            --><?// if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arResult["DETAIL_PICTURE"])): ?>
<!--                <img-->
<!--                        class="detail_picture"-->
<!--                        border="0"-->
<!--                        src="--><?//= $arResult["DETAIL_PICTURE"]["SRC"] ?><!--"-->
<!--                        width="--><?//= $arResult["DETAIL_PICTURE"]["WIDTH"] ?><!--"-->
<!--                        height="--><?//= $arResult["DETAIL_PICTURE"]["HEIGHT"] ?><!--"-->
<!--                        alt="--><?//= $arResult["DETAIL_PICTURE"]["ALT"] ?><!--"-->
<!--                        title="--><?//= $arResult["DETAIL_PICTURE"]["TITLE"] ?><!--"-->
<!--                />-->
<!--            --><?// endif ?>
<!--            --><?// if ($arResult["DETAIL_TEXT"]): ?>
<!--                --><?// echo $arResult["DETAIL_TEXT"]; ?>
<!--            --><?// endif ?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="head-img head-img_rent-bus">
    <div class="lad-slideshow__block-title">
        <h1 class="lad-slideshow__block-title__h1">Аренда автобусов</h1>
    </div>
</div>

<section class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Главная</a></li>
            <li><a href="#">Транспорт</a></li>
            <li class="active">Аренда автобусов</li>
        </ol>
    </div>
</section>

<section class="content-page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-lg-4">
                <form  class="form__filter" action="<?=SITE_DIR?>ajax/rent_bus-order.php" id="order-rent_bus">
                    <div class="form__filter__title">
                        <span>Оставить заявку</span>
                    </div>
                    <div class="form__filter__item">
                        <div class="form__filter__item__name">
                            <span>Имя</span>
                        </div>
                        <div class="form__filter__input  it-block">
                            <input name="name" class="form__filter__input__control" type="text">
                            <div class="form__filter__input__log it-error"></div>
                        </div>
                    </div>
                    <div class="form__filter__item">
                        <div class="form__filter__item__name">
                            <span>Телефон</span>
                        </div>
                        <div class="form__filter__input it-block">
                            <input name="phone" class="form__filter__input__control" type="text">
                            <div class="form__filter__input__log it-error"></div>
                        </div>
                    </div>
                    <div class="form__filter__item">
                        <div class="form__filter__item__name">
                            <span>E-mail</span>
                        </div>
                        <div class="form__filter__input  it-block">
                            <input name="email" class="form__filter__input__control" type="text">
                            <div class="form__filter__input__log it-error"></div>
                        </div>
                    </div>
                    <div class="form__filter__item">
                        <div class="form__filter__item__name">
                            <span>Место встречи</span>
                        </div>
                        <div class="form__filter__input  it-block">
                            <select name="select-from" class="form__filter__select__control cs-select cs-skin-border">
                                <option value="" selected="selected"></option>
                                <?
                                foreach ($allOptions as $option)
                                {
                                    echo "<option value=\"".$option["NAME"]."\">".$option["NAME"]."</option>";
                                }
                                ?>

                            </select>
                            <div class="form__filter__input__log it-error"></div>
                        </div>
                    </div>
                    <div class="form__filter__item">
                        <div class="form__filter__item__name">
                            <span>Место назначения</span>
                        </div>
                        <div class="form__filter__input  it-block">
                            <select name="select-to" class="form__filter__select__control cs-select cs-skin-border">
                                <option value="" selected="selected"></option>
                                <?
                                foreach ($allOptions as $option)
                                {
                                    echo "<option value=\"".$option["NAME"]."\">".$option["NAME"]."</option>";
                                }
                                ?>
                            </select>
                            <div class="form__filter__input__log it-error"></div>
                        </div>
                    </div>
                    <div class="form__filter__item">
                        <div class="form__filter__item__name">
                            <span>Дата встречи</span>
                        </div>
                        <div class="form__filter__input  it-block">
                            <input type="text" class="form__filter__input__control filter__item__date__inp" id="date-arrive" name="date-arrive" placeholder="Выбрать дату">
                            <div class="form__filter__input__log it-error"></div>
                        </div>
                    </div>
                    <div class="form__filter__item">
                        <div class="form__filter__item__name">
                            <span>Комментарий</span>
                        </div>
                        <div class="form__filter__input  it-block">
                            <textarea name="comment" class="form__filter__text__control"></textarea>
                        </div>
                    </div>
                    <div class="form__filter__item">
                        <div class="form__filter__btn">
                            <input type="submit" class="form__filter__btn__control"></input>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-md-8 col-lg-8 results">

            </div>
        </div>
    </div>
</section>