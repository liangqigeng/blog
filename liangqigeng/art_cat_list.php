<?php 
  include('../include/config.php');
  //查询文章分类信息
  $data = $db->select_all('cat_art','*','1 ORDER BY cat_ord ASC');
  $a = 1;
  //删除
  if (!empty($_GET['del_id'])) {
    $del_id = $_GET['del_id'];
    $res = $db->del('cat_art', "cat_id = $del_id");
    if ($res) {
        show_msg('删除成功','art_cat_list.php');
    } else {
        show_msg('数据有误，请重试...');
    }
  }
   if(!empty($_GET['value'])||!empty($_GET['value2'])) {
         $id = $_GET['id'];
         if(!empty($_GET['value'])) {
             $show = $_GET['value'];
             $data = array(
                'cat_name' => $show
            );
             $res = $db->edit('cat_art',$data,"cat_id = $id");
         }

         if(!empty($_GET['value2'])) {
             $show2 = $_GET['value2'];
             $data = array(
                'cat_ord' => $show2
            );
            $res = $db->edit('cat_art',$data,"cat_id = $id");
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
    .art_cat input{
        width:100%;
        height:28px;
        line-height:28px;
        border:none;
        outline:none;
        background:rgba(255,255,255,0);
    }
    .art_on input{
        border:1px solid #666;
        outline:skyblue;
        background:rgba(255,255,255,0.8);
    }
    .cat_ord input{
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
        <li class="active">文章分类管理</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-12">
			<div class="panel">
                <div class="panel-heading">
                  <div class="panel-title">文章分类列表</div>
                  <a href="art_cat_add.php" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加文章分类</a>
                </div>
                <form action="" method="post">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active">
                        <th class="text-center" width="100"><input type="checkbox" value="" id="checkall" class=""> 全选</th>
                        <th>序号</th>
                        <th>分类名称</th>
                        <th>添加时间</th>
                        <th>分类排序</th>
                        <th width="200">操作</th>
                      </tr>
                      <?php foreach($data as $v) {?>
                          <tr class="success">
                            <td class="text-center"><input type="checkbox" value="1" name="idarr[]" class="cbox"></td>
                            <td><?php echo $a++;?></td>
                             <td class="art_cat">
                                <input type="text" value="<?php echo $v['cat_name'];?>" readonly data_id="<?php echo $v['cat_id'];?>"/>
                              </td>
                            <td><?php echo date('Y-m-d', $v['cat_addtime']);?></td>
                            <td class="cat_ord">
                                <input type="text" value="<?php echo $v['cat_ord'];?>" readonly data_id="<?php echo $v['cat_id'];?>"/>
                            </td>
                            <td>
                              <div class="btn-group">
                                <a href="art_cat_edit.php?cat_id=<?php echo $v['cat_id'];?>" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
                                <a onclick="return confirm('确定要删除吗？');" href="?del_id=<?php echo $v['cat_id'];?>" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
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
<script src="js/art_cat.js"></script>
</html>