<{include file="header.tpl"}>
<!--content-web-->
<div id="container-page">
 <aside id="sitebar">
   <div class="sitebar_list">
      <a href=""  target="_blank"><img width="364" height="182" src="static/upload/<{$orign.banner_path}>"  class="image wp-image-2095  attachment-full size-full" alt="" style="max-width: 100%; height: auto;" /></a></div>
      <div class="sitebar_list"><h4 class="sitebar_title"><{$web.banner_title}></h4>
         <div class="tagcloud">
            <{foreach from=$single key=k  item=v}>
                <a href="index.php?sin_id=<{$v.sin_id}>"  class="tag-cloud-link tag-link-51 tag-link-position-1" style="font-size: 15px;"><{$v.sin_name}></a>
             <{/foreach}>
         </div>
      </div>
<a href=""  target="_blank" ><img class="totop" src="static/upload/<{$web.banner_path}>"  /></a>
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
       <h1 class="singletitle"><{$content.art_title}></h1>
       <p class="p2"><{$content.art_addtime|date_format:"%Y-%m-%d"}> - <{$content.art_author}></p>
       <div class="content-text"><{$content.art_content}>
	   <p style="text-align: center;"><strong>- END -</strong></p>
	   
	   <div class="bdf">
	   <div class="yue"><{$content.art_visit}></div>
	   <div class="post-like">
            <a href="javascript:;" data-action="ding" data-id="102" class="favorite"><span class="count"><{$content.art_thanks}></span>
            </a>
       </div>
</div>
	</div>
    <!--content_text-->
<div class="comment" id="comments">
<div id="respond">
  <form action=""  method="post" id="commentform" >
    <textarea name="comment" id="comment"  rows="3" tabindex="5" placeholder="你有什么要说的 ..." ></textarea>
      <input type="hidden" name="art_id" value="<{$content.art_id}>">
    <input name="submit" type="submit" id="submit" tabindex="2" value="回复" />
  </form>
  </div>

<ol id="comment">
<{foreach from=$commit key=k  item=v }>
  <li id="comment-993"> <span> <img src="static/images/none.jpg"  class="avatar avatar-120" height="120" width="120"> </span>
  <div class="mhcc">
    <address>
  <{$v.com_addtime|date_format:"%Y.%m.%d"}> - <{$v.com_name}>
    </address>
        <p><{$v.com_content}></p>
  </div>
  </li>
  <{/foreach}>


</ol>
    </div>	

    <!--相关文章-->
  </article>
 </div>
<!- 底部 -!>

<{include file="bottom.tpl"}>

</body></html>