<?php
require('../php/data_con.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tname = $_POST['tname'];
    $tlist_tag=$_POST['tlist'];
    $user_id = $_SESSION['user_id'];
    $is_important=0;

    if ($tlist_tag=='important'){
        $is_important=1;
        global $is_important;


    }

    
    if (isset($_POST['tdate'])){
        $tdate = $_POST['tdate'];
        $qr="INSERT INTO common_tasks (task_id,user_id,task_name,status,due_date,list_tag,important,creation_date) VALUES (NULL,'$user_id','$tname','pending','$tdate','$tlist_tag',$is_important, current_timestamp());";
    }

    else{
        $qr="INSERT INTO common_tasks (task_id,user_id,task_name,status,list_tag,important,creation_date) VALUES (NULL,'$user_id','$tname','pending','$tlist_tag',$is_important, current_timestamp());";
    }
    
    
    if ($conn->query($qr) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $qr . "<br>" . $conn->error;
    }

    $conn->close();
 

}
?>

<?php if (isset($error_message)): ?>
    <p><?php echo $error_message; ?></p>
<?php endif; ?>

