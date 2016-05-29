<?php

if(isset($_POST['submit'])){
	
	// Get array of all source files
	$files = scandir("uploaded");
	// Identify directories
	$source = "uploaded/";
	$destination = "uploaded/old/";
	$delete[] = null;
		
	// Cycle through all source files
	foreach ($files as $file) {
		
		if (( $file != '.' ) && ( $file != '..' ) && ( $file != 'old' )) {
			if(($key = array_search('.', $files)) !== false) {
				unset($files[$key]);
			}
	
			if(($key = array_search('..', $files)) !== false) {
				unset($files[$key]);
			}
	
			if(($key = array_search('old', $files)) !== false) {
				unset($files[$key]);
			}
	
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
	
	if(count($_FILES['upload']['name']) > 0)
	{				
        //Loop through each file
        for($i=0; $i<count($_FILES['upload']['name']); $i++) 
		{			
			//Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

            //Make sure we have a filepath
            if($tmpFilePath != "")
			{
            
                //save the filename
                $shortname = $_FILES['upload']['name'][$i];

                //save the url and the file
                $filePath = "uploaded/" . date('d-m-Y-H-i-s').'-'.$_FILES['upload']['name'][$i];

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $filePath)) 
				{
                    $files[] = $shortname;
					$uploaded[] = $shortname;
                    //insert into db 
                    //use $shortname for the filename
                    //use $filePath for the relative url to the file					
                }				
            }			
        } // end for loop
		
		// *** Include the class
		include_once("resize-class.php");
		
		$files = scandir("uploaded");
		// Cycle through all source files
		foreach ($files as $file) {
			
			if($file == "." || $file == ".." || $file == "old") continue;					

			// *** 1) Initialise / load image
			$resizeObj = new resize("uploaded/" . $file);
			
			// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
			$resizeObj -> resizeImage(640, 480, 'crop');

			// *** 3) Save image
			$resizeObj -> saveImage("uploaded/" . $file);
		}
		
		//show success message
    ?>
<!DOCTYP html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style>
		.save-successful { background: lightgreen; }
	</style>
</head>
<body>	
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
		
		<script>
			$(window).load(function(){
				$("button").click(function(){
					window.location.replace("main.php");
				});
				
				$('.modal-body').append('<?php
				echo "<h6>Uploaded files:</h6>";    
				if(isset($uploaded) && is_array($uploaded)){
					echo "<ul>";
					foreach($uploaded as $file){
						echo "<li>$file</li>";
					}
					echo "</ul>";
				}
				?>');
				$('#success').modal('show');
			});
		</script>
</body>
</html>		
	<?php
    }
}
else
{
	header("Location: main.php");
	exit;
}
?>