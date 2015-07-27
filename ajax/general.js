var uid = 0;

function setId(id) {
    uid = id;
} 

function deleted(t) {
    var url = location.href;
    var f = url.split("/");
    var found = false; url = "";
    for(i=0; i < f.length && !found; i++) {
        url += f[i] + "/";
        if(f[i] == t) found = true;
    }
    $(document).ready(function(){
        $.post(url + "/delete", {id: uid}, function(e) {
            $(location).attr('href', url);
        });
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

