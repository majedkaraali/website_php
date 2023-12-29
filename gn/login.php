<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LOGİN</title>
	<link rel="stylesheet" href="style.css">

</head>

<style>
	body{
		margin:0;
		padding:0;
		background:#c4ffe2;
	}
	</style>
<body>
	<div class="signup-form">
		<form action="index.html">
		<h1>Sign Up</h1>
		<tr>
				<td><label>Adı:</label><td><input name="adi" type="text"></td>
			</tr>
			<tr>
				<td><label>Soyadı:</label><td><input name="soyad" type="text"></td>
			</tr>
			<tr>
				<td><label>Şifre:</label><td><input name="sifre" type="Password"></td>
			</tr>
			<tr>
				<td></td><input type="reset"><input type="submit"></td>
			</tr>
		</form>
	</div>
</body>

<?php

require('databse.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email = $_POST['adi'];
    $user_password = $_POST['sifre'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = ? LIMIT 1");
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo $row['user_password'];

        if (password_verify($user_password, $row['user_password'])) {
            session_start();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['user_name'];
            $user_id = $_SESSION['user_id'];

            echo"YES";
            header("Location:web.php");
            echo"$user_id";
            exit();
        } else {
            $error_message = "Incorrect password!";
        }
    } else {
        $error_message = "User not found!";
    }

    $stmt->close();
    $conn->close();
}
?>

<?php if (isset($error_message)): ?>
    <p><?php echo $error_message; ?></p>
<?php endif; ?>