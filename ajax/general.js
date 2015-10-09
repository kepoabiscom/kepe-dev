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
    var statusSize = false;
    var statusPxel = false;
    var statusExte = false;
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        $("#msg-error").html("");
        if(validateExt(input.files[0].name)) {
            if(input.files[0].size < 2000000) { // Mmust be below 2MB
                statusSize = true;
            }
            reader.onload = function (e) {
                img = $('#img_prev').attr('src', e.target.result);
                h = img.height();
                w = img.width();
                if(h < 1200 && w < 1200) {
                    statusPxel = true;
                }
                if(statusSize) {
                    if(!statusPxel) {
                        $("#msg-error").append("<span style='color:red'>Image size must be below 1200x1200.</span>");    
                    } 
                } else {
                    $("#msg-error").append("<span style='color:red'>Image size must be below 2 Megabytes.</span>");
                }
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            $("#msg-error").append("<span style='color:red'>FIle extension must be JPG, JPEG, GIF or PNG.</span>");
        }
    }
}

function validateExt(nameFile) {
    var name = nameFile.toLowerCase(); 
    var rgex = /(\.jpg|\.jpeg|\.bmp|\.gif|\.png)$/i;
    if(!rgex.exec(name)) {
        return false;
    }
    return true;
}
