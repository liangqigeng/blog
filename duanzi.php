<?php 
	include('config.php');
	include ('include/Page.class.php');
	//分页
    if (!empty($_GET['page'])) {
        $current = $_GET['page'];
    } else {
        $current = 1;
    }
    $limit = 5;
    $size = 3;
    $con = ($current-1)*$limit;

	$title = '段子';
	//必须要赋值之后才能在模板中输出
	$smarty->assign('title',$title);
	$nav = $db->select_all('nav','*','nav_ord  BETWEEN 1 AND 9 ORDER BY nav_ord ASC');
	$smarty->assign('nav',$nav);
	//原创栏图片
    $orign = $db->select_one('banner','*','banner_id = 4');
    $smarty->assign('orign',$orign);
    //标签栏图片
    $web = $db->select_one('banner','*','banner_id = 5');
    $smarty->assign('web',$web);
    //查询所有标签查询表查询所有标签文章数据
    $single = $db->join_all('single','find','sin_id','DISTINCT sin_name,a.sin_id','1 ORDER BY sin_addtime ASC');
    $smarty->assign('single',$single);
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
    if (!empty($_GET['sin_id'])) {
        $sin_id = $_GET['sin_id'];
        $count = $db->select_count_morer('single','find','artcile','sin_id','art_id','b.sin_id = $sin_id');
        $list = $db->join_all_more('single','find','article','sin_id','art_id','*',"b.sin_id = $sin_id ORDER BY sin_addtime ASC LIMIT $con,$limit");
        $smarty->assign('list',$list);
    } else {
        $count = $db->select_count_more('article','cat_art','cat_id','a.cat_id = 2');
         //文章列表
        $list = $db->join_all('article','cat_art','cat_id','*',"a.cat_id = 2 ORDER BY art_addtime ASC LIMIT $con,$limit");
        $smarty->assign('list',$list);
    }
    $page = new Page($current, $count, $limit, $size,'black2');
    $show = $page->page();
    $smarty->assign('show',$show);
	//指向指定模板显示
	$smarty->display('duanzi.tpl',$_SERVER['REQUEST_URI']);
?>