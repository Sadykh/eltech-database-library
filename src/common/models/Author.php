<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property string $middleName
 * @property int $user_id
 * @property int $status_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'user_id'], 'required'],
            [['user_id', 'status_id', 'created_at', 'updated_at'], 'integer'],
            [['firstName', 'lastName', 'middleName'], 'string', 'max' => 191],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'middleName' => 'Middle Name',
            'user_id' => 'User ID',
            'status_id' => 'Status ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return \common\queries\AuthorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\queries\AuthorQuery(get_called_class());
    }
}
