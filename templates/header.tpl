<!DOCTYPE html>
<html>
<head>
<title>个人博客-<{$title}></title>
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
   <a href="index.php"  class="logo" title="Yzipi" rel="home"><img src="static/upload/<{$logo.con_value}>"  alt="YzipiLogo"></a>

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
    <{foreach from = $nav key=k item=v}>
        <li id="" class="menu-item"><a href="<{$v.nav_url}>.php" ><{$v.nav_name}></a></li>
    <{/foreach}>
    </ul>


<script type="text/javascript" src="static/themes/gr/js/index.js" ></script>
</div>
</nav>
<!--header-web-->