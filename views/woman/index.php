<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ListView;

?>
<p>
	
</p>

<?php	
	 echo ListView::widget([
		'dataProvider' => $dataProvider,
		'itemView' => 'list_woman',
	]);

?>   
    </div>
</div>
