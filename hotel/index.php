<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Гостиницы");
?><? $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"slider-hotels", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "10",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "slider-hotels"
	),
	false
); ?>
<? $APPLICATION->IncludeComponent(
    "bitrix:breadcrumb",
    "",
    Array(
        "PATH" => "",
        "SITE_ID" => "s1",
        "START_FROM" => "0"
    )
); ?>
    <section class="content-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4 col-lg-4">
                    <form class="filter" name="search-hotel" action="/hotel/" method="get">
                        <div class="filter__item">
                            <div class="filter__item__name">
                                город
                            </div>
                            <select class="cs-select cs-skin-border" name="city">
                                <option value="pyatigorsk" selected="">Пятигорск</option>
                                <option value="france">France</option>
                                <option value="brazil">Brazil</option>
                                <option value="argentina">Argentina</option>
                                <option value="south-africa">South Africa</option>
                            </select>
                        </div>
                        <div class="filter__item">
                            <div class="filter__item__name">
                                Стоимость
                            </div>
                            <select class="cs-select cs-skin-border" name="cost">
                                <option value="pyatigorsk" disabled="" selected="">Выбрать</option>
                                <option value="econom">Эконом</option>
                                <option value="comfort">Комфорт</option>
                                <option value="business">Бизнес</option>
                            </select>
                        </div>
                        <div class="core__price">
                            <div class="core__price__title">
                                Цена
                            </div>
                            <div class="core__price__item">
                                <div class="core__price__item_l">
                                    От <input type="text" placeholder="0">
                                </div>
                                <div class="core__price__item_r">
                                    До <input type="text" placeholder="0">
                                </div>
                            </div>
                        </div>
                        <a href="#" class="filter__button">подробнее</a>
                        <div class="filter__info">
                            <p class="filter__info__text">
                                Туристическая компанич “Ладья” сотрудничает с большинством гостиниц Кавказских Минеральных Вод, Домбая, Архыза,
                                Теберды и Приэльбрусья
                            </p>
                        </div>
                    </form>
                </div>
                <div class="col-xs-12 col-md-8 col-lg-8 results">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="head">
                                <div class="text">
                                    <p>
                                        Найдено: <span class="number-offers">100</span> туров
                                    </p>
                                </div>
                                <div class="buttons hidden-xs">
                                    <button class="list"></button>
                                    <a href="/hotel/?VIEW=1">
                                        <button class="grid"></button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/hotels/hotel-beshtaw.png" alt="">
                            <div class="item-card__img__name">
                                гостиница бештау
                            </div>
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">
                                адрес гостиницы: г. Пятигорск, ул. 1-я Бульварная, 17
                            </div>
                            <p class="item-card__content__text">
                                В стоимость тура входит: проживание, питание по программе (для организованных групп), транспортное и экскурсионное
                                обслуживание, страховка, услуги гидов.
                            </p>
                            <div class="clearfix">
                                <div class="item-card__content__price">
                                    от 15 400 руб
                                </div>
                                <a href="" class="item-card__content__more">подробнее</a>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/hotels/hotel-1.png" alt="">
                            <div class="item-card__img__name">
                                гостиница бештау
                            </div>
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">
                                адрес гостиницы: г. Пятигорск, ул. 1-я Бульварная, 17
                            </div>
                            <p class="item-card__content__text">
                                В стоимость тура входит: проживание, питание по программе (для организованных групп), транспортное и экскурсионное
                                обслуживание, страховка, услуги гидов.
                            </p>
                            <div class="clearfix">
                                <div class="item-card__content__price">
                                    от 15 400 руб
                                </div>
                                <a href="" class="item-card__content__more">подробнее</a>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/hotels/hotel-2.png" alt="">
                            <div class="item-card__img__name">
                                гостиница бештау
                            </div>
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">
                                адрес гостиницы: г. Пятигорск, ул. 1-я Бульварная, 17
                            </div>
                            <p class="item-card__content__text">
                                В стоимость тура входит: проживание, питание по программе (для организованных групп), транспортное и экскурсионное
                                обслуживание, страховка, услуги гидов.
                            </p>
                            <div class="clearfix">
                                <div class="item-card__content__price">
                                    от 15 400 руб
                                </div>
                                <a href="" class="item-card__content__more">подробнее</a>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/hotels/hotel-1.png" alt="">
                            <div class="item-card__img__name">
                                гостиница бештау
                            </div>
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">
                                адрес гостиницы: г. Пятигорск, ул. 1-я Бульварная, 17
                            </div>
                            <p class="item-card__content__text">
                                В стоимость тура входит: проживание, питание по программе (для организованных групп), транспортное и экскурсионное
                                обслуживание, страховка, услуги гидов.
                            </p>
                            <div class="clearfix">
                                <div class="item-card__content__price">
                                    от 15 400 руб
                                </div>
                                <a href="" class="item-card__content__more">подробнее</a>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/hotels/hotel-2.png" alt="">
                            <div class="item-card__img__name">
                                гостиница бештау
                            </div>
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">
                                адрес гостиницы: г. Пятигорск, ул. 1-я Бульварная, 17
                            </div>
                            <p class="item-card__content__text">
                                В стоимость тура входит: проживание, питание по программе (для организованных групп), транспортное и экскурсионное
                                обслуживание, страховка, услуги гидов.
                            </p>
                            <div class="clearfix">
                                <div class="item-card__content__price">
                                    от 15 400 руб
                                </div>
                                <a href="" class="item-card__content__more">подробнее</a>
                            </div>
                        </div>
                    </div>
                    <div class="pagination-base">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>