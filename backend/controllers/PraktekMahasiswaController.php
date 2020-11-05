<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Angkatan;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\models\MahasiswaSearch;
use yii\web\NotFoundHttpException;
use common\models\PraktekMahasiswa;
use common\models\PraktekMahasiswaSearch;

/**
 * PraktekMahasiswaController implements the CRUD actions for PraktekMahasiswa model.
 */
class PraktekMahasiswaController extends Controller
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
     * Lists all PraktekMahasiswa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PraktekMahasiswaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PraktekMahasiswa model.
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
     * Creates a new PraktekMahasiswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($praktek_id)
    {
        $model = new PraktekMahasiswa();
        $model->praktek_id = $praktek_id;

        $angkatan = Angkatan::find()->all();
        $angkatan = ArrayHelper::map($angkatan,'id','tahun');
        array_unshift($angkatan,'Semua');

        $list_mahasiswa = PraktekMahasiswa::find()->where(['praktek_id'=>$praktek_id])->all();
        $list_mahasiswa = ArrayHelper::map($list_mahasiswa,'mahasiswa_id','mahasiswa_id');

        $searchModel = new MahasiswaSearch();
        $queryParams = Yii::$app->request->queryParams;
        if(isset($queryParams['MahasiswaSearch']['angkatan']) && $queryParams['MahasiswaSearch']['angkatan'] == 0)
            unset($queryParams['MahasiswaSearch']['angkatan']);
        $queryParams['MahasiswaSearch']['not_in_mahasiswa_id'] = $list_mahasiswa;
        $dataProvider = $searchModel->search($queryParams);
        if ($model->load(Yii::$app->request->post())){
            //  && $model->save()) {
            $post = Yii::$app->request->post();
            foreach($post['mahasiswa'] as $mahasiswa)
            {
                $m = new PraktekMahasiswa;
                $m->praktek_id = $praktek_id;
                $m->mahasiswa_id = $mahasiswa;
                $m->save();
            }
            return $this->redirect(['index', 'PraktekMahasiswaSearch[praktek_id]' => $praktek_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'angkatan' => $angkatan,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing PraktekMahasiswa model.
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
     * Deletes an existing PraktekMahasiswa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $praktek_id = $model->praktek_id;
        $model->delete();

        return $this->redirect(['index','PraktekMahasiswaSearch[praktek_id]'=>$praktek_id]);
    }

    /**
     * Finds the PraktekMahasiswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PraktekMahasiswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PraktekMahasiswa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
