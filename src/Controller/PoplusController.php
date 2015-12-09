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


class PoplusController extends AppController
{
    
    public function initialize() {
        parent::initialize();
        $this->set('_request_params',$this->request->params);
        $this->set('_sys_info',Configure::read('System'));
    }
    
    
}

