<?php /* Smarty version Smarty-3.1.16, created on 2019-11-04 00:58:56
         compiled from "templates\ganhuo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18572301755dbc27a0924548-13404029%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4da0c914437d7bb1db1254d73272042919bef150' => 
    array (
      0 => 'templates\\ganhuo.tpl',
      1 => 1572795537,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18572301755dbc27a0924548-13404029',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5dbc27a0992947_04483837',
  'variables' => 
  array (
    'orign' => 0,
    'web' => 0,
    'single' => 0,
    'v' => 0,
    'list' => 0,
    'show' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dbc27a0992947_04483837')) {function content_5dbc27a0992947_04483837($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\laragon\\www\\blog\\include\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<link rel="stylesheet" href="include/page/css.css">
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
</aside>

<article class="box">
 <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
   <section class="list">
       <h2 class=" mecctitle   ">
            <a href="art_detail.php?art_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['art_id'];?>
"  target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['art_title'];?>
</a>
       </h2>

       <span class="titleimg"> <a href="art_detail.php?art_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['art_id'];?>
"  target="_blank">
  <img width="1000" height="556" src="static/thumb/<?php echo $_smarty_tpl->tpl_vars['v']->value['art_thumb'];?>
"  class="attachment-thumbnail size-thumbnail wp-post-image" alt=""  />  </a>
  <a href="art_detail.php?art_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['art_id'];?>
"  target="_blank">   </a>
 <a href="art_detail.php?art_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['art_id'];?>
"  target="_blank">  </a>
   </span>
    <time  class="  "><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['art_addtime'],"%Y-%m-%d");?>
</time>
  <div class="zaiyao">
    <p><?php echo $_smarty_tpl->tpl_vars['v']->value['art_summary'];?>
</p>
  </div>
</section>
 <?php } ?>

</article>

<div style="clear: both"></div>
<div><?php echo $_smarty_tpl->tpl_vars['show']->value;?>
</div>

</div>
<!--Container End-->
<!- 底部 -!>
<?php echo $_smarty_tpl->getSubTemplate ("bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


</body></html><?php }} ?>
