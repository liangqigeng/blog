<?php
    include('../include/config.php');
    //接收地址栏的参数
    $sin_id = $_GET['sin_id'];
    //通过这个主键做为条件查询当前详细数据
    $data = $db->select_one('single','*',"sin_id = $sin_id");

    if ($_POST) {
        //接收数据
        $data = array(
            'sin_name' => $_POST['sin_name'],
            'sin_addtime' => strtotime($_POST['sin_addtime'])
        );
        //接收隐藏域
        $sin_id = $_POST['sin_id'];
        //执行编辑函数
        $res = $db->edit('single',$data, "sin_id = $sin_id");
        if ($res) {
            show_msg('修改成功','single_list.php');
        } else {
            show_msg('数据执行有误，请重试...');
        }
    }
?>
<?php include('header.php');?>
<style>
    #upload{
        opacity:0;
    }
   #img{
        display:block;
        border:1px solid #999;
        height:200px;
        width:200px;
        text-align:center;
        margin-top:-32px;
    }
</style>
<!-- Start: Main -->
<div id="main"> 
    <!-- Start: Sidebar -->
  <aside id="sidebar" class="affix">
    <div id="sidebar-search">
        <div class="sidebar-toggle"><span class="glyphicon glyphicon-resize-horizontal"></span></div>
    </div>
    <div id="sidebar-menu">
      <ul class="nav sidebar-nav">
        <li>
          <a href="index.php"><span class="glyphicons glyphicon-home"></span><span class="sidebar-title">后台首页</span></a>
        </li>
        <li>
          <a href="single_list.php"><span class="glyphicons glyphicon-list"></span><span class="sidebar-title">标签管理</span></a>
        </li>
      </ul>
    </div>
  </aside>
  <!-- End: Sidebar -->    
  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">编辑标签</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-10 col-lg-8 center-column">
        <form action="" method="post" class="cmxform" enctype="multipart/form-data">
        	<div class="panel">
            <div class="panel-heading">
              <div class="panel-title">编辑标签</div>
              <div class="panel-btns pull-right margin-left">
              <a href="single_list.php" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	  <div class="col-md-7">
                      <input type="hidden" name="sin_id" value="<?php echo $data['sin_id'];?>">
                  <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">标签名称</span>
                          <input type="text" name="sin_name" value="<?php echo $data['sin_name'];?>" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">修改时间</span>
                              <input type="date" name="sin_addtime" value="<?php echo date('Y-m-d', $data['sin_addtime']);?>" class="form-control">
                          </div>
                  </div>
                </div>
                <div class="col-md-7">
	                <div class="form-group">
	                  <input type="submit" value="提交" class="submit btn btn-blue">
	                </div>
                </div>
            </div>
          </div>
          </form>
        </div>
    </div>
  </section>
  <!-- End: Content --> 
</div>
<!-- End: Main -->
</body>

</html>