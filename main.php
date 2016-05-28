<?php

if(isset($_POST['submit'])){
	
	// Get array of all source files
	$files = scandir("uploaded");
	// Identify directories
	$source = "uploaded/";
	$destination = "uploaded/old/";
		
	// Cycle through all source files
	foreach ($files as $file) {
	  if (( $file != '.' ) && ( $file != '..' )) {
		  // If we copied this successfully, mark it for deletion
		  if (copy($source.$file, $destination.$file)) {
			$delete[] = $source.$file;
		  }
	  }
	}
	
	// Delete all successfully-copied files
	foreach ($delete as $file) {
	  if(file_exists($file))
		unlink($file);
	}
	
	
    if(count($_FILES['upload']['name']) > 0){
        //Loop through each file
        for($i=0; $i<count($_FILES['upload']['name']); $i++) {
          //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

            //Make sure we have a filepath
            if($tmpFilePath != ""){
            
                //save the filename
                $shortname = $_FILES['upload']['name'][$i];

                //save the url and the file
                $filePath = "uploaded/" . date('d-m-Y-H-i-s').'-'.$_FILES['upload']['name'][$i];

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $filePath)) {

                    $files[] = $shortname;
                    //insert into db 
                    //use $shortname for the filename
                    //use $filePath for the relative url to the file

					
                }
            }
        }
    }

	if(($key = array_search('.', $files)) !== false) {
		unset($files[$key]);
	}
	
	if(($key = array_search('..', $files)) !== false) {
		unset($files[$key]);
	}
	
	if(($key = array_search('old', $files)) !== false) {
		unset($files[$key]);
	}
	
    //show success message
    ?>
		<script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script>
			$(window).load(function(){
				$('.modal-body').append('<?php
				echo "<h6>Files modified:</h6>";    
				if(is_array($files)){
					echo "<ul>";
					foreach($files as $file){
						echo "<li>$file</li>";
					}
					echo "</ul>";
				}
				?>');
				$('#success').modal('show');
			});
		</script>
	<?php   
   
	
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Update Main News</title>
		<link type="text/css" rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="css/sidemenu.css">
		<script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
	</head>
	<body>
	
		<?php include_once 'sidemenu.php'; ?>
	
		<div class="container">		
			
			<h1>Update Main News</h1>
			<br>
			<form action="" enctype="multipart/form-data" method="post">

				<div>
					<label for='upload'>Add Attachments:</label>
					<input id='upload' name="upload[]" type="file" multiple="multiple" />
				</div>

				<p><input type="submit" class="btn btn-lg btn-success pull-right" name="submit" value="Upload"></p>

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
				
				
		</div>
	</body>
<html>
