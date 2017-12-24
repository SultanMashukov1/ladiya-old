<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

use \WM\Common\Helper;

//Is POST data sent ?
empty($_POST) && exit;

//set rules & fields for form
$form = new \WM\Forms\AjaxForm(array(
    array('name', 'length', array('min' => 2, 'max' => 50, 'message' => 'Имя должно быть больше {min} и меньше {max} символов')),
    array('name', 'regex', array('pattern' => '~^[А-я Ё]+$~iu', 'message' => 'Недопустимые значения')),
    array('phone', 'phone', array('message' => 'Телефон должен быть в формате +7 (999) 666-33-11')),
    array('email', 'email'),
    array('date-arrive', 'required',array('message' => 'Выберите дату встречи')),
    array('select-from', 'required',array('message' => 'Выберите дату встречи')),
    array('select-to', 'required',array('message' => 'Выберите дату встречи')),

),
    $_POST
);

//check form fields
if($form->validate())
{
    $status = $form->formActionFull(
    //iblock id
        21,
        //iblock add params
        array(
//            'NAME' => Helper::enc($form->getField('name-review')),
//            'PREVIEW_TEXT' => Helper::enc($form->getField('review')),
            'PROPERTY_VALUES' => array(
                'NAME' => Helper::enc($form->getField('name')),
                'PHONE' => Helper::enc($form->getField('phone')),
                'EMAIL' => Helper::enc($form->getField('email')),
                'FROM' => Helper::enc($form->getField('select_from')),
                'TO' => Helper::enc($form->getField('select_to')),
                'DATE' => Helper::enc($form->getField('date-arrive')),
                'COMMENT' => Helper::enc($form->getField('comment')),
            ),
            'ACTIVE' => 'N',
        ),
        //email event name
        'NEW_ORDER-RENT_BUS',
        //email send params
        array(
            'NAME' => Helper::enc($form->getField('name')),
            'PHONE' => Helper::enc($form->getField('phone')),
            'EMAIL' => Helper::enc($form->getField('email')),
            'FROM' => Helper::enc($form->getField('select_from')),
            'TO' => Helper::enc($form->getField('select_to')),
            'DATE' => Helper::enc($form->getField('date-arrive')),
            'COMMENT' => Helper::enc($form->getField('comment')),
        )
    );

    echo json_encode($status ? array('success' => true) : array('errors' => $form->getErrors()));
}
else
    echo json_encode(array('errors' => $form->getErrors()));