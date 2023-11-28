<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ToDo</title>
    <link rel="stylesheet" href="css/style.css">

</head>


<body>
    <div class="header">
        <nav>logo</nav>
        <ul >
            <li> <a href="home.html">Home</a></li>
            <li> <a href="about.html">About</a></li>
            <li> <a href="login.html">Login</a></li>

        </ul>
    </div>

    <?php
    session_start();
    $servername = "localhost";
    $username = "majed";
    $password = "mmmm1234";
    $dbname = "todo_site";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION["user_id"])) {
        // Redirect to the login page if not logged in
        header("Location: login.php");
        exit();
    }


    
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM todo_items WHERE user_id = $user_id");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $f=$row['task'];
    echo $f;
    
    ?>


    
</body>



</html>


