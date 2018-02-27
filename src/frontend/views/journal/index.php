<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\JournalHelper;
/* @var $this yii\web\View */
/* @var $searchModel common\search\Journal */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Журналы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'title',
            [
                'attribute' => 'status_id',
                'content' => function ($model) {
                    $statusList = JournalHelper::getStatusList();
                    return $statusList[$model->status_id];
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
