<?php

namespace backend\controllers;

use common\models\Dosen;
use Yii;
use common\models\DosenPengampuh;
use common\models\DosenPengampuhSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * DosenPengampuhController implements the CRUD actions for DosenPengampuh model.
 */
class DosenPengampuhController extends Controller
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
     * Lists all DosenPengampuh models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DosenPengampuhSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DosenPengampuh model.
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
     * Creates a new DosenPengampuh model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($kelas_id)
    {
        $model = new DosenPengampuh();
        $model->kelas_id = $kelas_id;

        $mata_kuliah = $model->kelas->prodi->getMataKuliahProdis()->where(['semester'=>$model->kelas->semester])->all();
        $mata_kuliah = ArrayHelper::map($mata_kuliah,'id',function($model){
            return $model->mataKuliah->nama;
        });
        $dosen = Dosen::find()->all();
        $dosen = ArrayHelper::map($dosen,'id','nama');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'DosenPengampuhSearch[kelas_id]' => $kelas_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'dosen' => $dosen,
            'mata_kuliah' => $mata_kuliah,
        ]);
    }

    /**
     * Updates an existing DosenPengampuh model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $kelas_id)
    {
        $model = $this->findModel($id);
        $model->kelas_id = $kelas_id;

        $mata_kuliah = $model->kelas->prodi->getMataKuliahProdis()->where(['semester'=>$model->kelas->semester])->all();
        $mata_kuliah = ArrayHelper::map($mata_kuliah,'id',function($model){
            return $model->mataKuliah->nama;
        });
        $dosen = Dosen::find()->all();
        $dosen = ArrayHelper::map($dosen,'id','nama');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'DosenPengampuhSearch[kelas_id]' => $kelas_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'dosen' => $dosen,
            'mata_kuliah' => $mata_kuliah,
        ]);
    }

    /**
     * Deletes an existing DosenPengampuh model.
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
     * Finds the DosenPengampuh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DosenPengampuh the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DosenPengampuh::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
