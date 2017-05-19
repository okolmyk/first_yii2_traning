<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Users */


$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['/users']];

$this->params['breadcrumbs'][] = 'user id = '.$_GET['id'];


//var_dump($user);
?>
<p></p>

<?php //echo $_GET['id']?>

<?php foreach($user as $value): ?>

<?php if($value['id'] == $_GET['id']) {?>

<p>	
	<?= Html::a($value['id'],  Url::to(['/users/view/', 'id' => $value['id']]))?>
	<p></p>
	<?= Html::a($value['name'],  Url::to(['/users/view/', 'id' => $value['id']]))?>
	<p></p>
	<?= Html::a($value['alias'],  Url::to(['/users/view/', 'id' => $value['id']]))?>
	<p></p>
	<?= Html::a($value['login'],  Url::to(['/users/view/', 'id' => $value['id']]))?>
	<p></p>
	<?= Html::a($value['password'],  Url::to(['/users/view/', 'id' => $value['id']]))?>
			
</p>

	
<?php } ?>

<?php endforeach; ?>

