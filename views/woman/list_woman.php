<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
?>
 
<div class="product-item">
       
    <h2><?= Html::a($model->name_product, Url::to(['/products/productone/', 'id' => $model->id])) ?></h2>   
      
    <?= Html::a($model->categoryProducts->name_category_products, Url::toRoute(['category-products/view/', 'id' => $model->categoryProducts->id])) ?> </br>   
    
    <?= Html::encode($model->sex_category) ?>  </br>  
    
	<div class="my_photo"> <?= Html::a(Html::img('photo/'.$model->pictures), Url::to(['/products/productone/', 'id' => $model->id])) ?> </div> </br> 
      
    <?= Html::a($model->marketModel->name, Url::toRoute(['markets/view/', 'id' => $model->marketModel->id])) ?>  </br>  
</div>

