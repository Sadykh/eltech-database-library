<?php

namespace common\queries;

/**
 * This is the ActiveQuery class for [[\common\models\AuthorAlias]].
 *
 * @see \common\models\AuthorAlias
 */
class AuthorAliasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\AuthorAlias[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\AuthorAlias|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
