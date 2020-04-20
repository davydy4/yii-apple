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
        $time = time() - 5*60*60;

        $models = self::find()->where(['<', self::tableName() . '.fell_at', $time])->all();
        foreach ($models as $model)
        {
            $model->rotten();
        }
    }

    public static function Uptime()
    {
        $models = self::find()->andWhere(['status' => AppleStatus::STATUS_ON_GROUND])->all();
        foreach ($models as $model)
        {
            $model->fell_at -= 1*60*60 ;
            $model->save();
        }
        return true;
    }

    public function rotten()
    {
        $this->status = AppleStatus::STATUS_ROTTEN;
        $this->save();
        return true;
    }
}
