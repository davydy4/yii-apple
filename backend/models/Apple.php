<?php


namespace backend\models;

use Yii;


class Apple extends Apples
{
    public $color;

    /**
     * Apples constructor.
     * @param int $color
     */
    public function __construct($color)
    {
        if (!empty($color))
        {
            $this->color_id = $color;
        }
    }
}