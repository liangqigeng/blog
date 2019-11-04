<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/28
 * Time: 10:18
 */
 header("Content-Type:text/html;charset=utf-8");
 date_default_timezone_set('PRC');
 session_start();
 include ('DB.class.php');
 include('function.php');
$db = new DB('localhost','root','','blog','bl_');
include('common.php');
