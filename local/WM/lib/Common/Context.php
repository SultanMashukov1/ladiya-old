<?php

namespace WM\Common;


/**
 * Class Context
 * @package WM\Common
 */
class Context extends \Wm\Base\BitrixInstances
{
    /**
     * @return void
     */
    public static function setInstance()
    {
        static::$instance = \Bitrix\Main\Application::getInstance()->getContext();
    }

    /**
     * @return \Bitrix\Main\Context
     */
    public static function get()
    {
        return parent::get();
    }
}