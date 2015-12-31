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
use Cake\Validation\Validation;
use Cake\Core\Configure;

class AccountsController extends PoplusController
{
    
    public function initialize()
    {
        parent::initialize();
        
        //加载组件
        //加载用户认证组件
        $this->loadComponent('Auth',[
            'storage'=>[
                'className' =>  'Session',
                'key'   =>  Configure::read('Settings.session.key'),
            ],
            'loginAction' =>    [
                'controller'    =>  'Accounts',
                'action'        =>  'login'
            ],
            'authError' =>  '您访问的地址需要登陆',
            'authenticate' => [
                'Form'=>[
                    'userModel'=>'Accounts',
                    //'scope' =>  ['Accounts.status >'=>0],
                    'passwordHasher' => [
                        'className' => 'Poplus',
                    ],
                    //'fields' => ['username' => 'xxx']

                ]
            ]
        ]);
        
        //此项放在login方法中无效。具体原因未知
        if ($this->request->is('post')&&($this->request->params['action'] == 'login')){
            //支持用户名/邮箱/手机号登陆
            if (Validation::email($this->request->data['username'])){
                $this->Auth->config('authenticate',[
                    'Form'  =>  [
                        'fields'    =>  [ 'username' => 'email' ]
                    ]
                ]);
                $this->request->data['email'] = $this->request->data['username'];
                unset($this->request->data['username']);
            }elseif (preg_match("/^(\+?86-?)?(18|15|13|17)[0-9]{9}$/", $this->request->data['username'])){
                $this->Auth->config('authenticate',[
                    'Form'  =>  [
                        'fields'    =>  [ 'username' => 'mobile' ]
                    ]
                ]);
                $this->request->data['mobile'] = $this->request->data['username'];
                unset($this->request->data['username']);
            }
        }
        
        $this->Auth->allow(['regist']);
        
        
    }
    
    
    /**
     * 用户登录
     */
    public function login()
    {
        //更改页面布局为 login布局
        $this->viewBuilder()->layout('login');
        
        //检测是否已登录
        if($this->Auth->user()){
            return $this->redirect($this->Auth->redirectUrl());
        }
        
        if ($this->request->is('post')){
            //检测用户信息
            $account = $this->Auth->identify();
            
            if ($account){
                $this->Auth->setUser($account);//cakephp默认保存在session中。
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                //报错，登录失败
                $this->Flash->set(json_encode([
                    'msg'   =>  '用户名或密码错误',
                    'type'  =>  'error',
                    'code'  =>  '001'
                ]),[
                    'key'   =>  'auth',
                    'element' =>  'onlymsg'
                ]);
            }
        }
    }
    
    
    public function logout(){
        return $this->redirect($this->Auth->logout());
    }
    
    public function regist() {
        //更改页面布局为login布局
        $this->viewBuilder()->layout('login');
        if ($this->request->is('post')){
            debug($this->request->data);
            
            
        }
    }
    
    
}