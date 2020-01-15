<?php
$fname = $_POST["fn"];
$lname = $_POST["ln"];
if($_SERVER["REQUEST_METHOD"]== "POST")
{	
	//error to show if user left the input field blank
	if (empty($_POST["fn"]) || empty($_POST["ln"]))
	{
		echo "Cannot leave blank";
		include 'task1.php';
	}
	//error to show if user enter something other than character in the input field 
	elseif((!preg_match("/^[a-zA-Z]*$/",$fname)) || (!preg_match("/^[a-zA-Z]*$/",$lname)))
	{
		echo "Only letters allowed";
		include 'task1.php';
	}
	//if everything is ok then print the fullname 
	else
	{
		echo "Hello ".$fname." ".$lname;
	}
}

?>