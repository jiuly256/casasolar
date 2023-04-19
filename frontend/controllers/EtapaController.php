<?php

namespace frontend\controllers;

use Yii;
use common\models\Etapa;
use common\models\search\EtapaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EtapaController implements the CRUD actions for Etapa model.
 */
class EtapaController extends Controller
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
     * Lists all Etapa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EtapaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Etapa model.
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
     * Creates a new Etapa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Etapa();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->fecha_inicio= ((Yii::$app->request->post()['Etapa']['fecha_inicio'])=='')?'':date('Y-m-d',strtotime(Yii::$app->request->post()['Etapa']['fecha_inicio']));
            $model->fecha_vencimiento= ((Yii::$app->request->post()['Etapa']['fecha_vencimiento'])=='')?'':date('Y-m-d',strtotime(Yii::$app->request->post()['Etapa']['fecha_vencimiento']));

            if ($model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
            }
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Etapa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {

            $model->fecha_inicio= ((Yii::$app->request->post()['Etapa']['fecha_inicio'])=='')?'':date('Y-m-d',strtotime(Yii::$app->request->post()['Etapa']['fecha_inicio']));
            $model->fecha_vencimiento= ((Yii::$app->request->post()['Etapa']['fecha_vencimiento'])=='')?'':date('Y-m-d',strtotime(Yii::$app->request->post()['Etapa']['fecha_vencimiento']));

            if ($model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
            }
        }


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Etapa model.
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
     * Finds the Etapa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Etapa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Etapa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
