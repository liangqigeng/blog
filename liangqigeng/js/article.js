$(function(){
    $('.is_show').click(function () {
        var id = $(this).attr('data_id');
        var show = $(this).attr('data_value');

        if(show==1) {
            $(this).attr('data_value',2);
            $(this).find('img').attr('src','images/no.png');
        } else {
            $(this).attr('data_value',1);
            $(this).find('img').attr('src','images/yes.png');
        }
        $.ajax({
            type:'get',
            url : 'article_list.php',
            data : 'id='+id+'&show='+show,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })

    //文章标题ajax
    $('.art_title').dblclick(function() {
        $(this).addClass('art_on');
        $(this).find('input').removeAttr('readonly');
    })
    $('.art_title input').blur(function(){
        $(this).parent('.art_title').removeClass('art_on');
        $(this).attr('readonly','readonly');
        var value = $(this).val();
        var id = $(this).attr('data_id');
         $.ajax({
            type:'get',
            url : 'article_list.php',
            data : 'id='+id+'&value='+value,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })
    //文章作者ajax
    $('.art_author').dblclick(function() {
        $(this).addClass('art_on');
        $(this).find('input').removeAttr('readonly');
    })
    $('.art_author input').blur(function(){
        $(this).parent('.art_author').removeClass('art_on');
        $(this).attr('readonly','readonly');
        var value = $(this).val();
        var id = $(this).attr('data_id');
         $.ajax({
            type:'get',
            url : 'article_list.php',
            data : 'id='+id+'&value1='+value,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })
 //文章排序ajax
    $('.art_ord').dblclick(function() {
        $(this).addClass('art_on');
        $(this).find('input').removeAttr('readonly');
    })
    $('.art_ord input').blur(function(){
        $(this).parent('.art_ord').removeClass('art_on');
        $(this).attr('readonly','readonly');
        var value = $(this).val();
        var id = $(this).attr('data_id');
         $.ajax({
            type:'get',
            url : 'article_list.php',
            data : 'id='+id+'&value2='+value,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })

})