<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "author_alias".
 *
 * @property int $id
 * @property int $author_id
 * @property string $firstName
 * @property string $lastName
 * @property string $middleName
 * @property int $language_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Author $author
 */
class AuthorAlias extends \yii\db\ActiveRecord
{
    const LANG_RU = 1;
    const LANG_EN = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author_alias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id', 'firstName', 'lastName'], 'required'],
            [['author_id', 'language_id', 'created_at', 'updated_at'], 'integer'],
            [['firstName', 'lastName', 'middleName'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::class, 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'middleName' => 'Middle Name',
            'language_id' => 'Language ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }

    /**
     * @inheritdoc
     * @return \common\queries\AuthorAliasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\queries\AuthorAliasQuery(get_called_class());
    }
}
