<?php
/**
* 爬坡网 控制器父类
* 
* @file: PoplusController.php
* @date: 2015年12月6日 上午12:16:21
* @author: xingshanghe
* @email: xingshanghe@icloud.com
* @copyright poplus.com
* 
*/

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;


class PoplusController extends AppController
{
    
    public function initialize() {
        parent::initialize();
        
        //加载cookie组件
        $this->loadComponent('Cookie',[
            'encryption'    =>  false
        ]);
        
        //设置默认布局为default
        $this->viewBuilder()->layout('default');
        
        $this->set('_request_params',$this->request->params);
        $this->set('_sys_info',Configure::read('System'));
        
        $this->set('_current_user',$this->request->session()->read(Configure::read('Settings.session.key')));
        
        if ($this->Cookie->check('current_city')){
            $this->set('_current_city',$this->Cookie->read('current_city'));
        }
        
    }
    
    
    public function beforeRender(Event $event){
       $this->set('_layout', $this->viewBuilder()->layout());
       parent::beforeFilter($event);
    }
    
}

