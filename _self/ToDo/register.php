<form  method="post">

    <label for="username">User</label><br>
    <input type="text" name="username" id="1"><br>

    <label for="email">Email</label><br>
    <input type="text" name="email" id="1"><br>

    <label for="Password">Password</label><br>
    <input type="text" name="password" id="1"><br>

    <label for="Re-Password">Conform Password</label><br>
    <input type="text" name="Re-Password" id="1"><br>
    
    <input type="submit">&nbsp;<input type="reset">




</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    require('data_con.php');


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (user_Email, user_Password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error during registration: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

?>