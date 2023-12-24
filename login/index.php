<?php
session_start();
if(!isset($_SESSION['email'])) {
header("location:login.php");
} 
else {
	$_SESSION['email'];
	
}





?>
<!DOCTYPE>
<html>
<head>
<title>LOGIN LOGOUT REGISTER TUTORIAL </title>
</head>
<body>
<div id="container">

	Merhaba <?php 
	include("dbconn.php");
	$email=$_SESSION['email'];
	$sql = " SELECT * FROM user WHERE Email='$email'";
	$qry = mysqli_query($conn, $sql);
	while($row=mysqli_fetch_array($qry)) {
		$dbemail = $row['Name'];
		$dbpassword = $row['Surname'];
	}
	?>
  <div id="navigation">
  <nav>
       <ul>
        <li><a href="#"> Home </a></li> 
        <li><a href="logout.php"> logout
        </ul>
       </nav>
   </div>
</div>
</body>
</html>
