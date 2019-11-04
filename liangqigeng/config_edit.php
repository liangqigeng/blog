<?php
    include('../include/config.php');
    if ($_POST) {
        //上传logo
        if ($_FILES['logo']['size']) {
            //先删除旧图片,查询旧图片的地址
            $old_arr = $db->select_one('config','con_value',"con_id = 1");
            //旧图片的图片名称
            $old_path = $old_arr['con_value'];
            //旧图片完整地址
            $path = '../static/upload/'.$old_path;
            //有旧图片的情况就删除
            if (!empty($old_path) && file_exists($path)) {
                unlink($path);
            }
            $str = upload('logo');

            $arr = explode(',', $str);
            if ($arr[0]=='图片上传成功') {
                $data1 = array(
                    'con_value'=>$arr[1],
                );
                $res1 = $db->edit('config', $data1, "con_title='LOGO'");
            } else {
                show_msg($arr[0]);
            }
        } else {
            $res1 = false;
        }
          //备案号
        $data2 = array(
            'con_value' => $_POST['icp']
        );
         $res2 = $db->edit('config', $data2, "con_title='备案号'");

         //判断结果并跳转页面
         if ($res1 || $res2) {
            show_msg('修改成功', 'config_edit.php');
         } else {
            show_msg('数据有误，请重试...');
         }
    }

    //查询内容显示在页面
    $logo = $db->select_one('config','con_value', "con_title = 'LOGO'");
    $icp = $db->select_one('config','con_value', "con_title = '备案号'");

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
          <a href="config_edit.php"><span class="glyphicons glyphicon-list"></span><span class="sidebar-title">配置管理</span></a>
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
        <li class="active">配置管理</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-10 col-lg-8 center-column">
        <form action="" method="post" class="cmxform" enctype="multipart/form-data">
        	<div class="panel">
            <div class="panel-heading">
              <div class="panel-title">配置列表</div>
              <div class="panel-btns pull-right margin-left">
              <a href="index.php" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	  <div class="col-md-7">
                      <input type="hidden" name="banner_id" value="">

                 <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">LOGO</span>
                          <input type="file" name="logo" value="" class="form-control" id="upload">
                          <label for="upload" style="margin-bottom:0;">
                              <?php if (!empty($logo['con_value'])) {?>
                                  <img src="../static/upload/<?php echo $logo['con_value'];?>" alt="" id="img">
                              <?php } else{ ?>
                                <img src="images/upload.png" alt="" id="img">
                              <?php }?>
                          </label>
                      </div>
                </div>
                <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">备案号</span>
                          <input type="text" name="icp" value="<?php echo $icp['con_value'];?>" class="form-control">
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
<script>
    //做图片上传预览
    function getObjectURL(file) {
        var url = null ;
        if (window.createObjectURL!=undefined) { // basic
            url = window.createObjectURL(file) ;
        } else if (window.URL!=undefined) { // mozilla(firefox)
            url = window.URL.createObjectURL(file) ;
        } else if (window.webkitURL!=undefined) { // webkit or chrome
            url = window.webkitURL.createObjectURL(file) ;
        }
        return url ;
    }
    $('#upload').change(function() {
        var url = getObjectURL(this.files[0]);
        if (url) {
            $('#img').attr('src', url);
        }
    })
</script>
</body>

</html>