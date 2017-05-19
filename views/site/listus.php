<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
?>
 
<div class="product-item">
       
    <h2><?= Html::a($model->name, Url::to(['/products/productone/', 'id' => $model->id])) ?></h2>   
      
 </div>

