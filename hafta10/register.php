<form  method="post">

    <label for="username">Name</label><br>
    <input type="text" name="username" id="1"><br>

    <label for="surneme">surneme</label><br>
    <input type="text" name="surneme" id="1"><br>

    <label for="email">Email</label><br>
    <input type="text" name="email" id="1"><br>

    <label for="Password">Password</label><br>
    <input type="text" name="password" id="1"><br>

    
    
    <input type="submit">&nbsp;<input type="reset">

</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email = $_POST['email'];
    $user_password = $_POST['pass'];

    $sql = ("INSERT INTO users values() = $user_email ");
    $qry=mysqli_query($conn,$sql);


    if ($qry){
        echo"yes";
    }
}


?>