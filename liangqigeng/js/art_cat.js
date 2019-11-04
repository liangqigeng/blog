$(function () {
    //文章分类ajax
    $('.art_cat').dblclick(function() {
        $(this).addClass('art_on');
        $(this).find('input').removeAttr('readonly');
    })
    $('.art_cat input').blur(function(){
        $(this).parent('.art_cat').removeClass('art_on');
        $(this).attr('readonly','readonly');
        var value = $(this).val();
        var id = $(this).attr('data_id');
         $.ajax({
            type:'get',
            url : 'art_cat_list.php',
            data : 'id='+id+'&value='+value,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })
     //分类排序ajax
    $('.cat_ord').dblclick(function() {
        $(this).addClass('ord_on');
        $(this).find('input').removeAttr('readonly');
    })
    $('.cat_ord input').blur(function(){
        $(this).parent('.cat_ord').removeClass('ord_on');
        $(this).attr('readonly','readonly');
        var value = $(this).val();
        var id = $(this).attr('data_id');
         $.ajax({
            type:'get',
            url : 'art_cat_list.php',
            data : 'id='+id+'&value2='+value,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })
})

