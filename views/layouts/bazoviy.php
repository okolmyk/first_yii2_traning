<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?php echo 'Тренировка';  // echo Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    </head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
   
    NavBar::begin([
        'brandLabel' => 'Главная',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
 if(!Yii::$app->user->isGuest){
 
	if(Yii::$app->user->identity->userGroup == 'admin'){
    
			echo Nav::widget([
				'options' => ['class' => 'navbar-nav navbar-right'],
				'items' => [   
				   
				   
					['label' =>  'Users', 'url' => ['/users/']],
					
					['label' =>  'Products', 'url' => ['/products/']],
					
					['label' =>  'CategoryProducts', 'url' => ['/category-products/']],
					
					['label' =>  'Markets', 'url' => ['/markets/']],

					['label' =>  'Товары', 'items' => [
					
						 ['label' =>  'Мужикам', 'url' => ['/man/']],
						 
						 ['label' =>  'Бабам', 'url' => ['/woman/']],
					
					]],
				   
					Yii::$app->user->isGuest ? (
						['label' => 'Login', 'url' => ['/site/login']]
					) : (
						'<li>'
						. Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
						. Html::submitButton(
							'Logout (' . Yii::$app->user->identity->username . ')',
							['class' => 'btn btn-link']
						)
						. Html::endForm()
						. '</li>'
					)
				],
			]);
    
	}
	
	else{
		
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'items' => [   
		   
				
				['label' =>  'Товары', 'items' => [
				
					 ['label' =>  'Мужикам', 'url' => ['/man/']],
					 
					 ['label' =>  'Бабам', 'url' => ['/woman/']],
				
				]],
			   
				Yii::$app->user->isGuest ? (
					['label' => 'Login', 'url' => ['/site/login']]
				) : (
					'<li>'
					. Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
					. Html::submitButton(
						'Logout (' . Yii::$app->user->identity->username . ')',
						['class' => 'btn btn-link']
					)
					. Html::endForm()
					. '</li>'
				)
			],
		]);
    
	}
}

else{
	
	echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [   
       
            
            ['label' =>  'Товары', 'items' => [
            
				 ['label' =>  'Мужикам', 'url' => ['/man/']],
				 
				 ['label' =>  'Бабам', 'url' => ['/woman/']],
            
            ]],
           
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
}
    NavBar::end();
?>
    
    

    <div class="container">
		
<?php	
/* 
 if(!Yii::$app->user->isGuest){
 
	if(Yii::$app->user->identity->userGroup == 'admin'){
		
		NavBar::begin([
			'options' => [
				'class' => 'navbar navbar-inverse',
			],
		]);
	  
		echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
			'items' => [

				['label' =>  'Users', 'url' => ['/users/']],
				
				['label' =>  'Products', 'url' => ['/products/']],
				
				['label' =>  'CategoryProducts', 'url' => ['/category-products/']],
			],
		]);
		NavBar::end();
	}
}*/
?>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
