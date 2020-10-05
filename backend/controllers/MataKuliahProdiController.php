<?php

namespace backend\controllers;

use common\models\MataKuliah;
use Yii;
use common\models\MataKuliahProdi;
use common\models\MataKuliahProdiSearch;
use common\models\Prodi;
use common\models\TahunAkademik;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * MataKuliahProdiController implements the CRUD actions for MataKuliahProdi model.
 */
class MataKuliahProdiController extends Controller
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
     * Lists all MataKuliahProdi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MataKuliahProdiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MataKuliahProdi model.
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
     * Creates a new MataKuliahProdi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MataKuliahProdi();

        $mata_kuliah = MataKuliah::find()->all();
        $mata_kuliah = ArrayHelper::map($mata_kuliah,'id','nama');

        $prodi = Prodi::find()->all();
        $prodi = ArrayHelper::map($prodi,'id','nama');

        $tahun_akademik = TahunAkademik::find()->all();
        $tahun_akademik = ArrayHelper::map($tahun_akademik,'id',function($model){
            return $model->tahun.$model->periode;
        });

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'mata_kuliah' => $mata_kuliah,
            'prodi' => $prodi,
            'tahun_akademik' => $tahun_akademik,
        ]);
    }

    /**
     * Updates an existing MataKuliahProdi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $mata_kuliah = MataKuliah::find()->all();
        $mata_kuliah = ArrayHelper::map($mata_kuliah,'id','nama');

        $prodi = Prodi::find()->all();
        $prodi = ArrayHelper::map($prodi,'id','nama');

        $tahun_akademik = TahunAkademik::find()->all();
        $tahun_akademik = ArrayHelper::map($tahun_akademik,'id',function($model){
            return $model->tahun.$model->periode;
        });

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'mata_kuliah' => $mata_kuliah,
            'prodi' => $prodi,
            'tahun_akademik' => $tahun_akademik,
        ]);
    }

    /**
     * Deletes an existing MataKuliahProdi model.
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
     * Finds the MataKuliahProdi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MataKuliahProdi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MataKuliahProdi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
