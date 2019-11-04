<footer id="dibu-main">
	  <div class="bottomlist">
      <div class="xinlan"> <a href="<{$sing.banner_url}>.php"  target="_blank" ><img src="static/upload/<{$sing.banner_path}>"  alt="<{$sing.banner_title}>" title="<{$sing.banner_title}>"></a> </div>
      <div class="weixin2">
        <div class="weixin"><img src="static/upload/<{$weixin.banner_path}>"  alt="<{$weixin.banner_title}>"  title="<{$weixin.banner_title}>"> <img src="static/upload/<{$weixin2.banner_path}>"  class="xixii" alt="<{$weixin2.banner_title}>" ></div>
      </div>
    </div>

<div class="bottom">
	<ul class="botop">
	    <{foreach from=$nav1 key=k item=v}>
	    <li id="" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<{$v.nav_url}>.php" ><{$v.nav_name}></a></li>
        <{/foreach}>

</ul>

	   <div class="botext"><a href="index.php"  rel="external nofollow" target="_blank"><{$icp.con_value}></a> </div>
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
<script type='text/javascript' src="static/js/wp-embed.min.js" ></script>