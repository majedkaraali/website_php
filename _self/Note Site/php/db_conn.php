<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "note_data2";

$conn = new mysqli($servername, $db_username, $db_password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!mysqli_select_db($conn, $dbname)) {
    $createDbQuery = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($createDbQuery) === TRUE) {
        create_the_tables($conn);  // Pass $conn to the function
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $conn->close();

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

function create_the_tables($conn) {
    $createCommonTasksTableQuery = "
        CREATE TABLE IF NOT EXISTS common_tasks (
        task_id INT(11) AUTO_INCREMENT PRIMARY KEY,
        user_id INT(11) NOT NULL,
        task_name VARCHAR(255) NOT NULL,
        status ENUM('pending', 'done') NOT NULL,
        due_date VARCHAR(255),
        list_tag VARCHAR(255) NOT NULL,
        important TINYINT(1) NOT NULL,
        creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(user_id)
    )";
    if ($conn->query($createCommonTasksTableQuery) === TRUE) {
        echo "common_tasks table created successfully";
    } else {
        echo "Error creating common_tasks table: " . $conn->error;
    }

  
    $createUsersTableQuery = "
    CREATE TABLE IF NOT EXISTS users (
        user_id INT(11) AUTO_INCREMENT PRIMARY KEY,
        user_name VARCHAR(200) NOT NULL,
        user_email VARCHAR(200) NOT NULL,
        user_password VARCHAR(200) NOT NULL
    )";
    if ($conn->query($createUsersTableQuery) === TRUE) {
        echo "users table created successfully";
    } else {
        echo "Error creating users table: " . $conn->error;
    }


    $createUserListsTableQuery = "
    CREATE TABLE IF NOT EXISTS user_lists (
        list_id INT(11) AUTO_INCREMENT PRIMARY KEY,
        user_id INT(11),
        list_name VARCHAR(255) NOT NULL,
        FOREIGN KEY (user_id) REFERENCES users(user_id)
    )";
    if ($conn->query($createUserListsTableQuery) === TRUE) {
        echo "user_lists table created successfully";
    } else {
        echo "Error creating user_lists table: " . $conn->error;
    }
}
?>
