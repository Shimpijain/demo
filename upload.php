<?php
	$target_path="image";
	$target_file=$target_path.basename($_FILES["image"]["name"]);
	$uploadOk=1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if(isset($_POST["submit"])){
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check!==false){
			echo "File is an image - ".$check["mime"].".";
			$uploadOk=1;
		}
		else{
			echo "File is not an image.";
			$uploadOk=0;
		}
	}


	if ($imageFileType!="jpg" && $imageFileType!="png" && $imageFileType!= "jpeg")
	{
		$uploadOk=0;
	}

	if($uploadOk==0)
	{
		$msgerr = "Sorry, only JPG,JPEG,PNG files are allowed";
		header("Location:image.php?msgerr=$msgerr&uploadOk=$uploadOk&fname=$filename");
	}
	else
	{
		if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
		{
			$filename = basename($_FILES["image"]["name"]);
			$msg = "The file " . basename($_FILES["image"]["name"])." has been uploaded.";
			header("Location:image.php?msg=$msg&fname=$filename&uploadOk=$uploadOk");
		}
		else
		{
			$uploadOk=0;
			$msgerr =  "Sorry! File is not upload successfully.";
			header("Location:image.php?msgerr=$msgerr&uploadOk=$uploadOk&fname=$filename");
		}
	}

?>
