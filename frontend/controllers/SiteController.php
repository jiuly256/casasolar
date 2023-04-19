<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\helpers\Url;


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
   
    public function actionUpload()
    {
        // $this->layout='dashboard';
        return $this->render('upload');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout='blank';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        $this->layout='blank';
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail($model->email)) {
                Yii::$app->session->setFlash('success', Yii::t('app','Thank you for contacting us. We will respond to you as soon as possible.'));
            } else {
                Yii::$app->session->setFlash('error', Yii::t('app','There was an error sending your message.'));
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $this->layout='blank';
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            $user=\common\models\User::findBySql("select * from user where username='$model->username'")->one();

            $assig = new \common\models\AuthAssignment();
            $assig->item_name = 'Solicitante';
            $assig->user_id = "$user->id";
            $assig->created_at = time();
            $assig->save();
            if (!$assig->save()){
                echo "<pre>"; print_r($assig->getErrors()); exit;
            }
           
            $programa=\common\models\Programa::findOne($model->id_programa);
            $etapa=\common\models\Etapa::find("select min(id) from etapa where id_programa=$programa->id")->one();

            $useretapa = new \common\models\UserEtapa();
            $useretapa->id_user = $user->id;
            $useretapa->status = 1;
            $useretapa->id_etapa = $etapa->id;
            $useretapa->observaciones = "FELICIDADES! Se ha inscrito en nuestro programa $programa->descripcion";
            $useretapa->fecha_creacion = date('Y-m-d');
            $useretapa->save();
            if (!$useretapa->save()){
                echo "<pre>"; print_r($useretapa->getErrors()); exit;
            }


            Yii::$app->session->setFlash('success', Yii::t('app','Gracias por registrarse. Ya puede iniciar sesión'));
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $this->layout='blank';
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', Yii::t('app','Check your email and follow the instructions.'));

                return $this->redirect(['/site/login']);
            } else {
                Yii::$app->session->setFlash('error', Yii::t('app','We are sorry, we can not reset the password for the email address you provided.'));
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        $this->layout='blank';
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', Yii::t('app','New password saved.'));

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        $this->layout='blank';
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', Yii::t('app','Your email has been confirmed!'));
                return $this->redirect(['/site/login']);
                
            }
        }

        Yii::$app->session->setFlash('error', Yii::t('app','Sorry, We are unable to verify your account with the provided token.'));
        return $this->redirect(['/site/login']);
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $this->layout='blank';
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', Yii::t('app','Check your email and follow the instructions.'));
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', Yii::t('app','Sorry, we are unable to verify the email for the email address provided.'));
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }


    public function actionLanguage($urlRelative,$language)
	{
		    Yii::$app->language = $language;
			$languageCookie = new \yii\web\Cookie([
				'name' => 'language',
				'value' => $language,
				'expire' => time() + 60 * 60 * 24 * 30, // 30 days
			]);
            \Yii::$app->response->cookies->add($languageCookie);
            return $this->redirect(Url::toRoute($urlRelative));
	}
}
