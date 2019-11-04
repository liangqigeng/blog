<?php
    header('Content-Type:text/html;chaerset=utf-8');
    //项目根目录常量
    define('ROOT',str_replace('\\','/',dirname(__FILE__)).'/');
    include(ROOT.'include/smarty/Smarty.class.php');
    include (ROOT.'include/DB.class.php');
    include(ROOT.'include/function.php');
    //实例化数据库类
    $db = new DB('localhost','root','','blog','bl_');
    //实例化smarty
    $smarty = new Smarty();
    //smarty的有些配置
    $smarty->setTemplateDir('templates/');//设置模板目录
    $smarty->setCompileDir('templates_c/');//设置编译目录
    $smarty->setCacheDir('cache/');//设置缓存目录
    $smarty->caching = false;//是否使用缓存
    //当项目开发的时候不需要用缓存，项目上线之后需要开启缓存
    $smarty->cache_lifetime = 60*60*24;//以秒为单位
    //修改左右边界符，避免和JQ冲突
    $smarty->left_delimiter = '<{';
    $smarty->right_delimiter ='}>';