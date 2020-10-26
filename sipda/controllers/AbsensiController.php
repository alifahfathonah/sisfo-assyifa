<?php

namespace sipda\controllers;

use Yii;
use common\models\Absensi;
use common\models\AbsensiSearch;
use common\models\Jadwal;
use common\models\VwJadwal;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * AbsensiController implements the CRUD actions for Absensi model.
 */
class AbsensiController extends Controller
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
     * Lists all Absensi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $jadwal = VwJadwal::find()
                    ->where([
                        'dosen_id'=>Yii::$app->user->identity->dosen->id,
                        'tahun_akademik_id'=>!empty(Yii::$app->Ta->get()) ? Yii::$app->Ta->get()->id : 0
                    ])
                    ->all();
        
        $key_jadwal = ArrayHelper::map($jadwal,'jadwal_id','jadwal_id');

        $jadwal = ArrayHelper::map($jadwal,'jadwal_id','jadwal_id');

        $searchModel = new AbsensiSearch();
        $queryParams = Yii::$app->request->queryParams;
        $queryParams['AbsensiSearch']['in_jadwal'] = $key_jadwal;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'jadwal' => $jadwal,
        ]);
    }

    function actionCetak()
    {
        $model = new Absensi();
        $jadwal = VwJadwal::find()
                    ->where([
                        'dosen_id'=>Yii::$app->user->identity->dosen->id,
                        'tahun_akademik_id'=>!empty(Yii::$app->Ta->get()) ? Yii::$app->Ta->get()->id : 0
                    ])
                    ->all();
        $jadwal = ArrayHelper::map($jadwal,'jadwal_id',function($model){
            return $model->hari.' - '.$model->nama_mata_kuliah.' - '.$model->kelas->nama;
        });

        if ($model->load(Yii::$app->request->post())) {
            $model = $model->find()->where(['jadwal_id'=>$model->jadwal_id])->orderby(['pertemuan'=>SORT_ASC])->all();
            if(!empty($model) && count($model) > 0)
            {
                $range = [
                    'Hadir' => 2,
                    'Izin'  => 1,
                    'Sakit'  => 1,
                    'Tanpa Keterangan'  => 0,
                ];
                $jadwal = $model[0]->jadwal;
                $mahasiswa = $jadwal->dosenPengampuh->kelas->mahasiswas;
                return $this->renderPartial('cetak',[
                    'jadwal' => $jadwal,
                    'mahasiswa' => $mahasiswa,
                    'model' => $model,
                    'range' => $range,
                ]);
            }
        }

        return $this->render('pra-cetak',[
            'jadwal' => $jadwal,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Absensi model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $jadwal = VwJadwal::find()
                    ->where([
                        'dosen_id'=>Yii::$app->user->identity->dosen->id,
                        'tahun_akademik_id'=>!empty(Yii::$app->Ta->get()) ? Yii::$app->Ta->get()->id : 0
                    ])
                    ->all();

        $jadwal = ArrayHelper::map($jadwal,'jadwal_id','jadwal_id');

        return $this->render('view', [
            'model' => $this->findModel($id),
            'jadwal' => $jadwal,
        ]);
    }

    /**
     * Creates a new Absensi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Absensi();
        $jadwal = VwJadwal::find()
                    ->where([
                        'dosen_id'=>Yii::$app->user->identity->dosen->id,
                        'tahun_akademik_id'=>!empty(Yii::$app->Ta->get()) ? Yii::$app->Ta->get()->id : 0
                    ])
                    ->all();

        $jadwal = ArrayHelper::map($jadwal,'jadwal_id',function($model){
            return $model->hari.' - '.$model->nama_mata_kuliah.' - '.$model->kelas->nama;
        });

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'jadwal' => $jadwal,
        ]);
    }

    /**
     * Updates an existing Absensi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $jadwal = VwJadwal::find()
                    ->where([
                        'dosen_id'=>Yii::$app->user->identity->dosen->id,
                        'tahun_akademik_id'=>!empty(Yii::$app->Ta->get()) ? Yii::$app->Ta->get()->id : 0
                    ])
                    ->all();

        $key_jadwal = ArrayHelper::map($jadwal,'jadwal_id','jadwal_id');

        $jadwal = ArrayHelper::map($jadwal,'jadwal_id',function($model){
            return $model->hari.' - '.$model->nama_mata_kuliah.' - '.$model->kelas->nama;
        });

        if(!in_array($model->jadwal_id,$key_jadwal)) return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'jadwal' => $jadwal,
        ]);
    }

    /**
     * Deletes an existing Absensi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $jadwal = VwJadwal::find()
                    ->where([
                        'dosen_id'=>Yii::$app->user->identity->dosen->id,
                        'tahun_akademik_id'=>!empty(Yii::$app->Ta->get()) ? Yii::$app->Ta->get()->id : 0
                    ])
                    ->all();
        $key_jadwal = ArrayHelper::map($jadwal,'jadwal_id','jadwal_id');
        if(!in_array($model->jadwal_id,$key_jadwal)) return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Absensi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Absensi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Absensi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
