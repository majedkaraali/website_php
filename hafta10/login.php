<?php
session_start();
include('db_conn.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email = $_POST['email'];
    $user_password = $_POST['pass'];

    $sql = ("SELECT * FROM users WHERE user_email = '$user_email' AND user_password ='$user_password' ");
    $qry=mysqli_query($conn,$sql);
    if ($qry){
        echo"yes";
    }

    else{
        echo"nnn";
    }

    while ($row=mysqli_fetch_array($qry)) {
            $email=$row ['user_email'];
            $password=$row['user_password'];

        if (($user_password==$password &&  $email==$user_email)) {
            $_SESSION['user_id'] = $row['user_ID'];
            $user_id = $_SESSION['user_id'];

            echo"YES";
            header("Location: web.php");
 
          
        } 
   

}}
?>





<h1>Login</h1>
<form  method="post">
            
    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" required><br>
    <label for="pass">Password </label><br>
    <input type="password" name="pass" id="pass" required><br>
    <input type="submit">&nbsp;<input type="reset">

</form>
<a href="register.php">Register</a>





