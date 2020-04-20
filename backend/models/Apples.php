<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "apples".
 *
 * @property int $id
 * @property float|null $size
 * @property int|null $status
 * @property int|null $color_id
 * @property int|null $created_on
 * @property int|null $fell_on
 *
 */
class Apples extends \common\models\Apples
{
    public function canEat()
    {
        return $this->status === AppleStatus::STATUS_ON_GROUND;
    }

    public function canDrop()
    {
        return $this->status === AppleStatus::STATUS_ON_TREE;
    }

    public function eat($percent)
    {
        if (!$this->canEat()) {
            return false;
        }

        $this->size -= $percent;
        if ($this->size <= 0)
        {
            $this->delete();
            return true;
        }

        if ($this->save()) {
            return true;
        }
            return false;
    }

    public static function getAllRotten()
    {
        $time = Yii::$app->formatter->asTimestamp(date("Y-m-d H:i:s", strtotime('-5 hours')));
        $models = self::find()->where(['<', self::tableName() . '.fell_at', $time])->all();
        foreach ($models as $model)
        {
            $model->rotten();
        }
    }

    public function rotten()
    {
        $this->status = AppleStatus::STATUS_ROTTEN;
        $this->save();
        return true;
    }
}
