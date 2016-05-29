<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>TTC Dashboard</title>
		<link type="text/css" rel="stylesheet" href="css/styles.css" />
		<link type="text/css" rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

		<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="js/tweetie.js"></script>
		<script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="news/scripts/jquery.bootstrap.newsbox.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators">
							  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							  <li data-target="#myCarousel" data-slide-to="1"></li>
							  <li data-target="#myCarousel" data-slide-to="2"></li>
							</ol>

							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
								<?php
									$dirname = "uploaded/";
									$images = glob($dirname."*.jpg");
									$counter = 0;
									
									foreach($images as $image) 
									{
										$counter++;
										if ($counter == 1)
										{
											echo '<div class="item active"><img src="' . $image . '" alt="Bus 1"/></div>';
										}
										else 
										{
											echo '<div class="item"><img src="' . $image . '" alt="Bus 1"/></div>';
										}
									}
								?>
								
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
					</div> <!-- end carousel row-->
					
					<div class="row announcements">
						<!--<h2>Announcements</h2>-->
						<div id="announcements" class="carousel slide" data-ride="carousel" data-interval="7500">
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
					
					<div class="row">
						
						<div class="twitter-feed">
						<!-- <h3 class="">Twitter Feed</h3> -->
							<div class="col-md-2"><img src="img/twitter.png" alt="TTCnotices" class="twitter"/></div>
							<div class="tweet col-md-10"></div>
						</div>

						<script type="text/javascript">
							$('.twitter-feed .tweet').twittie({
								username: 'TTCnotices',
								list: '',
								dateFormat: '%b. %d, %Y',
								template: '<strong class="date">{{date}}</strong> - {{tweet}}',
								count: 10
							}, function () {
								setInterval(function() {
									var item = $('.twitter-feed .tweet ul').find('li:first');

									item.animate( {marginLeft: '-220px', 'opacity': '0'}, 500, function() {
										$(this).detach().appendTo('.twitter-feed .tweet ul').removeAttr('style');
									});
								}, 10000);
							});
						</script>
					</div> <!-- end twitter feed -->
					
				</div> <!-- end left col -->

				<div class="col-md-4">
					<div class="row white-bg date-time">
						<img src="img/ttc-logo.png" class="logo" alt="TTC Logo" width="50%"/>
						<br />
						<div class="col-md-6 left-date"><?php print date("D M n") ?></div>
						<div class="col-md-6 right-time"><span id="timer"></span></div>
						
					</div> <!-- end time and date -->
					
					<div class="row white-bg forecast"> <!-- begin Forcast -->  
						<iframe id="forecast_embed" type="text/html" frameborder="0" height="245" width="100%" min-width="500" src="http://forecast.io/embed/#lat=42.3583&lon=-71.0603&name=Toronto&color=#00aaff&font=Georgia&units=ca"> </iframe>
					</div> <!-- end Forcast -->
					
					<div class="row news"> <!-- begin news -->
						<h5>News</h5>
						
					</div> <!-- end news -->
					
					<div class="row scorecard" id="scorecard"> <!-- Begin scorecard -->
                        <h4>General Keynotes</h4>

                            <div class="row">
                                <div class="col-xs-12">
                                    <ul class="demo2">
                                        <?php
                                        $counter=0;
                                        $myfile = fopen("announcements/keynotes.txt", "r") or die("Unable to open file!");
                                        // Output one line until end-of-file
                                        while(!feof($myfile)) {
                                        ?>
                                            <li class="news-item"><?php print_r (fgets($myfile));?></li>
                                        <?php

                                        $counter++;
                                        }
                                        fclose($myfile);
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        <!--ScoreCard Coding (Removed for now)-->
<!--						<h4>Daily Customer Scorecard</h4>-->
<!--						--><?php
//							$url = "https://www.ttc.ca/Customer_Service/Daily_Customer_Service_Report/index.jsp";
//							libxml_use_internal_errors(true);
//							$html=file_get_contents($url);
//							$dom = new \DOMDocument;
//							$dom->loadHTML($html);
//
//							$Header = $dom->getElementsByTagName('th');
//							$Detail = $dom->getElementsByTagName('td');
//							foreach($Header as $NodeHeader)
//							{
//								$tableData[] = trim($NodeHeader->textContent);
//							}
//							$i = 0;
//							$j = 0;
//							foreach($Detail as $sNodeDetail)
//							{
//								//echo $sNodeDetail;
//								$tableDetail[$j][] = trim($sNodeDetail->textContent);
//								$i = $i + 1;
//								$j = $i % count($tableData) == 0 ? $j + 1 : $j;
//							}
//
//							for($i = 0; $i < 4; $i++)
//							{
//						?>
<!--								<div class="col-lg-6">-->
<!--									<p>--><?php //echo "<img alt=\"line\" src=\"img/line-" . ($i + 1) . ".png\"/>"; ?><!-- -->
<!--									 --><?php //print_r ($tableDetail[$i][1]); ?><!-- </p>-->
<!--									<p> Target : --><?php //print_r ($tableDetail[$i][3]); ?><!-- </p>-->
<!--									--><?php
//										$diff = $tableDetail[$i][4] - $tableDetail[$i][3]; // actual - target
//									?>
<!--									<p> Actual : -->
<!--										--><?php //
//											if($diff >=  0)
//												print_r ("<span class=\"green\">" . $tableDetail[$i][4] . "</span>");
//											else
//												print_r ("<span class=\"red\">" . $tableDetail[$i][4] . "</span>");
//										?>
<!--										<br /><br /><br />-->
<!--									</p>-->
<!--								</div>-->
<!--								--><?php
//							}
//
//								?>

					</div> <!-- End scorecard --> 
					<div class="row"></div>
				</div> <!-- End right column -->
			</div>
			<div class="footer" id="footer">
				Toronto Transit Commission, Copyright 1997-<?php print date("Y"); ?>
			</div> <!-- end footer -->
		</div>
        <script type="text/javascript">
            $(function () {
                $(".demo2").bootstrapNews({
                    newsPerPage: 9,
                    autoplay: true,
                    pauseOnHover: false,
                    navigation: false,
                    direction: 'down',
                    newsTickerInterval: 3500,
                    onToDo: function () {
                        //console.log(this);
                    }
                });
            });
        </script>
	</body>
</html>