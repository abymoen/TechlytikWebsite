<?php
    require "conn.php";

    $company = $_POST["company"];
    $name = $_POST["name"];

    $sql_qry = "DELETE FROM `monitors` WHERE `company` LIKE '$company' AND `name` LIKE '$name';";

    if(mysqli_query($CONN, $sql_qry)) {
        echo "delete success";    
    } else {
        echo "delete fail";
    }
?>