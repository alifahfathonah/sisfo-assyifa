<?php

namespace backend\controllers;

use Yii;
use common\models\MahasiswaKelas;
use common\models\MahasiswaKelasSearch;
use common\models\TahunAkademik;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * MahasiswaKelasController implements the CRUD actions for MahasiswaKelas model.
 */
class MahasiswaKelasController extends Controller
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
     * Lists all MahasiswaKelas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MahasiswaKelasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MahasiswaKelas model.
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
     * Creates a new MahasiswaKelas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($kelas_id)
    {
        $model = new MahasiswaKelas();
        $model->kelas_id = $kelas_id;
        $model->tahun_akademik_id = $model->kelas->tahun_akademik_id;

        $mahasiswa = ArrayHelper::map($model->kelas->prodi->mahasiswas,'id','nama');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'MahasiswaKelasSearch[kelas_id]' => $kelas_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'mahasiswa' => $mahasiswa,
        ]);
    }

    /**
     * Updates an existing MahasiswaKelas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $kelas_id)
    {
        $model = $this->findModel($id);
        $model->kelas_id = $kelas_id;
        $model->tahun_akademik_id = $model->kelas->tahun_akademik_id;

        $mahasiswa = ArrayHelper::map($model->kelas->prodi->mahasiswas,'id','nama');
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'mahasiswa' => $mahasiswa,
        ]);
    }

    /**
     * Deletes an existing MahasiswaKelas model.
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
     * Finds the MahasiswaKelas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MahasiswaKelas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MahasiswaKelas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
