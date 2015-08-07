var uid = 0;
var t = "";

function setId(id) {
    if(typeof id == "number") {
        uid = id;
    }
    else {
        t = String(id);
    }
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
            $.post(url + "/" + str, {id: t}, function(e) {
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

