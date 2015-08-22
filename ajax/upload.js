var uploadfiles = document.querySelector('#fileinput');
uploadfiles.addEventListener('change', function () {
    uploadFile(this.files[0]);
}, false);

function uploadFile(file){
    var url = 'gallery/upload';
    var xhr = new XMLHttpRequest();
    var fd = new FormData();
    xhr.onreadystatechange = function() {
        document.getElementById("msg").innerHTML = "Loading...";
        if(xhr.readyState == 4 && xhr.status == 200) {
            var fx = JSON.parse(xhr.responseText);
            setTimeout(function() { 
                if(fx.status) {
                    document.getElementById("msg").innerHTML = "<span style='color:green'>" + fx.msg + "</span>";  
                    $('.img_bts').prepend(fx.get_img);
                    $('.alert-success').html('');
                } else {
                    document.getElementById("msg").innerHTML = "<span style='color:red'>" + fx.msg + "</span>";      
                }
            }, 1000);
        }
    };
    xhr.open("POST", url, true);
    fd.append("upload_img", file);
    xhr.send(fd);
}
