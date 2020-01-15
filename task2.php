<!-- checking if logged in or not -->
<?php
session_start();
if (!isset($_SESSION['uname'])) {
	echo "<script>location.href='login.php'</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Task 2</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- function for adding first and last name -->
	<script type="text/javascript">
		$(document).ready(function(){
			$("input").keyup(function(){
				document.getElementById('fullname').value=$("#fn").val()+" "+$("#ln").val()
			});
		});
	</script>
	<style type="text/css">
		.red{
			color: red;
		}
		.pagination {
 			 display: inline-block;
		}

		.pagination a {
  			color: black;
  			float: left;
  			padding: 8px 16px;
  			text-decoration: none;
		}
		.pagination a.active {
  			background-color: #4CAF50;
  			color: white;
		}

		.pagination a:hover:not(.active) {
			background-color: #ddd;
		}
	</style>
</head>
<body>
	<div class="pagination">
		  <a href="task1.php">1</a>
		  <a href="task2.php">2</a>
		  <a href="task3.php">3</a>
		  <a href="task4.php">4</a>
		  <a href="task5.php">5</a>
		  <a href="task6.php">6</a>
	</div>
	<h1>PHP task 2</h1>
	<span class="red">* Required</span><br><br>
	<!-- user input -->
	<form method="post" action="imgup.php" enctype="multipart/form-data">
		First Name : <input type="text" name="fn" id="fn" value=""><span class="red">*</span><br><br>
		Last Name : <input type="text" name="ln" id="ln" value=""><span class="red">*</span><br><br>
		Full Name : <input type="text" name="fullname" id="fullname" readonly="readonly">
		<br><br>
		Select Image:<input type="file" name="imgfile"><br><br>
		<input type="submit" name="submit" value="submit">
	</form>
	<a href="logout.php" class="red">Logout</a>

</body>
</html>