<?php 
  include('../include/config.php');
  include('../include/Page.class.php');

    //分页
    if (!empty($_GET['page'])) {
        $current = $_GET['page'];
    } else {
        $current = 1;
    }
    $limit = 4;
    $size = 3;
    $con = ($current-1)*$limit;

  //删除
  if (!empty($_GET['del_id'])) {
    $del_id = $_GET['del_id'];
    $res = $db->del('single', "sin_id = $del_id");
    if ($res) {
        show_msg('删除成功','single_list.php');
    } else {
        show_msg('数据有误，请重试...');
    }
  }

//批量删除
if ($_POST) {
    $btn = $_POST['btn'];
    $idarr = $_POST['idarr'];
    $idstr = implode(',', $idarr);

//批量删除
    if ($btn == 1) {
        $res = $db->del('single', "sin_id IN($idstr)");
        if ($res) {
            show_msg('批量删除成功', 'single_list.php');
        } else {
            show_msg('数据执行有误，请重试...');
        }
    }
}

    //判断搜索的情况
    if (!empty($_GET['sin_name']) || !empty($_GET['art_title'])) {
        $where = '';
        //有搜索的情况，有标签名称关键词搜索
        if (!empty($_GET['sin_name'])) {
            $sin_name = $_GET['sin_name'];
            $where .= "sin_name LIKE '%$sin_name%' AND ";
        } else {
            $sin_name = '搜索标签名称关键词';
        }
        //有文章标题关键字搜索的情况
        if (!empty($_GET['art_title'])) {
            $art_title = $_GET['art_title'];
            $where .= "art_title LIKE '%$art_title%' AND ";
        } else {
            $art_title= '搜索文章标题关键词';
        }
        $where = rtrim($where, "AND ");

         //带条件查询总数的SQL语句
        $count = $db->select_count_morer('single','find','article','sin_id','art_id',$where);
        //带条件查询数据的SQL语句
         $data = $db->join_all_more('single','find','article','sin_id','art_id','a.sin_id,a.sin_name,c.art_title',"$where ORDER BY sin_addtime ASC LIMIT $con, $limit");
    } else {
        //没有搜索的情况
        $sin_name = '搜索标签名称关键词';
        $art_title= '搜索文章标题关键词';

         //不带条件的查询总数的SQL语句
        $count = $db->select_count_more('single','find','sin_id');
        //不带条件的查询数据的SQL语句
        $data = $db->join_all_more('single','find','article','sin_id','art_id','a.sin_id,a.sin_name,c.art_title',"1 ORDER BY sin_addtime ASC LIMIT $con, $limit");
    }
    //执行查询总数的查询数据的SQL 语句
    $page = new Page($current, $count, $limit, $size,'black2');
    $show = $page->page();

     if(!empty($_GET['value'])) {
         $id = $_GET['id'];
         $value = $_GET['value'];
         $data = array(
            'sin_name' => $value
         );
         $res = $db->edit('single',$data,"sin_id = $id");
          if ($res) {
            echo 1;die;
          } else {
            echo 2;die;
          }
     }
?>
  <?php include('header.php');?>
<style type="text/css">
    .form{
        float:left;
        margin-left:7px;
    }
    .form-control{
        float:left;
        width:200px;
        margin-left:10px;
    }
    .submit{
        margin-left:10px;
    }
     .sin_name input{
        width:100%;
        height:28px;
        line-height:28px;
        border:none;
        outline:none;
        background:rgba(255,255,255,0);
    }
    .sin_on input{
        border:1px solid #666;
        outline:skyblue;
        background:rgba(255,255,255,0.8);
    }
</style>
<link rel="stylesheet" href="../include/page/css.css">
  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">标签管理</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-12">
			<div class="panel">
                <div class="panel-heading">
                  <div class="panel-title">标签列表</div>
                    <form action="" method="get" class="form">
                        <input type="text" class="form-control" name="sin_name" value="" placeholder="<?php echo $sin_name;?>"/>
                        <input type="text" class="form-control" name="art_title" value="" placeholder="<?php echo $art_title;?>"/>
                        <button type="sumbit" class="submit btn btn-blue" name="search" value="1">搜索</button>
                    </form>

                  <a href="single_add.php" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加标签</a>
                </div>
                <form action="" method="post">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active">
                        <th class="text-center" width="100"><input type="checkbox" value="" id="checkall" class=""> 全选</th>
                        <th>序号</th>
                        <th>标签名称</th>
                        <th>文章标题</th>
                        <th width="200">操作</th>
                      </tr>
                      <?php foreach($data as $v) {?>
                          <tr class="success">
                            <td class="text-center"><input type="checkbox" value="<?php echo $v['page_id'];?>" name="idarr[]" class="cbox"></td>
                            <td><?php echo ++$con;?></td>
                            <td class="sin_name">
                                <input type="text" value="<?php echo $v['sin_name'];?>" readonly data_id="<?php echo $v['sin_id'];?>"/>
                            </td>
                            <td width="350"><?php echo $v['art_title'];?></td>
                            <td>
                              <div class="btn-group">
                                <a href="single_edit.php?sin_id=<?php echo $v['sin_id'];?>" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
                                <a onclick="return confirm('确定要删除吗？');" href="?del_id=<?php echo $v['page_id'];?>" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
                              </div>
                            </td>
                          </tr>                      
                      <?php }?>
                  </table>

                  <div class="pull-left">
                        <button type="submit" class="btn btn-default btn-gradient pull-right delall" name="btn" value="1" ><span class="glyphicons glyphicon-trash"></span></button>
                  </div>
                 <div><?php echo $show;?></div>

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
<script src="js/single.js"></script>
</html>