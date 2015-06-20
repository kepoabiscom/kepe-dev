function username_check(username) {
	var obj = new XMLHttpRequest();
	obj.onreadystatechange = function() {
		if(obj.readyState == 4 && obj.status == 200) {
			var f = JSON.parse(obj.responseText);
			if(username.length >= 3) {
				if(f.success) {
					document.getElementById("v_username").innerHTML = "<span style='color:green'>" + f.msg + "</span>";	
				} else {
					document.getElementById("v_username").innerHTML = "<span style='color:red'>" + f.msg + "</span>";
				}
			} else document.getElementById("v_username").innerHTML = "<span style='color:blue'>Must be more than 3 characters.</span>";
			
		}
	}
	obj.open("GET", "ajax_check_username/" + username, true);
	obj.send();
}