<?php

namespace sipda\controllers;

use common\models\DosenPengampuh;
use Yii;
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
