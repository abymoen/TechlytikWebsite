<?php
require "conn.php";

$table_name = $_POST["table"];
$user_name = $_POST["username"];
$salt = "asdgfadfhabb";
$user_pass = ($_POST["pass"]).$salt;
$user_pass = sha1($user_pass);
$company_name = $_POST["company"];

$user_name = filter_var($user_name, FILTER_SANITIZE_STRING);
$user_pass = filter_var($user_pass, FILTER_SANITIZE_STRING);
$comapny_name = filter_var($coapny_name, FILTER_SANITIZE_STRING);

$insert = "('$user_name', '$user_pass', '$company_name');";

$mysql_qry = 'SELECT * FROM ' . '`' . $table_name . '`' . ' WHERE `name` LIKE ' .  "'$company_name'" . ';';
$result = mysqli_query($CONN, $mysql_qry);
if($result) {
    if(mysqli_num_rows($result) > 0) {
        $mysql_qry = 'SELECT * FROM `users` WHERE `email` LIKE ' .  "'$user_name'" . ';';
        $result = mysqli_query($CONN, $mysql_qry);
        if(mysqli_num_rows($result) > 0) {
            echo "Email copy";
        } else {
            $mysql_qry = 'INSERT INTO `users` (email, access, company) VALUES ' . $insert;
            $result = mysqli_query($CONN, $mysql_qry);
            if($result) {
                echo "Register success";
            } else {
                echo "Register failure";
            }
        }
    } else {
        echo "Company Invalid";
    }
} else {
     echo "Connection Failed";
}

$CONN->close();
?>