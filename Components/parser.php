<?php
if (isset($_POST["event_id"])) {
    include '../dbh.inc.php';
    $data[] = "";
    $persons = "";
    $eventID = $_POST["event_id"];
    $sql = "SELECT * FROM personnel WHERE event_id = '$eventID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = strtolower($row["person_name"]);
            $persons .= '<option value="' . $row["person_id"] . '">' . ucwords($name) . '</option>';
        }
        $data["person"] = `
            <select id="res-athletes" name="res-athletes" class="w-full" data-te-select-init multiple disabled>
            <option value="" hidden selected></option>
                ` . $persons . `
            </select>
        `;
        echo json_encode($data);
    }


    $conn->close();
    exit();
}
