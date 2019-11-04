<?php
    include('../include/config.php');
    include('../include/Page.class.php');
    //分页
    if (!empty($_GET['page'])) {
        $current = $_GET['page'];
    } else {
        $current = 1;
    }
    $limit = 5;
    $size = 3;
    $con = ($current-1)*$limit;

    //判断搜索的情况
    if (!empty($_GET['art_title']) || !empty($_GET['cat_id'])) {
        $where = '';
        //有搜索的情况，有标题关键词搜索
        if (!empty($_GET['art_title'])) {
            $art_title = $_GET['art_title'];
            $where .= "a.art_title LIKE '%$art_title%' AND ";
        } else {
            $art_title = '搜索标题关键词';
        }
        //有分类搜索的情况
        if (!empty($_GET['cat_id'])) {
            $cat_id = $_GET['cat_id'];
            $where .= "a.cat_id = $cat_id AND ";
//            echo $where;
        } else {
            $cat_id = 0;
        }
        $where = rtrim($where, "AND ");
        //带条件查询总数的SQL语句
        $count = $db->select_count('article',$where);
        //带条件查询数据的SQL语句
         $new = $db->join_all('article','cat_art','cat_id','a.*, b.cat_name',"$where ORDER BY a.art_addtime ASC LIMIT $con, $limit");
    } else {
        //没有搜索的情况
        $art_title = '搜索标题关键词';
        $cat_id = 0;
        //不带条件的查询总数的SQL语句
         $count = $db->select_count('article');
        //不带条件的查询数据的SQL语句
        $new = $db->join_all('article','cat_art','cat_id','a.*, b.cat_name',"1 ORDER BY a.art_addtime ASC LIMIT $con, $limit");
    }
        $page = new Page($current, $count, $limit, $size,'black2');
        $show = $page->page();

        $cat = $db->select_all('cat_art','*','1 ORDER BY  cat_ord ASC');

    //单条删除
    if (!empty($_GET['del_id'])) {
        $del_id = $_GET['del_id'];
         //先删除旧图片,查询旧图片的地址
        $old_arr = $db->select_one('article','art_img,art_thumb',"art_id = $del_id");
        //旧图片的图片名称
        $old_path = $old_arr['art_img'];
        //旧缩略图图片的图片名称
        $old_thumb = $old_arr['art_thumb'];
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
        $res = $db->del('article', "art_id = $del_id");
        if ($res) {
            show_msg('删除成功','article_list.php');
        } else {
            show_msg('数据有误，请重试...');
        }
    }
    //批量删除
    if ($_POST && !empty($_POST['idarr'])) {
        $btn = $_POST['btn'];
        $idarr = $_POST['idarr'];
        $idstr = implode(',', $idarr);
        //批量删除
        if ($btn ==1) {
                 //先删除旧图片,查询旧图片的地址
        $old_arr = $db->select_all('article','art_img,art_thumb',"art_id IN ($idstr)");
        foreach($old_arr as $v) {
             //旧图片的图片名称
        $old_path = $v['art_img'];
        //旧缩略图图片的图片名称
        $old_thumb = $v['art_thumb'];
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
     }

                $res = $db->del('article', "art_id IN($idstr)");
                if ($res) {
                    show_msg('批量删除成功', 'article_list.php');
                } else {
                    show_msg('数据执行有误，请重试...');
                }
        }
        //批量修改分类
        if ($btn==2) {
            $cat_id = $_POST['cat_id'];
            if (!empty($cat_id)) {
                $data = array(
                    'cat_id' => $cat_id
                );
                $res = $db->edit('article', $data, "art_id IN($idstr)");
                if ($res) {
                    show_msg('批量修改分类成功', 'article_list.php');
                } else {
                    show_msg('数据有误，请重试...');
                }

            }
        }
    }

    if(!empty($_GET['show'])) {
        $id = $_GET['id'];
        $show = $_GET['show'];
        if ($show==1) {
            $data = array(
                'is_show' => 2,
            );
        } else {
            $data = array(
                'is_show' => 1,
            );
        }
        $res = $db->edit('article',$data,"art_id = $id");
        if ($res) {
            echo 1;die;
        } else {
            echo 2;die;
        }
    }
     if(!empty($_GET['value'])||!empty($_GET['value1'])||!empty($_GET['value2'])||!empty($_GET['value3'])) {
         $id = $_GET['id'];
         if(!empty($_GET['value'])) {
             $value = $_GET['value'];
             $data = array(
                'art_title' => $value
            );
             $res = $db->edit('article',$data,"art_id = $id");
         }
          if(!empty($_GET['value1'])) {
             $value1 = $_GET['value1'];
             $data = array(
                'art_author' => $value1
            );
             $res = $db->edit('article',$data,"art_id = $id");
         }
          if(!empty($_GET['value2'])) {
             $value2 = $_GET['value2'];
             $data = array(
                'art_ord' => $value2
            );
             $res = $db->edit('article',$data,"art_id = $id");
         }
          if(!empty($_GET['value3'])) {
             $value3 = $_GET['value3'];
             $data = array(
                'art_id' => $value3
            );
             $res = $db->edit('article',$data,"art_id = $id");
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
    .art_title input{
        width:100%;
        height:28px;
        line-height:28px;
        border:none;
        outline:none;
        background:rgba(255,255,255,0);
    }

    .art_author input{
        width:100%;
        height:28px;
        line-height:28px;
        border:none;
        outline:none;
        background:rgba(255,255,255,0);
    }
     .art_ord input{
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
  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">文章管理</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-12">
			<div class="panel">
                <div class="panel-heading">
                  <div class="panel-title">文章列表</div>
                    <form action="" method="get" class="form">
                        <input type="text" class="form-control" name="art_title" value="" placeholder="<?php echo $art_title;?>"/>
                        <select name="cat_id" id="" class="form-control">
                            <option value="">请选择分类</option>
                            <?php foreach($cat as $v) {?>
                                <option value="<?php echo $v['cat_id'];?>"
                                <?php echo $cat_id==$v['cat_id']? 'selected':'';?>>
                                <?php echo $v['cat_name'];?>
                                </option>
                            <?php }?>
                        </select>
                        <button type="sumbit" class="submit btn btn-blue" name="search" value="1">搜索</button>
                    </form>

                  <a href="article_add.php" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加文章</a>
                </div>
                <form action="" method="post">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active">
                        <th class="text-center" width="100"><input type="checkbox" value="" id="checkall" class=""> 全选</th>
                        <th>编号</th>
                        <th>文章标题</th>
                        <th>文章图片</th>
                        <th>文章作者</th>
                        <th>排序</th>
                        <th>分类</th>
                        <th>显</th>
                        <th width="200">操作</th>
                      </tr>
                      <?php foreach($new as $v) {?>
                          <tr class="success">
                              <td class="text-center"><input type="checkbox" value="<?php echo $v['art_id'];?>" name="idarr[]" class="cbox"></td>
                              <td><?php echo ++$con;?></td>
                              <td class="art_title">
                                  <input type="text" value="<?php echo $v['art_title'];?>" readonly data_id="<?php echo $v['art_id'];?>"/>
                              </td>
                              <td><img src="../static/upload/<?php echo $v['art_img'];?>" alt="" height="50px"></td>
                              <td class="art_author">
                                 <input type="text" value="<?php echo $v['art_author'];?>" readonly data_id="<?php echo $v['art_id'];?>"/>
                              </td>
                              <td class="art_ord">
                                <input type="text" value="<?php echo $v['art_ord'];?>" readonly data_id="<?php echo $v['art_id'];?>"/>
                              </td>
                              <td><?php echo $v['cat_name'];?></td>
                              <td class="is_show" data_id="<?php echo $v['art_id'];?>" data_value="<?php echo $v['is_show'];?>">
                                <img src="images/<?php echo $v['is_show']==1?'yes':'no';?>.png" alt=""/>
                              </td>
                              <td>
                                  <div class="btn-group">
                                      <a href="article_edit.php?art_id=<?php echo $v['art_id'];?>" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
                                      <a onclick="return confirm('确定要删除吗？');" href="?del_id=<?php echo $v['art_id'];?>" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
                                  </div>
                              </td>
                          </tr>
                      <?php }?>
                      
                  </table>
                  
                  <div class="pull-left">
                  	<button type="submit" class="btn btn-default btn-gradient pull-right delall" name="btn" value="1" ><span class="glyphicons glyphicon-trash"></span></button>
                      <select name="cat_id" class="form-control">
                          <option value="">请选择分类</option>
                          <?php foreach($cat as $v) {?>
                              <option value="<?php echo $v['cat_id'];?>"
                                  <?php echo 'cat_id' == $v['cat_id']? 'selected':'';?>>
                                  <?php echo $v['cat_name'];?>
                              </option>
                          <?php }?>
                      </select>
                      <button type="submit" class="submit btn btn-blue" name="btn" value="2">批量修改分类</button>
                  </div>
                  
                  <div >
                      <?php echo $show;?>
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
<script type="text/javascript" src="js/article.js"></script>
</html>