(function() {
	var loaded = false;

	function resize() {
		var x = document.querySelector(".home .presale");

		if (x) {
			x.style.height = Math.min(x.clientWidth, 450) + "px";
			x.style.paddingTop = "0px";
		}
	}

	function scroll(){
		var x = document.getElementById("menu");

		if(!x) return;

		if(window.scrollY > 100){
			x.style.background = "#272727";
		}else{
			x.style.background = "";
		}
	}

	function load() {
		resize();

		if (loaded) return;

		loaded = true;
		var langsel = document.querySelector(".lang-selector");

		langsel.addEventListener("click", function(e) {
			langsel.classList.toggle("active");
			e.stopPropagation();
		});

		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
			(function() {
				var panel = acc[i].nextElementSibling;
				var h = panel.scrollHeight || panel.clientHeight;
				panel.style.height = "0px";
				acc[i].addEventListener("click", function() {
					/* Toggle between hiding and showing the active panel */
					var panel = this.nextElementSibling;
					if (panel.style.height == "0px") {
						panel.style.height = (panel.scrollHeight || h) + "px";
					} else {
						panel.style.height = "0px";
					}
				});
			})();
		}
	}

	document.addEventListener("DOMContentLoaded", load);
	window.addEventListener("load", load);
	window.addEventListener("resize", resize);
	window.addEventListener("scroll", scroll);

	if (document.readyState == "interactive" || document.readyState == "complete") {
		load();
	}
})();
