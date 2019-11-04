<?php
include('../include/config.php');
//接收地址栏的参数
$art_id = $_GET['art_id'];
//通过这个主键做为条件查询当前详细数据
$article = $db->select_one('article','*',"art_id = $art_id");

if ($_POST) {
    $data = array(
        'art_title' => $_POST['art_title'],
        'art_summary' => $_POST['art_summary'],
        'art_author' => $_POST['art_author'],
        'art_visit' => $_POST['art_visit'],
        'art_thanks' => $_POST['art_thanks'],
        'art_content' => $_POST['art_content'],
        'art_addtime' => strtotime($_POST['art_addtime']),
        'art_ord' => $_POST['art_ord'],
        'is_show' => $_POST['is_show'],
        'cat_id' => $_POST['cat_id']
    );
    //接收隐藏域
    $art_id = $_POST['art_id'];
    //只有编辑图片的情况下才执行图片上传
    if ($_FILES['art_img']['size']) {
        //先删除旧图片,查询旧图片的地址
        $old_arr = $db->select_one('article','art_img,art_thumb',"art_id = $art_id");
        //旧图片的图片名称
        $old_path = $old_arr['art_img'];
         //旧缩略图图片的图片名称
        $old_thumb = $old_arr['art_thumb'];
        //旧图片完整地址
        $path = '../static/upload/'.$old_path;
        //旧缩略图图片完整地址
            $thumb_path = '../static/thumb/'.$old_thumb;
        //有旧图片的情况就删除
        if (!empty($old_path) && file_exists($path)) {
            unlink($path);
        }
         //有旧缩略图图片的情况就删除
            if (!empty($old_thumb) && file_exists($thumb_path)) {
                unlink($thumb_path);
         }
        $str = upload('art_img');
        $arr = explode(',', $str);
        if ($arr[0] == '图片上传成功') {
            $data['art_img'] = $arr[1];
            $path ='../static/upload/'.$arr[1];
                //得到的结果是缩略图的名称
            $thumb_path = thumb($path);
            $data['art_thumb'] =$thumb_path;
        } else {
            show_msg($arr[0]);
        }
    }
    $res = $db->edit('article', $data,"art_id = $art_id");
    if ($res) {
        show_msg('修改成功！', 'article_list.php');
    } else {
        show_msg('数据有误，请重试...');
    }
}
    $cat = $db->select_all('cat_art','*','1 ORDER BY cat_ord ASC');
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
  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">修改文章</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-10 col-lg-8 center-column">
        <form action="#" method="post" class="cmxform" enctype="multipart/form-data">
        	<div class="panel">
            <div class="panel-heading">
              <div class="panel-title">修改文章</div>
              <div class="panel-btns pull-right margin-left">
              <a href="article_list.php" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	  <div class="col-md-7">
            	  <input type="hidden" name="art_id" value="<?php echo $article['art_id'];?>">
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">所属分类</span>
                    <select name="cat_id" class="form-control">
                        <option value="">请选择分类</option>
                        <?php foreach($cat as $v) {?>
                            <option value="<?php echo $v['cat_id'];?>"
                                <?php echo $article['cat_id'] == $v['cat_id']? 'selected':'';?>>
                                <?php echo $v['cat_name'];?>
                            </option>
                        <?php }?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">文章图片</span>
                          <input type="file" name="art_img" value="" class="form-control" id="upload">
                          <label for="upload" style="margin-bottom:0;">
                            <?php if(!empty($article['art_img'])) {?>
                                <img src="../static/upload/<?php echo $article['art_img'];?>" alt="" id="img">
                            <?php } else {?>
                                <img src="images/images.png" alt="" id="img">
                           <?php }?>
                          </label>
                      </div>
                </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">文章标题</span>
                              <input type="text" name="art_title" value="<?php echo $article['art_title'];?>" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">文章概括</span>
                              <input type="text" name="art_summary" value="<?php echo $article['art_summary'];?>" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">文章作者</span>
                              <input type="text" name="art_author" value="<?php echo $article['art_author'];?>" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">文章访问数</span>
                          <input type="text" name="art_visit" value="<?php echo $article['art_visit'];?>" class="form-control">
                      </div>
                     </div>
                     <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">文章点赞数</span>
                          <input type="text" name="art_thanks" value="<?php echo $article['art_thanks'];?>" class="form-control">
                      </div>
                     </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">修改时间</span>
                              <input type="date" name="art_addtime" value="<?php echo date('Y-m-d', $article['art_addtime']);?>" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">文章排序</span>
                              <input type="number" name="art_ord" value="<?php echo $article['art_ord'];?>" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group"> <span class="input-group-addon">是否显示</span>
                              <select name="is_show" class="form-control">
                                  <option value="1" <?php echo $article['is_show']==1?'selected':'';?>>显示</option>
                                  <option value="2" <?php echo $article['is_show']==2?'selected':'';?>>不显示</option>
                              </select>
                          </div>
                      </div>
                  </div>

                <div class="form-group col-md-12">
                  <script type="text/plain" id="myEditor" style="width:100%;height:200px;" name="art_content">
					<p><?php echo $article['art_content'];?></p>
                  </script>
                </div>
                <div class="col-md-7">
	                <div class="form-group">
	                  <input type="submit" value="提交" class="submit btn btn-blue">
	                </div>
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
<link type="text/css" rel="stylesheet" href="umeditor/themes/default/_css/umeditor.css" >
<script src="umeditor/umeditor.config.js" type="text/javascript"></script>
<script src="umeditor/editor_api.js" type="text/javascript"></script>
<script src="umeditor/lang/zh-cn/zh-cn.js" type="text/javascript"></script>
<script type="text/javascript">
var ue = UM.getEditor('myEditor',{
    autoClearinitialContent:false,
    wordCount:false,
    elementPathEnabled:false,
    initialFrameHeight:300
});
</script>
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
    $('#upload').change(function(){
        var url=getObjectURL(this.files[0]);
        if(url){
            $('#img').attr('src',url);
        }
    })
</script>
</body>

</html>