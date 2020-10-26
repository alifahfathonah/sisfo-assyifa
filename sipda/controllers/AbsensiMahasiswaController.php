<?php

namespace sipda\controllers;

use Yii;
use common\models\Absensi;
use common\models\VwJadwal;
use common\models\AbsensiMahasiswa;
use common\models\AbsensiMahasiswaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * AbsensiMahasiswaController implements the CRUD actions for AbsensiMahasiswa model.
 */
class AbsensiMahasiswaController extends Controller
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
     * Lists all AbsensiMahasiswa models.
     * @return mixed
     */
    public function actionIndex($absensi_id)
    {
        $model = Absensi::findOne($absensi_id);
        $mahasiswa = $model->jadwal->dosenPengampuh->kelas->mahasiswas;

        $absensi = $model->absensiMahasiswas ? ArrayHelper::map($model->absensiMahasiswas,'mahasiswa_id','status') : [];

        return $this->render('index', [
            'model' => $model,
            'mahasiswa' => $mahasiswa,
            'absensi' => $absensi,
        ]);
    }

    public function actionCetak($absensi_id)
    {
        $model = Absensi::findOne($absensi_id);
        
        return $this->renderPartial('cetak', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single AbsensiMahasiswa model.
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
     * Creates a new AbsensiMahasiswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($absensi_id)
    {
        $absensi = Absensi::findOne($absensi_id);
        $jadwal = VwJadwal::find()
                    ->where([
                        'dosen_id'=>Yii::$app->user->identity->dosen->id,
                        'tahun_akademik_id'=>!empty(Yii::$app->Ta->get()) ? Yii::$app->Ta->get()->id : 0
                    ])
                    ->all();

        $jadwal = ArrayHelper::map($jadwal,'jadwal_id','jadwal_id');
        if(!in_array($absensi->jadwal_id,$jadwal))
        {
            Yii::$app->session->setFlash('error', "Absensi tidak bisa di update!");
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }

        $request = Yii::$app->request;
        foreach($request->post('status') as $key => $value)
        {
            $model = AbsensiMahasiswa::find()->where(['absensi_id'=>$absensi_id,'mahasiswa_id'=>$key])->one();
            if(empty($model))
                $model = new AbsensiMahasiswa;
            $model->absensi_id = $absensi_id;
            $model->mahasiswa_id = $key;
            $model->status = $value;
            $model->save();
        }
        
        Yii::$app->session->setFlash('success', "Absensi Berhasil di Simpan!");
        return $this->redirect(['index','absensi_id'=>$absensi_id]);
    }

    /**
     * Updates an existing AbsensiMahasiswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $mahasiswa = $model->absensi->jadwal->dosenPengampuh->kelas->mahasiswas;
        $mahasiswa = ArrayHelper::map($mahasiswa,'id','nama');


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Absensi Berhasil di Update!");
            return $this->redirect(['index','AbsensiMahasiswaSearch[absensi_id]'=>$model->absensi_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'mahasiswa' => $mahasiswa,
        ]);
    }

    /**
     * Deletes an existing AbsensiMahasiswa model.
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
     * Finds the AbsensiMahasiswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AbsensiMahasiswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AbsensiMahasiswa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
