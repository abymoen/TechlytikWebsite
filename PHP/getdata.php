<?php
    require "conn.php";

    $user_name = $_POST["username"];

    $qry = "SELECT * FROM `monitors` WHERE `user` LIKE '$user_name';";
    $final_array = array();
    
    $result = mysqli_query($CONN, $qry);
    if($result) {
        $rows = mysqli_num_rows($result);
        if(mysqli_num_rows($result) > 0) {
            while($rows = mysqli_fetch_array($result)) {
                array_push($final_array, array("status"=>$rows[2],"name"=>$rows[4],"location"=>$rows[5],"armed"=>$rows[3],
                                              "company"=>$rows[10]));
            }
        }
        echo json_encode(array("server_response"=>$final_array));
    }
?>