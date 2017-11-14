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

use \WM\Common\Helper,
    \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$this->setFrameMode(true);
?>
<div class="tour-detail">

    <section class="container-fluid tour-detail_photos">
        <div class="row">

            <div class="carousel">

                <div class="container">
                    <div class="title">
                        <h3><?=$arResult['NAME']?></h3>
                        <p>
                            <?=Helper::pluralizeN(Helper::propValue('DAY', $arResult), array(
                                Loc::getMessage('TOUR_DAY_ONE'),
                                Loc::getMessage('TOUR_DAY_TWO'),
                                Loc::getMessage('TOUR_DAY_MORE'),
                            ));?>
                            <?=Helper::pluralizeN(Helper::propValue('NIGHT', $arResult), array(
                                Loc::getMessage('TOUR_NIGHT_ONE'),
                                Loc::getMessage('TOUR_NIGHT_TWO'),
                                Loc::getMessage('TOUR_NIGHT_MORE'),
                            ));?>
                        </p>
                    </div>
                    <div class="location">
                        <p>Приэльбрусье</p>
                    </div>
                </div>

                <? if(!empty($arResult['PROPERTIES']['GALLERY_PHOTO']['VALUE_SRC'])): ?>
                    <div class="carousel-inner" role="listbox">
                        <? foreach($arResult['PROPERTIES']['GALLERY_PHOTO']['VALUE_SRC'] as $src): ?>
                            <div class="item">
                                <div class="img" style="background-image: url('<?=$src;?>');"></div>
                            </div>
                        <? endforeach; ?>
                    </div>
                <? endif; ?>
            </div>

        </div>
    </section>

    <section class="container tour-detail_tabs">
        <div class="row">
            <div class="tour-detail_tabs__wrapper">

                <!-- TAB BUTTONS -->
                <ul class="tablist main" role="tablist">
                    <li role="presentation"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"><?=Loc::getMessage('TOUR_DESCRIPTION_TITLE');?></a>
                    </li>
                    <li role="presentation">
                        <a href="#program" aria-controls="program" role="tab" data-toggle="tab"><?=Loc::getMessage('TOUR_PROGRAMM_TITLE');?></a>
                    </li>
                    <li role="presentation">
                        <a href="#price" aria-controls="price" role="tab" data-toggle="tab"><?=Loc::getMessage('TOUR_PRICE_TITLE');?></a>
                    </li>
                    <li role="presentation">
                        <a href="#jotting" aria-controls="jotting" role="tab" data-toggle="tab"><?=Loc::getMessage('TOUR_MEMO_TITLE');?></a>
                    </li>
                    <li role="presentation">
                        <a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab"><?=Loc::getMessage('TOUR_REVIEWS_TITLE');?></a>
                    </li>
                </ul>

                <div class="bg">
                    <!-- ICONS -->
                    <div class="icons">
                        <? if(Helper::propFilled('PRICE', $arResult)): ?>
                            <div class="ruble">
                                <h5><?=$arResult['PROPERTIES']['PRICE']['NAME'];?></h5>
                                <p><?=Loc::getMessage('TOUR_PRICE_FROM');?> <?=Helper::escPropValue('PRICE', $arResult);?> <?=Loc::getMessage('TOUR_PRICE_CURRENCY_2');?></p>
                            </div>
                        <? endif; ?>

                        <? if(Helper::propFilled('TYPE', $arResult)): ?>
                            <div class="backpack">
                                <h5><?=$arResult['PROPERTIES']['TYPE']['NAME'];?></h5>
                                <p><?=Helper::escPropValue('TYPE', $arResult);?></p>
                            </div>
                        <? endif; ?>

                        <? if(Helper::propFilled('DAY', $arResult)): ?>
                            <div class="calendar">
                                <h5><?=$arResult['PROPERTIES']['DAY']['NAME'];?></h5>
                                <p>
                                    <?=Helper::pluralizeN(Helper::propValue('DAY', $arResult), array(
                                        Loc::getMessage('TOUR_DAY_ONE'),
                                        Loc::getMessage('TOUR_DAY_TWO'),
                                        Loc::getMessage('TOUR_DAY_MORE'),
                                    ));?>
                                </p>
                            </div>
                        <? endif; ?>

                        <? if(Helper::propFilled('TRANSPORT', $arResult)): ?>
                            <div class="bus">
                                <h5><?=$arResult['PROPERTIES']['TRANSPORT']['NAME'];?></h5>
                                <p><?=Helper::escPropValue('TRANSPORT', $arResult);?></p>
                            </div>
                        <? endif; ?>
                    </div>

                    <!-- TAB CONTENT -->
                    <div class="tab-content main">

                        <div role="tabpanel" class="tab-pane" id="description">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 text">

                                    <?=$arResult['DETAIL_TEXT'];?>

                                </div>
                                <div class="col-xs-12 col-md-6">

                                    <? if(Helper::propFilled('ROUTE', $arResult)): ?>
                                        <h5><?=Loc::getMessage('TOUR_ROUTE_TITLE');?>: <?=Helper::escPropValue('ROUTE', $arResult);?></h5>
                                    <? endif; ?>

                                    <div id="map"></div>

                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="program">
                            <div class="row">
                                <div class="col-xs-12">
                                    <? if(!empty($arResult['PROGRAMMS'])): ?>
                                        <!-- TAB BUTTONS -->
                                        <ul class="tablist inner" role="tablist">
                                            <? foreach($arResult['PROGRAMMS'] as $id => $programm): ?>
                                                <li role="presentation">
                                                    <a href="#p<?=$id;?>" aria-controls="p<?=$id;?>" role="tab"
                                                       data-toggle="tab"><?=$programm['NAME'];?></a>
                                                </li>
                                            <? endforeach; ?>
                                        </ul>

                                        <!-- TAB CONTENT -->
                                        <div class="tab-content inner">
                                            <? foreach($arResult['PROGRAMMS'] as $id => $programm): ?>
                                                <div role="tabpanel" class="tab-pane" id="p<?=$id;?>">
                                                    <div class="img" style="background-image: url(<?=$programm['PICTURE_SRC'];?>);"></div>
                                                    <div class="text">
                                                        <h6><?=$programm['NAME'];?></h6>
                                                        <?=$programm['PREVIEW_TEXT'];?>
                                                    </div>
                                                </div>
                                            <? endforeach; ?>
                                        </div>

                                    <? endif; ?>

                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="price">

                            <form class="filter">
                                <div class="row">

                                    <div class="col-xs-12 col-sm-4">
                                        <div class="input">
                                            <select name="">
                                                <option disabled="disabled" selected="selected">Дата заезда</option>
                                                <option value="3">1</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4">
                                        <div class="input">
                                            <select name="">
                                                <option disabled="disabled" selected="selected">Гостиница</option>
                                                <option value="1">1</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4">
                                        <div class="input">
                                            <select name="">
                                                <option disabled="disabled" selected="selected">Кол-во дней</option>
                                                <option value="2">1</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4">
                                        <div class="input">
                                            <select name="">
                                                <option disabled="disabled" selected="selected">Транспорт</option>
                                                <option value="3">1</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4">
                                        <div class="input">
                                            <select name="">
                                                <option disabled="disabled" selected="selected">Кол-во людей</option>
                                                <option value="1">1</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-4">
                                        <div class="input">
                                            <input id="styled-checkbox" type="checkbox" value="value1">
                                            <label for="styled-checkbox">Одноместное размещение</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="range">

                                    <h6>Цена</h6>

                                    <span class="min_text">от 1200 р</span>
                                    <span class="max_text">25000 р</span>

                                    <div class="range__slider">
                                        <div class="ui-slider-handle"><span class="min">7500</span></div>
                                        <div class="ui-slider-handle"><span class="max">21000</span></div>
                                    </div>
                                    <input type="hidden" id="#range">

                                </div>

                                <button class="calculate">Рассчитать стоимость*</button>

                                <div class="disclaimer">стоимость тура на 1 человека</div>

                            </form>


                            <table>
                                <thead>
                                <tr>
                                    <th scope="col">Дата заезда</th>
                                    <th scope="col">Гостиница</th>
                                    <th scope="col">Кол-во дней</th>
                                    <th scope="col">Транспорт</th>
                                    <th scope="col">Кол-во людей</th>
                                    <th scope="col">Стоимость</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td data-label="Дата заезда">7</td>
                                    <td data-label="Гостиница">Бизнес-отель Бештау</td>
                                    <td data-label="Кол-во дней">7</td>
                                    <td data-label="Транспорт">Аренда автомобиля</td>
                                    <td data-label="Кол-во людей">7</td>
                                    <td data-label="Стоимость">7500</td>
                                </tr>
                                <tr>
                                    <td scope="row" data-label="Дата заезда">5</td>
                                    <td data-label="Гостиница">Гостиница Бештау</td>
                                    <td data-label="Кол-во дней">5</td>
                                    <td data-label="Транспорт">Автобус</td>
                                    <td data-label="Кол-во людей">1</td>
                                    <td data-label="Стоимость">21000</td>
                                </tr>
                                <tr>
                                    <td scope="row" data-label="Дата заезда">10</td>
                                    <td data-label="Гостиница">Пансионат Искра</td>
                                    <td data-label="Кол-во дней">10</td>
                                    <td data-label="Транспорт">Автобус</td>
                                    <td data-label="Кол-во людей">10</td>
                                    <td data-label="Стоимость">7500</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                        <div role="tabpanel" class="tab-pane" id="jotting">
                            <div class="row">
                                <div class="col-xs-12">
                                    <p><?=TxtToHTML($arResult['PROPERTIES']['TOUR_MEMO']['VALUE']['TEXT']);?></p>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="reviews">
                            <div class="form__comment__add">
                                <div class="container">
                                    <div class="form__comment__add__wrap">
                                        <div class="form__comment__add__img">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50" version="1.1">
                                                <g id="surface1">
                                                    <path style=" " d="M 38 1 C 29.257813 1 26 7.441406 26 11.5 C 26 17.6875 32.324219 22 38 22 C 43.03125 22 50 18.351563 50 11.5 C 50 6.339844 45.511719 1 38 1 Z M 16.90625 14 C 13.746094 14.058594 11.433594 15.023438 10.03125 16.875 C 8.390625 19.035156 8.078125 22.28125 9.09375 26.53125 C 8.714844 27.023438 8.449219 27.746094 8.5625 28.6875 C 8.785156 30.523438 9.507813 31.34375 10.125 31.6875 C 10.425781 33.109375 11.199219 34.695313 11.96875 35.5 L 11.96875 35.8125 C 11.976563 36.648438 11.984375 37.382813 11.90625 38.3125 C 11.398438 39.414063 9.632813 40.121094 7.78125 40.84375 C 4.449219 42.144531 0.3125 43.753906 0 48.9375 L -0.0625 50 L 34.0625 50 L 34 48.9375 C 33.6875 43.753906 29.539063 42.148438 26.21875 40.84375 C 24.375 40.121094 22.632813 39.417969 22.125 38.3125 C 22.046875 37.386719 22.054688 36.679688 22.0625 35.84375 L 22.0625 35.5 C 22.859375 34.671875 23.589844 33.050781 23.875 31.6875 C 24.492188 31.34375 25.214844 30.53125 25.4375 28.6875 C 25.546875 27.769531 25.300781 27.054688 24.9375 26.5625 C 25.441406 24.832031 26.410156 20.585938 24.6875 17.8125 C 23.949219 16.621094 22.808594 15.863281 21.34375 15.5625 C 20.507813 14.554688 18.972656 14 16.90625 14 Z M 34 23 C 31.792969 23 30 24.570313 30 26.5 C 30 28.429688 31.792969 30 34 30 C 36.207031 30 38 28.429688 38 26.5 C 38 24.570313 36.207031 23 34 23 Z M 29 30 C 27.316406 30 26 31.097656 26 32.5 C 26 33.902344 27.316406 35 29 35 C 30.683594 35 32 33.902344 32 32.5 C 32 31.097656 30.683594 30 29 30 Z "></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="form__comment__add__title">Добавить комментарий</div>
                                        <form>
                                            <div class="form__comment__add__block">
                                                <div class="form__comment__add__block__item">
                                                    <input type="text" placeholder="Ваше имя">
                                                </div>
                                                <div class="form__comment__add__block__item">
                                                    <input type="text" placeholder="Контактная почта">
                                                </div>
                                            </div>
                                            <div class="form__comment__add__block">
                                                <div class="form__comment__add__block__item">
                                                    <textarea placeholder="Ваш комментарий"></textarea>
                                                </div>
                                            </div>
                                            <div class="form__comment__add__block">
                                                <div class="form__comment__add__block__item">
                                                    <button class="form__comment__add__btn">Отправить</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="comment__list">
                                <div class="container">
                                    <div class="comment__list__wrap">
                                        <div class="comment__list__item">
                                            <div class="comment__list__item__avatar">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     viewBox="0 0 26 26" version="1.1">
                                                    <g id="surface1">
                                                        <path style=" "
                                                              d="M 13 0 C 9.699219 0 7 2.101563 7 6 C 7 8.609375 8.214844 11.3125 10 12.8125 L 10 14.1875 C 10 14.789063 9.59375 15.304688 9.09375 15.40625 C 5.195313 16.605469 2 19.1875 2 20.6875 L 2 22.5 C 2 24.398438 6.898438 26 13 26 C 19.101563 26 24 24.398438 24 22.5 L 24 20.6875 C 24 19.289063 20.90625 16.605469 16.90625 15.40625 C 16.40625 15.304688 16 14.6875 16 14.1875 L 16 12.8125 C 17.785156 11.3125 19 8.609375 19 6 C 19 2.101563 16.300781 0 13 0 Z "></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="comment__list__item__header">
                                                <b>Сергей</b><span>Сегодня в 12:55</span>
                                            </div>
                                            <div class="comment__list__item__text">
                                                <p>Спасибо, очень годная статья</p>
                                            </div>
                                        </div>
                                        <div class="comment__list__item">
                                            <div class="comment__list__item__avatar">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     viewBox="0 0 26 26" version="1.1">
                                                    <g id="surface1">
                                                        <path style=" "
                                                              d="M 13 0 C 9.699219 0 7 2.101563 7 6 C 7 8.609375 8.214844 11.3125 10 12.8125 L 10 14.1875 C 10 14.789063 9.59375 15.304688 9.09375 15.40625 C 5.195313 16.605469 2 19.1875 2 20.6875 L 2 22.5 C 2 24.398438 6.898438 26 13 26 C 19.101563 26 24 24.398438 24 22.5 L 24 20.6875 C 24 19.289063 20.90625 16.605469 16.90625 15.40625 C 16.40625 15.304688 16 14.6875 16 14.1875 L 16 12.8125 C 17.785156 11.3125 19 8.609375 19 6 C 19 2.101563 16.300781 0 13 0 Z "></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="comment__list__item__header">
                                                <b>Сергей</b><span>Сегодня в 12:55</span>
                                            </div>
                                            <div class="comment__list__item__text">
                                                <p>Спасибо, очень годная статья</p>
                                            </div>
                                        </div>
                                        <div class="comment__list__item">
                                            <div class="comment__list__item__avatar">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     viewBox="0 0 26 26" version="1.1">
                                                    <g id="surface1">
                                                        <path style=" "
                                                              d="M 13 0 C 9.699219 0 7 2.101563 7 6 C 7 8.609375 8.214844 11.3125 10 12.8125 L 10 14.1875 C 10 14.789063 9.59375 15.304688 9.09375 15.40625 C 5.195313 16.605469 2 19.1875 2 20.6875 L 2 22.5 C 2 24.398438 6.898438 26 13 26 C 19.101563 26 24 24.398438 24 22.5 L 24 20.6875 C 24 19.289063 20.90625 16.605469 16.90625 15.40625 C 16.40625 15.304688 16 14.6875 16 14.1875 L 16 12.8125 C 17.785156 11.3125 19 8.609375 19 6 C 19 2.101563 16.300781 0 13 0 Z "></path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="comment__list__item__header">
                                                <b>Сергей</b><span>Сегодня в 12:55</span>
                                            </div>
                                            <div class="comment__list__item__text">
                                                <p>Спасибо, очень годная статья</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row addtional-buttons">
                    <div class="col-xs-12 col-sm-6">
                        <a href="#" class="booking"><?=Loc::getMessage('TOUR_ORDER_BTN_TITLE');?></a>
                    </div>
                    <?if(!empty($arResult['PROPERTIES']['FULL_PROGRAMM']['VALUE_SRC'])):?>
                        <div class="col-xs-12 col-sm-6">
                            <a href="<?=$arResult['PROPERTIES']['FULL_PROGRAMM']['VALUE_SRC'];?>" class="full_program">
                                <?=Loc::getMessage('TOUR_SHOW_FULL_PROGRAMM_TITLE');?>
                            </a>
                        </div>
                    <?endif;?>
                </div>

            </div>
        </div>
    </section>

    <section class="container tour-detail_gallery">

        <div class="row">
            <div class="col-xs-12">
                <div class="title">
                    <h3><?=Loc::getMessage('TOUR_GALLERY_TITLE');?></h3>
                </div>
            </div>
        </div>

        <div class="row slider">

            <? if(!empty($arResult['PROPERTIES']['GALLERY_PHOTO']['VALUE_SRC'])): ?>
                <? foreach($arResult['PROPERTIES']['GALLERY_PHOTO']['VALUE_SRC'] as $src): ?>
                    <div class="col-xs-12 col-sm-6 col-md-4 item">
                        <a href="<?=$src;?>" data-fancybox="photo">
                            <span style="background-image: url('<?=$src;?>');"></span>
                        </a>
                    </div>
                <? endforeach; ?>
            <? endif; ?>

        </div>
    </section>

    <? if(!empty($arResult['SIMILAR_TOURS'])): ?>
        <section class="container tour-detail_interest">

            <div class="row">
                <div class="col-xs-12">
                    <div class="title">
                        <h3><?=Loc::getMessage('TOUR_MAYBE_INTERESTED');?></h3>
                    </div>
                </div>
            </div>

            <div class="row">

                <?foreach($arResult['SIMILAR_TOURS'] as $tour):?>
                    <div class="col-xs-12 col-sm-6 col-md-4 item">
                        <div class="img" style="background-image: url('<?=$tour['PICTURE_SRC'];?>')">
                            <?if(!empty($tour['PROPERTY_DISCOUNT_VALUE'])):?>
                                <div class="discount">-<?=(int)$tour['PROPERTY_DISCOUNT_VALUE'];?>%</div>
                            <?endif;?>
                            <h3><?=$tour['NAME'];?></h3>

                            <div class="text">
                                <div class="table">
                                    <div class="cell">
                                        <p><?=$tour['PREVIEW_TEXT'];?></p>

                                        <a href="<?=$tour['DETAIL_PAGE_URL'];?>"><?=Loc::getMessage('TOUR_MORE_BTN');?></a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="info">
                            <div class="text">

                                <?if(!empty($tour['PROPERTY_HEADER_VALUE'])):?>
                                    <h5><?=$tour['PROPERTY_HEADER_VALUE'];?></h5>
                                <?endif;?>
                                <div>
                                    <?if(!empty($tour['PROPERTY_DAY_VALUE'])):?>
                                    <span>
                                        <?=Helper::pluralizeN($tour['PROPERTY_DAY_VALUE'], array(
                                            Loc::getMessage('TOUR_DAY_ONE'),
                                            Loc::getMessage('TOUR_DAY_TWO'),
                                            Loc::getMessage('TOUR_DAY_MORE'),
                                        ));?>
                                    </span>
                                    <?endif;?>
                                    <?if(!empty($tour['PROPERTY_NIGHT_VALUE'])):?>
                                        <span>
                                            <?=Helper::pluralizeN($tour['PROPERTY_NIGHT_VALUE'], array(
                                                Loc::getMessage('TOUR_NIGHT_ONE'),
                                                Loc::getMessage('TOUR_NIGHT_TWO'),
                                                Loc::getMessage('TOUR_NIGHT_MORE'),
                                            ));?>
                                        </span>
                                    <?endif;?>
                                </div>

                            </div>

                            <div class="price">
                                <div>
                                    <?if(!empty($tour['PROPERTY_PRICE_VALUE'])):?>
                                        <span>
                                            <bold>
                                                <?=Loc::getMessage('TOUR_PRICE_FROM');?>
                                                <?=number_format($tour['PROPERTY_PRICE_VALUE'], 0,'', ' ');?>
                                                <?=Loc::getMessage('TOUR_PRICE_CURRENCY_1');?>
                                            </bold>
                                        </span>
                                    <?endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?endforeach;?>

            </div>
        </section>
    <? endif; ?>

</div>