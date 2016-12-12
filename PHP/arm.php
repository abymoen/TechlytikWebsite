<?php
    require "conn.php";

    $user_name = $_POST["username"];
    $name = $_POST["name"];
    $arm_state = $_POST["armed"];

    $sql = "UPDATE monitors SET armed =  '$arm_state' WHERE name =  '$name' AND user = '$user_name';";
    
    $result = mysqli_query($CONN, $sql);
    if(mysqli_affected_rows($CONN) > 0) {
        echo "armed success";
    } else {
        echo "armed failed";
    }

?>