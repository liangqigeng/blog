<?php 
	include('config.php');
	$title = '文章详情';
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
    $single = $db->join_all('single','find','sin_id','sin_name,a.sin_id','1 ORDER BY sin_addtime ASC');
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

    if (!empty($_GET['art_id'])) {
        $art_id= $_GET['art_id'];
        //文章详情
        $content = $db->select_one('article','*',"art_id = $art_id");
        $smarty->assign('content',$content);
    } else {
        //指向指定模板显示
	    echo "<script>location.href='404.php';</script>";
    }

	//文章评论
    $commit = $db->join_all('article','com_art','art_id','*',"a.art_id = $art_id");
	$smarty->assign('commit',$commit);
	if (!empty($_POST['comment'])){
	    $data = array(
	        'com_content' => $_POST['comment'],
	        'art_id' => $_POST['art_id'],
	        'com_addtime' => time()
	    );
	    $res = $db->add('com_art',$data);
        if($res) {
            show_msgs('评论成功！');
        } else {
            show_msgs('数据执行有误，请重试...');
        }
	}
	//指向指定模板显示
	$smarty->display('art_detail.tpl',$_SERVER['REQUEST_URI']);