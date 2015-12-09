<?php 
/*
 *  SEO信息设置，从 控制器变量$_request_params 中获取title,description等信息 
 */

    $seo_key = '';//关键字
    $separator = '.';//分隔符
    
    if (isset($_request_params['prefix'])&&!empty($_request_params['prefix'])){
        $seo_key.= strtolower($_request_params['prefix'].$separator);
    }
    $seo_key .= strtolower($_request_params['controller']).$separator.strtolower($_request_params['action']);
    if (isset($_request_params['pass'])&&(!empty($_request_params['pass']))){
        $seo_key.= $separator.implode($separator,strtolower($_request_params['pass']));
    }
    
    
    if (\Cake\Core\Configure::check('Seo.'.$seo_key)){
        $this->start('title');
        echo \Cake\Core\Configure::read('Seo.'.$seo_key.'.title'),' - ',$_sys_info['name'];
        //echo __d('seo', \Cake\Core\Configure::read('Seo.'.$seo_key.'.title'));//多语言
        $this->end();
    
        $this->start('meta');
        echo $this->Html->meta(
            'keywords',
            \Cake\Core\Configure::read('Seo.'.$seo_key.'.keywords')
            //__d('seo', \Cake\Core\Configure::read('Seo.'.$seo_key.'.keywords'))//多语言
            );
        echo $this->Html->meta(
            'description',
            \Cake\Core\Configure::read('Seo.'.$seo_key.'.description')
            //__d('seo', \Cake\Core\Configure::read('Seo.'.$seo_key.'.description'))//多语言
            );
        $this->end();
    }
    
    unset($seo_key);
    unset($separator);

?>