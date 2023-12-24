<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="..\res\css\dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</head>

<?php





$listName = isset($_GET['list_name']) ? $_GET['list_name'] : '';




if (!empty($listName)) {

    require('menu.php');

    ?>

    <div class="board">
        <div class="head-box">
            <h1><?=$listName?></h1>
        </div>

   

     <table class="task" >
        <thead>             
            <tr>
                <th>TASK</th>
                <th>STATUS</th>
            </tr>
        </thead>

     

        <?php
        $user_id = $_SESSION['user_id'];
        $qr="SELECT * FROM common_tasks WHERE user_id=$user_id and status!='done'  AND list_tag = '$listName' ";
        $qr_run=get_record("common_tasks",$qr);
        
        if (mysqli_num_rows($qr_run)>0){
           foreach ($qr_run as $val){
            
            ?>
            <tr>
            <td><?=$val['task_name'] ?></td>
            <td><?=$val['status'] ?></td>
            <td><button class="done">Done</button></td>
            
   
            </tr>


            <?php
           }
        }

        ?>

        <?php
        
} else {

    echo "List name not provided.";
}
?>