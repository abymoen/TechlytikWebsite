<?php
    require "conn.php";
        
    $comp = $_POST["comp"];
    $sql  = "SELECT * FROM monitors WHERE `company` LIKE '$comp';";
        
    $result = mysqli_query($CONN, $sql);
    $final_array = array();

    if($result) {
        $rows = mysqli_num_rows($result);
        if(mysqli_num_rows($result) > 0) {
            while($rows = mysqli_fetch_array($result)) {
                array_push($final_array, array("run"=>$rows[9]));
            }
        }
        echo json_encode(array("server_response"=>$final_array));
    }
?>