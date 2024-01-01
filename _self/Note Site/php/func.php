<?php
require("../php/data_con.php");

$user_id = $_SESSION['user_id'];




function create_list($listName){
    global $conn;
    global $user_id;
    $listName=$_POST['listName'];
    session_start();
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO `user_lists` (`list_id`, `user_id`, `list_name`) VALUES (NULL, '$user_id', '$listName')";
    $result = $conn->query($sql);

}

function del_list($list_name){
    global $conn;
    global $user_id;
    session_start();
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("DELETE FROM user_lists WHERE  list_name = (?)");
    $stmt2 = $conn->prepare("DELETE FROM common_tasks WHERE list_tag =(?)");
    
    $stmt->bind_param("s", $list_name);
    $stmt2->bind_param("s", $list_name);

    if ($stmt->execute()) {
        echo " successful!";
        $stmt2->execute();
    
       


    $stmt->close();
    $conn->close();

}}

function get_record($table,$qr){
    global $conn;
    $qr_run=mysqli_query($conn,$qr);
    return $qr_run;  
}




function updateTaskStatus($task_id,$operation){
    
    global $conn;
    if ($operation=='complete_task'){
        $sql = "UPDATE common_tasks SET status = 'done' WHERE task_id = '$task_id'";
    }

    elseif ($operation=='re_complete_task'){
        $sql = "UPDATE common_tasks SET status = 'pending' WHERE task_id = '$task_id'";
    }

    elseif ($operation=='star_task'){
        $sql = "UPDATE common_tasks SET important = CASE WHEN important = 0 THEN 1 ELSE 0 END WHERE task_id = '$task_id';";
    }

    $result = $conn->query($sql);
}



function getCountOfTasks($status) {
    global $conn;
    global $user_id;

    $query = "SELECT COUNT(*) AS count FROM common_tasks WHERE status = ? AND user_id = ? ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $status,$user_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $count = $result->fetch_assoc()['count'];

    $stmt->close();

    return $count;
}

function getCompletedTasksCount() {
    return getCountOfTasks('done');
}

function getPendingTasksCount() {
    return getCountOfTasks('pending');
}

function getTodayTasksCount() {
    global $conn;
    global $user_id;

    $query = "SELECT COUNT(*) AS count FROM common_tasks WHERE due_date = CURDATE() AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->fetch_assoc()['count'];
    $stmt->close();
    

    return $count;
}

function getMissingTasksCount() {
    global $conn;
    global $user_id;

    $query = "SELECT COUNT(*) AS count FROM common_tasks WHERE status = 'pending' AND due_date < CURDATE() AND list_tag='planned' AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->fetch_assoc()['count'];
    $stmt->close();
   

    return $count;
}


function displayTasksByList($listType)
{
    global $conn;
    
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

if (isset($_POST['task_id'])) {
    updateTaskStatus($_POST['task_id'],$_POST['operation']);

}


if (isset( $_POST['listName'])) {
    create_list( $_POST['listName']);
}

if (isset( $_POST['del_listName'])) {
    del_list( $_POST['del_listName']);
}

?>



