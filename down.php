<?php
$fname = $_POST["fn"];
$lname = $_POST["ln"];
$mobno=$_POST['mob'];
$em=$_POST['email'];
$reg="/^([+][9][1]|[9][1]|[0]){0,1}([7-9]{1})([0-9]{9})$/";
//data to be entered in the file
$txt="name is :".$fname."\nLast name is :".$lname."\nMobile no. is:".$mobno."\nEmail address is :".$em;
if($_SERVER["REQUEST_METHOD"]== "POST")
{
	if (empty($_POST["fn"]) || empty($_POST["ln"]))
	{
		echo "Cannot leave blank";
		include 'task6.php';
	}
	elseif((!preg_match("/^[a-zA-Z]*$/",$fname)) || (!preg_match("/^[a-zA-Z]*$/",$lname)))
	{
		echo "Only letters allowed";
		include 'task6.php';
	}
	elseif (!preg_match($reg, $mobno)){
		echo "invalid no.";
		include 'task6.php';
	}
	elseif(!filter_var($em,FILTER_VALIDATE_EMAIL))
	{
		echo "invalid mail id";
		include 'task6.php';
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
		$filename = "test.doc";
		$counter=count($marksar);
		for ($i=0;$i<$counter;$i++) {
			$tmp=explode("|", $marksar[$i]);
			if(count($tmp)>1){
			echo "<table> <tr><td>$tmp[0]</td><td>$tmp[1]</td></tr> </table>";
			}
		}
		//creating and entering data in the file
		$myfile = fopen($filename, "w");
		fwrite($myfile, $txt);
		fclose($myfile);
		//download the file on submit
		if(isset($_POST['submit']))
		{
			if ( file_exists( $filename )) {
				header("Content-Type: application/octet-stream");
  				header("Content-Disposition: attachment; filename=$filename");
  				header("Content-Length: ".filesize( $filename));
  				header("Cache-Control: must-revalidate");
  				ob_clean();
    			flush();
  				readfile( $filename );
			}
		}
	}
} 
?>
