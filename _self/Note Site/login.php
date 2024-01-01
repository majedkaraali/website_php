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
       

        if (password_verify($user_password, $row['user_password'])) {
            session_start();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['user_name'];
            $user_id = $_SESSION['user_id'];

           
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





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .form-cont {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width:30%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 4px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 9px;
            box-sizing: border-box;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 7px;
            color: #666;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error .p {
            margin-top: -12px;
            margin-bottom: 12px;
        }

    </style>
</head>
<body>

<div class="form-cont">
    <h1>Login</h1>
    <form id="loginForm" method="post" onsubmit="return validateForm()">
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required><br>
        <label for="pass">Password</label><br>
        <input type="password" name="pass" id="pass" required><br>

        <div id="passwordError" class="error">

         <?php if (isset($error_message)): ?>
         <p style="color:red;"><?php echo $error_message; ?></p>
         <?php endif; ?>

        </div>

        <input type="submit" value="Login">&nbsp;<input type="reset">
    </form>
   

    <p>New Here? <a href="register.php">Register</a></p>
</div>

<script>
    function validateForm() {
        var email = document.getElementById("email").value;
        var password = document.getElementById("pass").value;
        var errorDiv = document.getElementById("passwordError");

        // Perform additional validation if needed
        // For now, let's just check if the fields are not empty
        if (!email || !password) {
            errorDiv.innerHTML = "Please enter both email and password.";
            return false;
        } else {
            errorDiv.innerHTML = "";
            return true;
        }
    }
</script>

</body>
</html>


