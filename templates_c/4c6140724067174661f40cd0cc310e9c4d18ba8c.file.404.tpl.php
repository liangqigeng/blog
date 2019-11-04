<?php /* Smarty version Smarty-3.1.16, created on 2019-11-03 06:49:01
         compiled from "templates\404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11301827075dbd3f8836ab89-55243504%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4c6140724067174661f40cd0cc310e9c4d18ba8c' => 
    array (
      0 => 'templates\\404.tpl',
      1 => 1572763724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11301827075dbd3f8836ab89-55243504',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5dbd3f883ab777_51636413',
  'variables' => 
  array (
    'title' => 0,
    'miss' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dbd3f883ab777_51636413')) {function content_5dbd3f883ab777_51636413($_smarty_tpl) {?><html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,inital-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<link type="text/css" rel="stylesheet" href="static/css/404.css">
</head>
<body>
<div><img src="static/upload/<?php echo $_smarty_tpl->tpl_vars['miss']->value['banner_path'];?>
"></div>
<p><a href="<?php echo $_smarty_tpl->tpl_vars['miss']->value['banner_url'];?>
.php" style="color:#f70707;font-family :微软雅黑 Light;font-weight: bold"><?php echo $_smarty_tpl->tpl_vars['miss']->value['banner_title'];?>
</a></p>
</body>
</html><?php }} ?>
