<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Аренда автобусов");
?>

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
                    <form class="filter" name="rent-bus" action="/hotel/" method="get">
                        <div class="filter__item">
                            <div class="filter__item__name">Тип поездки</div>
                            <select class="cs-select cs-skin-border" name="place-meet">
                                <option value="honey+round" selected>Медовые водопады + г.Кольцо</option>
                                <option value="france">France</option>
                                <option value="brazil">Brazil</option>
                                <option value="argentina">Argentina</option>
                                <option value="south-africa">South Africa</option>
                            </select>
                        </div>
                        <div class="filter__item filter__item_mt">
                            <div class="filter__item__name">колличество мест</div>
                            <div class="filter__item__slider filter__item__slider_single" id="filter-slider_single">
                                <div class="filter__item__slider__range filter__item__slider__range_from">от 12
                                </div>
                                <div class="filter__item__slider__range filter__item__slider__range_to">до 60</div>
                            </div>
                        </div>
                        <div class="filter__item">
                            <div class="filter__item__name">класс поездки</div>
                            <select class="cs-select cs-skin-border" name="transfer-tipe">
                                <option value="comfort" selected>Комфорт</option>
                                <option value="econom">Эконом</option>
                                <option value="business">Бизнес</option>
                            </select>
                        </div>
                        <div class="filter__item">
                            <div class="filter__item__name">дата поездки</div>
                            <div class="filter__item__date">
                                <input type="text" class="filter__item__date__inp" id="date-trip" name="date-trip" placeholder="Выбрать">
                            </div>
                        </div>
                        <a href="#" class="filter__button filter__button_m"><span>Подобрать автобус</span></a>
                        <div class="filter__info">
                            <p class="filter__info__text">Все автобусы соответствуют стандартам
                                безопасности и комфорта. Оснащены
                                кондиционерами, аудио- и видео
                                техникой, микрофонами.
                                Эргономичные, удобные сиденья.</p>
                        </div>
                    </form>
                    <div class="button-invert-wrap"><a href="#" class="button-invert"><span>показать все маршруты</span></a></div>
                </div>
                <div class="col-xs-12 col-md-8 col-lg-8 results">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="head">
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
                            <img src="/local/templates/main/images/bus-item/bus-1.png" alt="">
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">Mersedes (15-18 мест)
                                <span></span>
                            </div>
                            <div class="item-card__content__info_light">Маршрут поездки:
                                <span> Медовые водопады + г. Кольцо</span>
                            </div>
                            <div class="item-card__content__info_light">Время поездки:
                                <span> 3 часа</span>
                            </div>
                            <div class="item-card__content__footer clearfix">
                                <div class="item-card__content__price">Стоимость поездки:
                                    <span class="item-card__content__price__number"><span>7 500</span> руб</span>
                                </div>
                                <a href="" class="item-card__content__more"><span>отправить заявку</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/bus-item/bus-2.png" alt="">
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">Mersedes (15-18 мест)
                                <span></span>
                            </div>
                            <div class="item-card__content__info_light">Маршрут поездки:
                                <span> Медовые водопады + г. Кольцо</span>
                            </div>
                            <div class="item-card__content__info_light">Время поездки:
                                <span> 3 часа</span>
                            </div>
                            <div class="item-card__content__footer clearfix">
                                <div class="item-card__content__price">Стоимость поездки:
                                    <span class="item-card__content__price__number"><span>8 300</span> руб</span>
                                </div>
                                <a href="" class="item-card__content__more"><span>отправить заявку</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/bus-item/bus-1.png" alt="">
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">Mersedes (15-18 мест)
                                <span></span>
                            </div>
                            <div class="item-card__content__info_light">Маршрут поездки:
                                <span> Медовые водопады + г. Кольцо</span>
                            </div>
                            <div class="item-card__content__info_light">Время поездки:
                                <span> 3 часа</span>
                            </div>
                            <div class="item-card__content__footer clearfix">
                                <div class="item-card__content__price">Стоимость поездки:
                                    <span class="item-card__content__price__number"><span>7 500</span> руб</span>
                                </div>
                                <a href="" class="item-card__content__more"><span>отправить заявку</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/bus-item/bus-2.png" alt="">
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">Mersedes (15-18 мест)
                                <span></span>
                            </div>
                            <div class="item-card__content__info_light">Маршрут поездки:
                                <span> Медовые водопады + г. Кольцо</span>
                            </div>
                            <div class="item-card__content__info_light">Время поездки:
                                <span> 3 часа</span>
                            </div>
                            <div class="item-card__content__footer clearfix">
                                <div class="item-card__content__price">Стоимость поездки:
                                    <span class="item-card__content__price__number"><span>8 300</span> руб</span>
                                </div>
                                <a href="" class="item-card__content__more"><span>отправить заявку</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/bus-item/bus-1.png" alt="">
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">Mersedes (15-18 мест)
                                <span></span>
                            </div>
                            <div class="item-card__content__info_light">Маршрут поездки:
                                <span> Медовые водопады + г. Кольцо</span>
                            </div>
                            <div class="item-card__content__info_light">Время поездки:
                                <span> 3 часа</span>
                            </div>
                            <div class="item-card__content__footer clearfix">
                                <div class="item-card__content__price">Стоимость поездки:
                                    <span class="item-card__content__price__number"><span>7 500</span> руб</span>
                                </div>
                                <a href="" class="item-card__content__more"><span>отправить заявку</span></a>
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