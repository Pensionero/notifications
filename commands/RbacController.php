<?php


namespace app\commands;

use Yii;
use yii\console\Controller;



class RbacController extends Controller
{
   /**
     * Generates roles
     */
   public function actionInit()
   {
       $auth = Yii::$app->getAuthManager();
       $auth->removeAll();

       $admin = $auth->createRole('admin');
       $admin->description = 'Администратор';
       $auth->add($admin);
    

       $user = $auth->createRole('user');
       $user->description = 'User';
       $auth->add($user);


       $canAdmin = $auth->createPermission('canAdmin');
       $canAdmin->description = 'Может всё';
       $auth->add($canAdmin);

       $createTheme = $auth->createPermission('createTheme');
       $createTheme->description = 'Может создавать темы';
       $auth->add($createTheme);
       
       $updateTheme = $auth->createPermission('updateTheme');
       $updateTheme->description = 'Может редактировать темы';
       $auth->add($updateTheme);

       $auth->addChild($admin, $user);
       $auth->addChild($admin, $canAdmin);
       $auth->addChild($admin, $updateTheme);
       $auth->addChild($admin, $createTheme);
       $auth->addChild($user, $updateTheme);
       $auth->addChild($user, $createTheme);
       

       $auth->assign($admin, 1);
       $auth->assign($user, 2);
       $auth->assign($user, 3);
       $auth->assign($user, 4);
      
       $this->stdout('Done!' . PHP_EOL);
        
   }

} 
