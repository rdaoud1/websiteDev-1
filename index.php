<html>
	<head>
		<meta charset=""utf-8" />
		<title></title>
		<link rel="stylesheet" href="css/styles.css" />
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script>
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
		</script>		 
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
								  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								  <li data-target="#myCarousel" data-slide-to="1"></li>
								  <li data-target="#myCarousel" data-slide-to="2"></li>
								</ol>

								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
								  <div class="item active">
									<img src="img/bus-1.jpg" alt="Bus 1" width="460" height="345">
								  </div>

								  <div class="item">
									<img src="img/bus-2.jpg" alt="Bus 2" width="460" height="345">
								  </div>
								
								  <div class="item">
									<img src="img/bus-3.jpg" alt="Bus 3" width="460" height="345">
								  </div>
								</div>

								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
								  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								  <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
								  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								  <span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div> <!-- end carousel -->
					
					<div class="row">
					
						<div id="announcements" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" role="listbox">
							<?php
								$counter=0;
								$myfile = fopen("announcements/announcements.txt", "r") or die("Unable to open file!");
								// Output one line until end-of-file
								while(!feof($myfile)) {
							?>
									<!-- Wrapper for slides -->
									
									  <div class="item <?php ($counter == 0 ? print 'active' : print '');?>" >
										<p><?php echo fgets($myfile);?><p>
									  </div>								
							<?php
								  
								  $counter++;
								}
								fclose($myfile);
							?>
							</div>
						</div> <!-- end announcements -->
					</div>
					<div class="row">
						Twitter feed
					</div> <!-- end twitter feed -->
				</div> <!-- end left col -->

				<div class="col-md-4">
					<div class="row">
						<img src="img/ttc-logo.png" width="50%"/>
						<br />
						<?php echo date("D M n") . " <span id=\"timer\"></span>"; ?>
					</div> <!-- end time and date -->
					<div class="row">  
					<div id="plemx-root"></div> 
						<a href="http://www.theweathernetwork.com">The Weather Network</a>
						<script type="text/javascript"> 
						  var _plm = _plm || [];
						  _plm.push(['_btn', 30504]); 
						  _plm.push(['_loc','caon0696']);
						  _plm.push(['location', document.location.host ]);

						  (function(d,e,i) {
						  if (d.getElementById(i)) return;
						  var px = d.createElement(e);
						  px.type = 'text/javascript';
						  px.async = true;
						  px.id = i;
						  px.src = ('https:' == d.location.protocol ? 'https:' : 'http:') + '//widget.twnmm.com/js/btn/pelm.js?orig=en_ca';
						  var s = d.getElementsByTagName('script')[0];

						  var py = d.createElement('link');
						  py.rel = 'stylesheet'
						  py.href = ('https:' == d.location.protocol ? 'https:' : 'http:') + '//widget.twnmm.com/styles/btn/styles.css'

						  s.parentNode.insertBefore(px, s);
						  s.parentNode.insertBefore(py, s);
						})(document, 'script', 'plmxbtn');</script>
					</div> <!-- end weather -->
					<div class="row">
						News
					</div> <!-- end news -->
					<div class="row"></div>
				</div>
			</div>
	</body>
</html>