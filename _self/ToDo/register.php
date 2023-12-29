<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 2px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
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
            margin-top: 10px;
            color: #666;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }


        .error-message {
            color: #ff0000;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<form id="registrationForm" method="post" onsubmit="return validateForm()">

    <label for="username">User Name</label><br>
    <input type="text" name="username" id="username" required><br>

    <label for="email">Email</label><br>
    <input type="text" name="email" id="email" required><br>

    <label for="password">Password</label><br>
    <input type="password" name="password" id="password" required><br>

    <label for="rePassword">Confirm Password</label><br>
    <input type="password" name="rePassword" id="rePassword" required>
    <div id="passwordError" class="error-message"></div><br>

    <input type="submit">&nbsp;<input type="reset">

    <p>Already Have account? <a href="login.php">Login</a></p>

</form>

<script>
    function validateForm() {
        var password = document.getElementById("password").value;
        var rePassword = document.getElementById("rePassword").value;
        var errorDiv = document.getElementById("passwordError");

        if (password !== rePassword) {
            errorDiv.innerHTML = "Passwords do not match.";
            return false;
        } else {
            errorDiv.innerHTML = "";
            return true;
        }
    }
</script>

</body>
</html>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $user_name=$_POST['username'];
    $hashedPassword = password_hash($user_password, PASSWORD_DEFAULT);
    
    require('php/data_con.php');


    $stmt = $conn->prepare("INSERT INTO users (user_email, user_password,user_name) VALUES (?, ?, ?)");
    
    $stmt->bind_param("sss", $user_email, $hashedPassword,$user_name);

    if ($stmt->execute()) {
        echo "Registration successful!";
        header("Location: index.php");
    } else {
        echo "Error during registration: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

}


?>
