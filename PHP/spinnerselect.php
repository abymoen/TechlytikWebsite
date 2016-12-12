<?php
    require "conn.php";
    
    $comp = $_POST["comp"];
    $run =  $_POST["run"];
    $val = strcmp($run, "all");

    if($val == 0) {
        $qry = "SELECT * FROM monitors WHERE `company` LIKE '$comp';";
    } else {
        $qry = "SELECT * FROM monitors WHERE `company` LIKE '$comp' AND `run` LIKE '$run';";    
    }
    
    $result = mysqli_query($CONN, $qry);
    $final_array = array();

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