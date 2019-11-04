<?php /* Smarty version Smarty-3.1.16, created on 2019-11-03 15:41:59
         compiled from "templates\art_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14195023555dbc66ad372ab4-85938240%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02bc29b36b4dd987b3010cf3a8de3e43657db8c3' => 
    array (
      0 => 'templates\\art_detail.tpl',
      1 => 1572795711,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14195023555dbc66ad372ab4-85938240',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5dbc66ad3ac066_77880276',
  'variables' => 
  array (
    'orign' => 0,
    'web' => 0,
    'single' => 0,
    'v' => 0,
    'content' => 0,
    'commit' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dbc66ad3ac066_77880276')) {function content_5dbc66ad3ac066_77880276($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\laragon\\www\\blog\\include\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!--content-web-->
<div id="container-page">
 <aside id="sitebar">
   <div class="sitebar_list">
      <a href=""  target="_blank"><img width="364" height="182" src="static/upload/<?php echo $_smarty_tpl->tpl_vars['orign']->value['banner_path'];?>
"  class="image wp-image-2095  attachment-full size-full" alt="" style="max-width: 100%; height: auto;" /></a></div>
      <div class="sitebar_list"><h4 class="sitebar_title"><?php echo $_smarty_tpl->tpl_vars['web']->value['banner_title'];?>
</h4>
         <div class="tagcloud">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['single']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                <a href="index.php?sin_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['sin_id'];?>
"  class="tag-cloud-link tag-link-51 tag-link-position-1" style="font-size: 15px;"><?php echo $_smarty_tpl->tpl_vars['v']->value['sin_name'];?>
</a>
             <?php } ?>
         </div>
      </div>
<a href=""  target="_blank" ><img class="totop" src="static/upload/<?php echo $_smarty_tpl->tpl_vars['web']->value['banner_path'];?>
"  /></a>
   <script type="text/javascript"> 
$(function() { 
    var elm = $('.totop'); 
    var startPos = $(elm).offset().top; 
    $.event.add(window, "scroll", function() { 
        var p = $(window).scrollTop(); 
        $(elm).css('position',((p) > startPos) ? 'fixed' : 'static'); 
        $(elm).css('top',((p) > startPos) ? '0px' : ''); 
    }); 
}); 
</script>
</aside>  <article class="box">
       <h1 class="singletitle"><?php echo $_smarty_tpl->tpl_vars['content']->value['art_title'];?>
</h1>
       <p class="p2"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['content']->value['art_addtime'],"%Y-%m-%d");?>
 - <?php echo $_smarty_tpl->tpl_vars['content']->value['art_author'];?>
</p>
       <div class="content-text"><?php echo $_smarty_tpl->tpl_vars['content']->value['art_content'];?>

	   <p style="text-align: center;"><strong>- END -</strong></p>
	   
	   <div class="bdf">
	   <div class="yue"><?php echo $_smarty_tpl->tpl_vars['content']->value['art_visit'];?>
</div>
	   <div class="post-like">
            <a href="javascript:;" data-action="ding" data-id="102" class="favorite"><span class="count"><?php echo $_smarty_tpl->tpl_vars['content']->value['art_thanks'];?>
</span>
            </a>
       </div>
</div>
	</div>
    <!--content_text-->
<div class="comment" id="comments">
<div id="respond">
  <form action=""  method="post" id="commentform" >
    <textarea name="comment" id="comment"  rows="3" tabindex="5" placeholder="你有什么要说的 ..." ></textarea>
      <input type="hidden" name="art_id" value="<?php echo $_smarty_tpl->tpl_vars['content']->value['art_id'];?>
">
    <input name="submit" type="submit" id="submit" tabindex="2" value="回复" />
  </form>
  </div>

<ol id="comment">
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['commit']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
  <li id="comment-993"> <span> <img src="static/images/none.jpg"  class="avatar avatar-120" height="120" width="120"> </span>
  <div class="mhcc">
    <address>
  <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['com_addtime'],"%Y.%m.%d");?>
 - <?php echo $_smarty_tpl->tpl_vars['v']->value['com_name'];?>

    </address>
        <p><?php echo $_smarty_tpl->tpl_vars['v']->value['com_content'];?>
</p>
  </div>
  </li>
  <?php } ?>


</ol>
    </div>	

    <!--相关文章-->
  </article>
 </div>
<!- 底部 -!>

<?php echo $_smarty_tpl->getSubTemplate ("bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


</body></html><?php }} ?>
