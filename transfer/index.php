<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Трансфер");
?>

    <section class="lad-slideshow">
        <div class="lad-slideshow__block-title">
            <h1 class="lad-slideshow__block-title__h1">ТРАНСФЕР<br>ВСТРЕЧА И ПРОВОДЫ</h1>
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
                                        <span class="image image-transfer-1"></span>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="item-block">
                                        <span class="image image-transfer-2"></span>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="item-block">
                                        <span class="image image-transfer-3"></span>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="item-block">
                                        <span class="image image-transfer-4"></span>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="item-block">
                                        <span class="image image-transfer-5"></span>
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
                <li><a href="#">Транспорт</a></li>
                <li class="active">Трансфер</li>
            </ol>
        </div>
    </section>

    <section class="content-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4 col-lg-4">
                    <div class="form__filter">
                        <div class="form__filter__title">
                            <span>Оставить заявку</span>
                        </div>
                        <div class="form__filter__item">
                            <div class="form__filter__item__name">
                                <span>Имя</span>
                            </div>
                            <div class="form__filter__input">
                                <input class="form__filter__input__control" type="text">
                            </div>
                        </div>
                        <div class="form__filter__item">
                            <div class="form__filter__item__name">
                                <span>Телефон</span>
                            </div>
                            <div class="form__filter__input">
                                <input class="form__filter__input__control" type="text">
                                <div class="form__filter__input__log">Вы не выбрали!</div>
                            </div>
                        </div>
                        <div class="form__filter__item">
                            <div class="form__filter__item__name">
                                <span>E-mail</span>
                            </div>
                            <div class="form__filter__input">
                                <input class="form__filter__input__control" type="text">
                            </div>
                        </div>
                        <div class="form__filter__item">
                            <div class="form__filter__item__name">
                                <span>Место встречи</span>
                            </div>
                            <div class="form__filter__input">
                                <select name="select" class="form__filter__select__control cs-select cs-skin-border">
                                    <option value="1" selected="selected">Выбрать</option>
                                    <option value="2">Белокуриха</option>
                                    <option value="3">Бийск</option>
                                    <option value="4">Новоалтайск</option>
                                    <option value="5">Рубцовск</option>
                                    <option value="6">Славгород</option>
                                </select>
                                <div class="form__filter__input__log">Вы не выбрали!</div>
                            </div>
                        </div>
                        <div class="form__filter__item">
                            <div class="form__filter__item__name">
                                <span>Место назначения</span>
                            </div>
                            <div class="form__filter__input">
                                <select name="select" class="form__filter__select__control cs-select cs-skin-border">
                                    <option value="1" selected="selected">Выбрать</option>
                                    <option value="2">Белокуриха</option>
                                    <option value="3">Бийск</option>
                                    <option value="4">Новоалтайск</option>
                                    <option value="5">Рубцовск</option>
                                    <option value="6">Славгород</option>
                                </select>
                            </div>
                        </div>
                        <div class="form__filter__item">
                            <div class="form__filter__item__name">
                                <span>Дата встречи</span>
                            </div>
                            <div class="form__filter__input">
                                <input type="text" class="form__filter__input__control filter__item__date__inp" id="date-arrive" name="date-arrive" placeholder="Выбрать дату">
                            </div>
                        </div>
                        <div class="form__filter__item">
                            <div class="form__filter__item__name">
                                <span>Комментарий</span>
                            </div>
                            <div class="form__filter__input">
                                <textarea class="form__filter__text__control"></textarea>
                            </div>
                        </div>
                        <div class="form__filter__item">
                            <div class="form__filter__btn">
                                <button class="form__filter__btn__control">Отправить</button>
                            </div>
                        </div>
                    </div>
                    <? /*
                    <form class="filter" name="choose-transfer" action="/hotel/" method="get">
                        <div class="filter__item">
                            <div class="filter__item__name">Место встречи</div>
                            <select class="cs-select cs-skin-border" name="place-meet">
                                <option value="airport" selected>Аэропорт МинВоды</option>
                                <option value="france">France</option>
                                <option value="brazil">Brazil</option>
                                <option value="argentina">Argentina</option>
                                <option value="south-africa">South Africa</option>
                            </select>
                        </div>
                        <div class="filter__item">
                            <div class="filter__item__name">Место назначения</div>
                            <select class="cs-select cs-skin-border" name="destination">
                                <option value="kislovodsk" selected>Кисловодск</option>
                                <option value="france">France</option>
                                <option value="brazil">Brazil</option>
                                <option value="argentina">Argentina</option>
                                <option value="south-africa">South Africa</option>
                            </select>
                        </div>
                        <div class="filter__item">
                            <div class="filter__item__name">Тип трансфера</div>
                            <select class="cs-select cs-skin-border" name="transfer-tipe">
                                <option value="person" selected>Индивидуальный</option>
                                <option value="econom">Эконом</option>
                                <option value="comfort">Комфорт</option>
                                <option value="business">Бизнес</option>
                            </select>
                        </div>

                        <div class="filter__item">
                            <div class="filter__item__name">Дополнительные услуги</div>
                            <input type="checkbox" class="filter__item__check" id="child-seat" checked>
                            <label for="child-seat" class="filter__item__check-label">детское кресло 500руб</label>
                        </div>
                        <a href="#" class="filter__button"><span>Подобрать трансфер</span></a>
                        <div class="filter__info">
                            <p class="filter__info__text">Стоимость группового трансфера свыше
                                10 человек соответствует стоимости,
                                указанной в прайс-листе
                                на аренду автобусов</p>
                        </div>
                    </form>
                    */
                    ?>
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
                            <img src="/local/templates/main/images/transfer-item/dolina-rose.png" alt="">
                            <div class="item-card__img__name">Кисловодск</div>
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">Условия встречи:
                                <span></span>
                            </div>
                            <div class="item-card__content__info">Табличка:
                                <span class="item-card__content__info__upp">ЛАДЬЯ</span>
                            </div>
                            <div class="item-card__content__info">Место ожидания:
                                <span>около вагона</span>
                            </div>
                            <div class="item-card__content__footer clearfix">
                                <div class="item-card__content__price">Итоговая стоимость:
                                    <span class="item-card__content__price__number"><span>1 200</span> руб</span>
                                </div>
                                <a href="" class="item-card__content__more"><span>отправить заявку</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/transfer-item/kislovodsk1.png" alt="">
                            <div class="item-card__img__name">Кисловодск</div>
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">Условия встречи:
                                <span></span>
                            </div>
                            <div class="item-card__content__info">Табличка:
                                <span class="item-card__content__info__upp">ЛАДЬЯ</span>
                            </div>
                            <div class="item-card__content__info">Место ожидания:
                                <span>около вагона</span>
                            </div>
                            <div class="item-card__content__footer clearfix">
                                <div class="item-card__content__price">Итоговая стоимость:
                                    <span class="item-card__content__price__number"><span>1 200</span> руб</span>
                                </div>
                                <a href="" class="item-card__content__more"><span>отправить заявку</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/transfer-item/kisl-2.png" alt="">
                            <div class="item-card__img__name">Кисловодск</div>
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">Условия встречи:
                                <span></span>
                            </div>
                            <div class="item-card__content__info">Табличка:
                                <span class="item-card__content__info__upp">ЛАДЬЯ</span>
                            </div>
                            <div class="item-card__content__info">Место ожидания:
                                <span>около вагона</span>
                            </div>
                            <div class="item-card__content__footer clearfix">
                                <div class="item-card__content__price">Итоговая стоимость:
                                    <span class="item-card__content__price__number"><span>1 200</span> руб</span>
                                </div>
                                <a href="" class="item-card__content__more"><span>отправить заявку</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/transfer-item/items06.png" alt="">
                            <div class="item-card__img__name">Кисловодск</div>
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">Условия встречи:
                                <span></span>
                            </div>
                            <div class="item-card__content__info">Табличка:
                                <span class="item-card__content__info__upp">ЛАДЬЯ</span>
                            </div>
                            <div class="item-card__content__info">Место ожидания:
                                <span>около вагона</span>
                            </div>
                            <div class="item-card__content__footer clearfix">
                                <div class="item-card__content__price">Итоговая стоимость:
                                    <span class="item-card__content__price__number"><span>1 200</span> руб</span>
                                </div>
                                <a href="" class="item-card__content__more"><span>отправить заявку</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-card">
                        <div class="item-card__img">
                            <img src="/local/templates/main/images/transfer-item/img-1.png" alt="">
                            <div class="item-card__img__name">Кисловодск</div>
                        </div>
                        <div class="item-card__content">
                            <div class="item-card__content__info">Условия встречи:
                                <span></span>
                            </div>
                            <div class="item-card__content__info">Табличка:
                                <span class="item-card__content__info__upp">ЛАДЬЯ</span>
                            </div>
                            <div class="item-card__content__info">Место ожидания:
                                <span>около вагона</span>
                            </div>
                            <div class="item-card__content__footer clearfix">
                                <div class="item-card__content__price">Итоговая стоимость:
                                    <span class="item-card__content__price__number"><span>1 200</span> руб</span>
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