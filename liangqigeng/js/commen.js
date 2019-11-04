$(function(){
    //文章分类ajax
    $('.com_content').dblclick(function() {
        $(this).addClass('art_on');
        $(this).find('input').removeAttr('readonly');
    })
    $('.com_content input').blur(function(){
        $(this).parent('.com_content').removeClass('art_on');
        $(this).attr('readonly','readonly');
        var value = $(this).val();
        var id = $(this).attr('data_id');
         $.ajax({
            type:'get',
            url : 'com_art_list.php',
            data : 'id='+id+'&value='+value,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })
})