<?php
    include('../include/config.php');
    $a = 1;
    $data = $db->select_all('nav','*','1 ORDER BY nav_ord ASC');


     //批量删除
if ($_POST) {
    $btn = $_POST['btn'];
    $idarr = $_POST['idarr'];
    $idstr = implode(',', $idarr);

//批量删除
    if ($btn == 1) {
        $res = $db->del('nav', "nav_id IN($idstr)");
        if ($res) {
            show_msg('批量删除成功', 'nav_list.php');
        } else {
            show_msg('数据执行有误，请重试...');
        }
    }
}

if(!empty($_GET['value'])||!empty($_GET['value1'])||!empty($_GET['value2'])) {
         $id = $_GET['id'];
         if(!empty($_GET['value'])) {
             $value = $_GET['value'];
             $data = array(
                'nav_name' => $value
            );
             $res = $db->edit('nav',$data,"nav_id = $id");
         }
          if(!empty($_GET['value1'])) {
             $value1 = $_GET['value1'];
             $data = array(
                'nav_url' => $value1
            );
             $res = $db->edit('nav',$data,"nav_id = $id");
         }
          if(!empty($_GET['value2'])) {
             $value2 = $_GET['value2'];
             $data = array(
                'nav_ord' => $value2
            );
             $res = $db->edit('nav',$data,"nav_id = $id");
         }
          if ($res) {
            echo 1;die;
          } else {
            echo 2;die;
          }
     }
?>

<?php include('header.php');?>
<link rel="stylesheet" href="../include/page/css.css" />
<style type="text/css">
    .nav_name input{
        width:100%;
        height:28px;
        line-height:28px;
        border:none;
        outline:none;
        background:rgba(255,255,255,0);
    }
    .nav_on input{
        border:1px solid #666;
        outline:skyblue;
        background:rgba(255,255,255,0.8);
    }
    .nav_url input{
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
    .nav_ord input{
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
        <li class="active">导航管理</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-12">
			<div class="panel">
                <div class="panel-heading">
                  <div class="panel-title">导航列表</div>
                  <a href="nav_add.php" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加导航</a>
                </div>
                <form action="" method="post">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active">
                        <th class="text-center" width="100"><input type="checkbox" value="" id="checkall" class=""> 全选</th>
                        <th>序号</th>
                        <th>导航名称</th>
                        <th>导航url</th>
                        <th>导航排序</th>
                        <th width="200">操作</th>
                      </tr>
                      <?php foreach($data as $v) {?>
                          <tr class="success">
                              <td class="text-center"><input type="checkbox" value="<?php echo $v['nav_id'];?>" name="idarr[]" class="cbox"></td>
                              <td><?php echo $a++;?></td>
                              <td class="nav_name">
                                  <input type="text" value="<?php echo $v['nav_name'];?>" readonly data_id="<?php echo $v['nav_id'];?>"/>
                              </td>
                              <td class="nav_url">
                                  <input type="text" value="<?php echo $v['nav_url'];?>" readonly data_id="<?php echo $v['nav_id'];?>"/>
                              </td>
                              <td class="nav_ord">
                                  <input type="text" value="<?php echo $v['nav_ord'];?>" readonly data_id="<?php echo $v['nav_id'];?>"/>

                              </td>
                              <td>
                                  <div class="btn-group">
                                      <a href="nav_edit.php?nav_id=<?php echo $v['nav_id'];?>" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
                                      <a onclick="return confirm('确定要删除吗？');" href="?nav_id=<?php echo $v['nav_id'];?>" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
                                  </div>
                              </td>
                          </tr>
                      <?php }?>
                      
                  </table>
                  
                 <div class="pull-left">
                        <button type="submit" class="btn btn-default btn-gradient pull-right delall" name="btn" value="1" ><span class="glyphicons glyphicon-trash"></span></button>
                  </div>

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
<script src="js/nav.js"></script>
</html>