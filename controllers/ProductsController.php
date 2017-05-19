<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use app\models\Markets;
use app\models\CategoryProducts;
use app\models\UploadForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;



use app\components\MyControllerBehaviors;



/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
	
    public $layout = 'bazoviy';
    
	public function behaviors()
    {
        return [
            
             'MyBehaviors' => [
                'class' => MyControllerBehaviors::className(),
               // 'pro' => '',
               //'attribute' => 'name_product',
               
                
            ]         
        ];
    }
   
   
   
   /* public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }*/

	
    
    public function actionIndex()
    {  
		//var_dump($this->myFun());
      
       /* $dataProvider = new ActiveDataProvider([
            'query' => Products::find(),
        ]);*/
        
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find()->with(['categoryProducts', 'marketModel']), 
        ]);
          
        return $this->render('index', [
            'dataProvider' => $dataProvider, 
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        if (!Yii::$app->user->can('createProduct')) {
			throw new ForbiddenHttpException('Access denied');
			
		}
        
        $model = new Products();
        
	//	var_dump(Yii::$app->request->post());
	
       if ($model->load(Yii::$app->request->post())) { 
		   $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
		   if ($model->save()) {
				$img = $model->id . '.' . $model->imageFile->extension;
				$model->imageFile->saveAs('./photo/' . $img);
				$model->pictures = $img;
			//	$model->imageFile = $img;
				$model->save(false, ['pictures']); // простой запрос записывающий поле pictures уже после записи основного массива данных 
				return $this->redirect(['view', 'id' => $model->id]);
		   }
        } 
        
            return $this->render('create', [
                'model' => $model,
            ]);       
    }
      
    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
		   $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
		   if ($model->save()) {
				$img = $model->id . '.' . $model->imageFile->extension;
				$model->imageFile->saveAs('./photo/' . $img);
				$model->pictures = $img;
				$model->save(false, ['pictures']);
				return $this->redirect(['view', 'id' => $model->id]);
		   }
        }  
            
            return $this->render('update', [
                'model' => $model,
            ]);
        
        
        /*$model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            return $this->redirect(['view', 'id' => $model->id]);
        
        } else {
            
            return $this->render('update', [
                'model' => $model,
            ]);
        }*/
        
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    
    public function actionProductone(){
		
		$product = Products::find()->all();
		
		return $this->render('productone', ['product' => $product]);
		
	}
	


	

}
