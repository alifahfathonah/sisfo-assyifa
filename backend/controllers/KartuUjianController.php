<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Semester;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\models\KartuUjian;
use common\models\ListMahasiswa;
use yii\web\NotFoundHttpException;
use common\models\KartuUjianSearch;

/**
 * KartuUjianController implements the CRUD actions for KartuUjian model.
 */
class KartuUjianController extends Controller
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
     * Lists all KartuUjian models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KartuUjianSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KartuUjian model.
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
     * Creates a new KartuUjian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KartuUjian();
        $semester = Semester::find()->orderby(['id_semester'=>SORT_DESC])->all();
        $semester = ArrayHelper::map($semester, 'id_semester','nama_semester');

        if ($model->load(Yii::$app->request->post())) {
            // && $model->save()
            $all_mahasiswa = ListMahasiswa::find()->where(['id_periode'=>$_POST['angkatan']])->all();
            foreach($all_mahasiswa as $mahasiswa)
            {
                $m = new KartuUjian;
                $m->id_semester = $model->id_semester;
                $m->id_mahasiswa = $mahasiswa->id_mahasiswa;
                $m->status = 'Cetak';
                $m->save();
            }
            return $this->redirect(['index', 'KartuUjianSearch[id_semester]' => $model->id_semester]);
        }

        return $this->render('create', [
            'model' => $model,
            'semester' => $semester,
        ]);
    }

    /**
     * Updates an existing KartuUjian model.
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
     * Deletes an existing KartuUjian model.
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
     * Finds the KartuUjian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KartuUjian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KartuUjian::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
