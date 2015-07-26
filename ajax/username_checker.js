function username_check(username) {
	var obj = new XMLHttpRequest();
	obj.onreadystatechange = function() {
		if(obj.readyState == 3 && obj.status == 200) {
			var f = JSON.parse(obj.responseText);
			document.getElementById("v_username").innerHTML = "Loading...";
			setTimeout(function(){
				var success = false;
				var t = true;	
				var regex = /^[A-Za-z0-9]+(?:[._][A-Za-z0-9]+)*$/;
				if(username.length >= 6) {
					if(username.match(regex)) {
						success = f.success;
					} else {
						document.getElementById("v_username").innerHTML = "<span style='color:blue'>Should be user.name or user_name!</span>";
						t = false;
					}
				} else {
					document.getElementById("v_username").innerHTML = "<span style='color:blue'>Must be more than 6 words!</span>";
					t = false;
				}
				if(t) {
					if(success) {
						document.getElementById("v_username").innerHTML = "<span style='color:green'>" + f.msg + "</span>";	
					} else {
						document.getElementById("v_username").innerHTML = "<span style='color:red'>" + f.msg + "</span>";
					}	
				}
				
			}, 1000);
			
		}
		
	}
	obj.open("GET", "ajax_check_username/" + username, true);
	obj.send();
}