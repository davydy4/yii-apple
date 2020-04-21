<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 *
 * @property int $id
 * @property string $color
 *
 */
class AppleColors extends \common\models\AppleColors
{
    /**
     * Массив цветов яблок
     *
     * @return array
     */
    public static function getRandColors()
    {
        $colors = ArrayHelper::map(self::find()->all(), 'id', 'id');
        if (!empty($colors))
        {
            return $colors[array_rand($colors)];
        }
        return null;

    }
}
