<?php

namespace app\components;

use yii\web\UrlRuleInterface;

use yii\base\Object;


class UsersRule extends Object implements UrlRuleInterface
{
	
	public function createUrl($manager, $route, $params){return false;}
	
	public function parseRequest($manager, $request){return false;}
	
	
/*	public function createUrl($manager, $route, $params){
		
		if ($route !== 'page/show' || isset($params['id']) === false) { // проверяем, что это маршрут для страницы и нам передали id-записи
			
			return false; // return false сообщает UrlManager-у, что мы не смогли построить url и необходимо попробовать применить следующее правило
		}
		
		$slug = Page::find()->select('url')->where(['id' => $params['id'], 'active' => 1,])->scalar(); // тут все просто. Это поиск записи в БД.
			
		if ($slug !== false) { // если поиск увенчался успехом, то неободимо вернуть найденный урл
		   
			return '/' . $slug; // слеш в начале дает знать, что это абсолютный url
		}
		
		return false; // мы ничего не нашли в БД :(
			
	}*/
	
	
		
  /*  public function parseRequest($manager, $request){
		
		$url = trim($request->pathInfo, '/'); // удаляем слеши из начала и конца url
			
		$page = Page::find()->where(['url' => $url, 'active' => 1,])->one(); // ищем запись по url
			
		if ($page !== null) { // если нашли, то передаем данные в PageController::actionShow($id). В нем будем рендерить страницу
				
			return ['page/show', ['id' => $page->id]];
		}
				
		return false; // сообщаем UrlManager, что ничего не нащли и необходимо попробовать применит следующее правило		
	}*/
}


