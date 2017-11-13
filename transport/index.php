<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Наш транспорт");
?>

    <div class="head-img head-img_transport">
        <div class="lad-slideshow__block-title">
            <h1 class="lad-slideshow__block-title__h1">Наш транспорт</h1>
        </div>
    </div>

    <section class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Главная</a></li>
                <li class="active">Транспорт</li>
            </ol>
        </div>
    </section>

    <section class="content-page">
        <div class="transport-item">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 reverse">
                        <div class="transport-item__img"><img src="/local/templates/main/images/transport-item/transfer.png" alt=""></div>
                    </div>
                    <div class="col-md-4">
                        <div class="transport-item__description">
                            <div class="transport-item__description__head">Трансферы (встреча и проводы)</div>
                            <div class="transport-item__description__title">здесь ваш текст</div>
                            <p class="transport-item__description__text">"Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat. Duis aute irure dolor in reprehenderit
                                in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                            </p>
                            <a href="" class="item-card__content__more"><span>Выбрать трансфер</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="transport-item">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="transport-item__img"><img src="/local/templates/main/images/transport-item/bus.png" alt=""></div>
                    </div>
                    <div class="col-md-4">
                        <div class="transport-item__description">
                            <div class="transport-item__description__head">автобусы</div>
                            <div class="transport-item__description__title">Для организации экскурсий и туров используются
                                современные автобусы различной вместимости:
                            </div>
                            <ul class="transport-item__description__list">
                                <li class="transport-item__description__list__item">&ndash; свыше 40 мест - Mersedes,
                                    Neoplan, Setra, Volvo, Higer, Hunday, Kia, Аврора
                                </li>
                                <li class="transport-item__description__list__item">&ndash; 15 - 20 мест - Mersedes
                                    Sprinter, Ford
                                </li>
                                <li class="transport-item__description__list__item">&ndash; до 14 мест - Mersedes Vito
                                </li>
                            </ul>
                            <p class="transport-item__description__text">
                                Все автобусы соответствуют стандартам безопасности и комфорта. Оснащены кондиционерами,
                                аудио- и видео техникой, микрофонами. Эргономичные, удобные сиденья
                            </p>
                            <a href="" class="item-card__content__more"><span>Выбрать автобус</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>