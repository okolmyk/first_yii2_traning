<?php
namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\CategoryProducts;
use app\models\Products;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use app\models\Users;
use app\models\UsersSearch;
use yii\web\NotFoundHttpException;


class ManController extends Controller
{

	public $layout = 'bazoviy';
	 
	 
	public function actionIndex()
	{
 
         $dataProvider = new ActiveDataProvider([
            'query' => Products::find()->where(['sex_category' => 'Мужской'])->with(['categoryProducts', 'marketModel']),
        ]);
	
        return $this->render('index', ['dataProvider' => $dataProvider]);

    }




}


?>
