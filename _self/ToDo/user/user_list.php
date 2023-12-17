<?php
include 'list.php';



$listName = isset($_GET['list_name']) ? $_GET['list_name'] : '';


if (!empty($listName)) {
    echo "<!DOCTYPE html>
            <html lang=\"en\">
            <head>
                <meta charset=\"UTF-8\">
                <title>{$listName} Tasks</title>
            </head>
            <body>";

    
    displayTasksByList($listName);

    echo "</body>
        </html>";
} else {
    // Handle the case when no list name is provided
    echo "List name not provided.";
}
?>
