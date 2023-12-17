<?php
require('../php/data_con.php');
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tname = $_POST['tname'];
    $tdate = $_POST['tdate'];
    $tlist_tag=$_POST['tlist'];
    $user_id = $_SESSION['user_id'];


    $qr="INSERT INTO common_tasks (task_id,user_id,task_name,status,list_tag,important,creation_date) VALUES (NULL,'$user_id','$tname','pending','$tlist_tag','1', current_timestamp());";
    $qr_run=mysqli_query($conn,$qr);

    if ($conn->query($qr) === TRUE) {
        echo "Record inserted successfully";
        echo $tlist_tag;
    } else {
        echo "Error: " . $qr . "<br>" . $conn->error;
    }

    $conn->close();
 

}
?>

<?php if (isset($error_message)): ?>
    <p><?php echo $error_message; ?></p>
<?php endif; ?>


?>