<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "publication".
 *
 * @property int $id
 * @property int $user_id
 * @property int $language_id
 * @property int $year
 * @property int $journal_id
 * @property int $scopus_id
 * @property string $scopus_number
 * @property string $doi_number
 * @property int $wos_id
 * @property int $rinch_id
 * @property int $peer_reviewed_id
 * @property int $conference_id
 * @property string $isbn
 * @property int $created_at
 * @property int $updated_at
 * @property string $title
 *
 * @property Author $author
 * @property Journal $journal
 * @property User $user
 */
class Publication extends \yii\db\ActiveRecord
{
    const STATUS_NO_ACTIVE = 0;
    const STATUS_ACTIVE = 1;

    protected $authorListId;

    const LANG_RU = 1;
    const LANG_EN = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'publication';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'journal_id', 'authorListId'], 'required'],
            [['user_id', 'language_id', 'year', 'journal_id', 'scopus_id', 'wos_id', 'rinch_id', 'peer_reviewed_id', 'conference_id', 'created_at', 'updated_at'], 'integer'],
            [['scopus_number', 'doi_number', 'isbn', 'title'], 'string', 'max' => 191],
            [['journal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Journal::class, 'targetAttribute' => ['journal_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            ['authorListId', 'safe'],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Создатель',
            'language_id' => 'Язык',
            'journal_id' => 'Журнал',
            'scopus_id' => 'Scopus ID',
            'scopus_number' => 'Scopus Number',
            'doi_number' => 'DOI Number',
            'wos_id' => 'WOS ID',
            'rinch_id' => 'РИНЦ',
            'peer_reviewed_id' => 'Только рецензируемые',
            'conference_id' => 'Для конференций',
            'isbn' => 'ISBN',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'year' => 'Год',
            'title' => 'Название публикации',
            'authorListId' => 'Список авторов'
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJournal()
    {
        return $this->hasOne(Journal::class, ['id' => 'journal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicationAuthors()
    {
        return $this->hasMany(PublicationAuthor::class, ['publication_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Author::class, ['id' => 'author_id'])->viaTable('publication_author', ['publication_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\queries\PublicationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\queries\PublicationQuery(get_called_class());
    }

    /**
     * @return mixed
     */
    public function getAuthorListFullname()
    {
        $result = [];
        foreach ($this->authors as $author) {
            $result[$author->id] = $author->lastName . ' ' . $author->firstName . ' ' . $author->middleName;
        }
        return $result;
    }

    /**
     * @return mixed
     */
    public function getAuthorListId()
    {
        if ($this->authorListId === null)
            $this->authorListId = ArrayHelper::map($this->authors, 'id', 'id');
        return $this->authorListId;
    }

    /**
     * @param mixed $authorListId
     */
    public function setAuthorListId($authorListId): void
    {
        $this->authorListId = $authorListId;
    }

    protected function refreshAuthors()
    {
        $authors = $this->authorListId;

        PublicationAuthor::deleteAll(['publication_id' => $this->id]);

        if (is_array($authors)) {
            foreach ($authors as $id) {
                if (Author::find()->where(['id' => $id])->exists()) {
                    $pubAuthor = new PublicationAuthor();
                    $pubAuthor->publication_id = $this->id;
                    $pubAuthor->author_id = $id;
                    $pubAuthor->save();
                }
            }
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->refreshAuthors();
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub

    }

    public function beforeValidate()
    {
        if ($this->user_id == null) {
            $this->user_id = Yii::$app->user->id;
        }
        if ($this->scopus_number) {
            $this->scopus_id = 1;
        }
        return parent::beforeValidate(); // TODO: Change the autogenerated stub
    }
}
