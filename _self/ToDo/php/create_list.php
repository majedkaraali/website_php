<?php
$newListName = isset($_POST['new_list_name']) ? $_POST['new_list_name'] : '';

$newListName = filter_var($newListName, FILTER_SANITIZE_STRING);

// Create a new user list in the database
// (You need to implement the database insertion logic here)

exit();
?>
