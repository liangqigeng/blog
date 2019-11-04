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
    $res = $db->del('find', "fin_id = $del_id");
    if ($res) {
        show_msg('删除成功','find_list.php');
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
        $res = $db->del('find', "fin_id IN($idstr)");
        if ($res) {
            show_msg('批量删除成功', 'find_list.php');
        } else {
            show_msg('数据执行有误，请重试...');
        }
    }
//批量修改文章标签查询
    if ($btn == 2) {
        $sin_id = $_POST['sin_id'];
        $art_id = $_POST['art_id'];
        if (!empty($sin_id)) {
            $data = array(
                'sin_id' => $sin_id
            );
            $res = $db->edit('find', $data, "fin_id IN($idstr)");
        }
        if (!empty($art_id)) {
            $data = array(
                'art_id' => $art_id
            );
            $res = $db->edit('find', $data, "fin_id IN($idstr)");
        }
        if ($res) {
            show_msg('批量修改文章标签查询成功', 'find_list.php');
        } else {
            show_msg('数据有误，请重试...');
        }

    }
}

    //判断搜索的情况
    if (!empty($_GET['sin_id']) || !empty($_GET['art_id'])) {
        $where = '';
        //有搜索的情况，有名称关键词搜索
        if (!empty($_GET['sin_id'])) {
            $sin_id = $_GET['sin_id'];
            $where .= "sin_id = $sin_id AND ";
        } else {
            $sin_id = '搜索标签外键关键词';
        }
        //有分类搜索的情况
        if (!empty($_GET['art_id'])) {
            $art_id = $_GET['art_id'];
            $where .= "art_id = $art_id AND ";
        } else {
            $art_id= '搜索文章外键关键词';
        }
        $where = rtrim($where, "AND ");

         //带条件查询总数的SQL语句
        $count = $db->select_count('find',$where);
        //带条件查询数据的SQL语句
        $data = $db->select_all('find','*',"$where LIMIT $con, $limit");
//        echo $sql;die;
    } else {
        //没有搜索的情况
        $sin_id = '搜索标签外键关键词';
        $art_id= '搜索文章外键关键词';

         //不带条件的查询总数的SQL语句
         $count = $db->select_count('find');
        //不带条件的查询数据的SQL语句
        $data = $db->select_all('find','*',"1 LIMIT $con, $limit");
    }
    //执行查询总数的查询数据的SQL 语句
    $page = new Page($current, $count, $limit, $size,'black2');
    $show = $page->page();

     if(!empty($_GET['value'])||!empty($_GET['value1'])) {
         $id = $_GET['id'];
         if(!empty($_GET['value'])) {
             $value = $_GET['value'];
             $data = array(
                'sin_id' => $value
            );
             $res = $db->edit('find',$data,"fin_id = $id");
         }
          if(!empty($_GET['value1'])) {
             $value1 = $_GET['value1'];
             $data = array(
                'art_id' => $value1
            );
             $res = $db->edit('find',$data,"fin_id = $id");
         }
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
     .sin_id input{
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
     .art_id input{
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
</style>
<link rel="stylesheet" href="../include/page/css.css">
  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">文章标签查询管理</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-12">
			<div class="panel">
                <div class="panel-heading">
                  <div class="panel-title">文章标签查询列表</div>
                    <form action="" method="get" class="form">
                        <input type="text" class="form-control" name="sin_id" value="" placeholder="<?php echo $sin_id;?>"/>
                        <input type="text" class="form-control" name="art_id" value="" placeholder="<?php echo $art_id;?>"/>
                        <button type="sumbit" class="submit btn btn-blue" name="search" value="1">搜索</button>
                    </form>

                  <a href="find_add.php" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加文章标签查询</a>
                </div>
                <form action="" method="post">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active">
                        <th class="text-center" width="100"><input type="checkbox" value="" id="checkall" class=""> 全选</th>
                        <th>序号</th>
                        <th>标签外键</th>
                        <th>文章外键</th>
                        <th width="200">操作</th>
                      </tr>
                      <?php foreach($data as $v) {?>
                          <tr class="success">
                            <td class="text-center"><input type="checkbox" value="<?php echo $v['fin_id'];?>" name="idarr[]" class="cbox"></td>
                            <td><?php echo ++$con;?></td>
                            <td class="sin_id">
                                <input type="text" value="<?php echo $v['sin_id'];?>" readonly data_id="<?php echo $v['fin_id'];?>"/>
                            </td>
                            <td class="art_id">
                                <input type="text" value="<?php echo $v['art_id'];?>" readonly data_id="<?php echo $v['fin_id'];?>"/>
                            </td>
                            <td>
                              <div class="btn-group">
                                <a href="find_edit.php?fin_id=<?php echo $v['fin_id'];?>" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
                                <a onclick="return confirm('确定要删除吗？');" href="?del_id=<?php echo $v['fin_id'];?>" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
                              </div>
                            </td>
                          </tr>                      
                      <?php }?>
                  </table>

                  <div class="pull-left">
                        <button type="submit" class="btn btn-default btn-gradient pull-right delall" name="btn" value="1" ><span class="glyphicons glyphicon-trash"></span></button>
                        <input type="text" placeholder="批量修改标签外键" name="sin_id" >
                        <input type="text" placeholder="批量修改文章外键" name="art_id" >
                        <button type="submit" class="submit btn btn-blue" name="btn" value="2">批量修改</button>
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
<script src="js/find.js"></script>
</html>