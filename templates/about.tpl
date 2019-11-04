<{include file="header.tpl"}>
<!--content-web-->

<article class="box-single">
      
      <h1 class="pagetitle"><{$about.page_name}></h1>

      <div class="content-text">
        <div id='gallery-1' class='gallery galleryid-2 gallery-columns-1 gallery-size-full'><dl class='gallery-item'>
			<dt class='gallery-icon landscape'>
				<img width="1350" height="542" src="static/upload/<{$photo1.banner_path}>"  class="attachment-full size-full" alt="" sizes="(max-width: 1350px) 100vw, 1350px" />
			</dt></dl><br style="clear: both" />
		</div>

<div id='gallery-2' class='gallery galleryid-2 gallery-columns-3 gallery-size-thumbnail'>
		<{foreach from=$photo2 key=k item=v}>
			<dl class='gallery-item'>
			<dt class='gallery-icon landscape'>
				<a href="static/upload/<{$v.banner_path}>" ><img width="1000" height="556" src="static/thumb/<{$v.thumb_path}>"  class="attachment-thumbnail size-thumbnail" alt="" sizes="(max-width: 1000px) 100vw, 1000px" /></a>
			</dt></dl>
		<{/foreach}>
		<br style="clear: both" />
		</div>
		<{$about.page_content}>
      </div>
      <!--content_text-->
          </article>
<!- 底部 -!>
<{include file="bottom.tpl"}>

</body></html>