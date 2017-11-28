<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Гостиница");
?>

<div class="page__hotel__detail">
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
    <div class="container">
        <div class="page__hotel__detail__text">
            <h2 class="page__hotel__detail__text__title">Инфорация</h2>
            <p>В курортной зоне, на высоте около 600 метров над уровнем моря, у горы Бештау, в дубовом лесу, недалеко от озера находится санаторий «Дубовая Роща» (г. Железноводск). Общая площадь санатория превышает 17 гектаров. Санаторий «Дубовая Роща» имеет аккредитацию высшей квалификационной категории и относится к Управлению делами Президента РФ. Санаторий работает в круглогодичном режиме и может одновременно принимать на лечение 186 отдыхающих.</p>
            <p>Лечение в санатории «Дубовая роща» осуществляет высококвалифицированный и опытный медицинский персонал, а именно: гинеколог, гастроэнтеролог, терапевт, физиотерапевт, рефлексотерапевт, невролог, кардиолог, диетолог, дерматолог, уролог, эндокринолог, отоларинголог, психотерапевт, педиатр, ревматолог, офтальмолог, стоматолог, уролог и врачи других профессий.</p>
        </div>
        <div class="page__hotel__detail__table">
            <table>
                <thead>
                <tr>
                    <th scope="col">Дата заезда</th>
                    <th scope="col">Гостиница</th>
                    <th scope="col">Продолжительность</th>
                    <th scope="col">Транспорт</th>
                    <th scope="col">Кол-во людей</th>
                    <th scope="col">Стоимость</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td data-label="Дата заезда">7</td>
                    <td data-label="Гостиница">Бизнес-отель Бештау</td>
                    <td data-label="Продолжительность">7</td>
                    <td data-label="Транспорт">Аренда автомобиля</td>
                    <td data-label="Кол-во людей">7</td>
                    <td data-label="Стоимость">7500</td>
                </tr>
                <tr>
                    <td scope="row" data-label="Дата заезда">5</td>
                    <td data-label="Гостиница">Гостиница Бештау</td>
                    <td data-label="Продолжительность">5</td>
                    <td data-label="Транспорт">Автобус</td>
                    <td data-label="Кол-во людей">1</td>
                    <td data-label="Стоимость">21000</td>
                </tr>
                <tr>
                    <td scope="row" data-label="Дата заезда">10</td>
                    <td data-label="Гостиница">Пансионат Искра</td>
                    <td data-label="Продолжительность">10</td>
                    <td data-label="Транспорт">Автобус</td>
                    <td data-label="Кол-во людей">10</td>
                    <td data-label="Стоимость">7500</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tour-detail">
        <section class="container tour-detail_gallery">
            <div class="row">
                <div class="col-xs-12">
                    <div class="title">
                        <h2>Фотогалерея</h2>
                    </div>
                </div>
            </div>
            <div class="row slider">
                <div class="col-xs-12 col-sm-6 col-md-4 item">
                    <a href="/verstka_o-ture/img/carousel/1.png" data-fancybox="photo">
                        <span style="background-image: url(/verstka_o-ture/img/carousel/1.png);"></span>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 item">
                    <a href="/verstka_o-ture/img/carousel/2.png" data-fancybox="photo">
                        <span style="background-image: url(/verstka_o-ture/img/carousel/2.png);"></span>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 item">
                    <a href="/verstka_o-ture/img/carousel/3.png" data-fancybox="photo">
                        <span style="background-image: url(/verstka_o-ture/img/carousel/3.png);"></span>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 item">
                    <a href="/verstka_o-ture/img/carousel/1.png" data-fancybox="photo">
                        <span style="background-image: url(/verstka_o-ture/img/carousel/4.png);"></span>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 item">
                    <a href="/verstka_o-ture/img/carousel/2.png" data-fancybox="photo">
                        <span style="background-image: url(/verstka_o-ture/img/carousel/5.png);"></span>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 item">
                    <a href="/verstka_o-ture/img/carousel/3.png" data-fancybox="photo">
                        <span style="background-image: url(/verstka_o-ture/img/carousel/3.png);"></span>
                    </a>
                </div>
            </div>
        </section>
        <section class="container tour-detail_interest">
            <div class="row">
                <div class="col-xs-12">
                    <div class="title">
                        <h2>Вас может заинтересовать</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 item">
                    <div class="img" style="background-image: url(/verstka_o-ture/img/carousel/1.png)">
                        <div class="discount">-20%</div>
                        <h3>Кавказская мозаика</h3>

                        <div class="text">
                            <div class="table">
                                <div class="cell">
                                    <p> В стоимость тура входит: проживание, питание по программе (для организованных групп), и экскурсионное обслуживание, страховка, услуги гидов.</p>

                                    <a href="">Подробнее</a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="info">
                        <div class="text">

                            <h5>Экскурсионный тур</h5>
                            <div>
                                <span>5 дней</span>
                                <span>4 ночи</span>
                            </div>

                        </div>

                        <div class="price">
                            <div>
                                <span><bold>от 15 400 руб</bold></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 item">
                    <div class="img" style="background-image: url(/verstka_o-ture/img/carousel/2.png)">
                        <div class="discount">-20%</div>
                        <h3>Кавказская мозаика</h3>

                        <div class="text">
                            <div class="table">
                                <div class="cell">
                                    <p> В стоимость тура входит: проживание, питание по программе (для организованных групп), и экскурсионное обслуживание, страховка, услуги гидов.</p>

                                    <a href="">Подробнее</a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="info">
                        <div class="text">

                            <h5>Экскурсионный тур</h5>
                            <div>
                                <span>5 дней</span>
                                <span>4 ночи</span>
                            </div>

                        </div>

                        <div class="price">
                            <div>
                                <span><bold>от 15 400 руб</bold></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 item">
                    <div class="img" style="background-image: url(/verstka_o-ture/img/carousel/3.png)">
                        <div class="discount">-20%</div>
                        <h3>Кавказская мозаика</h3>

                        <div class="text">
                            <div class="table">
                                <div class="cell">
                                    <p> В стоимость тура входит: проживание, питание по программе (для организованных групп), и экскурсионное обслуживание, страховка, услуги гидов.</p>

                                    <a href="">Подробнее</a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="info">
                        <div class="text">

                            <h5>Экскурсионный тур</h5>
                            <div>
                                <span>5 дней</span>
                                <span>4 ночи</span>
                            </div>

                        </div>

                        <div class="price">
                            <div>
                                <span><bold>от 15 400 руб</bold></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</div>







<!-- ----------------- -->


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>