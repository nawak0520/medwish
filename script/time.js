(function() {
	var target = new Date();
	//target.setMinutes(0, 0);
	//target.setHours(target.getHours() + 1);

	function timx(value, x) {
		var str = (Math.floor(value) % x).toString();
		if (str.length == 1) {
			str = "0" + str;
		}

		return str;
	}

	function updateTime() {
		var x = document.getElementById("timer");
		var str = "";
		var tim = Math.floor((target - new Date()) / 1000);

		if (tim < 0) {
			return;
		}

		if (x) {
			str = "<span>" + timx(tim, 60) + "</span>";
			tim = tim / 60;
			str = "<span>" + timx(tim, 60) + "</span> : " + str;
			tim = tim / 60;
			str = "<span>" + timx(tim, 24) + "</span> : " + str;
			tim = tim / 24;
			str = "<span>" + timx(tim, 100) + "</span> : " + str;

			x.innerHTML = str;
		}
	}

	setInterval(updateTime, 200);
})();
