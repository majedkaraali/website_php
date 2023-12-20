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
    
    require('php/data_con.php');


    $stmt = $conn->prepare("INSERT INTO users (user_email, user_password) VALUES (?, ?)");
    
    $stmt->bind_param("ss", $user_email, $hashedPassword);

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
onclick="del_list('<?=$val['list_name']?>')"



<form  action="../php/del.php" method="post">
            
            <label for="del_listName">Email:</label><br>
            <input type="del_listName" name="del_listName" id="del_listName" required><br>
            <input type="submit">

            </form>