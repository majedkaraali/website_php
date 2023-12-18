<?php
require("../php/data_con.php");

session_start();
$user_id = $_SESSION['user_id'];

$newListName = $_POST['listName'];
$newListName = filter_var($newListName, FILTER_SANITIZE_STRING);

$sql = "INSERT INTO `user_lists` (`list_id`, `user_id`, `list_name`) VALUES (NULL, '$user_id', '$newListName')";
$result = $conn->query($sql);


exit();
?>
