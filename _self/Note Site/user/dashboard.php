<?php
    require('menu.php');
?>
<html lang="en">
    
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="..\res\css\dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</head>


<body>
   
    <div class="vertical-line"></div>
    <div class="board">

    <div class="head-box">
        <h1>Dashboard</h1>
        <hr>
    </div>


    <div class="sect">
        <?php
        $CompletedTasksCount=getCompletedTasksCount();
        $PendingTasksCount=getPendingTasksCount();
        $TodayTasksCount=getTodayTasksCount();
        $MissingTasksCount=getMissingTasksCount();
         ?>
        <div class="box"><span>Completed Tasks</span><h2><?=$CompletedTasksCount?></h2></div>
        <div class="box"><span>Pending Tasks</span><h2><?=$PendingTasksCount?></h2></div>
        <div class="box"><span>Today Tasks</span><h2><?=$TodayTasksCount?></h2></div>
        <div class="box"><span>Overdue Tasks</span><h2><?=$MissingTasksCount?></h2></div>
    </div>

    <div class="new_task">

        <button class="new_btn" id="new_btn" onclick="toggle_new() ">New Task</button>

        <div class="new" id="new">

          
            <form class="form_1" action="../php/insert.php" method="post" onsubmit="submitForm(event)">
                <label for="tname">Task</label>
                <input type="text" id="tname" name="tname" required>
                <br>
                <label for="tdate" id="tdate_lbl" style="display:none;" >Date</label>
                <input type="date" id="tdate" name="tdate" style="display:none;">
                <br>
                <label for="tlist">Tag</label>

                <select name="tlist" id="tlist" onchange="toggleDateInput()">
                    <option value="important">Important</option>
                    <option value="planned">Planned</option>
                    <option value="task">Tasks</option>

                    <?php
                        $user_id = $_SESSION['user_id'];
                        $qr="SELECT * FROM user_lists WHERE user_id=$user_id";
                        $qr_run=mysqli_query($conn,$qr);
                        if (mysqli_num_rows($qr_run)>0){
                            foreach ($qr_run as $val){
                            ?>
                            <option value="<?=$val['list_name']?>"><?=$val['list_name']?></option>
                           <?php
                           }}
                           
                           ?>
                    
                </select>

                <input class="add_task" type="submit">
            </form>
            <div class="btns">
                
                <button class="cancel" id="cancel" onclick="canceltogg()">Cancel</button>
                
           

            </div>
    
        </div>

         
    </div>
    

    <div class="head-box">
        <h1>Recent  tasks</h1>
    </div>


    

    <table class="task" >
        <thead>             
            <tr>
                <th>TASK</th>
                <th>STATUS</th>
                <th>TAG</th>

            </tr>
        </thead>
        <?php
       
      
        
        $user_id = $_SESSION['user_id'];
        $qr = "SELECT * FROM common_tasks WHERE user_id = $user_id AND status != 'done' ORDER BY creation_date DESC";

        $qr_run=get_record("common_tasks",$qr);
        if (mysqli_num_rows($qr_run)>0){
           $counter = 0;
           foreach ($qr_run as $val){
            ?>
            <tr class="item">
            <td><?=$val['task_name'] ?></td>
           
            <td><?=$val['status'] ?></td>

            <td><?=$val['list_tag']?></td>

            <?php

            if ($val['important']==1){
                ?>
                <td ><i onclick="star_task(<?=$val['task_id']?>)" class="fa fa-star" aria-hidden="true"></i> </td>
                <?php 
            }
            else{
                ?>
                <td ><i onclick="star_task(<?=$val['task_id']?>)" class="fa fa-star-o" aria-hidden="true"></i> </td>
                <?php
            }
            ?>

            <td><button id="done_btn" class="done" onclick="complete_task(<?=$val['task_id']?>)">Done</button></td>
            

            </tr>
            <?php
                    $counter++;
                    if ($counter >= 5) {
                        break;
                    }
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
                <th>TAG</th>
            </tr>
        </thead>
        <?php
        $qr="SELECT * FROM common_tasks WHERE user_id=$user_id and status='done'";
        $qr_run=get_record("common_tasks",$qr);
        
        if (mysqli_num_rows($qr_run)>0){
            $counter = 0;
           foreach ($qr_run as $val){
            
            ?>
            <tr>
            <td><?=$val['task_name'] ?></td>
            <td><?=$val['list_tag']?></td>
            <td><button id="redo_btn" class="redo" onclick="re_complete_task(<?=$val['task_id']?>)">Redo</button></td>
   
            </tr>


            <?php
            $counter++;
            if ($counter >= 5) {
                break;
            }
           }
        }

        ?>
    
    
      
    </table>

 
    </div>

</body>

<?php
require('scripts.php');
?>

<script>
  history.scrollRestoration = "manual";
</script>


</html>



