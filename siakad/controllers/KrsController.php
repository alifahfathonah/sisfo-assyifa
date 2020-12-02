<?php

namespace siakad\controllers;

use Yii;
use common\models\MahasiswaKrs;
use common\models\MahasiswaKrsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KrsController implements the CRUD actions for MahasiswaKrs model.
 */
class KrsController extends Controller
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
     * Lists all MahasiswaKrs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $mahasiswa = Yii::$app->user->identity->mahasiswa;
        
        $searchModel = new MahasiswaKrsSearch();
        $searchModel->nim = $mahasiswa->NIM;

        $tahun_akademik = Yii::$app->Ta->get();
        $queryParams = Yii::$app->request->queryParams;
        if(!isset($queryParams['MahasiswaKrsSearch']['id_periode']))
            $queryParams['MahasiswaKrsSearch']['id_periode'] = $tahun_akademik?$tahun_akademik->tahun.$tahun_akademik->periode:0;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPrint()
    {
        $mahasiswa = Yii::$app->user->identity->mahasiswa;
        
        $searchModel = new MahasiswaKrsSearch();
        $searchModel->nim = $mahasiswa->NIM;

        $tahun_akademik = Yii::$app->Ta->get();
        $queryParams = Yii::$app->request->queryParams;
        if(!isset($queryParams['MahasiswaKrsSearch']['id_periode']))
            $queryParams['MahasiswaKrsSearch']['id_periode'] = $tahun_akademik?$tahun_akademik->tahun.$tahun_akademik->periode:0;
        $dataProvider = $searchModel->search($queryParams);

        return $this->renderPartial('cetak', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MahasiswaKrs model.
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
     * Creates a new MahasiswaKrs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MahasiswaKrs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MahasiswaKrs model.
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
     * Deletes an existing MahasiswaKrs model.
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
     * Finds the MahasiswaKrs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MahasiswaKrs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MahasiswaKrs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
