<?php

namespace siakad\controllers;

use Yii;
use common\models\Kuis;
use yii\web\Controller;
use common\models\Berkas;
use common\models\Jadwal;
use common\models\Materi;
use common\models\Praktek;
use common\models\VwJadwal;
use yii\filters\VerbFilter;
use common\models\Penilaian;
use common\models\WaktuKuis;
use yii\helpers\ArrayHelper;
use common\models\ImportFile;
use common\models\MateriItem;
use common\models\KuisJawaban;
use common\models\Penyimpanan;
use common\models\PraktekFile;
use common\models\JadwalSearch;
use common\models\VwJadwalSearch;
use yii\web\NotFoundHttpException;
use common\models\KelasPerkuliahan;
use common\models\NilaiKelasKuliah;
use common\models\PraktekDosenSearch;
use common\models\KelasPerkuliahanSearch;
use common\models\PraktekMahasiswaSearch;

/**
 * PenilaianController implements the CRUD actions for Penilaian model.
 */
class PenilaianController extends Controller
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
     * Lists all Jadwal models.
     * @return mixed
     */
    public function actionIndex()
    {
        // Yii::$app->cache->flush();
        $tahun_akademik = !empty(Yii::$app->Ta->get()) ? Yii::$app->Ta->get() : 0;;
        $searchModel = new KelasPerkuliahanSearch();
        $searchModel->id_semester = $tahun_akademik->tahun.$tahun_akademik->periode;
        $searchModel->nidn = Yii::$app->user->identity->dosen->NIDN;

        $queryParams = Yii::$app->request->queryParams;
        // unset($queryParams['VwJadwalSearch']['dosen_id']);
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jadwal model.
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

    public function actionDetail($id)
    {
        $model = KelasPerkuliahan::findOne(['id_kelas_kuliah'=>$id]);
        $penilaian = NilaiKelasKuliah::find()->where(['id_kelas_kuliah'=>$id])->all();
        $penilaian_norm = [];
        foreach($penilaian as $key => $value)
        {
            $penilaian_norm[$value->id_registrasi_mahasiswa] = [
                'nilai_angka' => $value->nilai_angka,
                'nilai_huruf' => $value->nilai_huruf,
            ];
        }
        return $this->render('detail', [
            'model' => $model,
            'penilaian' => $penilaian_norm,
        ]);
    }

    /**
     * Creates a new Jadwal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $request = Yii::$app->request->post();
        if ($request) {
            foreach($request['nilai_angka'] as $key => $value)
            {
                $model = NilaiKelasKuliah::findOne(
                    [
                        'id_kelas_kuliah'=>$id,
                        'id_registrasi_mahasiswa'=>$key,
                    ]
                );
                if(!$model)
                    $model = new NilaiKelasKuliah;
                $model->setAttributes([
                    'id_kelas_kuliah'=>$id,
                    'id_registrasi_mahasiswa'=>$key,
                    'nilai_angka'=>$value,
                    'nilai_indeks'=>$value,
                    'nilai_huruf'=>$request['nilai_huruf'][$key]
                ]);
                $model->save();
                // echo $request['nilai_huruf'][$key];
            }
            Yii::$app->session->addFlash("success", "Penilaian Berhasil Disimpan");
            return $this->redirect(['detail', 'id' => $id]);
        }
    }

    /**
     * Updates an existing Jadwal model.
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
     * Deletes an existing Jadwal model.
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
     * Finds the Jadwal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jadwal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Jadwal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
