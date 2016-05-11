// time display script
	setInterval(function() {
		var currentTime = new Date ( );    
		var currentHours = currentTime.getHours ( );   
		var currentMinutes = currentTime.getMinutes ( );   
		var currentSeconds = currentTime.getSeconds ( );
		currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;   
		currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;    
		var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";    
		currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;    
		currentHours = ( currentHours == 0 ) ? 12 : currentHours;    
		var currentTimeString = currentHours + ":" + currentMinutes + " " + timeOfDay;
		document.getElementById("timer").innerHTML = currentTimeString;
	}, 1000);
	
// full screen script
	$(function() {
		$(window).resize(function() {
			$('div:last').height($(window).height() - $('div:last').offset().top);
		});
		$(window).resize();
	});
	
// twitter refresh script
	window.twttr = (function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0],
			t = window.twttr || {};
		if (d.getElementById(id)) return t;
		js = d.createElement(s);
		js.id = id;
		js.src = "https://platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js, fjs);

		t._e = [];
		t.ready = function(f) {
			t._e.push(f);
		};

		return t;
	}(document, "script", "twitter-wjs"));
