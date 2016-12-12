<?php
require "conn.php";
    
$username = $_POST["username"];
$name = $_POST["name"];
$field = $_POST["field"];
$run = $_POST["run"];
$surfacelocation = $_POST["surfacelocation"];
$drumholelocation = $_POST["drumholelocation"];
$company = $_POST["company"];
$armed = $_POST["armed"];
$oldname = $_POST["oldname"];


$insert = "('$username', '$name', '$field', 'optimal', '$run', '$surfacelocation', '$drumholelocation',  '$company', '$armed')";

$mysql_qry = 'SELECT * FROM `monitors` WHERE `name` LIKE ' .  "'$name'" . ' AND `user` LIKE ' . "'$username'" . ';';
        $result = mysqli_query($CONN, $mysql_qry);
        if(mysqli_num_rows($result) > 0) {
            echo "Name copy";
        } else {
            $mysql_qry = "UPDATE `monitors` SET user='$username', name='$name', field='$field', status='optimal', run='$run',
                            surfacelocation='$surfacelocation', drumholelocation='$drumholelocation', company='$company', armed='$armed' WHERE name='$oldname';";
            $result = mysqli_query($CONN, $mysql_qry);
            if($result) {
                 echo "Entry success";
            } else {
                echo "Entry failure";
            }
        }
?>