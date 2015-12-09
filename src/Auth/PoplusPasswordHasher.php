<?php
/**
* 爬坡网 密码处理函数
* 
* @file: PoplusPasswordHasher.php
* @date: 2015年12月6日 下午8:49:04
* @author: xingshanghe
* @email: xingshanghe@icloud.com
* @copyright poplus.com
* 
*/


namespace App\Auth;

use Cake\Auth\AbstractPasswordHasher;

class PoplusPasswordHasher extends AbstractPasswordHasher
{
    /*
    protected $_defaultConfig = [
        'salt'=>''
    ];
    */
    
    public function __construct(array $config = []) {
        parent::__construct($config);
    }
    
    public function hash($password)
    {
        return $password;//测试用明文密码return $password;
        //加入对salt支持
        //return md5(md5($password).$this->_config['salt']);
    }

    public function check($password, $hashedPassword)
    {
        return $password === $hashedPassword;//测试用明文密码
        //对salt支持
        //return md5(md5($password).$this->_config['salt']) ===  $hashedPassword;
    }

    
}