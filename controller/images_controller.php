

<?php 

if(isset($_FILES['img1']) or isset($_FILES['img2']) or isset ($_FILES['img3']))	
{

	$images = ['img1',"img2","img3"];

	//JSON
	$jsonString = file_get_contents('./config.json');
	$data = json_decode($jsonString, true);
	
	//UPLOAD

	for($i=0;$i<3;$i++)
	{
		if ($_FILES[$images[$i]]['name']!="")
		{
			$name = $_FILES[$images[$i]]['name'];
			$tmp_file = $_FILES[$images[$i]]['tmp_name'];
			$mime = strtolower(substr(strrchr($_FILES[$images[$i]]['name'], '.'), 1));
			$target_file = "./view/img/galerie".$i.".".$mime;
			echo $target_file;
	
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$uploadOk = 1;
		
			// Check if file already exists
			if (file_exists("./view/img/".basename($tmp_file))) {
			  echo "Sorry, file already exists.";
			  $uploadOk = 0;
			}

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			  echo "Sorry, only JPG, JPEG $ PNG files are allowed.";
			  $uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			  echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				unlink("./view/img/".$_SESSION['config']['galerie'][$i]);
			  if (move_uploaded_file($tmp_file, $target_file)) {  	
			    echo "The file ". htmlspecialchars(basename($name)). " has been uploaded.";
			  } else {
			    echo "Sorry, there was an error uploading your file.";
			  }
			}	
	
			$img = htmlspecialchars(basename($target_file));
			$data["galerie"][$i] = $img; 
		}
		
	}
	
	
	// JSON
	$newJsonString = json_encode($data,JSON_PRETTY_PRINT);
	file_put_contents('./config.json', $newJsonString);

	header('Location: index.php?uc=admin');	
}


else
{
	header('Location: index.php?uc=admin');
	
}


 ?>



