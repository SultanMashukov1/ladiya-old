<?php

namespace WM\Seo;

/**
 * Class OpenGraph
 * @package WM\Seo
 */
class OpenGraph extends \WM\Base\Markup
{
    /**
     * set prefix for meta tags
     *
     * @return void
     */
    public function setPrefix()
    {
        static::$PREFIX = 'og:';
    }
}