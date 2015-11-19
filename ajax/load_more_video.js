$(document).ready(function(){
	getVideoMore(0);
    
    $("#load_more").click(function(e) {
        e.preventDefault();
        loadVideo(this);
    });

    /* this function is trigerred when user scroll down, inactive for a while
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() == $(document).height()) {
            loadVideo($("#load_more"));
        }
    });*/
});

var loadVideo = function(inst) {
    var page = $(inst).data('val');
    $(inst).button('loading');
    setTimeout(function(){
        getVideoMore(page);
        scroll();
    }, 1000);
};

var getVideoMore  = function(page){
    var f = document.URL.split("/");
    var uurl = document.URL.indexOf("/") == -1 ? document.URL : "";
    var found = false;
    for(i = 0; i < f.length && !found; i++) {
        uurl += f[i];
        if(f[i] == 'home') {
            found = true;
        }
        if(!found && f.length > i+1) { 
            uurl += "/";
        }
    }
    uurl = uurl.substr(uurl.length-1) == "/" ? uurl.substr(0, uurl.length-1) : uurl;
    uurl = found == true ? uurl : uurl + "/home" ;
    $("#loader").show();
    $.ajax({
        url: uurl + "/get_video",
        type:'GET',
        data: { page: page }
    }).done(function(response){
        var isEmpty = false;
        if(page > 0) {
            if(response.trim() == "") {
                isEmpty = true;
            }   
        }
        if(isEmpty) {
            $('#load_more').html('No more videos.');
        } else {
            $(".list_video_more").append(response);
            $("#loader").hide();
            $('#load_more').button('reset');
            $('#load_more').data('val', ($('#load_more').data('val')+1));     
        }
    });
};

var scroll  = function(){
    $('html, body').animate({
        scrollTop: $('#load_more').offset().top
    }, 1000);
};