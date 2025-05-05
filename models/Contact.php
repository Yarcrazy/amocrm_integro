<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string $name Название контакта
 * @property string|null $first_name Имя контакта
 * @property string|null $last_name Фамилия контакта
 * @property int|null $created_by ID создавшего пользователя
 * @property int $created_at Дата создания (Unix Timestamp)
 * @property int|null $updated_at Дата изменения (Unix Timestamp)
 * @property bool|null $is_deleted Удален ли элемент
 */
class Contact extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'created_by'], 'default', 'value' => null],
            [['updated_at'], 'default', 'value' => 1746474036],
            [['is_deleted'], 'default', 'value' => 0],
            [['name'], 'required'],
            [['created_by', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['created_by', 'created_at', 'updated_at'], 'integer'],
            [['is_deleted'], 'boolean'],
            [['name', 'first_name', 'last_name'], 'string', 'max' => 255],
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
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_deleted' => 'Is Deleted',
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
