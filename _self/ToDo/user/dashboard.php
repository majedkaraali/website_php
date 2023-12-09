<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="res/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Dashboard</title>


</head>


<body>


 


    <div class="menu">
        <ul>

 

            <li class="profile" >
                <div class="img-box">
                    <img src="res/img/default.png" alt="user photo " width="50px" height= "50px"> 
                    <?php
                    $user_name="USS";
                    {
                        
                        ?>
                        <h2><?=$user_name ?></h2>
                        <?php
                    }?>
                   
                    
                </div> 

                
            </li>

       
            
            <li>
                <a href="#" >
                <i class="fa fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#" >
                    <i class="fa fa-star"></i>
                    
                    Important
                </a>
            </li>
            <li>
                <a href="#" >
                    <i class="fa fa-calendar"></i>
                    
                    Planned
                </a>
            </li>
            <li>
                <a href="#" >
                <i class="fa fa-sticky-note" aria-hidden="true"></i>
                    
                    Tasks
                </a>
            </li>
  
            
            

        </ul>
    </div>




    <div class="board">

    <div class="head-box">
        <h1>Dashboard</h1>
    </div>

    <div class="head-box">
        <h1>Going Tasks</h1>
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
        session_start();
        require("data_con.php");
        
        $user_id = $_SESSION['user_id'];
        $qr="SELECT * FROM todo_items WHERE user_id=$user_id and status!='Completed'";
        $qr_run=mysqli_query($conn,$qr);

        if (!$qr_run) {
            die("Query failed: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($qr_run)>0){
           foreach ($qr_run as $val){
            
            ?>
            <tr class="item">
            <td><?=$val['task'] ?></td>
            <td><?=$val['due_date'] ?></td>
            <td><?=$val['status'] ?></td>
            <td><button>Done</button></td>
   
            </tr>


            <?php
           }
        }

        ?>
    
    
      
    </table>
    

    <div class="head-box">
        <h1>Completed Tasks</h1>
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
     
        require("data_con.php");
        
        $user_id = $_SESSION['user_id'];
        $qr="SELECT * FROM todo_items WHERE user_id=$user_id and status='Completed' ";
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
            <td><button>Redo</button></td>
   
            </tr>


            <?php
           }
        }

        ?>
    
    
      
    </table>
    </div>



</body>
</html>



