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
        <h3>Это страница со всеми юзерами</h3>
    </div>

    <div class="body-content">

	
<?php 

      
    echo ListView::widget([
		'dataProvider' => $dataProvider,
		'itemView' => 'listus',
	]);
	

?>
  



</div>
</div>
