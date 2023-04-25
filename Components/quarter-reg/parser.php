<?php
session_start();
$conn = new mysqli("localhost","root","","ams");

require_once("php-ext.php");

$sql = new queries();



if (isset($_POST["register"])){
    $result = "";
    $data[] = "";
    $rawpersonid = $_POST["register"];
    $quarterid = $_POST["quarterid"];
    $pattern = "/[^0-9]/";
    $replacement = "";
    $personid = preg_replace($pattern, $replacement, $rawpersonid);
    $checkid = $sql->checkid("personnel", "person_id", $personid);
    $checkidquarter = $sql->checkid("quarter", "quar_id", $quarterid);
    $checkidregistered = $sql->checkid("reg_personnel", "person_id", $personid);
    $registeredcount = $checkidregistered->num_rows;
    $quartercount = $checkidquarter->num_rows;
    if ($quartercount < 1){
        $data["result"] = "Incorrect parameters!";
    }else if ($registeredcount > 0){
        $data["result"] = "<h5 class='red-text'>This personnel is already registered.</h5>";
    }else if ($checkid->num_rows < 1){
        $data["result"] = "<h5 class='red-text'>ID not recognized!</h5>";
    }else{
        ///REGISTER
        $query = "INSERT INTO reg_personnel (person_id, quar_id) VALUES (?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $personid,$quarterid);
        $stmt->execute();
        if ($stmt){
            $data["result"] = "success";
            $_SESSION["alert"] = "<h5 class='green-text'>Registered Successfully!</h5>";
        }else{
            $data["result"] = "Error";
        }
        $stmt->close();
    }
    echo json_encode($data);
    exit();
}
?>