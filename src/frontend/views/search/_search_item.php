<?php

use yii\helpers\Html;
use dastanaron\translit\Translit;

/**
 * @var $model \common\models\Publication
 */

?>
<li>
    <?php
    $textLink = '';
    $authorsList = [];
    foreach ($model->authors as $author) {
        $authorsList[$author->id] = $author->lastName . ' ' . mb_substr($author->firstName, 0, 1) . '.';
        if ($author->middleName) {
            $authorsList[$author->id] .= mb_substr($author->middleName, 0, 1) . '.';
        }
    }
    $authorText = implode(', ', $authorsList);
    if ($model->language_id == \common\models\Publication::LANG_EN) {
        $translit = new Translit();
        $authorText = $translit->translit($authorText, false, 'ru-en');
    }
    $textLink = $authorText;
    $textLink .= ' ' . $model->title . ' ';
    $textLink .= '// ' . $model->journal->title . ' ';
    $textLink .= $model->year . '. ';
    if ($model->doi_number) {
        $textLink .= '(DOI ' . $model->doi_number . ')';
    }

    if ($model->file_exist) {
        echo Html::a($textLink, $model->getFileOnWeb());
    } else {
        echo $textLink;
    }
    ?>

</li>