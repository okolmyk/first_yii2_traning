<?php

namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\MyForm;
use app\models\Coment;
use app\models\Products;
use app\models\Markets;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;

use app\models\Users;
use app\models\UsersSearch;
use yii\web\NotFoundHttpException;

use app\components\MyBehaviors;

class SiteController extends Controller
{
	
	public $layout = 'bazoviy';
    /**
     * @inheritdoc
     */
   
   
  /* public function behaviors()
    {
        return [
            
             'MyBehaviors' => [
                'class' => MyBehaviors::className(),
               // 'pro' => '',
               //'attribute' => 'name_product',
               
                
            ]         
        ];
    }*/
   
   /* public function behaviors()
    {
        return [
        
            'access' => [                           
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }*/
    
 /*   public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
    }*/

    /**
     * @inheritdoc
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
     * @return string
     */
    public function actionIndex()
    {	           
       // $productsIndex = Products::find()->with(['categoryProducts'])->all(); // это массив моделей - нужно попробовать сделать ActiveQuery и запихнуть его в виджет во вьюхе, для этого нужно убрать all() из запроса именно all() или one()  изменяют ActiveQuery на массив моделей
       
		$dataProvider = new ActiveDataProvider([
            'query' => Products::find()->with(['categoryProducts', 'marketModel']),
        ]);
		
        return $this->render('index', ['dataProvider' => $dataProvider, /*'test' => $this->myFun2($productsIndex)*/]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {		
        return $this->render('about');
    }
	
	public function actionHello($mesage = 'hello world')
	{
		return $this->render('hello', ['mesage' => $mesage]);
	}
	
	
	public function actionForm()
	{
		$form = new MyForm();	
		
		if($form->load(Yii::$app->request->post()) && $form->validate()) {
			
			$name = Html::encode($form->name);
			$email = Html::encode($form->email);
			
			$form->file = UploadedFile::getInstance($form, 'file');
			
			$form->file->saveAs('photo/'.$form->file->baseName.".".$form->file->extension);
		}
		
		else{
			
			$name = '';
			$email = '';
			
		}
		
		return $this->render('form', ['form' => $form, 'name' => $name, 'email' => $email]);
		
		
		
	}
	
	
	public function actionComent()
	{
		
		$coment = Coment::find();
		
		$pagination = new Pagination(['defaultPageSize' => 2, 'totalCount' => $coment->count()]);
		
		$coment = $coment->offset($pagination->offset)->limit($pagination->limit)->all();
		
		$cookies = Yii::$app->request->cookies;
		
		
		
		return $this->render('coment', [
			
							  'coment' => $coment, 
							  'pagination' => $pagination, 
							  'name' => Yii::$app->session->get('name'),
							//  'name' => $cookies->getValue('name')
			
		]);
		
	}
	
	public function actionUser(){
		
		$name = Yii::$app->request->get("name");
		
		$session = Yii::$app->session;
		
		$session->set('name', $name);
		
		/*$cookies = Yii::$app->response->cookies;
		
		$cookies->add(new \yii\web\Cookie([
			
			'name' => 'name',
			'value' => $name
		]));*/
				
		return $this->render('user', ['name' => $name]);
				
	}
	
}	
	
	
	
	

