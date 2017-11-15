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
                            <?$APPLICATION->IncludeComponent('bitrix:news.list', 'reviews', array(
                                'DISPLAY_DATE' => 'Y',
                                'DISPLAY_NAME' => 'Y',
                                'DISPLAY_PICTURE' => 'Y',
                                'DISPLAY_PREVIEW_TEXT' => 'Y',
                                'AJAX_MODE' => 'N',
                                'IBLOCK_TYPE' => 'content',
                                'IBLOCK_ID' => '9',
                                'NEWS_COUNT' => '20',
                                'SORT_BY1' => 'ACTIVE_FROM',
                                'SORT_ORDER1' => 'DESC',
                                'SORT_BY2' => 'SORT',
                                'SORT_ORDER2' => 'ASC',
                                'FILTER_NAME' => 'tourReviewFilter',
                                'FIELD_CODE' => array('DATE_CREATE'),
                                'PROPERTY_CODE' => array('EMAIL', 'TOUR'),
                                'CHECK_DATES' => 'Y',
                                'DETAIL_URL' => '',
                                'PREVIEW_TRUNCATE_LEN' => '',
                                'ACTIVE_DATE_FORMAT' => 'd.m.Y',
                                'SET_TITLE' => 'N',
                                'SET_BROWSER_TITLE' => 'N',
                                'SET_META_KEYWORDS' => 'N',
                                'SET_META_DESCRIPTION' => 'N',
                                'SET_LAST_MODIFIED' => 'N',
                                'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
                                'ADD_SECTIONS_CHAIN' => 'N',
                                'HIDE_LINK_WHEN_NO_DETAIL' => 'Y',
                                'PARENT_SECTION' => '',
                                'PARENT_SECTION_CODE' => '',
                                'INCLUDE_SUBSECTIONS' => 'Y',
                                'CACHE_TYPE' => 'N',
                                'CACHE_TIME' => '36000000',
                                'CACHE_FILTER' => 'Y',
                                'CACHE_GROUPS' => 'N',
                                'DISPLAY_TOP_PAGER' => 'Y',
                                'DISPLAY_BOTTOM_PAGER' => 'Y',
                                'PAGER_TITLE' => 'Отзывы',
                                'PAGER_SHOW_ALWAYS' => 'N',
                                'PAGER_TEMPLATE' => '',
                                'PAGER_DESC_NUMBERING' => 'N',
                                'PAGER_DESC_NUMBERING_CACHE_TIME' => '36000',
                                'PAGER_SHOW_ALL' => 'N',
                                'PAGER_BASE_LINK_ENABLE' => 'N',
                                'SET_STATUS_404' => 'N',
                                'SHOW_404' => 'N',
                                'MESSAGE_404' => '',
                                'PAGER_BASE_LINK' => '',
                                'PAGER_PARAMS_NAME' => 'arrPager',
                                'AJAX_OPTION_JUMP' => 'N',
                                'AJAX_OPTION_STYLE' => 'Y',
                                'AJAX_OPTION_HISTORY' => 'N',
                                'AJAX_OPTION_ADDITIONAL' => '',
                            ));?>
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