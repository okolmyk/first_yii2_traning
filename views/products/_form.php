<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\CategoryProducts;
use app\models\UploadForm;
use yii\web\UploadedFile;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */

?>


<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name_product')->textInput(['maxlength' => true]) ?>
    
    <label>Product Category</label>
    <?php /* Html::activeDropDownList($model, 'product_category',
     yii\helpers\ArrayHelper::map(app\models\CategoryProducts::find()->all(), 'id', 'name_category_products'), ['class'=>'form-control']) */?>

    <?= Html::activeDropDownList($model, 'product_category',
     yii\helpers\ArrayHelper::map(app\models\CategoryProducts::find()->all(), 'id', 'name_category_products'), ['class'=>'form-control']) ?>
	
	<p></p>
	 <label>Markets</label>	
    <?= Html::activeDropDownList($model, 'markets',
     yii\helpers\ArrayHelper::map(app\models\Markets::find()->all(), 'id', 'name'), ['class'=>'form-control']) ?>
		
	<p></p>
    <?= $form->field($model, 'sex_category')->DropDownList(['Мужской' => 'Мужской', 'Женский' => 'Женский']) ?>

	<?php  echo $form->field($model, 'imageFile')->fileInput(); ?>
	
	
	<?php echo Html::checkboxList('locations', ArrayHelper::getColumn(app\models\ProductsUsers::find()->where(['id_products'=>$model->id])->all(), 'id_users'), ArrayHelper::map(app\models\Users::find ()->all () , 'id', 'name'), ['separator'=>'<br>']) ?>
 

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
