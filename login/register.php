
<?php
session_start();

if(isset($_POST['submitdata']))
{
	include("dbconn.php");
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$insert = "INSERT INTO user( Name,Surname,Email,Pass) VALUES ('$firstname','$surname','$email','$password')";
	$qry = mysqli_query($conn, $insert);
		if($qry) {
			$_SESSION['email'] = $email;
			header("location: web.php");
		}
	}
else
{
?>
<html>
<head>
<title>LOGIN LOGOUT REGISTER</title>

</head>
<body>

   Register Form
<form action="register.php" method="post" id= "form">
Adı:<input type="text" name="firstname" > <br>
Soyadı:<input type="text" name="surname" ><br>
E-mail:<input type="email" name="email"  ><br>
Şifre: <input type="password" name="password"><br>
<input type="submit" name="submitdata">
</form>

</body>
</html>
<?php } ?>

