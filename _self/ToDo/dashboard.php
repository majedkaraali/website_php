<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_k/styles.css">

    <title>Dashboard</title>

</head>
<h1>Dashboard</h1>




<body>
    <div class="menu">
        <h4>welcome</h4>
    </div>

   
    <table class="task" border="2px">
        <thead>             
            <tr>
                <th>TASK</th>
                <th>DATE</th>
                <th>STATUS</th>
            </tr>
        </thead>

     

        <?php
        session_start();
        require("data_con.php");
        
        $user_id = $_SESSION['user_id'];
        $qr="SELECT * FROM todo_items WHERE user_id=$user_id";
        $qr_run=mysqli_query($conn,$qr);
        if (!$qr_run) {
            die("Query failed: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($qr_run)>0){
           foreach ($qr_run as $val){
            
            ?>
            <tr>
            <td><?=$val['task'] ?></td>
            <td><?=$val['due_date'] ?></td>
            <td><?=$val['status'] ?></td>
            </tr>


            <?php
           }
        }

        ?>
    
           
    

      
    </table>


</body>
</html>