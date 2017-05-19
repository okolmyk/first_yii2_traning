<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


$this->title = 'My Yii Application';

?>
<div class="site-index">

    <div class="jumbotron">
        <h3>Это главная страница сайта</h3>
    </div>

    <div class="body-content">

	<?php
	
	/* echo
	
	 GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
       
       'tableOptions' => [
            'class' => 'table table-striped table-bordered'
        ],

        'columns' => [
        //  ['class' => 'yii\grid\SerialColumn'],

		//	'id',
		//	'name_product',
        //  'product_category',
        //  'sex_category',
        //  'pictures',
            
            [
				//'label' => 'name_product',
				'format' => 'raw',
				'value' => function($data){
					return Html::a($data->name_product, ['/products/productone/', 'id' => $data->id]);
				}
				
			],
            
            'sex_category',
            
            [
				'label' => 'pictures',
				'format' => 'raw',
				'value' => function($data){
					$img = Html::img(Url::toRoute('photo/'.$data->pictures),[
						'alt'=>'картинка',
						'style' => 'width:50px;'
						]);
						
					return Html::a($img, ['/products/productone/', 'id' => $data->id]);
				},
            ],
 
            [
				'label' => 'categoryProducts',
				'format' => 'raw',
				'attribute' => 'product_category',
				'header' => Yii::t('app', 'categoryProducts'),
				'value' => 'categoryProducts.name_category_products',
				
				'value' => function($data){
						return Html::a($data->categoryProducts->name_category_products, Url::toRoute(['category-products/view/', 'id' => $data->categoryProducts->id]));
				},
				
				//'filter' => ArrayHelper::map(app\models\CategoryProducts::find()->all(), 'id', 'name_category_products')	
			],
 
            [
				'label' => 'markets',
				'attribute' => 'marketModel',
				'header' => Yii::t('app', 'Markets'),
				'value' => 'marketModel.name',
				'filter' => ArrayHelper::map(app\models\Markets::find()->all(), 'id', 'name')	
			],

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */
    
      
    echo ListView::widget([
		'dataProvider' => $dataProvider,
		'itemView' => 'list',
	]);
	

    ?>
    

 
 <?php // echo  Html::a($value['name_product'], Url::to(['/products/view/', 'id' => $value['id']]))?>

<?php// foreach($productsIndex as $value): ?>

<p>	
	<!--<div class="my"> -->
				
		<?php // echo  Html::a($value['name_product'], Url::to(['/products/view/', 'id' => $value['id']]))?>
		
		<?php //echo Html::a($value['name_product'], Url::to(['/products/productone/', 'id' => $value['id']]))?>
		
		<?php
			/*
			$catprod = $value->categoryProducts;
			echo $catprod->name_category_products;
			
			echo ' - ';
			
			$markets = $value->marketModel;
			echo $markets->name;
			*/			
		?>
	
	<!--<div class="my_photo">	
		<?php // echo Html::img('photo/'.$value['pictures']);?>
	</div>
	</div>-->
</p>

<?php // endforeach; ?>


<?php //foreach($usersIndex as $value): ?>

<p>	
	<?php  //if(!empty($value['alias'])){ ?>
		
	<?php //echo Html::a($value['name'], Url::to(['/users/view/', 'id' => $value['id']]))?>
	
	<?php //echo Html::a($value['name'], Url::to(['/users/alias/', 'alias' => $value['alias']]))?>		
</p>

<?php //}

//else{
?>

<?php  //echo Html::a($value['name'], Url::to(['/users/view/', 'id' => $value['id']]))?>

<?php  //echo Html::a($value['name'], Url::to(['/users/noalias/', 'id' => $value['id']]))?>

<?php //}

 //endforeach; ?>
      
    </div>
</div>
