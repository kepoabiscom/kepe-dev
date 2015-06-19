function username_check(username) {
	var obj = new XMLHttpRequest();
	obj.onreadystatechange = function() {
		if(obj.readyState == 4 && obj.status == 200) {
			var f = JSON.parse(obj.responseText);
			document.getElementById("v_username").innerHTML = f.msg;
		}
	}
	obj.open("GET", "ajax_check_username/" + username, true);
	obj.send();
}