<?php

date_default_timezone_set('Asia/Manila');
// Get the current date
//$currentDateTime = date('Y-m-d h:i A');
$currentDate = date('Y-m-d');
$mealtype = "9";
if (isset($_SESSION["mealscanmode"])) {
    $mealtype = $_SESSION["mealscanmode"];
}
$sqlMeal = "SELECT meal_id FROM meal_log WHERE meal_date = '$currentDate' AND meal_type = '$mealtype'";
$resMeal = mysqli_query($conn, $sqlMeal);
$countMeal = mysqli_num_rows($resMeal);

$meal = $countMeal;

$sqlNoMeal = "SELECT person_id FROM personnel WHERE person_id NOT IN (SELECT person_id FROM meal_log WHERE meal_date = '$currentDate' AND meal_type = '$mealtype')";
$resNoMeal = mysqli_query($conn, $sqlNoMeal);
$countNoMeal = mysqli_num_rows($resNoMeal);

$nomeal = $countNoMeal;
?>

<div id="meal-table" class="hidden">
    <!-- ATHLETES TAKEN MEAL -->
    <div class="w-5/12 border-r-2 border-white">
        <div class="flex h-auto justify-evenly items-center font-bold">
            <h1 class="w-11/12 text-center text-3xl">ATHLETES TAKEN MEAL</h1>
            <div class="p-2 border-2 text-center border-black min-w-[5.6rem] w-auto bg-green-200 flex justify-center items-center">
                <h1 class="float-left text-6xl text-center"><?php echo $meal; ?></h1>
            </div>
        </div>
        <div class="h-full overflow-x-hidden mt-2 mr-1 scroll-style pb-28">
            <?php
            include './dbh.inc.php';
            $sql = "SELECT DISTINCT event.event_id, event.event_name FROM personnel INNER JOIN event ON personnel.event_id = event.event_id WHERE personnel.person_id IN (SELECT person_id FROM meal_log WHERE meal_date = '$currentDate' AND meal_type = '$mealtype') ORDER BY event.event_name";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $event_id = $row["event_id"];
                    $event_name = $row["event_name"];

                    $sqlCount = "SELECT COUNT(*) as members FROM meal_log WHERE meal_date = '$currentDate' AND meal_type = '$mealtype' AND person_id IN (SELECT person_id FROM personnel WHERE event_id = '$event_id')";
                    $countQuery = mysqli_query($conn, $sqlCount);
                    $fetchQuery = mysqli_fetch_assoc($countQuery);

                    $memberCount = $fetchQuery['members'];

                    echo '
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-hidden rounded-md shadow-md">
                                        <table class="min-w-full text-center border-r-2 border-white">
                                            <thead class="border-b bg-gray-800 cursor-pointer" onclick="toggleTable(\'' . "nomeal" . $event_id . '\')">
                                                <tr>
                                                    <th scope="col" class="w-1/2 text-xl font-bold text-white px-4 py-4 uppercase" style="text-transform: uppercase">
                                                        <div class="flex text-center justify-between space-x-5">
                                                            <div class="w-1/12 border border-white rounded bg-green-500">' . $memberCount . '</div>
                                                            <div class="w-11/12">' . $event_name . '</div>
                                                        </div>
                                                    </th>
                                                    <th scope="col" class="w-4/12 text-sm font-medium text-white px-6 py-4">
                                                        CONTACT NO: 09123456789
                                                    </th>
                                                </tr>
                                            </thead class="border-b">
                                            <tbody id="' . "nomeal" . $event_id . '" class="fadeAnim hidden">';

                    $sql2 = "SELECT * FROM personnel WHERE event_id = '$event_id' AND person_id IN (SELECT person_id FROM meal_log WHERE meal_date = '$currentDate' AND meal_type = '$mealtype')";
                    $result2 = $conn->query($sql2);

                    if ($result2->num_rows > 0) {
                        while ($row = $result2->fetch_assoc()) {
                            $name = strtolower($row["person_name"]);
                            echo '
                                <tr class="border-b even:bg-gray-200 odd:bg-gray-100 hover:bg-gray-400 cursor-pointer" onclick="toggleModal(' . $row["person_id"] . ', \'' . ucwords($name) . '\')">
                                    <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900">
                                        <div class="flex text-center justify-between space-x-5">
                                            <div class="w-1/12 flex justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="bg-white rounded-2xl border border-black" fill="#22C55E" width="25" height="25" viewBox="0 0 512 512">
                                                    <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/>
                                                </svg>
                                            </div>
                                            <div class="w-11/12">CVRAA' . $row["person_id"] . '</div>
                                        </div>
                                    </td>
                                    <td class="text-sm text-gray-900 font-normal px-6 py-3 whitespace-nowrap">
                                    ' . ucwords($name) . '
                                    </td>
                                </tr class="bg-white border-b">';
                        }
                    }

                    echo ' </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        ';
                }
            }
            $conn->close();
            ?>


        </div>
    </div>

    <!-- ATHLETES NOT YET TAKEN MEAL -->
    <div class="w-5/12 border-r-2 border-white ">
        <div class="flex h-auto justify-evenly items-center font-bold">
            <h1 class="w-11/12 text-center text-3xl">ATHLETES NOT YET TAKEN MEAL</h1>
            <div class="p-2 border-2 text-center border-black min-w-[5.6rem] w-auto bg-red-200 flex justify-center items-center">
                <h1 class="text-6xl text-center"><?php echo $nomeal; ?></h1>
            </div>
        </div>
        <div class="h-full overflow-x-hidden mt-2 ml-1 scroll-style pb-28">

            <?php
            include './dbh.inc.php';
            $sql = "SELECT DISTINCT event.event_id, event.event_name FROM personnel INNER JOIN event ON personnel.event_id = event.event_id WHERE personnel.person_id NOT IN (SELECT person_id FROM meal_log WHERE meal_date = '$currentDate' AND meal_type = '$mealtype') ORDER BY event.event_name";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $event_id = $row["event_id"];
                    $event_name = $row["event_name"];

                    $sqlCount = "SELECT COUNT(*) as members FROM personnel WHERE event_id = '$event_id' AND person_id NOT IN (SELECT person_id FROM meal_log WHERE meal_date = '$currentDate' AND meal_type = '$mealtype')";
                    $countQuery = mysqli_query($conn, $sqlCount);
                    $fetchQuery = mysqli_fetch_assoc($countQuery);

                    $memberCount = $fetchQuery['members'];

                    echo '
                                    <div class="flex flex-col">
                                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                                <div class="overflow-hidden rounded-md shadow-md">
                                                    <table class="min-w-full text-center border-r-2 border-white">
                                                        <thead class="border-b bg-gray-800 cursor-pointer" onclick="toggleTable(\'' . "meal" . $event_id . '\')">
                                                            <tr>
                                                                <th scope="col" class="w-1/2 text-xl font-bold text-white px-4 py-4 uppercase" style="text-transform: uppercase">
                                                                    <div class="flex text-center justify-between space-x-5">
                                                                        <div class="w-1/12 border border-white rounded bg-green-500">' . $memberCount . '</div>
                                                                        <div class="w-11/12">' . $event_name . '</div>
                                                                    </div>
                                                                </th>
                                                                <th scope="col" class="w-4/12 text-sm font-medium text-white px-6 py-4">
                                                                    CONTACT NO: 09123456789
                                                                </th>
                                                            </tr>
                                                        </thead class="border-b">
                                                        <tbody id="' . "meal" . $event_id . '" class="fadeAnim hidden">';

                    $sql2 = "SELECT * FROM personnel WHERE event_id = '$event_id' AND person_id NOT IN (SELECT person_id FROM meal_log WHERE meal_date = '$currentDate' AND meal_type = '$mealtype')";
                    $result2 = $conn->query($sql2);

                    if ($result2->num_rows > 0) {
                        while ($row = $result2->fetch_assoc()) {
                            $name = strtolower($row["person_name"]);
                            echo '
                                <tr class="border-b even:bg-gray-200 odd:bg-gray-100 hover:bg-gray-400 cursor-pointer" onclick="toggleModal(' . $row["person_id"] . ', \'' . ucwords($name) . '\')">
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <div class="flex text-center justify-between space-x-5">
                                        <div class="w-1/12 flex justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="bg-white rounded-2xl border border-black" fill="#22C55E" width="25" height="25" viewBox="0 0 512 512">
                                                <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/>
                                            </svg>
                                        </div>
                                        <div class="w-11/12">CVRAA' . $row["person_id"] . '</div>
                                    </div>
                                </td>
                                    <td class="text-sm text-gray-900 font-normal px-6 py-3 whitespace-nowrap">
                                    ' . ucwords($name) . '
                                    </td>
                                </tr class="bg-white border-b">';
                        }
                    }

                    echo ' </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            ';
                }
            }
            $conn->close();

            ?>

        </div>
    </div>

    <div class="w-2/12 ml-1 overflow-x-auto overflow-y-hidden scroll-style-horiz whitespace-nowrap bg-gray-100 drop-shadow">
        <h1 class="text-2xl pb-2 font-bold">Recent Meal Logs</h1>
        <table>
            <thead class="border-b bg-gray-800 cursor-pointer">
                <tr>
                    <th scope="col" class="py-2 border border-white text-white">
                        Name
                    </th>
                    <th scope="col" class="py-2 border border-white text-white">
                        Meal Type
                    </th>
                    <th scope="col" class="py-2 border border-white text-white">
                        DATE / TIME
                    </th>
                </tr>
            </thead class="border-b">
            <tbody>
                <?php
                include './dbh.inc.php';
                $sql4 = "SELECT * FROM (SELECT meal_log.meal_id, personnel.person_name, meal_log.meal_type, meal_log.meal_time FROM meal_log INNER JOIN personnel ON personnel.person_id = meal_log.person_id ORDER BY meal_log.meal_id DESC LIMIT 10)Var1 ORDER BY meal_id DESC";
                $result4 = $conn->query($sql4);

                if ($result4->num_rows > 0) {
                    while ($row4 = $result4->fetch_assoc()) {
                        echo '
                                    <tr class="py-2 border border-white bg-yellow-300">
                                        <td>' . $row4["person_name"] . '</td>
                                        <td class="border border-white">' . $row4["meal_type"] . '</td>
                                        <td>' . $row4["meal_time"] . '</td>
                                    </tr>
                                    ';
                    }
                }
                $conn->close();
                ?>

            </tbody>
        </table>
    </div>

    <div id="div-reservation" class="absolute bg-gray-800 bottom-0 w-full h-20 flex items-center justify-center space-x-2 border shadow-lg text-center overflow-y-hidden scroll-style">
        <h1 class="text-white text-2xl font-bold w-2/12 mr-4">Reservations </h1>
        <div class="flex items-center w-full h-22 overflow-x-auto overflow-y-hidden scroll-style-horiz whitespace-nowrap">
            <?php
            include './dbh.inc.php';
            $sql = "SELECT meal_reserve.reserv_id, event.event_name, meal_reserve.meal_types, meal_reserve.reserv_date, meal_reserve.reserv_ath FROM `meal_reserve` INNER JOIN event ON meal_reserve.event_id = event.event_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="flex items-center content-center justify-evenly mx-1 w-3/12 bg-gray-800 text-white py-2 px-8 rounded-lg drop-shadow-2xl hover:bg-gray-700 cursor-pointer" onclick="reserveModal(' . $row["reserv_id"] . ')">
                        <span class="text-md font-semibold text-center">
                            <span class="flex justify-center"> Reserve for <p class="ml-1" style="text-decoration: underline;">' . $row["reserv_date"] . '</p></span>
                            <p class="font-bold text-center">' . ucwords($row["event_name"])  . '</p>
                        </span>
                    </div>
                    ';
                }
            }

            $conn->close();
            ?>
        </div>
    </div>


    <?php
    include './dbh.inc.php';

    if (isset($_SESSION["mealscanmode"])) {
        echo '
                            <script>
                                window.onload = function() {
                                    document.getElementById("qr-meal").focus();
                                };                
                            </script>
                            <form id="scan-meal" method="POST" action="./Components/scan.inc.php"">
                                <input id="qr-meal" name="scan-meal" class="opacity-0 fixed bg-green-300 text-center" type="text" oninput="scanQRMeal(event)" onblur="keepFocusMeal(event)" autocomplete="off">
                            </form>

                            <form method="POST" action="./Components/scan.inc.php">
                                <button id="btn-qr-meal" name="stopmealscan" title="Click Stop Scanning Mode" class="fixed z-90 bottom-28 right-5 bg-yellow-400 w-20 h-20 px-40 rounded-full border border-black shadow-lg drop-shadow-lg flex justify-center items-center text-white text-xl font-bold drop-shadow-2xl animate-bounce duration-300 whitespace-nowrap hover:bg-red-700 hover:drop-shadow-2xl" onclick="enableMealScan()">
                                    Stop Meal Scanning
                                </button>
                            </form>
                        ';

        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $url = "https://";
        else
            $url = "http://";
        $url .= $_SERVER['HTTP_HOST'];
        $url .= $_SERVER['REQUEST_URI'];

        if (strpos($url, "id=") !== false) {
            $id = $_GET['id'];
            $sqlName = "SELECT personnel.person_name FROM personnel WHERE person_id = '$id'";
            $getName = mysqli_query($conn, $sqlName);
            $name = mysqli_fetch_assoc($getName);

            if (isset($name["person_name"])) {
                echo '<script>console.log("' . $name["person_name"] . '")</script>';
                echo '
                        <div id="scan-banner" class="z-100 fixed w-[99%] rounded flex items-center justify-center drop-shadow bg-green-500 text-white text-sm shadow-lg font-bold px-4 py-5" role="alert" onmouseenter="hideBanner2()">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                            <p><strong>' . $name["person_name"] . '</strong> was scanned.</p>
                        </div>';
            } else {
                echo '
                        <script>
                                var x = new Audio("./Components/error.mp3");
                                x.play();
                        </script>
                        <div id="scan-banner" class="z-100 fixed w-[99%] rounded flex items-center justify-center drop-shadow bg-red-500 text-white text-sm shadow-lg font-bold px-4 py-5" role="alert" onmouseenter="hideBanner2()">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                            <p><strong>Error! </strong>Something went wrong, please see ICT personnel.</p>
                        </div>
                        ';
            }
        }
    } else {
        echo '
                <form id="scan-meal" method="POST" action="./Components/scan.inc.php"">
                    <input id="qr-meal" name="scan-meal" class="opacity-0 fixed bg-green-300 text-center" type="number" disabled onkeypress="scanQRMeal(event)" onblur="keepFocusMeal(event)" autocomplete="off">
                </form>

                <div id="meal-scan-buttons" class="flex flex-col space-y-2">
                    <button title="QR Scanning Mode" class="fixed z-90 bottom-28 right-4 bg-green-600 w-20 h-20 rounded-full border border-black shadow-lg drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-green-700 hover:drop-shadow-2xl hover:animate-bounce duration-300" onclick="mealModal();clearNow();">
                    <svg fill="white" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 448 512">
                        <path d="M0 80C0 53.5 21.5 32 48 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80zM64 96v64h64V96H64zM0 336c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336zm64 16v64h64V352H64zM304 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H304c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48zm80 64H320v64h64V96zM256 304c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s7.2-16 16-16s16 7.2 16 16v96c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s-7.2-16-16-16s-16 7.2-16 16v64c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V304zM368 480a16 16 0 1 1 0-32 16 16 0 1 1 0 32zm64 0a16 16 0 1 1 0-32 16 16 0 1 1 0 32z" />
                    </svg>
                    </button>
                </div>
            ';
    }
    ?>


    <script>
        function enableMealScan() {
            var input = document.getElementById("qr-meal");
            var btn = document.getElementById("btn-qr-meal");
            if (input.disabled) {
                btn.title = "Cancel Scanning Mode";
                btn.className = "fixed z-90 bottom-28 right-5 bg-red-600 w-20 h-20 rounded-full border border-black shadow-lg drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-red-700 hover:drop-shadow-2xl hover:animate-bounce duration-300";
            } else {
                btn.title = "QR Scanning Mode";
                btn.className = "fixed z-90 bottom-28 right-5 bg-green-600 w-20 h-20 rounded-full border border-black shadow-lg drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-green-700 hover:drop-shadow-2xl hover:animate-bounce duration-300"
            }
            input.disabled = !input.disabled;
            input.focus();
            input.value = "";
        }

        function scanQRMeal(event) {
            const form = document.querySelector('#scan-meal');
            form.submit();
        }

        function keepFocusMeal(event) {
            event.preventDefault();
            document.getElementById("qr-meal").focus();
        }
    </script>
</div>