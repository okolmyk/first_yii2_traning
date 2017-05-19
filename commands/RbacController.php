<?php
namespace app\commands;
 
use Yii;
use yii\console\Controller;
use \app\rbac\UserGroupRule;
use app\models\Users;
use \app\rbac\UserProfileOwnerRule;


class RbacController extends Controller
{
    
    
    
    public function actionInit()
    {
        $authManager = \Yii::$app->authManager;
		$authManager->removeAll();
		
        // Create roles
        $guest  = $authManager->createRole('guest');
        $user = $authManager->createRole('user');
        $admin  = $authManager->createRole('admin');
 
        // Create simple, based on action{$NAME} permissions
        $login  = $authManager->createPermission('login');
        $logout = $authManager->createPermission('logout');
        $error  = $authManager->createPermission('error');
        $signUp = $authManager->createPermission('sign-up');
        $index  = $authManager->createPermission('index');
        $view   = $authManager->createPermission('view');
        $update = $authManager->createPermission('update');
        $delete = $authManager->createPermission('delete');
        //+
        $createProduct = $authManager->createPermission('createProduct');
 
        // Add permissions in Yii::$app->authManager
        $authManager->add($login);
        $authManager->add($logout);
        $authManager->add($error);
        $authManager->add($signUp);
        $authManager->add($index);
        $authManager->add($view);
        $authManager->add($update);
        $authManager->add($delete);
        //+
        $authManager->add($createProduct);
        
       
 
 
        // Add rule, based on UserExt->group === $user->group
        //$userGroupRule = new UserGroupRule();
        //$authManager->add($userGroupRule);
 
        // Add rule "UserGroupRule" in roles
        /*
        $guest->ruleName  = $userGroupRule->name;
        $brand->ruleName  = $userGroupRule->name;
        $talent->ruleName = $userGroupRule->name;
        $admin->ruleName  = $userGroupRule->name;
        */
 
        // Add roles in Yii::$app->authManager
        $authManager->add($guest);
        $authManager->add($user);
        $authManager->add($admin);
 
        // Add permission-per-role in Yii::$app->authManager
        // Guest
        $authManager->addChild($guest, $login);
        $authManager->addChild($guest, $logout);
        $authManager->addChild($guest, $error);
        $authManager->addChild($guest, $signUp);
        $authManager->addChild($guest, $index);
        $authManager->addChild($guest, $view);
 
        // user
        $authManager->addChild($user, $update); 
        $authManager->addChild($user, $guest);
       // $authManager->addChild($user, $createProduct);

        // Admin
        $authManager->addChild($admin, $delete);
        $authManager->addChild($admin, $user);
        $authManager->addChild($admin, $createProduct);
        
        $authManager->assign($admin, 1);
        $authManager->assign($user, 2);
    }  
    
    
}

