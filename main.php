<!DOCTYPE html>
<html>
	<head>
		<title>Update Main News</title>
		<link type="text/css" rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="css/sidemenu.css">
		<script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		<script type="text/javascript" src="js/bootbox.min.js"></script>
		<style>
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
		</style>
		
		<script type="text/javascript">

			function validate()
			{
				
				var imgpath = document.getElementById('upload').value;
				if(imgpath == "")
				{
					alert("upload your image files");
					return false;
				}
				else
				{
					
					// code to get File Extension
					var arr1 = new Array;
					arr1 = imgpath.split("\\");
					var len = arr1.length;
					var img1 = arr1[len-1];
					var filext = img1.substring(img1.lastIndexOf(".")+1);
					// Checking Extension
					if(filext == "jpg" || filext == "jpeg")
					{
						// alert("File has been upload correctly");
						flag = true;
					}
					else
					{
						alert("Invalid File Format Selected");
						return false;
					}
				}
				
				if(flag == true)
				{
					alert(document.getElementById('upload').value);
					$(document).ready(function(){
						$('.modal-body').append('loooooooool');
						$("#success").modal('show');
					});
        
					return false;
				}
			}
			
			function myFunction(){
				var x = document.getElementById("upload");
				var txt = "";
				if ('files' in x) {
					if (x.files.length == 0) {
						txt = "Select one or more files.";
					} else {
						txt = "<br><h6>Files to be uploaded:</h6>";
						for (var i = 0; i < x.files.length; i++) {
							txt += "<strong>" + (i+1) + ". ";
							var file = x.files[i];
							if ('name' in file) {
								txt += file.name + "</strong> - ";
							}
							if ('size' in file) {
								txt += bytesToSize(file.size, 2) + " <br>";
							}
						}
					}
				} 
				else {
					if (x.value == "") {
						txt += "Select one or more files.";
					} else {
						txt += "The files property is not supported by your browser!";
						txt  += "<br>The path of the selected file: " + x.value; 
						// If the browser does not support the files property, it will return the path of the selected file instead. 
					}
				}
				document.getElementById("demo").innerHTML = txt;
			}
			
			/**
			 * Convert number of bytes into human readable format
			 *
			 * @param integer bytes     Number of bytes to convert
			 * @param integer precision Number of digits after the decimal separator
			 * @return string
			 */
			function bytesToSize(bytes, precision)
			{  
				var kilobyte = 1024;
				var megabyte = kilobyte * 1024;
				var gigabyte = megabyte * 1024;
				var terabyte = gigabyte * 1024;
			   
				if ((bytes >= 0) && (bytes < kilobyte)) {
					return bytes + ' B';
			 
				} else if ((bytes >= kilobyte) && (bytes < megabyte)) {
					return (bytes / kilobyte).toFixed(precision) + ' KB';
			 
				} else if ((bytes >= megabyte) && (bytes < gigabyte)) {
					return (bytes / megabyte).toFixed(precision) + ' MB';
			 
				} else if ((bytes >= gigabyte) && (bytes < terabyte)) {
					return (bytes / gigabyte).toFixed(precision) + ' GB';
			 
				} else if (bytes >= terabyte) {
					return (bytes / terabyte).toFixed(precision) + ' TB';
			 
				} else {
					return bytes + ' B';
				}
			}
		</script>
	</head>
	<body>
	
		<?php include_once 'sidemenu.php'; ?>
	
		<div class="container">		
			
			<h1>Update Main News</h1>
			<br>
				
			<form id="form" action="" onchange="myFunction()" onsubmit="return validate();" enctype="multipart/form-data" method="post">

				<div>
					<label for='upload'>Add Attachments:</label>
					<input id='upload' name="upload[]" type="file" multiple="multiple" />
				</div>

				<p id="demo"></p>
				
				<p><input type="submit" id="submit" class="btn btn-lg btn-success pull-right" name="submit" value="Upload"></p>

			</form>
			
				
			<div class="how-to-use">
				<h6>How to use:</h6>
				<p>
					Click 'Choose Files', select your files, and click 'Upload'<br/>
					You can upload multiple image files
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
							<p>Main News have been updated Successfully</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
				
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Modal Header</h4>
				  </div>
				  <div class="modal-body">
					<p>Some text in the modal.</p>
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
