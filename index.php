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
		
		
		$(function() {
    $(window).resize(function() {
        $('div:last').height($(window).height() - $('div:last').offset().top);
    });
    $(window).resize();
});
		</script>		 
	</head>
	<body>
		<div class="container-fluid">
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
							</div><!-- end carousel -->
						</div><!-- end carousel col -->
					</div> <!-- end carousel row-->
					
					<div class="row announcements">
						<h2>Announcements</h2>
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
										<ul><li><?php print_r (fgets($myfile));?></li></ul>
									  </div>								
							<?php
								  
								  $counter++;
								}
								fclose($myfile);
							?>
							</div>
						</div> <!-- end announcements -->
					</div>
					
					<div class="row twitter">
						<div class="col-md-12 left-col-bg-fix">
							<h2>Twitter Feed</h2>
						</div>
					</div> <!-- end twitter feed -->
					
				</div> <!-- end left col -->

				<div class="col-md-4">
					<div class="row fix">
						<img src="img/ttc-logo.png" class="logo" width="50%"/>
						<br />
						<div class="col-md-6 left-date"><?php print date("D M n") ?></div>
						<div class="col-md-6 right-time"><span id="timer"></span></div>
						
					</div> <!-- end time and date -->
					
					<div class="row fix"> <!-- begin Forcast -->  
						<iframe id="forecast_embed" type="text/html" frameborder="0" height="245" width="100%" min-width="500" src="http://forecast.io/embed/#lat=42.3583&lon=-71.0603&name=Toronto&color=#00aaff&font=Georgia&units=ca"> </iframe>
					</div> <!-- end Forcast -->
					
					<div class="row"></div> <!-- end news -->
					
					<div class="row scorecard"> <!-- Begin scorecard -->  
						<?php
							$url = "https://www.ttc.ca/Customer_Service/Daily_Customer_Service_Report/index.jsp";
							libxml_use_internal_errors(true);
							$html=file_get_contents($url);
							$dom = new \DOMDocument;
							$dom->loadHTML($html);

							$Header = $dom->getElementsByTagName('th');
							$Detail = $dom->getElementsByTagName('td');
							foreach($Header as $NodeHeader) 
							{
								$tableData[] = trim($NodeHeader->textContent);
							}
							$i = 0;
							$j = 0;
							foreach($Detail as $sNodeDetail) 
							{
								//echo $sNodeDetail;
								$tableDetail[$j][] = trim($sNodeDetail->textContent);
								$i = $i + 1;
								$j = $i % count($tableData) == 0 ? $j + 1 : $j;
							}
							
							for($i = 0; $i < 4; $i++)
							{
						?>
								<div class="col-sm-6">
									<p> <?php print_r ($tableDetail[$i][1]); ?> </p>
									<p> Target : <?php print_r ($tableDetail[$i][3]); ?> </p>
									<?php
										$diff = $tableDetail[$i][4] - $tableDetail[$i][3]; // actual - target
									?>
									<p> Actual : 
										<?php 
											if($diff >=  0)
												print_r ("<span class=\"green\">" . $tableDetail[$i][4] . "</span>");
											else
												print_r ("<span class=\"red\">" . $tableDetail[$i][4] . "</span>");  
										?>
										<br /><br /><br />
									</p>
								</div>
								<?php
							}

								?>
					</div> <!-- End scorecard --> 
					<div class="row"></div>
				</div> <!-- End right column -->
			</div>
			<div class="row"></div>
			<div class="row footer">
				Toronto Transit Commission, Copyright 1997-<?php print date("Y"); ?>
			</div> <!-- end footer -->
		</div>
	</body>
</html>