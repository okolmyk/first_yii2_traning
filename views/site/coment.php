<?php

use yii\widgets\LinkPager;


?>
<h1>Это наши коментарии</h1>
<p>Вы только что посещали <a href="<?=Yii::$app->urlManager->createUrl(['site/user', 'name' => $name])?>"><?=$name?></a></p>

<?php foreach ($coment as $coments){ ?>
	
	<li><b> <?=$coments->id?></b> <a href="<?=Yii::$app->urlManager->createUrl(['site/user', 'name' => $coments->name])?>"><b><?=$coments->name?></b></a> <b><?=$coments->coment?></b></li>

<?php } ?>

<?= LinkPager::widget(['pagination' => $pagination])?>

