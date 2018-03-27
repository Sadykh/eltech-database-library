<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\helpers\JournalHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Journal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="journal-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'status_id')->dropDownList(JournalHelper::getStatusList()) ?>
        </div>
        <div class="col-md-6">
            <div class="alert alert-info" role="alert">
                <p>Поле <b>Статус</b> влияет на наличие журнала в списке при добавлении публикации.</p>
            </div>
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
