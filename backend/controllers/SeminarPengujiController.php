<?php

namespace backend\controllers;

use Yii;
use common\models\Dosen;
use common\models\SeminarPenguji;
use common\models\SeminarPengujiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SeminarPengujiController implements the CRUD actions for SeminarPenguji model.
 */
class SeminarPengujiController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all SeminarPenguji models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SeminarPengujiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SeminarPenguji model.
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
     * Creates a new SeminarPenguji model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($seminar_id)
    {
        $model = new SeminarPenguji();
        $model->seminar_id = $seminar_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['seminar/view', 'id' => $model->seminar_id]);
        }

        $dosen = Dosen::find()->all();
        $dosen = ArrayHelper::map($dosen,'id','nama');

        return $this->render('create', [
            'model' => $model,
            'dosen' => $dosen,
        ]);
    }

    /**
     * Updates an existing SeminarPenguji model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SeminarPenguji model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $seminar_id = $model->seminar_id;
        $model->delete();

        return $this->redirect(['seminar/view', 'id' => $seminar_id]);
    }

    /**
     * Finds the SeminarPenguji model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SeminarPenguji the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SeminarPenguji::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
