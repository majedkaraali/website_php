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
            <h1>Planned Tasks</h1>
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
       
 
        $user_id = $_SESSION['user_id'];
        
        $qr = "SELECT * FROM common_tasks WHERE user_id = $user_id AND status != 'done' AND list_tag = 'planned'";

        $qr_run=get_record("common_tasks",$qr);
        
        if (mysqli_num_rows($qr_run)>0){
           foreach ($qr_run as $val){
            
            ?>
            <tr>
            <td><?=$val['task_name'] ?></td>
            <td><?=$val['due_date'] ?></td>
            <td><?=$val['status'] ?></td>
            <td><button class="done">Done</button></td>
   
            </tr>


            <?php
           }
        }

        ?>


    </table>

    <div class="n_task">

        <form class="form_2" action="../php/insert.php" method="post" onsubmit="submitForm(event)">
            <label for="tname">Task</label>
            <input type="text" id="tname" name="tname" required>
            <br>
            <input type="hidden" name="tlist" value="planned">
            <br>
            <label for="tdate" id="tdate_lbl" >Date</label>
            <input type="date" id="tdate" name="tdate">
            <br>
            <input type="submit" value="add task">
                
            
        </form>


    </div>

</div>


</body>

<script>
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
           
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>