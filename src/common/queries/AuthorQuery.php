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
