<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Dosen;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\models\PraktekDosen;
use yii\web\NotFoundHttpException;
use common\models\PraktekDosenSearch;

/**
 * PraktekDosenController implements the CRUD actions for PraktekDosen model.
 */
class PraktekDosenController extends Controller
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
     * Lists all PraktekDosen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PraktekDosenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PraktekDosen model.
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
     * Creates a new PraktekDosen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($praktek_id)
    {
        $model = new PraktekDosen();
        $model->praktek_id = $praktek_id;

        $dosen = Dosen::find()->all();
        $dosen = ArrayHelper::map($dosen,'id','nama');

        if ($model->load(Yii::$app->request->post())){
            //  && $model->save()) {
            $post = Yii::$app->request->post();
            foreach($model->dosen_id as $dosen_id)
            {
                $m = new PraktekDosen;
                $m->praktek_id = $praktek_id;
                $m->dosen_id = $dosen_id;
                $m->save();
            }
            return $this->redirect(['index', 'PraktekDosenSearch[praktek_id]' => $praktek_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'dosen' => $dosen,
        ]);
    }

    /**
     * Updates an existing PraktekDosen model.
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
     * Deletes an existing PraktekDosen model.
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
     * Finds the PraktekDosen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PraktekDosen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PraktekDosen::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
