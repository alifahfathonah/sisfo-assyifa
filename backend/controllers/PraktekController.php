<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Praktek;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\models\PraktekSearch;
use common\models\TahunAkademik;
use yii\web\NotFoundHttpException;

/**
 * PraktekController implements the CRUD actions for Praktek model.
 */
class PraktekController extends Controller
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
     * Lists all Praktek models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PraktekSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Praktek model.
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
     * Creates a new Praktek model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Praktek();
        $tahunAkademik = TahunAkademik::find()->all();
        $tahunAkademik = ArrayHelper::map($tahunAkademik,'id',function($model){
            return $model->tahun.' '.$model->periode;
        });
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'tahunAkademik' => $tahunAkademik,
        ]);
    }

    /**
     * Updates an existing Praktek model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tahunAkademik = TahunAkademik::find()->all();
        $tahunAkademik = ArrayHelper::map($tahunAkademik,'id',function($model){
            return $model->tahun.' '.$model->periode;
        });

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'tahunAkademik' => $tahunAkademik,
        ]);
    }

    /**
     * Deletes an existing Praktek model.
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
     * Finds the Praktek model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Praktek the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Praktek::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
