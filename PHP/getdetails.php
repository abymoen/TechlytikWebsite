<?php
    require "conn.php";

    $company = $_POST["company"];
    $monitor = $_POST["monitor"];

    $qry = "SELECT * FROM `monitors` WHERE `company` LIKE '$company' AND `name` LIKE '$monitor';";
    $final_array = array();
    
    $result = mysqli_query($CONN, $qry);
    if($result) {
        $rows = mysqli_num_rows($result);
        if(mysqli_num_rows($result) > 0) {
            while($rows = mysqli_fetch_array($result)) {
                array_push($final_array, array("status"=>$rows[2],"name"=>$rows[4],"surfacelocation"=>$rows[5], "RPM" =>$rows[7], 
                                              "field"=>$rows[6],"vibration"=>$rows[8],"armed"=>$rows[3],"run"=>$rows[9],
                                                "drumholelocation"=>$rows[11],"deviceaddress"=>$rows[12],"ipaddress"=>$rows[13],
                                                "ipmask"=>$rows[14],"ipgateway"=>$rows[15]));
            }
        }
        echo json_encode(array("server_response"=>$final_array));
    }
?>