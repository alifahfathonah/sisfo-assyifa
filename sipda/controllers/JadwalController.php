<?php

namespace sipda\controllers;

use Yii;
use common\models\Kuis;
use yii\web\Controller;
use common\models\Berkas;
use common\models\Jadwal;
use common\models\Materi;
use common\models\Praktek;
use yii\filters\VerbFilter;
use common\models\WaktuKuis;
use yii\helpers\ArrayHelper;
use common\models\KuisJawaban;
use common\models\Penyimpanan;
use common\models\PraktekFile;
use common\models\JadwalSearch;
use common\models\VwJadwalSearch;
use yii\web\NotFoundHttpException;
use common\models\PraktekDosenSearch;
use common\models\PraktekMahasiswaSearch;

/**
 * JadwalController implements the CRUD actions for Jadwal model.
 */
class JadwalController extends Controller
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
        $searchModel = new VwJadwalSearch();
        $praktek = [];

        $tahun_akademik = !empty(Yii::$app->Ta->get()) ? Yii::$app->Ta->get()->id : 0;;
        $queryParams = Yii::$app->request->queryParams;
        $queryParams['VwJadwalSearch']['tahun_akademik_id'] = $tahun_akademik;
        if(Yii::$app->user->can('Dosen'))
        {
            $praktek = new PraktekDosenSearch;
            $queryParams['VwJadwalSearch']['dosen_id'] = Yii::$app->user->identity->dosen->id;
            $queryParams['PraktekDosenSearch']['tahun_akademik'] = $tahun_akademik;
            $queryParams['PraktekDosenSearch']['dosen_id'] = Yii::$app->user->identity->dosen->id;
        }

        if(Yii::$app->user->can('Mahasiswa'))
        {
            $praktek = new PraktekMahasiswaSearch;
            $mahasiswa = Yii::$app->user->identity->mahasiswa;
            $dosen_pengampuh = ArrayHelper::map($mahasiswa->kelas->jadwals,function($model){
                return $model->dosenPengampuh->dosen_id;
            },function($model){
                return $model->dosenPengampuh->dosen_id;
            });
            $dosen_pengampuh = array_keys($dosen_pengampuh);
            $queryParams['VwJadwalSearch']['dosen_id'] = $dosen_pengampuh;
            $queryParams['PraktekMahasiswaSearch']['tahun_akademik'] = $tahun_akademik;
            $queryParams['PraktekMahasiswaSearch']['mahasiswa_id'] = $mahasiswa->id;
        }
        $dataProvider = $searchModel->search($queryParams);
        $praktekProvider = $praktek->search($queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'praktek' => $praktek,
            'praktekProvider'=>$praktekProvider
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

    public function actionPraktek($id)
    {
        $model = Praktek::findOne($id);
        return $this->render('praktek',[
            'model' => $model
        ]);
    }

    public function actionUploadBerkas()
    {
        $model = new PraktekFile;
        if ($model->load(Yii::$app->request->post())) {
            $file = \yii\web\UploadedFile::getInstance($model,'file_url');
            $filename = strtotime(date('Y-m-d H:i:s')).'.'. $file->extension;
            $file->saveAs(\Yii::getAlias("@frontend/web/uploads/{$filename}")); //'uploads/' . $filename);
            $penyimpanan = new Penyimpanan;
            $penyimpanan->user_id = Yii::$app->user->identity->id;
            $penyimpanan->nama = $file->baseName;
            $penyimpanan->berkas = $filename;
            $penyimpanan->save();
            $model->mahasiswa_id = Yii::$app->user->identity->mahasiswa->id;
            $model->file_url = $filename;
            $model->save();
            Yii::$app->session->setFlash('success', "Berkas berhasil di upload!");
            return $this->redirect(['praktek','id'=>$model->praktek_id]);
        }
    }

    public function actionKoreksi($id)
    {
        $model = PraktekFile::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            $file = \yii\web\UploadedFile::getInstance($model,'file_koreksi_url');
            $filename = strtotime(date('Y-m-d H:i:s')).'.'. $file->extension;
            $file->saveAs(\Yii::getAlias("@frontend/web/uploads/{$filename}")); //'uploads/' . $filename);
            $penyimpanan = new Penyimpanan;
            $penyimpanan->user_id = Yii::$app->user->identity->id;
            $penyimpanan->nama = $file->baseName;
            $penyimpanan->berkas = $filename;
            $penyimpanan->save();
            $model->dosen_id = Yii::$app->user->identity->dosen->id;
            $model->file_koreksi_url = $filename;
            $model->save();
            Yii::$app->session->setFlash('success', "Berkas berhasil di koreksi!");
            return $this->redirect(['praktek','id'=>$model->praktek_id]);
        }

        return $this->render('koreksi',[
            'model' => $model
        ]);
    }

    public function actionMateri($id,$index = 0)
    {
        $this->layout = 'main-materi';
        $model = $this->findModel($id);
        $materies = [];
        if(Yii::$app->user->can('Dosen'))
            $materies = $model->getMateries()->where(['in','tipe',['Materi','Kuis']])->orderby(['no_urut'=>SORT_ASC])->all();
        else
            $materies = $model->getMateries()->where(['in','tipe',['Materi','Kuis']])->andwhere(['status'=>'Publish'])->orderby(['no_urut'=>SORT_ASC])->all();
        $materi = !empty($materies) && isset($materies[$index]) ? $materies[$index] : [];
        $has_next = $index != (count($materies)-1);
        $has_prev = $index != 0;
        return $this->render('materi',[
            'model' => $model,
            'materies' => $materies,
            'materi' => $materi,
            'index' => $index,
            'has_next' => $has_next,
            'has_prev' => $has_prev,
        ]);
    }

    public function actionMulaiKuis($id,$jadwal_id)
    {
        $user = Yii::$app->user->identity;
        $kuis = Kuis::find()->where(['materi_id'=>$id,'mahasiswa_id'=>$user->mahasiswa->id])->one();
        if(empty($kuis))
        {
            $kuis = new Kuis;
            $kuis->materi_id = $id;
            $kuis->mahasiswa_id = $user->mahasiswa->id;
            $kuis->status = 'Sedang Mengerjakan';
            $kuis->save();
        }
        return $this->redirect(['kuis','id'=>$id,'jadwal_id'=>$jadwal_id]);
    }

    public function actionSelesaiKuis($id,$jadwal_id)
    {
        $user = Yii::$app->user->identity;
        $materi = Materi::findOne($id);
        $kuis = Kuis::find()->where(['materi_id'=>$id,'mahasiswa_id'=>$user->mahasiswa->id])->one();
        $kuis->status = 'Selesai';
        $kuis->save();
        return $this->redirect(['materi','id'=>$jadwal_id]);
    }

    public function actionKuis($id,$jadwal_id,$index = 0)
    {
        $user = Yii::$app->user->identity;
        $kuis = Kuis::find()->where(['materi_id'=>$id,'mahasiswa_id'=>$user->mahasiswa->id])->one();
        if($kuis->status == 'Selesai')
            return $this->redirect(Yii::$app->request->referrer);

        $this->layout = 'main-materi';
        $model = Materi::findOne($id);
        $materies = $model->childs;
        $materi = !empty($materies) && isset($materies[$index]) ? $materies[$index] : [];
        $has_next = $index != (count($materies)-1);
        $has_prev = $index != 0;
        return $this->render('kuis',[
            'model' => $model,
            'jadwal_id' => $jadwal_id,
            'materies' => $materies,
            'materi' => $materi,
            'index' => $index,
            'has_next' => $has_next,
            'has_prev' => $has_prev,
        ]);
    }

    public function actionHasilKuis($id,$jadwal_id)
    {
        $this->layout = 'main-materi';
        $model = Kuis::findOne($id);
        $materi = Materi::findOne($model->materi_id);
        if(isset($_POST['kuis_jawaban']))
        {
            foreach($_POST['kuis_jawaban'] as $kuis_jawaban_id => $kuis_jawaban_value)
            {
                $kuisJawaban = KuisJawaban::findOne($kuis_jawaban_id);
                $kuisJawaban->skor = $kuis_jawaban_value;
                $kuisJawaban->save(false);
            }
            $model->status = 'Selesai Penilaian';
            $model->save(false);
            Yii::$app->session->setFlash('success', "Penilaian Berhasil di Simpan!");
            return $this->redirect(['jadwal/hasil-kuis', 'id' => $id,'jadwal_id'=>$jadwal_id]);
        }
        return $this->render('hasil-kuis',[
            'model' => $model,
            'materi' => $materi,
            'jadwal_id' => $jadwal_id,
        ]);
    }

    function actionSimpanJawaban($soal_id,$jawaban_id=0,$jawaban='')
    {
        $soal = Materi::findOne($soal_id);
        $user = Yii::$app->user->identity;
        $kuis = Kuis::find()->where(['materi_id'=>$soal->parent->id,'mahasiswa_id'=>$user->mahasiswa->id])->one();
        $kuisJawaban = KuisJawaban::find()->where(['kuis_id'=>$kuis->id,'materi_id'=>$soal_id])->one();
        if(empty($kuisJawaban))
            $kuisJawaban = new KuisJawaban();

        $kuisJawaban->kuis_id = $kuis->id;
        $kuisJawaban->materi_id = $soal_id;

        $konten = $jawaban;

        if($jawaban_id > 0)
        {
            $jawab = Materi::findOne($jawaban_id);
            $kuisJawaban->jawaban_id = $jawab->id;
            $konten = $jawab->konten;
            $kuisJawaban->status = $jawab->tipe;
            $kuisJawaban->skor = $jawab->tipe == 'Jawaban Benar' ? 1 : 0;
        }
        $kuisJawaban->jawaban_konten = $konten;
        $kuisJawaban->save(false);

        echo 'success';
        return;

    }

    public function actionSimpanWaktuKuis($id,$awal,$akhir)
    {
        $model = WaktuKuis::find()->where(['kuis_id'=>$id])->one();
        if(empty($model))
            $model = new WaktuKuis;
        $model->waktu_mulai = $awal;
        $model->waktu_selesai = $akhir;
        $model->kuis_id = $id;
        $model->save();
        echo 'success';
        return;
    }

    /**
     * Creates a new Jadwal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Jadwal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
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
