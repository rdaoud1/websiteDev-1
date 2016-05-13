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
	
	$( document ).ready(function() {
		// scorecard resize to the bottom of the page
		var doc = $(document).height();
		var scorecard = $(".scorecard").height();
		var dateTime = $(".date-time").height();
		var forecast = $(".forecast").height();
		var news = $(".news").height();
		var diff = doc - scorecard - dateTime - forecast - news;
		var newH = diff + scorecard;
		
		$(".scorecard").css({'height' : newH });
		
		
		// twitter feed resize to the bottom of the page
		var doc = $(document).height();
		var carousel = $("#myCarousel").height();
		var announcements = $("#announcements").height();
		var twitter = $(".twitter-feed").height();
		var footer = $(".footer").height();
		var diff2 = doc - carousel - announcements - twitter - footer*3;
		var newH2 = diff2 + twitter;
  
		$(".twitter-feed").css({'height' : newH2 });
		
		
		// refresh page if window is resized
		$(window).resize(function(){location.reload();});
		
	});
	
