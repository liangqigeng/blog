<?php
    include('../include/config.php');
    date_default_timezone_set('PRC');
    //查询各种数据总数
    //文章总数
    $a_count = $db->select_count('article');
    //文章分类总数
  	$at_count = $db->select_count('cat_art');
  	//文章留言总数
  	$g_count = $db->select_count('com_art');
 ?>
<?php include('header.php');?>
  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
      </ol>
    </div>
    <div class="container">


		
		<div class="col-md-9">
			<div id="docs-content">
				<h2 class="page-header margin-top-none">个人信息</h2>
				<table class="table">
					<tr>
					<td colspan="2">您好，<?php echo $_COOKIE['admin_name'];?></td>
					</tr>
					<tr>
					<td width="150">最后登录时间:</td>
					<td><?php echo date('Y-m-d H:i:s',$_COOKIE['admin_lasttime1']);?></td>
					</tr>
					<tr>
					<td>最后登录IP:</td>
					<td>127.0.0.1</td>
					</tr>
				</table>

				<h2 class="page-header margin-top-none">网站概况</h2>
				<table class="table">
				  <tr>
				    <td width="100">文章总数</td>
				    <td><?php echo $a_count;?></td>
				  </tr>
				  <tr>
				    <td>文章分类总数</td>
				    <td><?php echo $at_count;?></td>
				  </tr>
				  <tr>
				    <td>文章留言总数</td>
				    <td><?php echo $g_count;?></td>
				  </tr>
				</table>
			</div>
		</div>
    </div> 
  </section>
  <!-- End: Content --> 
</div>
<!-- End: Main --></body>

</html>