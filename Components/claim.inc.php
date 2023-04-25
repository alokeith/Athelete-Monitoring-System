<?php
if (isset($_POST["claim"])) {
    include '../dbh.inc.php';
    $reserveId = $_POST["reserv-id"];
    $sql = "SELECT * FROM meal_reserve WHERE reserv_id = " . $reserveId . "";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $mealType = $row["meal_types"];
            $date = $row["reserv_date"];
            $time = date("h:iA");

            $mealAthletes = explode(",", $row["reserv_ath"]);
            $athResult = "";
            $i  = 0;
            for ($i = 0; $i < count($mealAthletes); $i++) {
                // echo $mealAthletes[$i] . $mealType . $date . $time . "<br>";
                $mealLog = "INSERT INTO meal_log (person_id, meal_type, meal_date, meal_time) VALUES ('$mealAthletes[$i]', '$mealType', '$date', '$time')";

                if (mysqli_query($conn, $mealLog)) {
                    // echo "Success";
                } else {
                    // echo "Fail ";
                }
            };
            // echo $date . " " . $time . "<br>";
            $deleteRes = "DELETE FROM `meal_reserve` WHERE reserv_id = " . $reserveId . "";
            if (mysqli_query($conn, $deleteRes)) {
                // echo "Successfull deletion";

            } else {
                // echo "Fail Deletion";
            }
        }
    }
    header("location: ./kitchen.php");

    $conn->close();
    exit();
}

if (isset($_POST["cancel"])) {
    include '../dbh.inc.php';
    $reserveId = $_POST["reserv-id"];

    $deleteRes = "DELETE FROM `meal_reserve` WHERE reserv_id = " . $reserveId . "";
    if (mysqli_query($conn, $deleteRes)) {
        echo "Successfull deletion";
    } else {
        echo "Fail Deletion";
    }

    header("location: ./kitchen.php");
}
