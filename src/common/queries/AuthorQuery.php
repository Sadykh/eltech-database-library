<?php

namespace common\queries;

/**
 * This is the ActiveQuery class for [[\common\models\Author]].
 *
 * @see \common\models\Author
 */
class AuthorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/


    /**
     * Поиск по Id
     * @param $id
     * @return $this
     */
    public function byId($id)
    {
        return $this->andWhere(['id' => $id]);
    }

    /**
     * Только если ты владелец публикации
     * @return $this
     */
    public function onlyOwner()
    {
        return $this->andWhere(['user_id' => \Yii::$app->user->id]);
    }


    /**
     * @inheritdoc
     * @return \common\models\Author[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Author|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
