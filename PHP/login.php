<?php
require "conn.php";

$table_name = $_POST["table"];
$user_name = $_POST["username"];
$salt = "asdgfadfhabb";
$user_pass = ($_POST["pass"]).$salt;
$user_pass = sha1($user_pass);


$user_name = filter_var($user_name, FILTER_SANITIZE_STRING);
$user_pass = filter_var($user_pass, FILTER_SANITIZE_STRING);

$mysql_qry = 'SELECT * FROM ' . '`' . $table_name . '`' . ' WHERE `email` LIKE ' .  "'$user_name'" .  ' AND `access` LIKE ' . "'$user_pass'" . ';';
$result = mysqli_query($CONN, $mysql_qry);

if($result) {
    if(mysqli_num_rows($result) > 0) {
        echo "Login success";
    } else {
        echo "Login Failed";
    }
} else {
     echo " <br> Login Failed";
}

$CONN->close();
?>