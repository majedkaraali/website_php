<?php
require("../php/data_con.php");



function get_record($table,$qr){
    global $conn;
    $qr_run=mysqli_query($conn,$qr);
    return $qr_run;  
}


function displayTasksByList($listType)
{
    
    $sql = "SELECT * FROM common_tasks WHERE list_type = '$listType'";
    $result = $conn->query($sql);

   
    echo "<h2>$listType Tasks</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['task_name']} - Status: {$row['status']}</li>";
    }
    echo "</ul>";

    $conn->close();
}



?>



