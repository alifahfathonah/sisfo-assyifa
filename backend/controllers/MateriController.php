<?php

namespace backend\controllers;

use common\models\DosenPengampuh;
use Yii;
use common\models\Materi;
use common\models\MateriSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * MateriController implements the CRUD actions for Materi model.
 */
class MateriController extends Controller
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
     * Lists all Materi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MateriSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Materi model.
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
     * Creates a new Materi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Materi();

        $dosen_mata_kuliah = DosenPengampuh::find()->all();
        $dosen_mata_kuliah = ArrayHelper::map($dosen_mata_kuliah,'id',function($model){
            return $model->dosen->nama.' - '.$model->mataKuliah->nama.' - '.$model->kelas->nama;
        });

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'dosen_mata_kuliah' => $dosen_mata_kuliah,
        ]);
    }

    /**
     * Updates an existing Materi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $dosen_mata_kuliah = DosenPengampuh::find()->all();
        $dosen_mata_kuliah = ArrayHelper::map($dosen_mata_kuliah,'id',function($model){
            return $model->dosen->nama.' - '.$model->mataKuliah->nama.' - '.$model->kelas->nama;
        });

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'dosen_mata_kuliah' => $dosen_mata_kuliah,
        ]);
    }

    /**
     * Deletes an existing Materi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Materi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Materi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Materi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
