function username_check(username) {
	var obj = new XMLHttpRequest();
	obj.onreadystatechange = function() {
		if(obj.readyState == 3 && obj.status == 200) {
			var f = JSON.parse(obj.responseText);
			document.getElementById("v_username").innerHTML = "Loading...";
			setTimeout(function(){
				if(username.match(/^[a-zA-Z0-9]+$/)) {
					if(username.length >= 3) {
						if(f.success) {
							document.getElementById("v_username").innerHTML = "<span style='color:green'>" + f.msg + "</span>";	
						} else {
							document.getElementById("v_username").innerHTML = "<span style='color:red'>" + f.msg + "</span>";
						}
					} else document.getElementById("v_username").innerHTML = "<span style='color:blue'>Must be more than 3 words.</span>";
				} else document.getElementById("v_username").innerHTML = "<span style='color:blue'>Only alphanumeric.</span>";
				
			}, 1000);
			
		}
		
	}
	obj.open("GET", "ajax_check_username/" + username, true);
	obj.send();
}