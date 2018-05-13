<?php

namespace console\controllers;

use common\models\Publication;
use yii\console\Controller;

class UtilController extends Controller
{

    public function actionTransferJournals()
    {

        $publications = Publication::find()->with('journal')->all();

        foreach ($publications as $publication) {
            if (!$publication->journal_id) {
                continue;
            }
            $journal = $publication->journal;

            if ($journal) {
                $publication->publisher_name = $journal->title;
                $publication->journal_id = null;
                $publication->save();
            }

            if (!Publication::find()->where(['journal_id' => $journal->id])->count()) {
                $journal->delete();
            }
        }
    }
}