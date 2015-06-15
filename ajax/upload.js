var formObj = $(this);
var formURL = $("#upload-image-form").attr("action");
$(document).ready(function() { 
    $("#upload-image-form").submit(function(e){
        $.ajax({
            url: formURL,
            type: 'POST',
            dataType: 'JSON',
            resetForm: true,
            beforeSend: function() {
                $('.msg').html("Loading...");
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