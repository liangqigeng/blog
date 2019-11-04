<?php
include('../include/config.php');
//查询分类的数据
$cat = $db->select_all('cat_art','*','1 ORDER BY cat_ord ASC');
if ($_POST) {
    $art_addtime = !empty($_POST['art_addtime'])?strtotime($_POST['art_addtime']):time();
    $data = array(
        'art_title' => $_POST['art_title'],
        'art_summary' => $_POST['art_summary'],
        'art_author' => $_POST['art_author'],
        'art_visit' => $_POST['art_visit'],
        'art_thanks' => $_POST['art_thanks'],
        'art_content' => $_POST['art_content'],
        'art_addtime' => $art_addtime,
        'art_ord' => $_POST['art_ord'],
        'is_show' => $_POST['is_show'],
        'cat_id' => $_POST['cat_id']
    );
        $str = upload('art_img');
        $arr = explode(',' ,$str);
        //只有上传成功才有图片名称$arr
        if ($arr[0]=='图片上传成功') {
            //需要存入数据库的图片名称
            $data['art_img'] = $arr[1];
            //做缩略图，先准备好大图的路径
            $path = '../static/upload/'.$arr[1];
             //得到的结果是缩略图折图片名称
            $thumb_path = thumb($path);
            //存入数据库
            $data['art_thumb'] = $thumb_path;
        } else {
            show_msg($arr[0]);
        }

    $res = $db->add('article', $data);
    if ($res) {
        show_msg('添加成功', 'article_list.php');
    } else {
        show_msg('数据有误，请重试...');
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
  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">添加文章</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-10 col-lg-8 center-column">
        <form action="#" method="post" class="cmxform" enctype="multipart/form-data">
        	<div class="panel">
            <div class="panel-heading">
              <div class="panel-title">添加文章</div>
              <div class="panel-btns pull-right margin-left">
              <a href="new_list.php" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	  <div class="col-md-7">
                          
                <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">所属分类</span>
                    <select name="cat_id" class="form-control">
                          <option value="">请选择分类</option>
                              <?php foreach($cat as $v) {?>
                                  <option value="<?php echo $v['cat_id'];?>"><?php echo $v['cat_name'];?></option>
                              <?php }?>
                    </select>
                  </div>
                </div>
                 <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">文章图片</span>
                          <input type="file" name="art_img" value="" class="form-control" id="upload">
                          <label for="upload" style="margin-bottom:0;">
                              <img src="images/upload.png" alt="" id="img">
                          </label>
                      </div>
                </div>
               <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">文章标题</span>
                      <input type="text" name="art_title" value="" class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group"> <span class="input-group-addon">文章概括</span>
                      <input type="text" name="art_summary" value="" class="form-control">
                  </div>
               </div>
                <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">文章作者</span>
                          <input type="text" name="art_author" value="" class="form-control">
                      </div>
                </div>
                 <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">文章访问数</span>
                          <input type="text" name="art_visit" value="" class="form-control">
                      </div>
                </div>
                 <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">文章点赞数</span>
                          <input type="text" name="art_thanks" value="" class="form-control">
                      </div>
                </div>
                <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">添加时间</span>
                          <input type="date" name="art_addtime" value="" class="form-control">
                      </div>
                </div>

                <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">文章排序</span>
                          <input type="number" name="art_ord" value="" class="form-control">
                      </div>
                </div>
                <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">是否显示</span>
                          <select name="is_show" class="form-control">
                              <option value="1">显示</option>
                              <option value="2">不显示</option>
                          </select>
                      </div>
                </div>
                </div>

                <div class="form-group col-md-12">
                  <script type="text/plain" id="myEditor" style="width:100%;height:200px;" name="art_content">
					<p></p>
				  </script>
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
<link type="text/css" rel="stylesheet" href="umeditor/themes/default/_css/umeditor.css" />
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