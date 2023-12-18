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
        <div class="box"><span>Missing Tasks:24</span></div>
    </div>

    <div class="new_task">

        <button class="new_btn" id="new_btn" onclick="toggle_new() ">New Task</button>

        <div class="new" id="new">

          
            <form action="../php/insert.php" method="post" onsubmit="submitForm(event)">
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
        $qr="SELECT * FROM common_tasks WHERE user_id=$user_id and status!='done'";
        $qr_run=get_record("common_tasks",$qr);
        if (mysqli_num_rows($qr_run)>0){
           foreach ($qr_run as $val){
            ?>
            <tr class="item">
            <td><?=$val['task_name'] ?></td>
           
            <td><?=$val['status'] ?></td>

            <td><?=$val['list_tag']?></td>

            <td><button id="done_btn" class="done" onclick="complete_task(<?=$val['task_id']?>)">Done</button></td>

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
     
        
      
        $qr="SELECT * FROM common_tasks WHERE user_id=$user_id and status='done'";
        $qr_run=get_record("common_tasks",$qr);
        
        if (mysqli_num_rows($qr_run)>0){
           foreach ($qr_run as $val){
            
            ?>
            <tr>
            <td><?=$val['task_name'] ?></td>
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
    function complete_task(task_id){
        
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../php/func.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
        if (xhr.status === 200) {
        console.log(xhr.responseText);
       
        }
        
        else {
        console.error("Request failed: " + xhr.status);
   


        }};
        xhr.send("task_id=" + encodeURIComponent(task_id));
        location.reload();
        
    }


    function submitForm(event) {
    event.preventDefault();

    fetch('../php/insert.php', {
        method: 'POST',
        body: new FormData(event.target),
    })
    .then(response => {
        console.log(response);
        if (response.ok) {
            location.reload();
            alert("Task added successfuly");
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

    
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


    function toggleDateInput() {
        var tdate_lbl = document.getElementById('tdate_lbl');
        var tlist = document.getElementById('tlist');
        var tdate = document.getElementById('tdate');
        
       
        tdate_lbl.style.display = tlist.value === 'planned' ? 'block' : 'none';

        if (tlist.value === 'planned') {
            tdate.style.display = 'block';
            tdate.required = true;
        } else {
            tdate.style.display = 'none';
            tdate.required = false;
        }
    

    }


    window.onload = function () {
    window.scrollTo (0, 0);
  }



</script>

<script>
  history.scrollRestoration = "manual";
</script>


</html>



