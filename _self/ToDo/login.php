


<?php
// Assuming you have a database connection
$servername = "localhost";
$username = "majed";
$password = "mmmm1234";
$dbname = "todo_site";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$email = $_POST['email'];
$password = $_POST['pass'];

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM users WHERE user_Email = ? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows == 1) {
    // User found, check password
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['user_Password'])) {
        // Password is correct, you can proceed with login
        session_start(); // Start the session at the beginning of your script

// Assuming you have verified the user's credentials and obtained the user_id
        $user_id = $row['user_ID']; // Replace with the actual user_id
    // Save user_id in the session
        $_SESSION["user_id"] =$user_id;
        echo $user_id;
        global $_SESSION;
        header("Location: index.php");

        

    } else {
        // Password is incorrect
        echo "Incorrect password!";
    }
} else {
    // User not found
    echo "User not found!";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>