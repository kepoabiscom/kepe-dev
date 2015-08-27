var formObj = $('form#form-comment');
var formURL = $("#form-comment").attr("action");
var submit = $('#submit');
$(document).ready(function() { 
    $("#form-comment").submit(function(e){
        $.ajax({
            url: formURL,
            type: 'post',
            dataType: 'json',
            resetForm: true,
            data: formObj.serialize(),
            beforeSend: function() {
                submit.val("Loading...").attr('disabled', 'disabled');
            },
            success: function(data) {
                setTimeout(function() { 
                    var questions = "";
                    if(data.n1 != 'undefined') {
                        questions = "<strong>"+data.n1+"</strong>&nbsp;<strong>"+data.op+"</strong>&nbsp;<strong>"+data.n2+"</strong><br><br>";
                        questions += "<input type='hidden' class='form-control' value='"+data.n1+"' name='n1'>";
                        questions += "<input type='hidden' class='form-control' value='"+data.op+"' name='op'>";
                        questions += "<input type='hidden' class='form-control' value='"+data.n2+"' name='n2'>";
                    }

                    if(data.status){
                        $(data.get_comment).hide().fadeIn(800);
                        $('.comment-block').append(data.get_comment);
                        $('.msg').html('');
                        $('.questions').html('');
                        $('.questions').html(questions);
                    } else {
                        $('.msg').html('<span style="color:red">' + data.msg + '</span>');
                        if(data.n1 != 'undefined') {
                            $('.questions').html('');
                            $('.questions').html(questions);
                        }
                    }
                    formObj.trigger('reset');
                    submit.val('Submit').removeAttr('disabled');
                }, 500);
            }
        });
        return false;
    });
 });