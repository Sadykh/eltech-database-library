<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
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
    <div class="publication-search">

        <?php $form = \yii\bootstrap\ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>

        <div class="row">
            <div class="col-md-3">
                <?= $form->field($searchModel, 'author_id')->dropDownList(ArrayHelper::merge([null => 'Все'], PublicationHelper::getAuthorsList())) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($searchModel, 'journal_id')->dropDownList(ArrayHelper::merge([null => 'Все'], PublicationHelper::getJournalList())) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <?= $form->field($searchModel, 'language_id')->dropDownList(ArrayHelper::merge([null => 'Все'], PublicationHelper::getLanguageList())) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($searchModel, 'isbn')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?= $form->field($searchModel, 'year_from')->dropDownList(ArrayHelper::merge([null => 'Все'], PublicationHelper::getAgeList())) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($searchModel, 'year_to')->dropDownList(PublicationHelper::getAgeList()) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <?= $form->field($searchModel, 'scopus_id')->checkbox() ?>
            </div>
            <div class="col-md-3">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?= $form->field($searchModel, 'wos_id')->checkbox() ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($searchModel, 'rinch_id')->checkbox() ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?= $form->field($searchModel, 'peer_reviewed_id')->checkbox() ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($searchModel, 'conference_id')->checkbox() ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?= $form->field($searchModel, 'scopus_number')->textInput(['maxlength' => true]) ?>

            </div>

            <div class="col-md-3">
                <?= $form->field($searchModel, 'doi_number')->textInput(['maxlength' => true]) ?>
            </div>
        </div>


        <div class="form-group">
            <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
        </div>

        <?php \yii\bootstrap\ActiveForm::end(); ?>

    </div>

    <ul>
    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_search_item',
    ]); ?>
    </ul>
</div>
