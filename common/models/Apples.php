<?php

namespace common\models;

use Yii;
use common\models\AppleColors;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "apples".
 *
 * @property int $id
 * @property float|null $size
 * @property int|null $status
 * @property int|null $color_id
 * @property int|null $created_at
 * @property int|null $fell_at
 *
 * @property AppleColors $color
 */
class Apples extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apples';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['size'], 'number'],
            [['status', 'color_id', 'created_at', 'fell_at'], 'integer'],
            [['color_id'], 'exist', 'skipOnError' => true, 'targetClass' => AppleColors::class, 'targetAttribute' => ['color_id' => 'id']],
            ['status', 'default', 'value' => AppleStatus::STATUS_ON_TREE ],
            ['size', 'default', 'value' => '100' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'size' => 'Размер',
            'status' => 'Состояние',
            'color_id' => 'Цвет',
            'created_at' => 'Дата появления',
            'fell_at' => 'Дата падения',
        ];
    }

    /**
     * Gets query for [[Color]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(AppleColors::class, ['id' => 'color_id']);
    }

    /**
     * Связь со статусом.
     *
     */
    public function getStatus()
    {
        return $this->hasOne(AppleColors::class, ['id' => 'color_id']);
    }
}
