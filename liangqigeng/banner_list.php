<?php 
  include('../include/config.php');
  //查询广告信息
  $data = $db->select_all('banner','*','1 ORDER BY banner_ord ASC');
  $a = 1;
  //删除
  if (!empty($_GET['banner_id'])) {
    $del_id = $_GET['banner_id'];
    //先删除旧图片,查询旧图片的地址
        $old_arr = $db->select_one('banner','banner_path,thumb_path',"banner_id = $del_id");
            //旧图片的图片名称
            $old_path = $old_arr['banner_path'];
            //旧缩略图图片的图片名称
            $old_thumb = $old_arr['thumb_path'];
            //旧图片完整地址
            $path = '../static/upload/'.$old_path;
             //旧缩略图图片完整地址
            $thumb_path = '../static/thumb/'.$old_thumb;

           if (!empty($old_path) && file_exists($path)) {
                unlink($path);
            }
             //有旧缩略图图片的情况就删除
            if (!empty($old_thumb) && file_exists($thumb_path)) {
                unlink($thumb_path);
            }
    $res = $db->del('banner', "banner_id = $del_id");
    if ($res) {
        show_msg('删除成功','banner_list.php');
    } else {
        show_msg('数据有误，请重试...');
    }
  }

  if(!empty($_GET['value'])||!empty($_GET['value1'])||!empty($_GET['value2'])) {
         $id = $_GET['id'];
         if(!empty($_GET['value'])) {
             $value = $_GET['value'];
             $data = array(
                'banner_title' => $value
            );
             $res = $db->edit('banner',$data,"banner_id = $id");
         }
          if(!empty($_GET['value1'])) {
             $value1 = $_GET['value1'];
             $data = array(
                'banner_url' => $value1
            );
             $res = $db->edit('banner',$data,"banner_id = $id");
         }
          if(!empty($_GET['value2'])) {
             $value2 = $_GET['value2'];
             $data = array(
                'banner_ord' => $value2
            );
             $res = $db->edit('banner',$data,"banner_id = $id");
         }
          if ($res) {
            echo 1;die;
          } else {
            echo 2;die;
          }
     }
?>
<?php include('header.php');?>
<style>
    .banner_title input{
        width:100%;
        height:28px;
        line-height:28px;
        border:none;
        outline:none;
        background:rgba(255,255,255,0);
    }
    .banner_on input{
        border:1px solid #666;
        outline:skyblue;
        background:rgba(255,255,255,0.8);
    }
    .banner_url input{
        width:100%;
        height:28px;
        line-height:28px;
        border:none;
        outline:none;
        background:rgba(255,255,255,0);
    }
    .url_on input{
        border:1px solid #666;
        outline:skyblue;
        background:rgba(255,255,255,0.8);
    }
    .banner_ord input{
        width:100%;
        height:28px;
        line-height:28px;
        border:none;
        outline:none;
        background:rgba(255,255,255,0);
    }
    .ord_on input{
        border:1px solid #666;
        outline:skyblue;
        background:rgba(255,255,255,0.8);
    }
</style>
  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">广告管理</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-12">
			<div class="panel">
                <div class="panel-heading">
                  <div class="panel-title">广告列表</div>
                  <a href="banner_add.php" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加广告</a>
                </div>
                <form action="" method="post">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active">
                        <th class="text-center" width="100"><input type="checkbox" value="" id="checkall" class=""> 全选</th>
                        <th>序号</th>
                        <th>广告标题</th>
                        <th>广告图片</th>
                        <th>广告URL</th>
                        <th>添加时间</th>
                        <th>广告排序</th>
                        <th width="200">操作</th>
                      </tr>
                      <?php foreach($data as $v) {?>
                          <tr class="success">
                            <td class="text-center"><input type="checkbox" value="1" name="idarr[]" class="cbox"></td>
                            <td><?php echo $a++;?></td>
                            <td class="banner_title">
                                <input type="text" value="<?php echo $v['banner_title'];?>" readonly data_id="<?php echo $v['banner_id'];?>"/>
                            </td>
                            <td>
                                <img src="../static/upload/<?php echo $v['banner_path'];?>" alt="" height="50"/>
                            </td>
                            <td class="banner_url">
                                <input type="text" value="<?php echo $v['banner_url'];?>" readonly data_id="<?php echo $v['banner_id'];?>"/>
                            </td>
                            <td><?php echo date('Y-m-d', $v['banner_addtime']);?></td>
                            <td class="banner_ord">
                                <input type="text" value="<?php echo $v['banner_ord'];?>" readonly data_id="<?php echo $v['banner_id'];?>"/>
                            </td>
                            <td>
                              <div class="btn-group">
                                <a href="banner_edit.php?banner_id=<?php echo $v['banner_id'];?>" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
                                <a onclick="return confirm('确定要删除吗？');" href="?banner_id=<?php echo $v['banner_id'];?>" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
                              </div>
                            </td>
                          </tr>                      
                      <?php }?>
                  </table>
                  
                </div>
                </form>
              </div>
          </div>
        </div>
    </div>
  </section>
  <!-- End: Content --> 
</div>
<!-- End: Main --> 
</body>
<script src="js/banner.js"></script>
</html>