<?php
$fname = $_POST["fn"];
$lname = $_POST["ln"];
if($_SERVER["REQUEST_METHOD"]== "POST")
{
	if (empty($_POST["fn"]) || empty($_POST["ln"]))
	{
		echo "Cannot leave blank";
		include 'task3.php';
	}
	elseif((!preg_match("/^[a-zA-Z]*$/",$fname)) || (!preg_match("/^[a-zA-Z]*$/",$lname)))
	{
		echo "Only letters allowed";
		include 'task3.php';
	}
	else
	{
		if(isset($_POST['submit']))
		{ 
			$filepath = "uploads/" . $_FILES["imgfile"]["name"];
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
		//getting marks and storing them in array
		$marks=trim($_POST['marks']);
		$marksar=explode("\n", $marks);
		$counter=count($marksar);
		for ($i=0;$i<$counter;$i++) {
			$tmp=explode("|", $marksar[$i]);
			//if marks are entered in correct format then only it will print else skip this part as it is not required field
			if(count($tmp)>1){
			echo "<table> <tr><td>$tmp[0]</td><td>$tmp[1]</td></tr> </table>";
			}
		}
	}
	
	
} 
?>