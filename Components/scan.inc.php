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
    unset($_SESSION["scanmode"]);
    //session_destroy();

    header("location: ../index.php");
    exit();
}

if (isset($_POST["scan"])) {
    include '../dbh.inc.php';

    $scan = $_POST["scan"];
    $date = date("m-d-Y");
    $time = date("h:iA");

    $pattern = "/[^0-9]/";
    $replacement = "";
    $scan = preg_replace($pattern, $replacement, $scan);

    $updateStatus = "UPDATE personnel SET person_status = CASE person_status WHEN 1 THEN 0 ELSE 1 END WHERE person_id = '$scan'";

    if (mysqli_query($conn, $updateStatus)) {
        $selectSQL = "SELECT * FROM personnel WHERE person_id = '$scan'";
        $result = $conn->query($selectSQL);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $person_status = $row["person_status"];

                $inOutLog = "INSERT INTO log (log_date, log_time, log_status, person_id) VALUES ('$date', '$time', $person_status, '$scan')";

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
    header("location: ../index.php?id=" . $scan . "&status=" . $person_status);
    exit();
}

if (isset($_POST["startmealscan"])) {
    require_once '../dbh.inc.php';

    $mealType = $_POST["meal-type"];

    if ($mealType == 6) {
        $mealLog = 'INSERT INTO meal_reserve (event_id, meal_types, reserv_date, reserv_ath) VALUES (' . $_POST["res-event"] . ', "' . $_POST["res-meal-value"] . '", "' . $_POST["res-date"] . '", "' . $_POST["res-athletes-value"] . '")';

        if ($_POST["res-event"] == "" || $_POST["res-meal-value"] == "" || $_POST["res-date"] == "" || $_POST["res-athletes-value"] == "") {
            echo "
            <script>
                alert('Error. Please fill up all inputs for reserving.')
                window.location.href = '../index.php';
            </script>";
        } else {
            if (mysqli_query($conn, $mealLog)) {
                echo "
                    <script>
                        alert('Successfully reserved meal.')
                        window.location.href = '../index.php';
                    </script>";
            } else {
                echo "
                    <script>
                        alert('Error. Something went wrong in reserving meal.')
                        window.location.href = '../index.php';
                    </script>";
            }
        }
    } else {
        session_start();
        $_SESSION["mealscanmode"] = $mealType;
    }
    // header("location: ../index.php");
    echo "
            <script>
                window.location.href = '../index.php';
            </script>";
    exit();
}
if (isset($_POST["stopmealscan"])) {
    session_start();
    unset($_SESSION["mealscanmode"]);
    //session_destroy();

    header("location: ../index.php");
    exit();
}
if (isset($_POST["reset-meal"])) {
    require_once '../dbh.inc.php';

    $resetMeal = 'UPDATE personnel SET meal = 0';

    if (mysqli_query($conn, $resetMeal)) {
        echo "Success";
    } else {
        echo "Fail";
    }

    header("location: ../index.php");
}

if (isset($_POST["scan-meal"])) {
    include '../dbh.inc.php';

    $scan = $_POST["scan-meal"];
    $date = date("Y-m-d");
    $time = date("h:iA");

    $pattern = "/[^0-9]/";
    $replacement = "";
    $scan = preg_replace($pattern, $replacement, $scan);

    session_start();
    $mType = $_SESSION["mealscanmode"];


    $checkSQL = "SELECT person_id FROM personnel WHERE person_id = '$scan' LIMIT 1";
    $check = $conn->query($checkSQL);

    if ($check->num_rows < 1) {
        echo "
            <script>
                window.location.href = '../index.php?id=" . $scan . "';
            </script>";
    } else {
        $selectSQL = "SELECT * FROM `meal_log` WHERE meal_type = '$mType' AND meal_date = '$date' AND person_id = '$scan'";
        $result = $conn->query($selectSQL);

        if ($result->num_rows > 0) {
            echo "
                <script>
                    alert('This person has already scanned his meal.')
                    window.location.href = '../index.php';
                </script>";
        } else {
            $mealLog = "INSERT INTO meal_log (person_id, meal_type, meal_date, meal_time) VALUES ('$scan', $mType, '$date', '$time')";

            if (mysqli_query($conn, $mealLog)) {
                echo "
                Success
                    <script>
                        window.location.href = '../index.php?id=" . $scan . "';
                    </script>";
            } else {
                echo "
                Fail
                    <script>
                        window.location.href = '../index.php?id=" . $scan . "';
                    </script>";
            }
        }
    }
}
