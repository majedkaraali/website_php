<?php
require("../php/data_con.php");

session_start();
$user_id = $_SESSION['user_id'];

$task_id = $_POST['task_id'];
$task_id = filter_var($task_id, FILTER_SANITIZE_STRING);

$sql = "UPDATE common_task SET status = 'done' WHERE task_id = '$task_id'";
$result = $conn->query($sql);


exit();
?>
