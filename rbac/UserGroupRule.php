<?php

namespace app\rbac;
 
use Yii;
use yii\rbac\Rule;
 
class UserGroupRule extends Rule
{
    public $name = 'userGroup';
 
    public function execute($user, $item, $params)
    {
        if (!\Yii::$app->user->isGuest) {
            $group = \Yii::$app->user->identity->userGroup;
            if ($item->name === 'admin') {
                $dmp = $group == 'admin';
                //var_dump($dmp); die();
                return $dmp;
            } elseif ($item->name === 'user') {
                return $group == 'admin' || $group == 'user';
            } elseif ($item->name === 'user') {
                return $group == 'admin' || $group == 'user';
            }
        }
        return true;
    }
}
