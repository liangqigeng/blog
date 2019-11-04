$(function () {
     //标签外键ajax
    $('.sin_id').dblclick(function() {
        $(this).addClass('sin_on');
        $(this).find('input').removeAttr('readonly');
    })
    $('.sin_id input').blur(function(){
        $(this).parent('.sin_id').removeClass('sin_on');
        $(this).attr('readonly','readonly');
        var value = $(this).val();
        var id = $(this).attr('data_id');
         $.ajax({
            type:'get',
            url : 'find_list.php',
            data : 'id='+id+'&value='+value,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })
       //文章外键ajax
    $('.art_id').dblclick(function() {
        $(this).addClass('art_on');
        $(this).find('input').removeAttr('readonly');
    })
    $('.art_id input').blur(function(){
        $(this).parent('.art_id').removeClass('art_on');
        $(this).attr('readonly','readonly');
        var value = $(this).val();
        var id = $(this).attr('data_id');
         $.ajax({
            type:'get',
            url : 'find_list.php',
            data : 'id='+id+'&value1='+value,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })
})