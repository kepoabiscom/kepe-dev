var uid = 0;
var ban_id = "";

function setId(id) {
    if(typeof id == "number") {
        uid = id;
    }
    else {
        ban_id = String(id);
    }
} 

function approve(t) {
    var url = location.href;
    $(document).ready(function() {
        $.post(url + "/approve", {id: uid}, function(e) {
            $(location).attr('href', url);
        });
    });
}

function deleted(t) {
    var url = location.href;
    var f = url.split("/");
    var found = false; url = "";
    for(i=0; i < f.length && !found; i++) {
        url += f[i];
        if(f[i] == t) found = true;
        if(!found) url += "/";
    }
    $(document).ready(function(){
        if(t == "banned_comment") {
            str = "banned";
            $.post(url + "/" + str, {id: ban_id}, function(e) {
                $(location).attr('href', url);
            });
        } else {
            str = "delete";
            $.post(url + "/" + str, {id: uid}, function(e) {
                $(location).attr('href', url);
            });
        }    
    });
    $('.close').trigger('click');
}

function detailMessage(from_name, subject, created_time) {
    $('a[href="#modal_read"]').trigger('click');
}

function read_image(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        $('#img_prev')
           .attr('src', e.target.result)
            .width(150)
            .height(200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

