<?php
require("../php/data_con.php");



function get_record($table,$qr){
    global $conn;
    $qr_run=mysqli_query($conn,$qr);
    return $qr_run;  
}







?>