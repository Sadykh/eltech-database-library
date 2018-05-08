<?php

use yii\helpers\Html;

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
    $textLink = implode(', ', $authorsList);
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