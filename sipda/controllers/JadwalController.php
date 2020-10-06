<?php

namespace sipda\controllers;

use Yii;
use common\models\Jadwal;
use common\models\JadwalSearch;
use common\models\Kuis;
use common\models\KuisJawaban;
use common\models\Materi;
use common\models\VwJadwalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

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
        $searchModel = new VwJadwalSearch();
        $queryParams = Yii::$app->request->queryParams;
        $queryParams['VwJadwalSearch']['tahun_akademik_id'] = !empty(Yii::$app->Ta->get()) ? Yii::$app->Ta->get()->id : 0;
        if(Yii::$app->user->can('Dosen'))
        {
            $queryParams['VwJadwalSearch']['dosen_id'] = Yii::$app->user->identity->dosen->id;
        }

        if(Yii::$app->user->can('Mahasiswa'))
        {
            $mahasiswa = Yii::$app->user->identity->mahasiswa;
            $dosen_pengampuh = ArrayHelper::map($mahasiswa->kelas->jadwals,function($model){
                return $model->dosenPengampuh->dosen_id;
            },function($model){
                return $model->dosenPengampuh->dosen_id;
            });
            $dosen_pengampuh = array_keys($dosen_pengampuh);
            $queryParams['VwJadwalSearch']['dosen_id'] = $dosen_pengampuh;
        }
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
        return $this->redirect(['materi','id'=>$jadwal_id,'index'=>$materi->no_urut-1]);
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
        $kuisJawaban->save();

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
