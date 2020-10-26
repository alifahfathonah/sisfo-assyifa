<?php

namespace sipda\controllers;

use Yii;
use common\models\DosenPengampuh;
use common\models\ImportFile;
use common\models\Materi;
use common\models\MateriItem;
use common\models\MateriSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * MateriController implements the CRUD actions for Materi model.
 */
class MateriController extends Controller
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
     * Lists all Materi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MateriSearch();
        $queryParams = Yii::$app->request->queryParams;
        if(Yii::$app->user->can('Dosen'))
        {
            $queryParams['MateriSearch']['dosen_id'] = Yii::$app->user->identity->dosen->id;
            $queryParams['MateriSearch']['tipe'] = 'Materi';
        }

        if(Yii::$app->user->can('Mahasiswa'))
        {
            $mahasiswa = Yii::$app->user->identity->mahasiswa;
            $dosen_pengampuh = ArrayHelper::map($mahasiswa->kelas->jadwals,'dosen_pengampuh_id','dosen_pengampuh_id');
            $dosen_pengampuh = array_keys($dosen_pengampuh);
            $queryParams['MateriSearch']['dosen_pengampuh_id'] = $dosen_pengampuh;
        }
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Materi model.
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

    public function actionLihatSoal($jadwal_id, $id)
    {
        return $this->render('lihat_soal', [
            'model' => $this->findModel($id),
            'jadwal_id'=>$jadwal_id
        ]);
    }

    /**
     * Creates a new Materi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($dosen_pengampuh_id, $jadwal_id)
    {
        $model = new Materi();
        $model->dosen_pengampuh_id = $dosen_pengampuh_id;
        // $dosen = Yii::$app->user->identity->dosen;
        // $dosen_mata_kuliah = ArrayHelper::map($dosen->dosenPengampuhs,'id',function($model){
        //     return $model->mataKuliah->nama.' - '.$model->kelas->nama;
        // });
        $model->tipe_konten = "Text";

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // if($model->tipe_konten == 'PDF')
            // {
            //     $model->konten = strip_tags($model->konten);
            //     $model->save();
            // }
            Yii::$app->session->setFlash('success', "Materi Berhasil di Simpan!");
            return $this->redirect(['jadwal/materi','id'=>$jadwal_id,'index'=>$model->no_urut-1]);
        }

        $model->tipe = 'Materi';
        $model->status = 'Publish';

        return $this->render('create', [
            'model' => $model,
            'jadwal_id' => $jadwal_id,
            // 'dosen_mata_kuliah' => $dosen_mata_kuliah,
        ]);
    }

    public function actionImports($dosen_pengampuh_id,$jadwal_id,$parent_id)
    {
        $model = new ImportFile;
        if ($model->load(Yii::$app->request->post())){
            $uploadedFile = \yii\web\UploadedFile::getInstance($model,'file');
            $extension    = $uploadedFile->extension;
            if($extension=='xlsx'){
                $inputFileType = 'Xlsx';
            }else{
                $inputFileType = 'Xls';
            }
            $reader     = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                
            $spreadsheet = $reader->load($uploadedFile->tempName);
            $worksheet   = $spreadsheet->getActiveSheet();
            $highestRow  = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
                
            //inilah looping untuk membaca cell dalam file excel,perkolom
                
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                for ($row = 2; $row <= $highestRow; $row++) { //$row = 2 artinya baris kedua yang dibaca dulu(header kolom diskip disesuaikan saja)
                    $no = $row-1;
                    // buat soal
                    $materi = new Materi();
                    $materi->dosen_pengampuh_id = $dosen_pengampuh_id;
                    $materi->status = "Publish";
                    $materi->no_urut = $no;
                    $materi->tipe = "Soal";
                    $materi->tipe_konten = "Text";
                    $materi->judul = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $materi->konten = "<p>".$worksheet->getCellByColumnAndRow(2, $row)->getValue()."</p>";
                    $materi->save();

                    // set parent 
                    $materiItem = new MateriItem;
                    $materiItem->parent_id = $parent_id;
                    $materiItem->child_id = $materi->id;
                    $materiItem->save();

                    // buat jawaban
                    $jumlah_jawaban = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $jawaban_benar = $worksheet->getCellByColumnAndRow(4, $row)->getValue()-1;
                    $start_index = 5;
                    for($i=$start_index;$i<$start_index+$jumlah_jawaban;$i++)
                    {
                        // jawaban
                        $jawaban = new Materi();
                        $jawaban->status = "Publish";
                        $jawaban->tipe = $i == $start_index+$jawaban_benar ? "Jawaban Benar" : "Jawaban Salah";
                        $jawaban->tipe_konten = "Text";
                        $jawaban->judul = "Jawaban";
                        $jawaban->konten = "<p>".$worksheet->getCellByColumnAndRow($i, $row)->getValue()."</p>";
                        $jawaban->save();

                        // save jawaban to post
                        $soaltem = new MateriItem;
                        $soaltem->parent_id = $materi->id;
                        $soaltem->child_id = $jawaban->id;
                        $soaltem->save();
                    }
                    //for ($col = 1; $col <= $highestColumnIndex; ++$col) {
                    // echo $worksheet->getCellByColumnAndRow(1, $row)->getValue(); //3 artinya kolom ke3
                    // $kolom10 = $worksheet->getCellByColumnAndRow(10, $row)->getValue(); // 10 artinya kolom 10
                }
                $transaction->commit();
                Yii::$app->session->addFlash("success", "Import Soal Berhasil");
            } catch (\Throwable $th) {
                throw $th;
                $transaction->rollback();
            }
            return $this->redirect(['jadwal/materi','id'=>$jadwal_id]);
        }
    }

    public function actionBuatSoal($dosen_pengampuh_id, $jadwal_id, $parent_id)
    {
        $model = new Materi();
        $parent = Materi::findOne($parent_id);
        $model->dosen_pengampuh_id = $dosen_pengampuh_id;
        $model->tipe = 'Soal';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $materiItem = new MateriItem;
            $materiItem->parent_id = $parent_id;
            $materiItem->child_id = $model->id;
            $materiItem->save();
            Yii::$app->session->setFlash('success', "Materi Berhasil di Simpan!");
            return $this->redirect(['jadwal/materi','id'=>$jadwal_id,'index'=>$parent->no_urut-1]);
        }

        $model->status = 'Publish';

        return $this->render('buat_soal', [
            'model' => $model,
            'parent' => $parent,
            'jadwal_id' => $jadwal_id,
            // 'dosen_mata_kuliah' => $dosen_mata_kuliah,
        ]);
    }

    public function actionBuatJawaban($jadwal_id, $parent_id)
    {
        $parent = Materi::findOne($parent_id);

        $model = new Materi();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $materiItem = new MateriItem;
            $materiItem->parent_id = $parent_id;
            $materiItem->child_id = $model->id;
            $materiItem->save();
            Yii::$app->session->setFlash('success', "Materi Berhasil di Simpan!");
            return $this->redirect(['materi/lihat-soal','jadwal_id'=>$jadwal_id,'id'=>$parent_id]);
        }
        
        $model->status = 'Publish';
        $model->tipe = 'Jawaban Salah';

        return $this->render('buat_jawaban', [
            'model' => $model,
            'parent' => $parent,
            'jadwal_id' => $jadwal_id,
            // 'dosen_mata_kuliah' => $dosen_mata_kuliah,
        ]);
    }

    public function actionEditSoal($dosen_pengampuh_id, $jadwal_id, $parent_id, $id)
    {
        $model = $this->findModel($id);
        $parent = Materi::findOne($parent_id);
        $model->dosen_pengampuh_id = $dosen_pengampuh_id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Materi Berhasil di Simpan!");
            return $this->redirect(['jadwal/materi','id'=>$jadwal_id,'index'=>$parent->no_urut-1]);
        }

        return $this->render('buat_soal', [
            'model' => $model,
            'parent' => $parent,
            'jadwal_id' => $jadwal_id,
            // 'dosen_mata_kuliah' => $dosen_mata_kuliah,
        ]);
    }

    public function actionEditJawaban($jadwal_id, $parent_id, $id)
    {
        $model = $this->findModel($id);
        $parent = Materi::findOne($parent_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Materi Berhasil di Simpan!");
            return $this->redirect(['materi/lihat-soal','jadwal_id'=>$jadwal_id,'id'=>$parent->id]);
        }

        return $this->render('buat_jawaban', [
            'model' => $model,
            'parent' => $parent,
            'jadwal_id' => $jadwal_id,
            // 'dosen_mata_kuliah' => $dosen_mata_kuliah,
        ]);
    }

    /**
     * Updates an existing Materi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $jadwal_id)
    {
        $model = $this->findModel($id);
        $model->tipe_konten = "Text";
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // if($model->tipe_konten == 'PDF')
            // {
            //     $model->konten = strip_tags($model->konten);
            //     $model->save();
            // }
            Yii::$app->session->setFlash('success', "Materi Berhasil di Update!");
            return $this->redirect(['jadwal/materi','id'=>$jadwal_id,'index'=>$model->no_urut-1]);
        }

        return $this->render('update', [
            'model' => $model,
            'jadwal_id'=>$jadwal_id
        ]);
    }

    /**
     * Deletes an existing Materi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $jadwal_id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['jadwal/materi','id'=>$jadwal_id]);
    }

    public function actionHapusSoal($id, $jadwal_id, $parent_id)
    {
        $this->findModel($id)->delete();
        $parent = $this->findModel($parent_id);
        Yii::$app->session->setFlash('success', "Soal Berhasil di Hapus!");
        return $this->redirect(['jadwal/materi','id'=>$jadwal_id,'index'=>$parent->no_urut-1]);
    }

    public function actionHapusJawaban($id, $jadwal_id, $parent_id)
    {
        $this->findModel($id)->delete();
        $parent = $this->findModel($parent_id);
        Yii::$app->session->setFlash('success', "Jawaban Berhasil di Hapus!");
        return $this->redirect(['materi/lihat-soal','jadwal_id'=>$jadwal_id,'id'=>$parent->id]);
    }

    /**
     * Finds the Materi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Materi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Materi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
