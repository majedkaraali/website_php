<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ToDo</title>
    <link rel="stylesheet" href="css_k/styles.css">

</head>
<body>
    <div class="main">
        <div class="cal">


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
           
            <div class="right">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut earum minus aspernatur non, sequi odit sint placeat sapiente quasi, ducimus libero nisi facere a soluta neque blanditiis nostrum vel adipisci.</p>
            </div>
    </div>

    </div>



    <?php
require('data_con.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE user_Email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['user_Password'])) {
            // Start a session and store user information if needed
            session_start();
            $_SESSION['user_id'] = $row['user_id'];

            // Redirect to a dashboard or another page
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

<!-- Add this section to display error messages -->
<?php if (isset($error_message)): ?>
    <p><?php echo $error_message; ?></p>
<?php endif; ?>

</body>
</html>