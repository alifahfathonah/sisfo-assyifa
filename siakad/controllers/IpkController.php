<?php

namespace siakad\controllers;

use Yii;
use common\models\MahasiswaIpk;
use common\models\MahasiswaIpkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IpkController implements the CRUD actions for MahasiswaIpk model.
 */
class IpkController extends Controller
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
     * Lists all MahasiswaIpk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $mahasiswa = Yii::$app->user->identity->mahasiswa;

        $searchModel = new MahasiswaIpkSearch();
        $searchModel->nim = $mahasiswa->NIM;

        $queryParams = Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($queryParams);
        $ipk_query = $ipk = MahasiswaIpk::find()->where(['nim'=>$mahasiswa->NIM]);
        $ipk_count = $ipk->count();
        $ipk = $ipk_query->sum('ips')/$ipk_count;
        $ipk = number_format($ipk,2);
        $sks = $ipk_query->sum('sks_semester');

        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'ipk' => $ipk,
            'sks' => $sks,
        ]);
    }

    /**
     * Displays a single MahasiswaIpk model.
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
     * Creates a new MahasiswaIpk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MahasiswaIpk();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MahasiswaIpk model.
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
     * Deletes an existing MahasiswaIpk model.
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
     * Finds the MahasiswaIpk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MahasiswaIpk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MahasiswaIpk::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
