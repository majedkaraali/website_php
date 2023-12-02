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
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $hashedPassword = password_hash($user_password, PASSWORD_DEFAULT);
    
    require('data_con.php');

    echo"$user_password"."GG<br>";

   
    

    $stmt = $conn->prepare("INSERT INTO users (user_Email, user_Password) VALUES (?, ?)");
    
    $stmt->bind_param("ss", $user_email, $password);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error during registration: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

?>