<?php
namespace pmb\controllers;

use Yii;
use yii\db\Query;
use common\models\User;
use yii\web\Controller;
use common\models\Agama;
use common\models\Negara;
use yii\web\UploadedFile;
use pmb\models\SignupForm;
use common\models\Semester;
use pmb\models\ContactForm;
use yii\filters\VerbFilter;
use common\models\ListProdi;
use common\models\LoginForm;
use yii\helpers\ArrayHelper;
use common\models\ImportFile;
use common\models\JalurMasuk;
use common\models\Application;
use common\models\Penyimpanan;
use yii\filters\AccessControl;
use common\models\Installation;
use pmb\models\VerifyEmailForm;
use common\models\MahasiswaBaru;
use pmb\models\ResetPasswordForm;
use common\models\PenyimpananSearch;
use yii\web\BadRequestHttpException;
use yii\base\InvalidArgumentException;
use pmb\models\PasswordResetRequestForm;
use pmb\models\ResendVerificationEmailForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'hapus-penyimpanan' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
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
        $model->id_jalur_daftar = '6';
        $model->id_periode_masuk = '20211';
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
                return $this->redirect(['thank-you', 'id' => $model->id]);
            }
            print_r($model->getErrors());
        }

        return $this->render('index', [
            'model' => $model,
            'prodi' => $prodi,
            'agama' => $agama,
            'semester' => $semester,
            'jalur_masuk' => $jalur_masuk,
            'negara' => $negara,
        ]);
    }

    function actionThankYou()
    {
        return $this->render('thank-you');
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
}
