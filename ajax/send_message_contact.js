var obj = $("form#form-contact");
var url = $("#form-contact").attr("action");
var act = $("#submit");
$(document).ready(function() { 
    $("#form-contact").submit(function(e){
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'JSON',
            resetForm: false,
            data: obj.serialize(),
            beforeSend: function() {
                act.val("Sending...").attr('disabled', 'disabled');
            },
            success: function(data) {
                var alert = "";
                if(data.status){
                    alert = "<div class='alert alert-success fade in'>"+ data.msg +"</div>";
                } else {
                    alert = "<div class='alert alert-danger'>"+data.msg+"</div>";
                }
                $('.msg').html(alert);
            },
            error: function(data) {
                alert = "<div class='alert alert-danger'>"+data.msg+"</div>";
                $('.msg').html(alert);
            },
            complete: function() {
                obj.trigger('reset');
                act.val('SEND').removeAttr('disabled');
            }
        });
        return false;
    });
 });