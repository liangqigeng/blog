$(function(){
    //导航标题ajax
    $('.nav_name').dblclick(function() {
        $(this).addClass('nav_on');
        $(this).find('input').removeAttr('readonly');
    })
    $('.nav_name input').blur(function(){
        $(this).parent('.nav_name').removeClass('nav_on');
        $(this).attr('readonly','readonly');
        var value = $(this).val();
        var id = $(this).attr('data_id');
         $.ajax({
            type:'get',
            url : 'nav_list.php',
            data : 'id='+id+'&value='+value,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })
    //导航作者ajax
    $('.nav_url').dblclick(function() {
        $(this).addClass('url_on');
        $(this).find('input').removeAttr('readonly');
    })
    $('.nav_url input').blur(function(){
        $(this).parent('.nav_url').removeClass('url_on');
        $(this).attr('readonly','readonly');
        var value = $(this).val();
        var id = $(this).attr('data_id');
         $.ajax({
            type:'get',
            url : 'nav_list.php',
            data : 'id='+id+'&value1='+value,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })
 //导航排序ajax
    $('.nav_ord').dblclick(function() {
        $(this).addClass('ord_on');
        $(this).find('input').removeAttr('readonly');
    })
    $('.nav_ord input').blur(function(){
        $(this).parent('.nav_ord').removeClass('ord_on');
        $(this).attr('readonly','readonly');
        var value = $(this).val();
        var id = $(this).attr('data_id');
         $.ajax({
            type:'get',
            url : 'nav_list.php',
            data : 'id='+id+'&value2='+value,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })

})