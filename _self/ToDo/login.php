
<div class="form-cont">
                <h1>Login</h1>
                <form  method="post">
            
                    <label for="email">Email:</label><br>
                    <input type="email" name="email" id="email" required><br>
                    <label for="pass">Password </label><br>
                    <input type="password" name="pass" id="pass" required><br>
                    <input type="submit">&nbsp;<input type="reset">

                </form>

                <p>New  Here? <a href="register.php">Register</a></p>
            </div>

<?php

require('php/data_con.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email = $_POST['email'];
    $user_password = $_POST['pass'];

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
            header("Location: user/dashboard.php");
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