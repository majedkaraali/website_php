<form  method="post">

    <label for="username">User</label><br>
    <input type="text" name="username" id="1"><br>

    <label for="email">Email</label><br>
    <input type="text" name="email" id="1"><br>

    <label for="Password">Password</label><br>
    <input type="text" name="Password" id="1"><br>

    <label for="Re-Password">Conform Password</label><br>
    <input type="text" name="Re-Password" id="1"><br>
    
    <input type="submit">&nbsp;<input type="reset">




</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $email = $_POST['email'];
    $password = $_POST['Password'];
    require('data_con.php');


    // Hash the password before storing it in the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (user_Email, user_Password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $hashedPassword);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error during registration: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();

?>