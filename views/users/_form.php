<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UploadForm;
use yii\web\UploadedFile;
use app\models\Users;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php //$form = ActiveForm::begin(); ?>
    
     <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'access_token')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>
    
     <?= $form->field($model, 'userGroup')->DropDownList(['' => '', 'admin' => 'admin', 'user' => 'user']) ?>
    
    <?php  echo $form->field($model, 'imageFile')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
