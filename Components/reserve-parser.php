<?php
if (isset($_POST["reserv_id"])) {
    include '../dbh.inc.php';
    $data = "";
    $reserveId = $_POST["reserv_id"];
    $sql = "SELECT meal_reserve.reserv_id, event.event_name, meal_reserve.meal_types, meal_reserve.reserv_date, meal_reserve.reserv_ath FROM `meal_reserve` INNER JOIN event ON meal_reserve.event_id = event.event_id WHERE reserv_id = $reserveId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $mealTypes = explode(",", $row["meal_types"]);
            $mealResult = "";
            for ($i = 0; $i < count($mealTypes); $i++) {
                $mealName[] = "";
                switch ($mealTypes[$i]) {
                    case "1":
                        $mealName[$i] = "Breakfast";
                        break;
                    case "2":
                        $mealName[$i] = "AM Snack";
                        break;
                    case "3":
                        $mealName[$i] = "Lunch";
                        break;
                    case "4":
                        $mealName[$i] = "PM Snack";
                        break;
                    case "5":
                        $mealName[$i] = "Dinner";
                        break;
                    default:
                        $mealName[$i] = "sayop";
                        break;
                }

                $mealResult .= $mealName[$i] . " - ";
            };


            $mealAthletes = explode(",", $row["reserv_ath"]);
            $athResult = "";
            $i  = 0;
            for ($i = 0; $i < count($mealAthletes); $i++) {
                $athName[] = "";
                $sql2 = "SELECT * FROM personnel WHERE person_id = $mealAthletes[$i]";
                $result2 = $conn->query($sql2);

                if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                        $name = strtolower($row2["person_name"]);
                        $athName[$i] = ucwords($name);
                    }
                }
                $athResult .= "<p class='even:bg-gray-200 odd:bg-gray-100'>" . $athName[$i] . "</p>";
            };


            $reserve = '
                <div class="w-full flex flex-col justify-center w-full -space-y-1 items-center pb-3 text-center">
                    <p class="text-2xl font-bold">' . ucwords($row["event_name"]) . '</p>
                    <p class="text-lg font-semibold underline">Reservation</p>
                </div>

                <p class="font-bold text-center">' . $mealResult . '</p>
                <p class="text-center border-b pb-1 italic font-semibold text-md">' . $row["reserv_date"] . '</p>
                <div class="text-center pt-2">' . $athResult . '</div>
            ';
        }

        echo json_encode($reserve);
    }

    $conn->close();
    exit();
}
