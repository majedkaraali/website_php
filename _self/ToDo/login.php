<?php
require('data_con.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email = $_POST['email'];
    $user_password = $_POST['pass'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE user_Email = ? LIMIT 1");
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo $row['user_Password'];

        if (password_verify($user_password, $row['user_Password'])) {
            session_start();
            $_SESSION['user_id'] = $row['user_id'];

            echo"YES";
            header("Location: dashboard.php");
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