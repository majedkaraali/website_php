<?php
require('../php/data_con.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tname = $_POST['tname'];
    $tdate = $_POST['tdate'];
    $tlist= $_POST['tlist'];
    
    $user_id = $_SESSION['user_id'];
    echo($user_id);

   /* $stmt = $conn->prepare("SELECT * FROM users WHERE user_Email = ? LIMIT 1");
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();


    $stmt->close();
    $conn->close();
    */
}
?>

<?php if (isset($error_message)): ?>
    <p><?php echo $error_message; ?></p>
<?php endif; ?>


?>