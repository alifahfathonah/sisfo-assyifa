<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\Mahasiswa;
use yii\helpers\ArrayHelper;
use common\models\MahasiswaKelas;
use yii\web\NotFoundHttpException;
use common\models\PembimbingAkademis;
use common\models\PembimbingAkademisSearch;

/**
 * PembimbingAkademisController implements the CRUD actions for PembimbingAkademis model.
 */
class PembimbingAkademisController extends Controller
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
     * Lists all PembimbingAkademis models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PembimbingAkademisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PembimbingAkademis model.
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
     * Creates a new PembimbingAkademis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($dosen_id)
    {
        $model = new PembimbingAkademis();
        $model->dosen_id = $dosen_id;

        if ($model->load(Yii::$app->request->post())) {
            foreach($model->mahasiswa_id as $mahasiswa)
            {
                $m = new PembimbingAkademis;
                $m->dosen_id = $dosen_id;
                $m->mahasiswa_id = $mahasiswa;
                $m->save();
            }
            return $this->redirect(['index', 'PembimbingAkademisSearch[dosen_id]' => $dosen_id]);
        }

        $selected = PembimbingAkademis::find()->where(['dosen_id'=>$dosen_id])->all();
        $selected = ArrayHelper::map($selected,'mahasiswa_id','mahasiswa_id');

        $list_mahasiswa = Mahasiswa::find()->where(['NOT IN','id',$selected])->all();
        $list_mahasiswa = ArrayHelper::map($list_mahasiswa,'id',function($m){
            return $m->NIM.' - '.$m->nama;
        });

        return $this->render('create', [
            'model' => $model,
            'list_mahasiswa' => $list_mahasiswa,
        ]);
    }

    /**
     * Updates an existing PembimbingAkademis model.
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
     * Deletes an existing PembimbingAkademis model.
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
     * Finds the PembimbingAkademis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PembimbingAkademis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PembimbingAkademis::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
