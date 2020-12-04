<?php

namespace backend\controllers;

use Yii;
use yii\db\Query;
use yii\web\Controller;
use common\models\Agama;
use common\models\Negara;
use yii\web\UploadedFile;
use common\models\Wilayah;
use common\models\Semester;
use yii\filters\VerbFilter;
use common\models\ListProdi;
use yii\helpers\ArrayHelper;
use common\models\JalurMasuk;
use common\models\Installation;
use common\models\MahasiswaBaru;
use yii\web\NotFoundHttpException;
use common\models\MahasiswaBaruSearch;

/**
 * MahasiswaBaruController implements the CRUD actions for MahasiswaBaru model.
 */
class MahasiswaBaruController extends Controller
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
     * Lists all MahasiswaBaru models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MahasiswaBaruSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MahasiswaBaru model.
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

    public function actionLoadWilayah($q = null, $id = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = new Query;
            $query->select('id_wilayah as id, nama_wilayah')
                ->from('wilayah')
                ->where(['like', 'nama_wilayah', $q]);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => City::find($id)->name];
        }
        return $out;
    }

    /**
     * Creates a new MahasiswaBaru model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $installation = Installation::find()->one();
        $prodi = ListProdi::find()->all();
        $prodi = ArrayHelper::map($prodi,'id_prodi', function($m){
            return $m->nama_jenjang_pendidikan.' - '.$m->nama_program_studi;
        });

        $agama = Agama::find()->all();
        $agama = ArrayHelper::map($agama,'id_agama','nama_agama');

        $semester = Semester::find()->orderby(['id_semester'=>SORT_DESC])->limit(10)->all();
        $semester = ArrayHelper::map($semester,'id_semester','nama_semester');

        $jalur_masuk = JalurMasuk::find()->all();
        $jalur_masuk = ArrayHelper::map($jalur_masuk,'id_jalur_masuk','nama_jalur_masuk');
        
        $negara = Negara::find()->all();
        $negara = ArrayHelper::map($negara,'id_negara','nama_negara');

        $model = new MahasiswaBaru();
        $model->id_perguruan_tinggi = $installation->id_perguruan_tinggi;
        $model->id_jenis_daftar = '1';
        $model->tanggal_daftar = date('Y-m-d');

        if ($model->load(Yii::$app->request->post())) {
            $file_skl = UploadedFile::getInstance($model, 'file_skl');
            $file_skbb = UploadedFile::getInstance($model, 'file_skbb');
            $file_izin_bekerja = UploadedFile::getInstance($model, 'file_izin_bekerja');
            $file_pas_foto = UploadedFile::getInstance($model, 'file_pas_foto');
            $file_ktp = UploadedFile::getInstance($model, 'file_ktp');
            $file_kk = UploadedFile::getInstance($model, 'file_kk');

            // print_r($file_skl);
            // return;
            if($model->validate()){
                if(!empty($file_izin_bekerja))
                {
                    $filename = $model->nik.'-skl.'.$file_skl->extension;
                    $file_skl->saveAs(Yii::getAlias('@backend/web/uploads/') . $filename);
                    $model->file_skl = $filename;
                }

                if(!empty($file_skbb))
                {
                    $filename = $model->nik.'-skkb.'.$file_skbb->extension;
                    $file_skbb->saveAs(Yii::getAlias('@backend/web/uploads/') . $filename);
                    $model->file_skbb = $filename;
                }

                if(!empty($file_izin_bekerja))
                {
                    $filename = $model->nik.'-file_izin_bekerja.'.$file_izin_bekerja->extension;
                    $file_izin_bekerja->saveAs(Yii::getAlias('@backend/web/uploads/') . $filename);
                    $model->file_izin_bekerja = $filename;
                }

                if(!empty($file_pas_foto))
                {
                    $filename = $model->nik.'-pas_foto.'.$file_pas_foto->extension;
                    $file_pas_foto->saveAs(Yii::getAlias('@backend/web/uploads/') . $filename);
                    $model->file_pas_foto = $filename;
                }
                
                if(!empty($file_ktp))
                {
                    $filename = $model->nik.'-ktp.'.$file_ktp->extension;
                    $file_ktp->saveAs(Yii::getAlias('@backend/web/uploads/') . $filename);
                    $model->file_ktp = $filename;
                }
                
                if(!empty($file_kk))
                {
                    $filename = $model->nik.'-kk.'.$file_kk->extension;
                    $file_kk->saveAs(Yii::getAlias('@backend/web/uploads/') . $filename);
                    $model->file_kk = $filename;
                }
                
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            print_r($model->getErrors());
        }

        return $this->render('create', [
            'model' => $model,
            'prodi' => $prodi,
            'agama' => $agama,
            'semester' => $semester,
            'jalur_masuk' => $jalur_masuk,
            'negara' => $negara,
        ]);
    }

    /**
     * Updates an existing MahasiswaBaru model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $prodi = ListProdi::find()->all();
        $prodi = ArrayHelper::map($prodi,'id_prodi', function($m){
            return $m->nama_jenjang_pendidikan.' - '.$m->nama_program_studi;
        });

        $agama = Agama::find()->all();
        $agama = ArrayHelper::map($agama,'id_agama','nama_agama');

        $semester = Semester::find()->orderby(['id_semester'=>SORT_DESC])->limit(10)->all();
        $semester = ArrayHelper::map($semester,'id_semester','nama_semester');

        $jalur_masuk = JalurMasuk::find()->all();
        $jalur_masuk = ArrayHelper::map($jalur_masuk,'id_jalur_masuk','nama_jalur_masuk');
        
        $negara = Negara::find()->all();
        $negara = ArrayHelper::map($negara,'id_negara','nama_negara');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'prodi' => $prodi,
            'agama' => $agama,
            'semester' => $semester,
            'jalur_masuk' => $jalur_masuk,
            'negara' => $negara,
        ]);
    }

    public function actionGenerate()
    {
        $prodi = ListProdi::find()->all();
        $prodi = ArrayHelper::map($prodi,'id_prodi', function($m){
            return $m->nama_jenjang_pendidikan.' - '.$m->nama_program_studi;
        });

        $semester = Semester::find()->orderby(['id_semester'=>SORT_DESC])->limit(10)->all();
        $semester = ArrayHelper::map($semester,'id_semester','nama_semester');
    
        $searchModel = new MahasiswaBaruSearch();
        $queryParams = Yii::$app->request->queryParams;
        $queryParams['sort'] = 'nama_mahasiswa';
        $dataProvider = $searchModel->search($queryParams);

        if(isset($searchModel->id_prodi)){
            $model = MahasiswaBaru::find()->where([
                'id_prodi'=>$searchModel->id_prodi,
                'id_periode_masuk'=>$searchModel->id_periode_masuk,
            ])->orderby(['nama_mahasiswa'=>SORT_ASC])->all();
            foreach($model as $key => $data)
            {
                if(isset($_GET['generate']) && $_GET['generate'] == 'generate' && $data->nim) continue;
                $tahun = date("Y", strtotime($data->tanggal_daftar));
                $tahun = substr($tahun,2,2);
                $_prodi = $data->prodi;
                $lama = $_prodi->nama_jenjang_pendidikan == "D3" ? 3 : 4;
                // $urut = $key < 10 ? '00'.$key : $key >= 10 && $key < 100 ? '0'.$key : $key;
                $urut = $key+1;
                if($urut < 10)
                    $urut = "00".$urut;
                elseif($urut >= 10 && $urut < 100)
                    $urut = "0".$urut;
                $kode = str_replace(" ","",$_prodi->kode_program_studi);
                $data->nim = $tahun.$kode.$lama.$urut;
                $data->save(false);
            }
            $searchModel = new MahasiswaBaruSearch();
            $queryParams = Yii::$app->request->queryParams;
            $queryParams['sort'] = 'nama_mahasiswa';
            $dataProvider = $searchModel->search($queryParams);
        }

        return $this->render('generate', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'prodi' => $prodi,
            'semester' => $semester,
        ]);

    }

    public function actionExport()
    {

        $searchModel = new MahasiswaBaruSearch();
        $queryParams = Yii::$app->request->queryParams;
        $queryParams['sort'] = 'nama_mahasiswa';
        $dataProvider = $searchModel->search($queryParams);

        $data = $dataProvider->query->asArray()->all();
        $file = 'downloads/Export-Mahasiswa-Baru-'.$searchModel->id_prodi.'-'.$searchModel->id_periode_masuk.'.json';
        file_put_contents($file, json_encode($data));

        header("Content-Description: File Transfer"); 
        header("Content-Type: application/octet-stream"); 
        header("Content-Disposition: attachment; filename=\"". basename($file) ."\""); 

        readfile ($file);
        exit();

    }

    /**
     * Deletes an existing MahasiswaBaru model.
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
     * Finds the MahasiswaBaru model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MahasiswaBaru the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MahasiswaBaru::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
