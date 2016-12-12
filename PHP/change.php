
<?php
require "conn.php";

$username = $_POST["username"];
$salt = "asdgfadfhabb";
$user_pass = ($_POST["pass"]).$salt;
$user_pass = sha1($user_pass);

$user_name = filter_var($user_name, FILTER_SANITIZE_STRING);
$user_pass = filter_var($user_pass, FILTER_SANITIZE_STRING);

$mysql_qry = "UPDATE users SET access = '$pass' WHERE email = '$username'";     
$result = mysqli_query($CONN, $mysql_qry);

if ($result) {
    echo "Password success";
} else {
    echo "Password failed";
}

?>

