<?php

namespace sipda\controllers;
use Yii;
use common\models\Penyimpanan;
use common\models\Skripsi;
use common\models\Seminar;
use common\models\PengajuanSkripsi;

class ESkripsiController extends \yii\web\Controller
{
    public $layout = 'main-materi';

    public function actionIndex()
    {
        //  for mahasiswa
        if(Yii::$app->user->can('Mahasiswa'))
        {
            $mahasiswa = Yii::$app->user->identity->mahasiswa;
            if(!$mahasiswa->skripsi)
                return $this->render('restricted');

            return $this->render('index',[
                'mahasiswa' => $mahasiswa,
            ]);
        }
        
        if(Yii::$app->user->can('Dosen'))
        {
            $dosen = Yii::$app->user->identity->dosen;
            if(!$dosen->pembimbings)
                return $this->render('restricted');

            return $this->render('dosen',[
                'dosen' => $dosen,
            ]);
        }
        
        
    }

    public function actionDosenPembimbing()
    {
        $mahasiswa = Yii::$app->user->identity->mahasiswa;
        return $this->render('dosen-pembimbing',[
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function actionSeminar()
    {
        $mahasiswa = Yii::$app->user->identity->mahasiswa;
        return $this->render('seminar',[
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function actionPengajuan()
    {
        $mahasiswa = Yii::$app->user->identity->mahasiswa;
        $model = new PengajuanSkripsi;
        $model->mahasiswa_id = $mahasiswa->id;

        if ($model->load(Yii::$app->request->post())) {
            $file = \yii\web\UploadedFile::getInstance($model,'file_url');
            $filename = strtotime(date('Y-m-d H:i:s')).'.'. $file->extension;
            $file->saveAs(\Yii::getAlias("@frontend/web/uploads/{$filename}")); //'uploads/' . $filename);
            $penyimpanan = new Penyimpanan;
            $penyimpanan->user_id = Yii::$app->user->identity->id;
            $penyimpanan->nama = $file->baseName;
            $penyimpanan->berkas = $filename;
            $penyimpanan->save();
            $model->file_url = $filename;
            $model->status = "SEDANG DI PROSES";
            $model->save();
            Yii::$app->session->setFlash('success', "Judul Skripsi berhasil di ajukan!");
            return $this->redirect(['index']);
        }

        return $this->render('pengajuan', [
            'model' => $model,
            'mahasiswa' => $mahasiswa,
        ]);
    }

    public function actionPengajuanSeminar()
    {
        $mahasiswa = Yii::$app->user->identity->mahasiswa;
        $model = new Seminar;
        $model->mahasiswa_id = $mahasiswa->id;
        $model->judul = $mahasiswa->accPengajuan->judul;

        if ($model->load(Yii::$app->request->post())) {
            $file = \yii\web\UploadedFile::getInstance($model,'file_url');
            $filename = strtotime(date('Y-m-d H:i:s')).'.'. $file->extension;
            $file->saveAs(\Yii::getAlias("@frontend/web/uploads/{$filename}")); //'uploads/' . $filename);
            $penyimpanan = new Penyimpanan;
            $penyimpanan->user_id = Yii::$app->user->identity->id;
            $penyimpanan->nama = $file->baseName;
            $penyimpanan->berkas = $filename;
            $penyimpanan->save();
            $model->file_url = $filename;
            $model->save();
            Yii::$app->session->setFlash('success', "Seminar berhasil di ajukan!");
            return $this->redirect(['seminar']);
        }

        return $this->render('pengajuan-seminar', [
            'model' => $model,
            'mahasiswa' => $mahasiswa,
        ]);
    }

}
