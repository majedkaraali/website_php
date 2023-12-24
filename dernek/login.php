<?php
session_start();
include("dbconn.php");
if(isset($_POST['submitdatalogin']))
{
	$email  = $_POST['email'];
	$password  = $_POST['password'];
	$sql = " SELECT * FROM user WHERE Email='$email' and Pass='$password'";
	$qry = mysqli_query($conn, $sql);
	while($row=mysqli_fetch_array($qry)) {
		$dbemail = $row['Email'];
		$dbpassword = $row['pass'];
		if ($email == $dbemail && $password ==$dbpassword){
			$_SESSION['email'] = $email;
			header("location: web.php");
		}
	}
}
?>

<html>
<head>
<title>LOGIN LOGOUT REGISTER TUTORIAL</title>

</head>
<body>

   <form action="login.php" method="post" id= "form">
	E-mail:<input type="email" name="email" ><br>
	Şifre:<input type="password" name="password"><br>
	<input type="submit" name="submitdatalogin"><br>
	<a href="register.php">Register</a>
</form>

</body>
</html>
