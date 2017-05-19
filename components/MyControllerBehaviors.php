<?php

namespace app\components;



use yii\base\Behavior;
use yii\web\Controller;

use yii\db\ActiveRecord;

class MyControllerBehaviors extends Behavior
{

	
		
	
	public function events(){
			
			return[
				Controller::EVENT_AFTER_ACTION => 'mymethod',
			];
	}
	
		
	public function mymethod(){
			
		
		
		
	}
	
	
	
  
}


