<?php

namespace frontend\controllers;

use common\models\Author;
use common\search\PublicationUserManagerSearch;
use frontend\components\BaseAuthController;
use Yii;
use common\models\Publication;
use common\search\PublicationSearch;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PublicationController implements the CRUD actions for Publication model.
 */
class PublicationController extends BaseAuthController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Publication models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PublicationUserManagerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Publication model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Publication model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Publication();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Publication model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @return array|Publication|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Publication::find()->onlyOwner()->byId($id)->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAuthor($q = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query();
            $query->select('id, firstName, lastName, middleName')
                ->from('author')
                ->where(['like', 'firstName', $q])
                ->orWhere(['like', 'lastName', $q])
                ->orWhere(['like', 'middleName', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            Yii::warning($data);
            $result = [];
            foreach ($data as $item) {
                $result[] = ['id' => $item['id'], 'text' => $item['lastName'] . ' ' . $item['firstName'] . ' ' . $item['middleName']];
            }
            $out['results'] = $result;
        }
        return $out;
    }

    public function actionJournal($q = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query();
            $query->select('id, title')
                ->from('journal')
                ->where(['like', 'title', $q])
                ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            Yii::warning($data);
            $result = [];
            foreach ($data as $item) {
                $result[] = ['id' => $item['id'], 'text' => $item['title']];
            }
            $out['results'] = $result;
        }
        return $out;
    }
}
