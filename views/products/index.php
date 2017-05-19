<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

use app\components\MyBehaviors;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
        
    <?php // var_dump($test); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name_product',
        //  'product_category',
            'sex_category',
        //  'pictures',
        
			[
				'label' => 'pictures',
				'format' => 'raw',
				'value' => function($data){
					return Html::img(Url::toRoute('photo/'.$data->pictures),[
						'alt'=>'картинка',
						'style' => 'width:50px;'
						]);
					},
            ],
            
            [
				'label' => 'markets',
				'attribute' => 'marketModel',
				'header' => Yii::t('app', 'Markets'),
				'value' => 'marketModel.name',
				'filter' => ArrayHelper::map(app\models\Markets::find()->all(), 'id', 'name')	
			],

            [
				'label' => 'categoryProducts',
				'attribute' => 'product_category',
				'header' => Yii::t('app', 'categoryProducts'),
				'value' => 'categoryProducts.name_category_products',
				'filter' => ArrayHelper::map(app\models\CategoryProducts::find()->all(), 'id', 'name_category_products')	
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    
</div>
