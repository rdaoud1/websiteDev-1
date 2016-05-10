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
							<div id="carousel-1" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner" role="listbox">	
									<div class="item active">
										<img src="img/bus-1.jpg"/>
									</div>
									<div class="item">
										<img src="img/bus-2.jpg"/>
									</div>	
									<div class="item">
										<img src="img/bus-3.jpg"/>
									</div>
								</div>
								<div>
									<a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev">
										<i class="glyphicon glyphicon-chevron-left"></i>
										<span class="sr-only">Previous</span>
									</a>
									<a class="right carousel-control" href="#carousel-1" role="button" data-slide="next">
										<i class="glyphicon glyphicon-chevron-right"></i>
										<span class="sr-only">Next</span>
									</a>
								</div>
								<ol class="carouse-indicators">
									<li class="active" data-slide-to="0" data-target="#carousel-1"></li>
									<li data-slide-to="1" data-target="#carousel-1"></li>
									<li data-slide-to="2" data-target="#carousel-1"></li>
								</ol>
							</div>
						</div>
					</div>
					<div class="row">Scrolling news</div>
					<div class="row">Twitter feed</div>
				</div>
				<div class="col-md-4">
					<div class="row">
						<img src="img/ttc-logo.png" width="50%"/>
						<br />
						<?php echo date("D M n") . " <span id=\"timer\"></span>"; ?>
						
					</div>
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
						})(document, 'script', 'plmxbtn');</script></div>
					<div class="row">News</div>
					<div class="row">
						<?php
							$url = "https://www.ttc.ca/Customer_Service/Daily_Customer_Service_Report/index.jsp";
							libxml_use_internal_errors(true);
							$html=file_get_contents($url);
							
							$dom = new DOMDocument;
							$dom->loadHTML($html);
							
							$table = $dom->getElementsByTagName('tbody');

							$rows = $table->getElementsByTagName('tr');
							$cols = $rows->getElementsByTagName('td');

							$key = $cols->item(0)->nodeValue; // string(3) "key"
							$val = $cols->item(1)->nodeValue;

							foreach ($dom->getElementsByTagName('tr') as $node) {
							//echo $node->getAttribute( 'tr' ); 
							   //echo $dom->saveHtml($node), PHP_EOL;
							   //echo "hmmm";
							}
							echo $key;
							echo $val;
						?>
						ending
					</div>
				</div>
			</div>
	</body>
</html>