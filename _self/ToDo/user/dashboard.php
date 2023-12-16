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
        <h1>Dashboard</h1>
    </div>


    <div class="sect">
        <div class="box"><span>Completed Tasks:2</span></div>
        <div class="box"><span>Pending Tasks:8</span></div>
        <div class="box"><span>Today Tasks:5</span></div>
        <div class="box"><span>Loren Tasks:24</span></div>
    </div>

    <div class="new_task">

        <button class="new_btn" id="new_btn" onclick="toggle_new()">New Task</button>

        <div class="new" id="new">

            <div class="formm" id=formm>

                <form  action="../php/insert.php" method="post"></form>
                <label for="tname">Task</label>
                <input type="text" id="tname" name="tname">
        
                <label for="tdate">Date</label>
                <input type="date" type="hidden" id="tdate" name="tdate">
                <label for="tlist">Tag</label>
          


                <select name="tlist" id="tlist">
                    <option value="Imprtant">Imprtant</option>
                    <option value="Imprtant">Planned</option>
                    <option value="Imprtant">Tasks</option>
                </select>

            </div>

            <div class="btns">
                <button class="add" id='add_new'>Add task</button>
                <button  class="cancel" id='cancel' onclick="canceltogg()">Cancel</button>
           

            </div>
    
        </div>

         
    </div>
    

    <div class="head-box">
        <h1>Going Tasks</h1>
    </div>


    

    <table class="task" >
        <thead>             
            <tr>
                <th>TASK</th>
                <th>STATUS</th>

            </tr>
        </thead>
        <?php
       
        require("../php/func.php");
        
        $user_id = $_SESSION['user_id'];
        $qr="SELECT * FROM todo_items WHERE user_id=$user_id and status!='Completed'";
        $qr_run=get_record("todo_items",$qr);
        if (mysqli_num_rows($qr_run)>0){
           foreach ($qr_run as $val){
            ?>
            <tr class="item">
            <td><?=$val['task'] ?></td>
           
            <td><?=$val['status'] ?></td>
            <td><button class="done">Done</button></td>
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
                <th>STATUS</th>
            </tr>
        </thead>

     

        <?php
     
        
      
        $qr="SELECT * FROM todo_items WHERE user_id=$user_id and status='Completed'";
        $qr_run=get_record("todo_items",$qr);
        
        if (mysqli_num_rows($qr_run)>0){
           foreach ($qr_run as $val){
            
            ?>
            <tr>
            <td><?=$val['task'] ?></td>
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

<script>
    
    function toggle_new() {
   
        var form = document.getElementById("new");

        var button = document.getElementById("new_btn");

    
        if (form.style.display === "none" || form.style.display === ""){
        form.style.display = "flex";
        button.style.display="none"
       } 


      else {
        form.style.display = "none";
      }
    }
 
  
    function canceltogg() {
        var form = document.getElementById("new");

        var button = document.getElementById("new_btn");


        if (form.style.display === "none" || form.style.display === ""){
            form.style.display = "flex";
        } 


        else {
            form.style.display = "none";
            button.style.display="block"
        }
        
    }

</script>

</html>



