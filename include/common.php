<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/29
 * Time: 23:19
 */
 //查询配置信息
    $logo = $db->select_one('config','*','con_id = 1');
    $icp = $db->select_one('config','*','con_id = 5');
    //查询导航

