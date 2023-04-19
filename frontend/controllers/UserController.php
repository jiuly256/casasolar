<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use common\models\LogCorreo;
use common\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use frontend\models\CorreoMasivoForm;

ini_set('error_reporting', E_ALL & ~E_DEPRECATED);


/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        // return [
        //     'verbs' => [
        //         'class' => VerbFilter::className(),
        //         'actions' => [
        //             'delete' => ['POST'],
        //         ],
        //     ],
        // ];

        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update','delete','index','view','send'],
                'rules' => [
                    // permitido para usuarios autenticados
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // todo lo demás se deniega por defecto
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new User();
        $model->scenario = 'createUsuario';

        if ($model->load(Yii::$app->request->post()) ) {

            $model->status=10;
           
            
            $model->setPassword(Yii::$app->request->post()['User']['password']);
            $model->generateAuthKey();
            $model->generateEmailVerificationToken();
            if ($model->save()){

            try {
               
                if ($model->tipo==1){
                    $tipo='Administrador';
                }  else if ($model->tipo==2){
                    $tipo='Empresa';
                }
                else {
                    $tipo='Solicitante';
                    $programa=\common\models\Programa::findOne($model->id_programa);
                    $etapa=\common\models\Etapa::find("select min(id) from etapa where id_programa=$programa->id")->one();
        
                    $useretapa = new \common\models\UserEtapa();
                    $useretapa->id_user = $model->id;
                    $useretapa->status = 1;
                    $useretapa->id_etapa = $etapa->id;
                    $useretapa->observaciones = "FELICIDADES! Se ha inscrito en nuestro programa $programa->descripcion";
                    $useretapa->fecha_creacion = date('Y-m-d');
                    $useretapa->save();
                    if (!$useretapa->save()){
                        echo "<pre>"; print_r($useretapa->getErrors()); exit;
                    }
                }
                
                $fecha=time();
                    Yii::$app->db->createCommand("insert into auth_assignment values ('$tipo','$model->id',$fecha);")
                    ->execute();



                
            
                

                return $this->redirect('index');
                  
                } catch (Exeption $e) {
                }
                
            }
           
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionSend(){

        $model = new CorreoMasivoForm();

        $users=User::findAll(['status'=>10]);
        $correos=array();

        foreach ($users as $user){
            // echo $user->email; exit;

            $model->sendEmail($user->email);

            array_push($correos,$user->email);
           

        }


        $log=new LogCorreo();
        date_default_timezone_set("Europe/Madrid");
        $log->created_date = time();
        $log->correos = json_encode($correos);
        $log->mensaje = "el PickUp se encuentra disponible";
        $log->save();

            \Yii::$app->getSession()->setFlash('success', "El correo electrónico ha sido enviado con exito.");
            return $this->redirect('/log-correo/index');
        // } else {
        //     Yii::$app->session->setFlash('error','Lo sentimos, no podemos enviar correo ahora.');
        // }

      
      
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // $model->scenario = 'updateUsuario';

            if ($model->load(Yii::$app->request->post()) ) {

                if ($model->save()){
                    
                return $this->redirect(['index']);
                }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionPassword($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'createPassword';

        if ($id<>Yii::$app->user->id){
            if (!Yii::$app->user->can('Administrador')){
                return $this->goBack();

            }
        }
        

        if ($model->load(Yii::$app->request->post()) ) {

            $model->password_hash= Yii::$app->getSecurity()->generatePasswordHash(Yii::$app->request->post()['User']['password']);
            $model->auth_key = Yii::$app->security->generateRandomString();
           
                if ($model->save()){
                    
                    return $this->redirect(['index']);
                }
        }

        return $this->render('password', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $user=User::find()->where(['id'=>$id])->one();
        $user->status=0;
        $user->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
