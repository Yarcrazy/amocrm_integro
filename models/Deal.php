<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "deals".
 *
 * @property int $id ID сделки
 * @property string $name Название сделки
 * @property int|null $price Бюджет сделки
 * @property int|null $created_by ID создавшего пользователя
 * @property int|null $closed_at Дата закрытия (Unix Timestamp)
 * @property int|null $created_at Дата создания (Unix Timestamp)
 * @property int|null $updated_at Дата изменения (Unix Timestamp)
 */
class Deal extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_by', 'closed_at', 'updated_at'], 'default', 'value' => null],
            [['price'], 'default', 'value' => 0],
            [['created_at'], 'default', 'value' => 1746474036],
            [['name'], 'required'],
            [['price', 'created_by', 'closed_at', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['price', 'created_by', 'closed_at', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'created_by' => 'Created By',
            'closed_at' => 'Closed At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => 'updated_at',
                'value' => time(),
            ]
        ];
    }

}
