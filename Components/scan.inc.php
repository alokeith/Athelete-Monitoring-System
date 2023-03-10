<?php
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

    $updateStatus = "UPDATE personnel SET person_status = CASE person_status WHEN 1 THEN 0 ELSE 1 END WHERE person_id = $scan";

    if (mysqli_query($conn, $updateStatus)) {
        echo "<script>alert('Status Update Success')</script>";
    } else {
        echo "<script>alert('Status Update Failed')</script>";
    }
    header("location: ../index.php?id=" . $scan);
    exit();


    // echo '
    // <span class="w-full bg-red-300 fixed -mt-8">' . $scan . '</span>
    // ';
}
