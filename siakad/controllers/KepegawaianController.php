<?php

namespace siakad\controllers;

use Yii;
use yii\web\Controller;
use common\models\Dosen;
use yii\filters\VerbFilter;
use common\models\DosenSearch;
use yii\web\NotFoundHttpException;
use common\models\RiwayatPangkatDosenSearch;
use common\models\RiwayatFungsionalDosenSearch;
use common\models\RiwayatPendidikanDosenSearch;
use common\models\RiwayatPenelitianDosenSearch;
use common\models\RiwayatSertifikasiDosenSearch;

/**
 * KepegawaianController implements the CRUD actions for Dosen model.
 */
class KepegawaianController extends Controller
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
     * Lists all Dosen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dosen = Yii::$app->user->identity->dosen;
        $model = $this->findModel($dosen->id);
        $queryParams = Yii::$app->request->queryParams;
        $searchModelFungsional = new RiwayatFungsionalDosenSearch();
        $searchModelFungsional->nidn = $model->NIDN;
        $dataProviderFungsional = $searchModelFungsional->search($queryParams);

        $searchModelPangkat = new RiwayatPangkatDosenSearch();
        $searchModelPangkat->nidn = $model->NIDN;
        $dataProviderPangkat = $searchModelPangkat->search($queryParams);

        $searchModelPendidikan = new RiwayatPendidikanDosenSearch();
        $searchModelPendidikan->nidn = $model->NIDN;
        $dataProviderPendidikan = $searchModelPendidikan->search($queryParams);

        $searchModelSertifikasi = new RiwayatSertifikasiDosenSearch();
        $searchModelSertifikasi->nidn = $model->NIDN;
        $dataProviderSertifikasi = $searchModelSertifikasi->search($queryParams);

        $searchModelPenelitian = new RiwayatPenelitianDosenSearch();
        $searchModelPenelitian->nidn = $model->NIDN;
        $dataProviderPenelitian = $searchModelPenelitian->search($queryParams);

        return $this->render('view', [
            'model' => $model,

            'searchModelFungsional' => $searchModelFungsional,
            'dataProviderFungsional' => $dataProviderFungsional,

            'searchModelPangkat' => $searchModelPangkat,
            'dataProviderPangkat' => $dataProviderPangkat,

            'searchModelPendidikan' => $searchModelPendidikan,
            'dataProviderPendidikan' => $dataProviderPendidikan,

            'searchModelSertifikasi' => $searchModelSertifikasi,
            'dataProviderSertifikasi' => $dataProviderSertifikasi,

            'searchModelPenelitian' => $searchModelPenelitian,
            'dataProviderPenelitian' => $dataProviderPenelitian,
        ]);
    }

    /**
     * Displays a single Dosen model.
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
     * Creates a new Dosen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dosen();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Dosen model.
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
     * Deletes an existing Dosen model.
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
     * Finds the Dosen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dosen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dosen::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
