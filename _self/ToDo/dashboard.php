<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_k/styles.css">

    <title>Dashboard</title>

</head>


<body><h1>Dashboard</h1>
    <div class="menu">
        <h4>welcome</h4>

        <table class="task" border="2px">
            
          
                
                <tr>
                    <th>TASK</th>
                    <th>DATE</th>
                    <th>STATUS</th>
                </tr>
         
            

            <tr>
                <td>eat</td>
                <td>12</td>
                <td>444</td>
            </tr>

          
        </table>

    </div>

    <?php
        session_start();


        $user_id = $_SESSION['user_id'];
        echo"$user_id";
    ?>
    
    
</body>
</html>