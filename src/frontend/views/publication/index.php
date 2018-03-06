<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\PublicationHelper;
/* @var $this yii\web\View */
/* @var $searchModel common\search\PublicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Publications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publication-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Publication', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'user_id',
            [
                'attribute' => 'author_id',
                'content' => function ($model) {
                    $statusList = PublicationHelper::getAuthorsList();
                    return $statusList[$model->author_id];
                }
            ],
            [
                'attribute' => 'language_id',
                'content' => function ($model) {
                    $statusList = PublicationHelper::getLanguageList();
                    return $statusList[$model->language_id];
                }
            ],
            [
                'attribute' => 'journal_id',
                'content' => function ($model) {
                    $statusList = PublicationHelper::getJournalList();
                    return $statusList[$model->journal_id];
                }
            ],
            'year',
            //'journal_id',
            //'scopus_id',
            //'scopus_number',
            //'doi_number',
            //'wos_id',
            //'rinch_id',
            //'peer_reviewed_id',
            //'conference_id',
            //'isbn',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
