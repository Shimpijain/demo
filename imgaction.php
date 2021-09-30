<?php
include("connection.php");
?>
<?php

function filtername($field)
  {
    $field=filter_var(trim($field),FILTER_SANITIZE_STRING);
    if(filter_var($field,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
    {
      return $field;
    }
    else
    {
      return FALSE;
    }
  }

$fname=test_input($_GET["filename"]);


	if ($fname==FALSE)
	{
		$msgerr="Please enter a correct value";
	}

	else
	{

		 $dupsql="select * from image where filename=\"$fname\"";
          $vals = mysqli_query($conn, $dupsql);          
          if(mysqli_num_rows($vals)>0)
          {
            $msgerr = "Category is already exixts.";
            header("Location:image.php?uploadOk=0&fname=$fname&msgerr=$msgerr");
          }
          else{

				if (!empty($fname)) 
					{
						$sql="insert into image(filename)values(\"$fname\")";
						if(mysqli_query($conn,$sql))
						{
							$msg = "Image added successfully";
							$fname="";
							$category="";
							header("Location:image.php?uploadOk=1&fname=$fname&msg=$msg");
						}
					else
					{
						$msgerr = "Image does not add successfully";						
						header("Location:image.php?uploadOk=0&fname=$fname&msgerr=$msgerr");
					}
				}
			}
		}

function test_input($data)
{
	$data= trim($data);
	$data= stripcslashes($data);
	$data= htmlspecialchars($data);
	return $data;
}
mysqli_close($conn);
?>