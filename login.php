<?php
$uname=$pass='';
$flag=false;
//array including diff username and password in base 64 encoded format
$data=array("admin"=>"YWRtaW5wYXNz", "root"=>"cm9vdHBhc3M=", "sudoer"=>"c3Vkb2VycGFzcw==", "master"=>"bWFzdGVycGFzcw==");
session_start();
//if session is set then redirect to task4 else check if user submitted the correct data
if (isset($_SESSION['uname'])) {
	echo "<script>location.href='task4.php'</script>";
}
else{
	if(isset($_POST['nuser']))
	{	
		$uname=$_POST['nuser'];
		//checks if user exist in data
		if(array_key_exists($uname, $data))
		{	
			//if user exist check for password in base 64
			if($data[$uname]==base64_encode($_POST['userp']))
			{
				$_SESSION['uname']=$uname;
				echo "<script>location.href='task4.php'</script>";
				$flag=true;
			}
		}
		//if flag value is not changed then an error mssg is displayed
		if ($flag==false) {
			echo "<script type='text/javascript'>alert('Inncorrect details');</script>";
		}
	}
	
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<h1>Please Login To Access</h1>
<!-- take input from user and check for correct credentials on same page -->
<form method="post" action="login.php">
	Username:<input type="text" name="nuser" placeholder="admin"><br><br>
	Password:<input type="password" name="userp" placeholder="admin"><br><br>
	<input type="submit" name="login" value="Login">
</form>
</body>
</html>