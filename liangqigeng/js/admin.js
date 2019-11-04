$(function () {
      //管理员名称ajax
    $('.admin_name').dblclick(function() {
        $(this).addClass('admin_on');
        $(this).find('input').removeAttr('readonly');
    })
    $('.admin_name input').blur(function(){
        $(this).parent('.admin_name').removeClass('admin_on');
        $(this).attr('readonly','readonly');
        var value = $(this).val();
        var id = $(this).attr('data_id');
         $.ajax({
            type:'get',
            url : 'admin_list.php',
            data : 'id='+id+'&value='+value,
            dataType : 'text',
            success : function (z) {
                console.log(z);
            }
        })
    })
})