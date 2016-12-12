<?php
require "conn.php";

$company_name = $_POST["company"];
$table_name = $_POST["table"];
$user_name = $_POST["username"];

$user_name = filter_var($user_name, FILTER_SANITIZE_STRING);
$comapny_name = filter_var($coapny_name, FILTER_SANITIZE_STRING);

$mysql_qry = 'SELECT * FROM ' . '`' . $table_name . '`' . ' WHERE `name` LIKE ' .  "'$company_name'" . ';';
$result = mysqli_query($CONN, $mysql_qry);
if($result) {
    if(mysqli_num_rows($result) > 0) {
        $mysql_qry = 'SELECT * FROM `users` WHERE `email` LIKE ' .  "'$user_name'" . ';';
        $result = mysqli_query($CONN, $mysql_qry);
        if(mysqli_num_rows($result) > 0) {
            echo "User success";
        } else {
            echo "User failure";
        }
    } else {
        echo "Company Invalid";
    }
} else {
     echo "Connection Failed";
}

$CONN->close();

?>