<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Гостиница");
?>

    <section class="lad-slideshow">
        <div class="lad-slideshow__block-title">
            <h1 class="lad-slideshow__block-title__h1">Гостиницы</h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wrapper">
                        <div id="slideshow" class="slideshow invert carousel" data-interval="300000"
                             data-ride="carousel">

                            <ul class="slider carousel-inner">
                                <li class="item active">
                                    <div class="item-block">
                                        <span class="image image-hotel-1"></span>
                                        <span class="description">Ски-тур Домбай</span>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="item-block">
                                        <span class="image image-hotel-2"></span>
                                        <span class="description">Грязелечебница г. Кисловодск</span>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="item-block">
                                        <span class="image image-hotel-3"></span>
                                        <span class="description">Ски-тур Домбай</span>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="item-block">
                                        <span class="image image-hotel-4"></span>
                                        <span class="description">Грязелечебница г. Кисловодск</span>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="item-block">
                                        <span class="image image-hotel-5"></span>
                                        <span class="description">Ски-тур Домбай</span>
                                    </div>
                                </li>
                            </ul>
                            <ul class="carousel-indicators carousel-indicators_center">
                                <li data-target="#slideshow" data-slide-to="0" class="active"></li>
                                <li data-target="#slideshow" data-slide-to="1"></li>
                                <li data-target="#slideshow" data-slide-to="2"></li>
                                <li data-target="#slideshow" data-slide-to="3"></li>
                                <li data-target="#slideshow" data-slide-to="4"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Главная</a></li>
                <li class="active">Гостиницы</li>
            </ol>
        </div>
    </section>

    <section class="content-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4 col-lg-4">
                    <form class="filter" name="search-hotel" action="/hotel/" method="get">
                        <div class="filter__item">
                            <div class="filter__item__name">город</div>
                            <select class="cs-select cs-skin-border" name="city">
                                <option value="pyatigorsk" selected>Пятигорск</option>
                                <option value="france">France</option>
                                <option value="brazil">Brazil</option>
                                <option value="argentina">Argentina</option>
                                <option value="south-africa">South Africa</option>
                            </select>
                        </div>
                        <div class="filter__item">
                            <div class="filter__item__name">Стоимость</div>
                            <select class="cs-select cs-skin-border" name="cost">
                                <option value="pyatigorsk" disabled selected>Выбрать</option>
                                <option value="econom">Эконом</option>
                                <option value="comfort">Комфорт</option>
                                <option value="business">Бизнес</option>
                            </select>
                        </div>
                        <div class="filter__item">
                            <div class="filter__item__slider" id="filter-slider">
                                <div class="filter__item__slider__range filter__item__slider__range_from">от 1200 р
                                </div>
                                <div class="filter__item__slider__range filter__item__slider__range_to">25000 р</div>
                            </div>
                        </div>
                        <a href="#" class="filter__button"><span>подробнее</span></a>
                        <div class="filter__info">
                            <p class="filter__info__text">Туристическая компанич “Ладья”
                                сотрудничает с большинством гостиниц
                                Кавказских Минеральных Вод,
                                Домбая, Архыза, Теберды
                                и Приэльбрусья</p>
                        </div>
                    </form>
                </div>
                <div class="col-xs-12 col-md-8 col-lg-8 results">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="head">
                                <div class="text">
                                    <p>Найдено: <span class="number-offers">100</span> туров</p>
                                </div>
                                <div class="buttons hidden-xs">
                                    <button class="list">
                                        <span></span>
                                        <span></span>
                                    </button>
                                    <a href="/hotel/?VIEW=1">
                                        <button class="grid">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/hotels/hotel-beshtaw.png" alt="">
                            <div class="item-card__img__name">гостиница бештау</div>
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">адрес гостиницы:
                                <span>г. Пятигорск, ул. 1-я Бульварная, 17</span></div>
                            <p class="item-card__content__text">
                                В стоимость тура входит: проживание, питание по программе (для организованных групп),
                                транспортное и экскурсионное обслуживание, страховка, услуги гидов.
                            </p>
                            <div class="clearfix">
                                <div class="item-card__content__price">от <span>15 400</span> руб</div>
                                <a href="" class="item-card__content__more"><span>подробнее</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/hotels/hotel-1.png" alt="">
                            <div class="item-card__img__name">гостиница бештау</div>
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">адрес гостиницы:
                                <span>г. Пятигорск, ул. 1-я Бульварная, 17</span></div>
                            <p class="item-card__content__text">
                                В стоимость тура входит: проживание, питание по программе (для организованных групп),
                                транспортное и экскурсионное обслуживание, страховка, услуги гидов.
                            </p>
                            <div class="clearfix">
                                <div class="item-card__content__price">от <span>15 400</span> руб</div>
                                <a href="" class="item-card__content__more"><span>подробнее</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/hotels/hotel-2.png" alt="">
                            <div class="item-card__img__name">гостиница бештау</div>
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">адрес гостиницы:
                                <span>г. Пятигорск, ул. 1-я Бульварная, 17</span></div>
                            <p class="item-card__content__text">
                                В стоимость тура входит: проживание, питание по программе (для организованных групп),
                                транспортное и экскурсионное обслуживание, страховка, услуги гидов.
                            </p>
                            <div class="clearfix">
                                <div class="item-card__content__price">от <span>15 400</span> руб</div>
                                <a href="" class="item-card__content__more"><span>подробнее</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/hotels/hotel-1.png" alt="">
                            <div class="item-card__img__name">гостиница бештау</div>
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">адрес гостиницы:
                                <span>г. Пятигорск, ул. 1-я Бульварная, 17</span></div>
                            <p class="item-card__content__text">
                                В стоимость тура входит: проживание, питание по программе (для организованных групп),
                                транспортное и экскурсионное обслуживание, страховка, услуги гидов.
                            </p>
                            <div class="clearfix">
                                <div class="item-card__content__price">от <span>15 400</span> руб</div>
                                <a href="" class="item-card__content__more"><span>подробнее</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/hotels/hotel-2.png" alt="">
                            <div class="item-card__img__name">гостиница бештау</div>
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">адрес гостиницы:
                                <span>г. Пятигорск, ул. 1-я Бульварная, 17</span></div>
                            <p class="item-card__content__text">
                                В стоимость тура входит: проживание, питание по программе (для организованных групп),
                                транспортное и экскурсионное обслуживание, страховка, услуги гидов.
                            </p>
                            <div class="clearfix">
                                <div class="item-card__content__price">от <span>15 400</span> руб</div>
                                <a href="" class="item-card__content__more"><span>подробнее</span></a>
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
    </section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>