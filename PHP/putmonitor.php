<?php
require "conn.php";
    
$username = $_POST["username"];
$name = $_POST["name"];
$field = $_POST["field"];
$run = $_POST["run"];
$surfacelocation = $_POST["surfacelocation"];
$drumholelocation = $_POST["drumholelocation"];
$deviceaddress = $_POST["deviceaddress"];
$ipaddress = $_POST["ipaddress"];
$ipmask = $_POST["ipmask"];
$ipgateway = $_POST["ipgateway"];
$company = $_POST["company"];
$armed = $_POST["armed"];


$insert = "('$username', '$name', '$field', 'optimal', '$run', '$surfacelocation', '$drumholelocation', '$deviceaddress',
            '$ipaddress', '$ipmask', '$ipgateway', '$company', '$armed');";

$mysql_qry = 'SELECT * FROM `monitors` WHERE `name` LIKE ' .  "'$name'" . ' AND `user` LIKE ' . "'$username'" . ';';
        $result = mysqli_query($CONN, $mysql_qry);
        if(mysqli_num_rows($result) > 0) {
            echo "Name copy";
        } else {
            $mysql_qry = 'INSERT INTO `monitors` (user, name, field, status, run, surfacelocation, drumholelocation, 
            deviceaddress, ipaddress, ipmask, ipgateway, company, armed) VALUES ' . $insert;
            $result = mysqli_query($CONN, $mysql_qry);
            if($result) {
                 echo "Entry success";
            } else {
                echo "Entry failure";
            }
        }
?>