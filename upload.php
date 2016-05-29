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
			
			//check if image is fake
			
			
			//check image size
			// if ($_FILES["upload"]["size"] > 2500000) 
			// {
				// echo "Sorry, your file is too large.";
				// $uploadOk = 0;
			// }
			
			//check file types
			
			
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
        }
		
		//show success message
    ?>
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
		
		<script type="text/javascript"src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script>
			$(window).load(function(){
				$('#success > .modal-body').append('<?php
				echo "<h6>Uploaded files:</h6>";    
				if(is_array($uploaded)){
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
	<?php
    }
}
else
{
	header("Location: main.php");
	exit;
}
?>