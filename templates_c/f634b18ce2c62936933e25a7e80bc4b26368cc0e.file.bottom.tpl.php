<?php /* Smarty version Smarty-3.1.16, created on 2019-11-03 06:41:13
         compiled from "templates\bottom.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12165288225dbc06d9a8bc59-98409585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f634b18ce2c62936933e25a7e80bc4b26368cc0e' => 
    array (
      0 => 'templates\\bottom.tpl',
      1 => 1572763263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12165288225dbc06d9a8bc59-98409585',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5dbc06d9a8db86_10007549',
  'variables' => 
  array (
    'sing' => 0,
    'weixin' => 0,
    'weixin2' => 0,
    'nav1' => 0,
    'v' => 0,
    'icp' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dbc06d9a8db86_10007549')) {function content_5dbc06d9a8db86_10007549($_smarty_tpl) {?><footer id="dibu-main">
	  <div class="bottomlist">
      <div class="xinlan"> <a href="<?php echo $_smarty_tpl->tpl_vars['sing']->value['banner_url'];?>
.php"  target="_blank" ><img src="static/upload/<?php echo $_smarty_tpl->tpl_vars['sing']->value['banner_path'];?>
"  alt="<?php echo $_smarty_tpl->tpl_vars['sing']->value['banner_title'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['sing']->value['banner_title'];?>
"></a> </div>
      <div class="weixin2">
        <div class="weixin"><img src="static/upload/<?php echo $_smarty_tpl->tpl_vars['weixin']->value['banner_path'];?>
"  alt="<?php echo $_smarty_tpl->tpl_vars['weixin']->value['banner_title'];?>
"  title="<?php echo $_smarty_tpl->tpl_vars['weixin']->value['banner_title'];?>
"> <img src="static/upload/<?php echo $_smarty_tpl->tpl_vars['weixin2']->value['banner_path'];?>
"  class="xixii" alt="<?php echo $_smarty_tpl->tpl_vars['weixin2']->value['banner_title'];?>
" ></div>
      </div>
    </div>

<div class="bottom">
	<ul class="botop">
	    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['nav1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
	    <li id="" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['nav_url'];?>
.php" ><?php echo $_smarty_tpl->tpl_vars['v']->value['nav_name'];?>
</a></li>
        <?php } ?>

</ul>

	   <div class="botext"><a href="index.php"  rel="external nofollow" target="_blank"><?php echo $_smarty_tpl->tpl_vars['icp']->value['con_value'];?>
</a> </div>
        <div class="tongji"><script> var _hmt = _hmt || []; (function() {   var hm = document.createElement("script");   hm.src = "hm.baidu.com/hm.js-53b746b81800e69344039be9616cd518.js"   var s = document.getElementsByTagName("script")[0];    s.parentNode.insertBefore(hm, s); })(); </script></div>
    </div>
  </div>

    <div class="off">
  <div class="scroll" id="scroll" style="display:none;"> ︿ </div>
  </div>
  <script type="text/javascript">
	$(function(){
		showScroll();
		function showScroll(){
			$(window).scroll( function() {
				var scrollValue=$(window).scrollTop();
				scrollValue > 500 ? $('div[class=scroll]').fadeIn():$('div[class=scroll]').fadeOut();
			} );
			$('#scroll').click(function(){
				$("html,body").animate({scrollTop:0},1224);
			});
		}
	})
	</script>
</footer>
<!--dibu-->
<script type='text/javascript' src="static/js/wp-embed.min.js" ></script><?php }} ?>
