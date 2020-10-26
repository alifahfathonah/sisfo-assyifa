<?php

namespace backend\controllers;

use Yii;
use common\models\Angkatan;
use common\models\MahasiswaSearch;
use common\models\DosenPembimbingSearch;
use common\models\SkripsiMahasiswa;
use common\models\SkripsiMahasiswaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SkripsiMahasiswaController implements the CRUD actions for SkripsiMahasiswa model.
 */
class SkripsiMahasiswaController extends Controller
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
     * Lists all SkripsiMahasiswa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SkripsiMahasiswaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SkripsiMahasiswa model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $searchModel = new DosenPembimbingSearch();
        $queryParams = Yii::$app->request->queryParams;
        $queryParams['DosenPembimbingSearch']['mahasiswa_id'] = $model->mahasiswa_id;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new SkripsiMahasiswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($skripsi_id)
    {
        $model = new SkripsiMahasiswa();
        $model->skripsi_id = $skripsi_id;

        $angkatan = Angkatan::find()->all();
        $angkatan = ArrayHelper::map($angkatan,'id','tahun');
        array_unshift($angkatan,'Semua');

        $list_mahasiswa = SkripsiMahasiswa::find()->where(['skripsi_id'=>$skripsi_id])->all();
        $list_mahasiswa = ArrayHelper::map($list_mahasiswa,'mahasiswa_id','mahasiswa_id');

        $searchModel = new MahasiswaSearch();
        $queryParams = Yii::$app->request->queryParams;
        if(isset($queryParams['MahasiswaSearch']['angkatan']) && $queryParams['MahasiswaSearch']['angkatan'] == 0)
            unset($queryParams['MahasiswaSearch']['angkatan']);
        $queryParams['MahasiswaSearch']['not_in_mahasiswa_id'] = $list_mahasiswa;
        $dataProvider = $searchModel->search($queryParams);

        if ($model->load(Yii::$app->request->post())){ 
            // && $model->save()) {
            $post = Yii::$app->request->post();
            foreach($post['mahasiswa'] as $mahasiswa)
            {
                $m = new SkripsiMahasiswa;
                $m->skripsi_id = $model->skripsi_id;
                $m->mahasiswa_id = $mahasiswa;
                $m->save();
            }
            return $this->redirect(['index', 'SkripsiMahasiswaSearch[skripsi_id]' => $model->skripsi_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'angkatan' => $angkatan,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing SkripsiMahasiswa model.
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
     * Deletes an existing SkripsiMahasiswa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SkripsiMahasiswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SkripsiMahasiswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SkripsiMahasiswa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
