<?php /* Smarty version Smarty-3.1.16, created on 2019-11-03 05:47:01
         compiled from "templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20687209575dbc06d9a7d7d8-76734402%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20a5b87bf1d249a8e4b5bdf6dc560aa9c65c681a' => 
    array (
      0 => 'templates\\header.tpl',
      1 => 1572759869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20687209575dbc06d9a7d7d8-76734402',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5dbc06d9a7f9c1_95817938',
  'variables' => 
  array (
    'title' => 0,
    'logo' => 0,
    'nav' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dbc06d9a7f9c1_95817938')) {function content_5dbc06d9a7f9c1_95817938($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<title>个人博客-<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" />
<meta name="description" content="有思维,有深度,有内涵的互联网段子！" />
<meta name="keywords" content="柚子皮,段子,营销段子,内涵段子,搞笑段子" />
<link rel="shortcut icon" href="static/themes/gr/images/favicon.ico" />
<link rel='stylesheet' id='sytle-css'  href="static/themes/gr/style.css"  type='text/css' media='all' />
<link rel='stylesheet' id='wp-block-library-css'  href="static/css/dist/block-library/style.min.css" type='text/css' media='all' />
<script type='text/javascript' src="static/themes/gr/js/swiper.min.js"></script>
<script type='text/javascript' src="static/themes/gr/js/html5shiv.js" ></script>
<script type='text/javascript' src="static/themes/gr/js/selectivizr-min.js"></script>
<script type='text/javascript' src="static/themes/gr/js/jquery.min.js"></script>
<script type='text/javascript' src="static/themes/gr/js/jiazai.js"></script>
</head>

<body>
<nav class="header-web">
<div class="ed">
   <a href="index.php"  class="logo" title="Yzipi" rel="home"><img src="static/upload/<?php echo $_smarty_tpl->tpl_vars['logo']->value['con_value'];?>
"  alt="YzipiLogo"></a>

   <button id="toggle-search" class="header-button"></button>
  	<form id="search-form" method="get" class="search" action="" >
      <input class="text" type="text" name="s" placeholder="请输入..." value="">
	  <input class="butto" value="搜索" type="submit">
    </form>

   <div class="nav-menu">
		...
	</div>
	<p id="cover" > </p>
    <ul class="nav-list">
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['nav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <li id="" class="menu-item"><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['nav_url'];?>
.php" ><?php echo $_smarty_tpl->tpl_vars['v']->value['nav_name'];?>
</a></li>
    <?php } ?>
    </ul>


<script type="text/javascript" src="static/themes/gr/js/index.js" ></script>
</div>
</nav>
<!--header-web--><?php }} ?>
