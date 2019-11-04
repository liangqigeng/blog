$(function () {
     //单页标题ajax
    $('.page_name').dblclick(function() {
        $(this).addClass('page_on');
        $(this).find('input').removeAttr('readonly');
    })
    $('.page_name input').blur(function(){
        $(this).parent('.page_name').removeClass('page_on');
        $(this).attr('readonly','readonly');
        var value = $(this).val();
        var id = $(this).attr('data_id');
         $.ajax({
            type:'get',
            url : 'page_list.php',
            data : 'id='+id+'&value='+value,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })
})