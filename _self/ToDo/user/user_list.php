<?php
require("../php/data_con.php");



$listName = isset($_GET['list_name']) ? $_GET['list_name'] : '';

echo $listName;

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

    echo "List name not provided.";
}
?>
