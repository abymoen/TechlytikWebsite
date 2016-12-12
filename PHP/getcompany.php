<?php
    require "conn.php";
    
    $username = $_POST["username"];
    $sql = "SELECT * FROM users WHERE `email` LIKE '$username';";

    $final_array = array();

    $result = mysqli_query($CONN, $sql);
    if($result) {
        $rows = mysqli_num_rows($result);
        if(mysqli_num_rows($result) > 0) {
            while($rows = mysqli_fetch_array($result)) {
                array_push($final_array, array("company"=>$rows[3]));
            }
        }
        echo json_encode(array("server_response"=>$final_array));  
    }

?>