<?php
/**
* 账号 功能  控制器
* 
* @file: AccountsController.php
* @date: 2015年12月6日 下午8:36:57
* @author: xingshanghe
* @email: xingshanghe@icloud.com
* @copyright poplus.com
* 
*/

namespace App\Controller;

use App\Controller\PoplusController;
//use Cake\Core\Configure;

class AccountsController extends PoplusController
{
    
    public function initialize()
    {
        parent::initialize();
        
        //加载组件
        
        //加载cookie组件
        $this->loadComponent('Cookie',[
            'encryption'    =>  false
        ]);
        //加载用户认证组件
        $this->loadComponent('Auth',[
            'loginAction' =>    [
                'controller'    =>  'Accounts',
                'action'        =>  'login'
            ],
            'authenticate' => [
                'Form'=>[
                    'userModel'=>'Accounts',
                    //'scope' =>  ['Accounts.status >'=>0],
                    'passwordHasher' => [
                        'className' => 'Poplus',
                    ],
                    'fields' => ['username' => 'loginname']

                ]
            ]
        ]);
        
        //支持用户名/邮箱/手机号登陆
        
        
    }
    
    
    
    public function login()
    {
        //更改页面布局为 login布局
        $this->viewBuilder()->layout('login');
    }
    
    
}