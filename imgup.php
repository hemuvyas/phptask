<?php
$fname = $_POST["fn"];
$lname = $_POST["ln"];
if($_SERVER["REQUEST_METHOD"]== "POST")
{
	if (empty($_POST["fn"]) || empty($_POST["ln"]))
	{
		echo "Cannot leave blank";
		include 'task2.php';
	}
	elseif((!preg_match("/^[a-zA-Z]*$/",$fname)) || (!preg_match("/^[a-zA-Z]*$/",$lname)))
	{
		echo "Only letters allowed";
		include 'task2.php';
	}
	else
	{
		// Uploads image if uploaded, else skip this part of image upload
		if(isset($_POST['submit']))
		{ 
			//setting path for uploaded image in uploads directory
			$filepath = "uploads/" . $_FILES["imgfile"]["name"];
			//if file uploaded then display it on submit
 			if(move_uploaded_file($_FILES["imgfile"]["tmp_name"], $filepath)) 
			{
				echo "<img src=".$filepath." height=200 width=300 />";
				echo "<br>";
			}
		}
		else 
		{
			echo "Error !!<br>";
		}
		echo "Hello ".$fname." ".$lname;
	}
	
} 
?>