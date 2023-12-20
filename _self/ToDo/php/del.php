<?php

require("../php/data_con.php");

$list_name= $_POST['del_listName'];
echo "$user_id"."$list_name";


$sql = "DELETE FROM user_lists WHERE  list_name = $list_name;";
$result = $conn->query($sql);

/*
$stmt = $conn->prepare("DELETE FROM user_lists WHERE  list_name = (?)");
    
$stmt->bind_param("s", $list_name);

if ($stmt->execute()) {
        echo " successful!";
       
} else {
        echo "Error during registration: " . $stmt->error;
}

    $stmt->close();
    $conn->close();

*/

?>
<?php if (isset($error_message)): ?>
    <p><?php echo $error_message; ?></p>
<?php endif; ?>