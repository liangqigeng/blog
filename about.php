<?php 
	include('config.php');
	$title = '关于我们';
	//必须要赋值之后才能在模板中输出
	$smarty->assign('title',$title);
	$nav = $db->select_all('nav','*','nav_ord  BETWEEN 1 AND 9 ORDER BY nav_ord ASC');
	$smarty->assign('nav',$nav);
	//头部底部信息输出
    $weixin = $db->select_one('banner','*','banner_id = 2');
    $smarty->assign('weixin',$weixin);
    $weixin2 = $db->select_one('banner','*','banner_id = 3');
    $smarty->assign('weixin2',$weixin2);
    $sing = $db->select_one('banner','*','banner_id = 1');
    $smarty->assign('sing',$sing);
    $logo = $db->select_one('config','*','con_id = 1');
    $smarty->assign('logo',$logo);
    $icp = $db->select_one('config','*','con_id = 2');
    $smarty->assign('icp',$icp);
    $nav1 = $db->select_all('nav','*','nav_ord  BETWEEN 10 AND 15 ORDER BY nav_ord ASC');
	$smarty->assign('nav1',$nav1);
	$about = $db->select_one('page','*','page_id = 1');
    $smarty->assign('about',$about);
    //图片输出
    $photo1 = $db->select_one('banner','*','banner_ord = 9');
    $smarty->assign('photo1',$photo1);
    $photo2 = $db->select_all('banner','*','banner_ord BETWEEN 10 AND 15 ORDER BY banner_ord ASC');
    $smarty->assign('photo2',$photo2);
	//指向指定模板显示
	$smarty->display('about.tpl',$_SERVER['REQUEST_URI']);
?>