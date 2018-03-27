<?php
/**
 * @var $model \common\models\Publication
 */

?>
<li>
    <?= $model->author->lastName ?> <?= mb_substr($model->author->firstName, 0, 1) ?>.
    <?php
    if ($model->author->middleName) {
        echo mb_substr($model->author->middleName, 0, 1) . '. ';
    } ?>
    <?=$model->title . ' ' . $model->year . '. '?>
    <?if ($model->doi_number) {
        echo '(DOI ' . $model->doi_number . ')';
    }?>
</li>