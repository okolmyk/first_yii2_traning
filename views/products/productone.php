<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php foreach($product as $value): ?>

	<?php if($value->id == $_GET['id']) {?>

<p>	
	<?= Html::a($value->id,  Url::to(['/products/view/', 'id' => $value->id]))?>
	<p></p>
	<?= Html::a($value->name_product,  Url::to(['/products/view/', 'id' => $value->id]))?>
	<p></p>
	
	<?php
		
			$catprod = app\models\CategoryProducts::find('name_category_products')->where(['id' => $value->product_category])->all();
			
			foreach($catprod as $val){
				echo $val->name_category_products;
			}
			
			echo ' - ';
			
			$markets = app\models\Markets::find('name')->where(['id' => $value->markets])->all();
			
			foreach($markets as $val2){				
				echo Html::a($val2->name,  Url::to(['/markets/view/', 'id' => $val2->id]));
			}
				
		?>
	
</p>
	
	<?php } ?>

	<?php endforeach; ?>

    
    
</div>
