<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

use \WM\Common\Helper;

//Is POST data sent ?
empty($_POST) && exit;

//set rules & fields for form
$form = new \WM\Forms\AjaxForm(array(
    array('name-review', 'length', array('min' => 2, 'max' => 50, 'message' => 'Имя должно быть больше {min} и меньше {max} символов')),
    array('name-review', 'regex', array('pattern' => '~^[А-я Ё]+$~iu', 'message' => 'Недопустимые значения')),
    array('review','length', array('min' => 2, 'max' => 5000, 'message' => 'Текст отзыва должен быть не менее {min} и не более {max} символов')),
    array('product'),
    array('product-id'),

),
    $_POST
);

//check form fields
if($form->validate())
{
    $status = $form->formActionFull(
    //iblock id
        16,
        //iblock add params
        array(
            'NAME' => Helper::enc($form->getField('name-review')),
            'PREVIEW_TEXT' => Helper::enc($form->getField('review')),
            'PROPERTY_VALUES' => array(
                'PRODUCT' => $form->getField('product-id'),
            ),
            'ACTIVE' => 'N',
        ),
        //email event name
        'NEW_REVIEW',
        //email send params
        array(
            'AUTHOR' => $form->getField('name-review'),
            'TEXT' => $form->getField('review'),
            'PRODUCT' => $form->getField('product-id'),
        )
    );

    echo json_encode($status ? array('success' => true) : array('errors' => $form->getErrors()));
}
else
    echo json_encode(array('errors' => $form->getErrors()));
