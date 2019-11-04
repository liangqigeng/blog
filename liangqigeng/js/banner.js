$(function() {
    //广告标题ajax
    $('.banner_title').dblclick(function() {
        $(this).addClass('banner_on');
        $(this).find('input').removeAttr('readonly');
    })
    $('.banner_title input').blur(function(){
        $(this).parent('.banner_title').removeClass('banner_on');
        $(this).attr('readonly','readonly');
        var value = $(this).val();
        var id = $(this).attr('data_id');
         $.ajax({
            type:'get',
            url : 'banner_list.php',
            data : 'id='+id+'&value='+value,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })
    //广告地址ajax
    $('.banner_url').dblclick(function() {
        $(this).addClass('url_on');
        $(this).find('input').removeAttr('readonly');
    })
    $('.banner_url input').blur(function(){
        $(this).parent('.banner_url').removeClass('url_on');
        $(this).attr('readonly','readonly');
        var value = $(this).val();
        var id = $(this).attr('data_id');
         $.ajax({
            type:'get',
            url : 'banner_list.php',
            data : 'id='+id+'&value1='+value,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })
    //广告排序ajax
    $('.banner_ord').dblclick(function() {
        $(this).addClass('ord_on');
        $(this).find('input').removeAttr('readonly');
    })
    $('.banner_ord input').blur(function(){
        $(this).parent('.banner_ord').removeClass('ord_on');
        $(this).attr('readonly','readonly');
        var value = $(this).val();
        var id = $(this).attr('data_id');
         $.ajax({
            type:'get',
            url : 'banner_list.php',
            data : 'id='+id+'&value2='+value,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })
})