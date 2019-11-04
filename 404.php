<?php 
	include('config.php');
	$title = '404 Not Found';
	$smarty->assign('title',$title);
	$miss = $db->select_one('banner','*','banner_id = 6');
	$smarty->assign('miss',$miss);
	$smarty->display('404.tpl',$_SERVER['REQUEST_URI']);
?>