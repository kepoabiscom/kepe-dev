var form = $('form#form-comment');
var uurl = $("#form-comment").attr("action");
var submit = $('#submit');
$(document).ready(function() { 
    $("#form-comment").submit(function(e){
        $.ajax({
            url: uurl,
            type: 'POST',
            dataType: 'JSON',
            resetForm: true,
            data: form.serialize(),
            beforeSend: function() {
                submit.val("Loading...").attr('disabled', 'disabled');
            },
            success: function(data) {
                var questions = "";
                if(data.n1 != 'undefined') {
                    questions = "<strong>"+data.n1+"</strong>&nbsp;<strong>"+data.op+"</strong>&nbsp;<strong>"+data.n2+"</strong><br><br>";
                    questions += "<input type='hidden' class='form-control' value='"+data.n1+"' name='n1'>";
                    questions += "<input type='hidden' class='form-control' value='"+data.op+"' name='op'>";
                    questions += "<input type='hidden' class='form-control' value='"+data.n2+"' name='n2'>";
                }
                
                if(data.status){
                    $(data.get_comment).hide().fadeIn(800);
                    var comments = $('.comment-block').text();
                    if(comments.contains("No comments yet.")) {
                        $('.comment-block').html("");
                    }
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
            },
            error: function(data) {
                $('.msg').html('<span style="color:red">' + data.msg + '</span>');
            },
            complete: function() {
                form.trigger('reset');
                submit.val('Submit').removeAttr('disabled');
            }
        });
        return false;
    });
 });