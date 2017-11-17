<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

use \WM\Common\Helper;

//Is POST data sent ?
isset($_POST['date'], $_POST['hotel'], $_POST['room_type'], $_POST['price_from'], $_POST['price_to']) || exit;

\Bitrix\Main\Loader::includeModule('iblock');

//$res = \WM\IBlock\Element::getList()