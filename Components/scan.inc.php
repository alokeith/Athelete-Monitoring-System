<?php
date_default_timezone_set('Asia/Manila');

if (isset($_POST["startscan"])) {
    require_once '../dbh.inc.php';

    session_start();
    $_SESSION["scanmode"] = true;

    header("location: ../index.php");
    exit();
}
if (isset($_POST["stopscan"])) {
    session_start();
    session_unset();
    session_destroy();

    header("location: ../index.php");
    exit();
}

if (isset($_POST["scan"])) {
    include '../dbh.inc.php';

    $scan = $_POST["scan"];
    $date = date("m-d-Y");
    $time = date("h:iA");

    $updateStatus = "UPDATE personnel SET person_status = CASE person_status WHEN 1 THEN 0 ELSE 1 END WHERE person_id = $scan";

    if (mysqli_query($conn, $updateStatus)) {
        $selectSQL = "SELECT * FROM personnel WHERE person_id = $scan";
        $result = $conn->query($selectSQL);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $person_status = $row["person_status"];

                // echo "<script>
                // console.log('" . $time . "')
                // </script>";

                $inOutLog = "INSERT INTO log (log_date, log_time, log_status, person_id) VALUES ('$date', '$time', $person_status, $scan)";

                if (mysqli_query($conn, $inOutLog)) {
                    echo 'Success';
                } else {
                    echo 'Fail';
                }
            }
        }
    } else {
        echo "<script>alert('Status Update Failed')</script>";
    }
    header("location: ../index.php?id=" . $scan);
    exit();
}
