<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="..\res\css\dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Dashboard</title>


</head>


<body>
    <?php
    require('menu.php');

    ?>

    <div class="board">
        <div class="head-box">
            <h1>Important</h1>
        </div>

   

     <table class="task" >
        <thead>             
            <tr>
                <th>TASK</th>
                <th>DATE</th>
                <th>STATUS</th>
            </tr>
        </thead>

     

        <?php
       
        require("../php/func.php");
        $user_id = $_SESSION['user_id'];
        
      
        $qr="SELECT * FROM planned_items WHERE user_id=$user_id and item_status!='Completed'";
        $qr_run=get_record("important_items",$qr);
        
        if (mysqli_num_rows($qr_run)>0){
           foreach ($qr_run as $val){
            
            ?>
            <tr>
            <td><?=$val['task'] ?></td>
            <td><?=$val['item_date'] ?></td>
            <td><?=$val['item_status'] ?></td>
            <td><button>Redo</button></td>
   
            </tr>


            <?php
           }
        }

        ?>

</div>


</body>