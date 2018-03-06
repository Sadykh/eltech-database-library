<?php

namespace common\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Publication;

/**
 * PublicationSearch represents the model behind the search form of `common\models\Publication`.
 */
class PublicationSearch extends Publication
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'author_id', 'language_id', 'year', 'journal_id', 'scopus_id', 'wos_id', 'rinch_id', 'peer_reviewed_id', 'conference_id', 'created_at', 'updated_at'], 'integer'],
            [['scopus_number', 'doi_number', 'isbn'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Publication::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'author_id' => $this->author_id,
            'language_id' => $this->language_id,
            'year' => $this->year,
            'journal_id' => $this->journal_id,
            'scopus_id' => $this->scopus_id,
            'wos_id' => $this->wos_id,
            'rinch_id' => $this->rinch_id,
            'peer_reviewed_id' => $this->peer_reviewed_id,
            'conference_id' => $this->conference_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'scopus_number', $this->scopus_number])
            ->andFilterWhere(['like', 'doi_number', $this->doi_number])
            ->andFilterWhere(['like', 'isbn', $this->isbn]);

        return $dataProvider;
    }
}
