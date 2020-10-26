<?php

namespace backend\controllers;

use Yii;
use common\models\Angkatan;
use common\models\MahasiswaSearch;
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
        $angkatan = Angkatan::find()->all();
        $angkatan = ArrayHelper::map($angkatan,'id','tahun');
        array_unshift($angkatan,'Semua');

        $model = new MahasiswaKelas();
        $model->kelas_id = $kelas_id;
        $model->tahun_akademik_id = $model->kelas->tahun_akademik_id;

        $list_mahasiswa = MahasiswaKelas::find()->where(['kelas_id'=>$kelas_id])->all();
        $list_mahasiswa = ArrayHelper::map($list_mahasiswa,'mahasiswa_id','mahasiswa_id');

        $searchModel = new MahasiswaSearch();
        $queryParams = Yii::$app->request->queryParams;
        if(isset($queryParams['MahasiswaSearch']['angkatan']) && $queryParams['MahasiswaSearch']['angkatan'] == 0)
            unset($queryParams['MahasiswaSearch']['angkatan']);
        $queryParams['MahasiswaSearch']['not_in_mahasiswa_id'] = $list_mahasiswa;
        $queryParams['MahasiswaSearch']['prodi'] = $model->kelas->prodi_id;
        $dataProvider = $searchModel->search($queryParams);

        if ($model->load(Yii::$app->request->post())) {
            // $model->save()
            $post = Yii::$app->request->post();
            foreach($post['mahasiswa'] as $mahasiswa)
            {
                $m = new MahasiswaKelas;
                $m->kelas_id = $kelas_id;
                $m->tahun_akademik_id = $model->kelas->tahun_akademik_id;
                $m->mahasiswa_id = $mahasiswa;
                $m->save();
            }
            return $this->redirect(['index', 'MahasiswaKelasSearch[kelas_id]' => $kelas_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'angkatan' => $angkatan,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        $model = $this->findModel($id);
        $kelas_id = $model->kelas_id;
        $model->delete();

        return $this->redirect(['index','MahasiswaKelasSearch[kelas_id]'=>$kelas_id]);
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
