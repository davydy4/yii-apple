<?php

namespace common\models;

use yii\base\Model;

/**
 * This is the model class AppleStatus.
 *
 */
class AppleStatus extends  Model
{

    /**
     * Статус яблока
     */
    const STATUS_ON_TREE = 1;
    const STATUS_ON_GROUND = 2;
    const STATUS_ROTTEN = 3;
    public static $status = [
        self::STATUS_ON_TREE => 'Висит на дереве',
        self::STATUS_ON_GROUND => 'Лежит на земле',
        self::STATUS_ROTTEN => 'Гнилое'
    ];

}
