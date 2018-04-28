<?php
/**
 * @var $model \common\models\Publication
 */

?>
<li>
    <?php
    $authorsList = [];
    foreach ($model->authors as $author) {
        $authorsList[$author->id] = $author->lastName . ' ' . mb_substr($author->firstName, 0, 1) . '.';
        if ($author->middleName) {
            $authorsList[$author->id] .= mb_substr($author->middleName, 0, 1) . '.';
        }
    }
    echo implode(', ', $authorsList);
    echo ' ' . $model->title . ' ';
    echo '// ' . $model->journal->title . ' ';
    echo $model->year . '. ';
    if ($model->doi_number) {
        echo '(DOI ' . $model->doi_number . ')';
    } ?>
</li>