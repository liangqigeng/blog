<{include file="header.tpl"}>
<link rel="stylesheet" href="include/page/css.css">
<!--content-web-->
<div id="container-page">

  <aside id="sitebar">
   <div class="sitebar_list">
       <h4 class="sitebar_title"><{$orign.banner_title}></h4>
            <ul id="randomposts">
                <{foreach from=$orign_article key=k item=v}>
                <li><a href="art_detail.php?art_id=<{$v.art_id}>" ><{$v.art_title}></a></li>
                <{/foreach}>
            </ul>
   </div>

<div class="sitebar_list">
      <a href=""  target="_blank"><img width="364" height="182" src="static/upload/<{$orign.banner_path}>"  class="image wp-image-2095  attachment-full size-full" alt="" style="max-width: 100%; height: auto;" /></a></div> <div class="sitebar_list">
      <h4 class="sitebar_title"><{$web.banner_title}></h4>
      <div class="tagcloud">
      <{foreach from=$single key=k  item=v}>
         <a href="index.php?sin_id=<{$v.sin_id}>"  class="tag-cloud-link tag-link-51 tag-link-position-1" style="font-size: 15px;"><{$v.sin_name}></a>
      <{/foreach}>
</div>
</div><a href=""  target="_blank" ><img class="totop" src="static/upload/<{$web.banner_path}>"  /></a>
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
   <!--幻灯片-->
<div class="hmFocus">
<div class="swiper-container autoImg">
    <div class="swiper-wrapper">
            <{foreach from = $art_photo key=k item=v}>
              <div class="swiper-slide"> <a href="art_detail.php?art_id=<{$v.art_id}>" target="_blank"><img src="static/upload/<{$v.art_img}>"  　alt=""></a></div>
            <{/foreach}>

    </div>
    <div class="swiper-pagination"></div>
</div>
</div>
<script language="javascript">
var swiper = new Swiper('.hmFocus .swiper-container', {
	pagination: '.swiper-pagination',
	loop: true,
	autoplay: 5500,
	paginationClickable: true
});
</script>

	
<{foreach from = $list key=k item=v}>
   <section class="list">
       <h2 class=" mecctitle   ">
	        <a href="art_detail.php?art_id=<{$v.art_id}>"  target="_blank"><{$v.art_title}></a>
	   </h2>
	  
       <span class="titleimg"> <a href="art_detail.php?art_id=<{$v.art_id}>"  target="_blank">
  <img width="1000" height="556" src="static/thumb/<{$v.art_thumb}>"  class="attachment-thumbnail size-thumbnail wp-post-image" alt=""  />  </a>
  <a href="art_detail.php?art_id=<{$v.art_id}>"  target="_blank">   </a>
 <a href="art_detail.php?art_id=<{$v.art_id}>"  target="_blank">  </a>
   </span>
    <time  class="  "><{$v.art_addtime|date_format:"%Y-%m-%d"}></time>
  <div class="zaiyao">
    <p><{$v.art_summary}></p>
  </div>
</section>
 <{/foreach}>

            	  
 </article>
<div style="clear: both"></div>
 <div><{$show}></div>
</div>

<!- 底部 -!>
<{include file="bottom.tpl"}>

</body></html>