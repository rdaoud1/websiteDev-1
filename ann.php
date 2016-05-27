<?php
if($_GET)
{
	$ann = trim($_GET['announcements']);
	$file = "announcements/announcements.txt";
	$handle = fopen($file, 'w+') or die("can't open file");
	if(fwrite($handle, $ann))
	{
		?>
		<script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script>
			$(window).load(function(){
				$('#success').modal('show');
			});
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script>
			$(window).load(function(){
				$('#fail').modal('show');
			});
		</script>
		<?php
	}
	fclose($handle);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Update Announcements</title>
		<link type="text/css" rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="css/sidemenu.css">
		<script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
			#announcements
			{
				border: 1px solid black;
				-webkit-border-radius: 15px;
				-moz-border-radius: 15px;
				border-radius: 15px;
			}
			.how-to-use
			{
				width: 50%;
				margin: 100px auto 0 auto;
				border: 1px solid grey;
				-webkit-border-radius: 15px;
				-moz-border-radius: 15px;
				border-radius: 15px;
				padding: 2px 10px;
				background: lightgrey;
			}
			body { background: ghostwhite; }
			h1 { color: #BA0202; }
			h6 { text-decoration: underline; font-size: 1.25em; }
			.save-successful { background: lightgreen; }
			.save-unsuccessful { background: lightcoral; }
		</style>
	</head>
	<body>
		
		<?php include_once 'sidemenu.php'; ?>
	
		<div class="container">
		
			<h1>Update Announcements</h1>
			<br>
			<form action="ann.php" method="">
				<div class="form-group">
					<textarea class="form-control" name="announcements" rows="10" id="announcements"><?php 
						$fh = fopen('announcements/announcements.txt','r');
						while(! feof($fh))
						{
							echo fgets($fh);
						}
						fclose($fh);
					?></textarea>
					<br/>
					<button type="submit" class="btn btn-success btn-lg pull-right" value="Update"> Update </button>
				</div>
			</form>
			
			<div class="how-to-use">
				<h6>How to use:</h6>
				<p>
					The text area is populated with what the current announcements are.<br/>
					Remove or add to the text area, then hit 'Update'<br/>
					One announcement per line
				</p>
			</div>
			
			<!-- Success Modal -->
				<div class="modal fade" id="success" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header save-successful">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Success <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></h4>
							</div>
							<div class="modal-body">
								<p>Announcements have been updated Successfully</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Fail Modal -->
				<div class="modal fade" id="fail" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header save-unsuccessful">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Fail <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></h4>
							</div>
							<div class="modal-body">
								<p>Could not update, please try again!</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
		</div>
	</body>
<html>