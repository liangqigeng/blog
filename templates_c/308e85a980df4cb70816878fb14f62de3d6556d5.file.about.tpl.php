<?php /* Smarty version Smarty-3.1.16, created on 2019-11-03 07:24:37
         compiled from "templates\about.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7939997585dbc2805591126-67907925%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '308e85a980df4cb70816878fb14f62de3d6556d5' => 
    array (
      0 => 'templates\\about.tpl',
      1 => 1572765851,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7939997585dbc2805591126-67907925',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5dbc28055ca533_33440793',
  'variables' => 
  array (
    'about' => 0,
    'photo1' => 0,
    'photo2' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dbc28055ca533_33440793')) {function content_5dbc28055ca533_33440793($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!--content-web-->

<article class="box-single">
      
      <h1 class="pagetitle"><?php echo $_smarty_tpl->tpl_vars['about']->value['page_name'];?>
</h1>

      <div class="content-text">
        <div id='gallery-1' class='gallery galleryid-2 gallery-columns-1 gallery-size-full'><dl class='gallery-item'>
			<dt class='gallery-icon landscape'>
				<img width="1350" height="542" src="static/upload/<?php echo $_smarty_tpl->tpl_vars['photo1']->value['banner_path'];?>
"  class="attachment-full size-full" alt="" sizes="(max-width: 1350px) 100vw, 1350px" />
			</dt></dl><br style="clear: both" />
		</div>

<div id='gallery-2' class='gallery galleryid-2 gallery-columns-3 gallery-size-thumbnail'>
		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['photo2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			<dl class='gallery-item'>
			<dt class='gallery-icon landscape'>
				<a href="static/upload/<?php echo $_smarty_tpl->tpl_vars['v']->value['banner_path'];?>
" ><img width="1000" height="556" src="static/thumb/<?php echo $_smarty_tpl->tpl_vars['v']->value['thumb_path'];?>
"  class="attachment-thumbnail size-thumbnail" alt="" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</dt></dl>
		<?php } ?>
		<br style="clear: both" />
		</div>
		<?php echo $_smarty_tpl->tpl_vars['about']->value['page_content'];?>

      </div>
      <!--content_text-->
          </article>
<!- 底部 -!>
<?php echo $_smarty_tpl->getSubTemplate ("bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


</body></html><?php }} ?>
