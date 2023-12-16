<?php
require('../php/data_con.php');
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tname = $_POST['tname'];
    $tdate = $_POST['tdate'];
    $tlist= $_POST['tlist'];
    $user_id = $_SESSION['user_id'];


    $qr="INSERT INTO $tlist (`item_id`, `user_id`, `task`, `item_date`, `item_status`) VALUES (NULL, '$user_id', '$tname', '$tdate', 'pending');";
    $qr_run=mysqli_query($conn,$qr);

    if ($conn->query($qr) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $qr . "<br>" . $conn->error;
    }
    
    // Close the connection
    $conn->close();
 

}
?>

<?php if (isset($error_message)): ?>
    <p><?php echo $error_message; ?></p>
<?php endif; ?>


?>