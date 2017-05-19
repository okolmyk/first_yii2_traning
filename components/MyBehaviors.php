<?php

namespace app\components;

use yii\base\Behavior;
use yii\web\Controller;

use yii\db\ActiveRecord;

class MyBehaviors extends Behavior
{

	public $pro;
	
	public $attribute;
		
	
	public function events(){
			
			return[
				ActiveRecord::EVENT_BEFORE_VALIDATE => 'mymethod',
			];
	}
	
		
	public function mymethod(){
			
		$a = $this->owner->{$this->attribute};
		
		$a = ucfirst($a);
		
		$this->owner->{$this->attribute} = $a;
		
		//$this->owner->name_product = "бля-бля-бля";
		
	}
	
	
	
  
}


