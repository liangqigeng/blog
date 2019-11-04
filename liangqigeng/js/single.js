$(function () {
     //单页标题ajax
    $('.sin_name').dblclick(function() {
        $(this).addClass('sin_on');
        $(this).find('input').removeAttr('readonly');
    })
    $('.sin_name input').blur(function(){
        $(this).parent('.sin_name').removeClass('sin_on');
        $(this).attr('readonly','readonly');
        var value = $(this).val();
        var id = $(this).attr('data_id');
         $.ajax({
            type:'get',
            url : 'single_list.php',
            data : 'id='+id+'&value='+value,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })
})