<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>


<body><h1>Dashboard</h1>
    <div class="menu">
        <h4>welcome</h4>

    </div>

    <?php
        session_start();

        $user_id = $_SESSION['user_id'];
        echo"$user_id"."a";
    ?>
    
    
</body>
</html>