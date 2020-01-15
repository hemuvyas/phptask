<?php
$fname = $_POST["fn"];
$lname = $_POST["ln"];
$mobno=$_POST['mob'];
//regex for mobile no.s
$reg="/^([+][9][1]|[9][1]|[0]){0,1}([6-9]{1})([0-9]{9})$/";
if($_SERVER["REQUEST_METHOD"]== "POST")
{
	if (empty($_POST["fn"]) || empty($_POST["ln"]))
	{
		echo "Cannot leave blank";
		include 'task4.php';
	}
	elseif((!preg_match("/^[a-zA-Z]*$/",$fname)) || (!preg_match("/^[a-zA-Z]*$/",$lname)))
	{
		echo "Only letters allowed";
		include 'task4.php';
	}
	//if mobile no. entered doesn't match the format of regex then error message
	elseif (!preg_match($reg, $mobno)){
		echo "invalid no.";
		include 'task4.php';
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