$(document).ready(function() { 
    $(".upload-image-form").submit(function(){
        $.ajax({
            url: base_url + "admin/gallery/upload",
            type: 'POST',
            dataType: 'JSON',
            resetForm: true,
            beforeSubmit: function() {
                $('.msg').html('Loading ...');
            },
            success: function(data) {
                if(data.status){
                    $('.msg').html('<span style="color:blue">' + data.msg + '</span>')
                } else{
                    $('.msg').html('<span style="color:red">' + data.msg + '</span>')
                }
            }
        });
        return false;
    });
 });