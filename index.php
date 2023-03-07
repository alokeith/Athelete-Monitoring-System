<!DOCTYPE html>
<?php
include './dbh.inc.php';

$sqlIn = "SELECT COUNT(*) as inside FROM personnel WHERE person_status = 1";
$resIn = mysqli_query($conn, $sqlIn);
$dataIn = mysqli_fetch_assoc($resIn);

$sqlOut = "SELECT COUNT(*) as outside FROM personnel WHERE person_status = 0";
$resOut = mysqli_query($conn, $sqlOut);
$dataOut = mysqli_fetch_assoc($resOut);

$person_inside = $dataIn['inside'];
$person_outside = $dataOut['outside'];
$total_person = $person_inside + $person_outside;

$conn->close();
?>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <title>AMS</title>
    <link href="style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/df92423fc4.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="bg-gray-300 drop-shadow">
        <ul class="flex border-b bg-gray-300 drop-shadow">
            <li class="flex-1 hover:bg-gray-200 cursor-pointer">
                <a class="relative block p-4" onclick="changeTab('in-out')">
                    <span id="in-out" class="absolute inset-x-0 -bottom-px h-1 w-full bg-gray-800"></span>
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>

                        <span class="ml-3 text-sm font-medium text-gray-900"> Athletes In/Out </span>
                    </div>
                </a>
            </li>

            <li class="flex-1 hover:bg-gray-200 cursor-pointer">
                <a class="relative block p-4" onclick="changeTab('meal')">
                    <span id="meal"></span>
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>

                        <span class="ml-3 text-sm font-medium text-gray-900"> Athlete's Meal </span>
                    </div>
                </a>
            </li>

            <li class="flex-1 hover:bg-gray-200 cursor-pointer">
                <a class="relative block p-4" onclick="changeTab('preferences')">
                    <span id="preferences"></span>
                    <!-- <span class="absolute inset-x-0 -bottom-px h-px w-full bg-pink-600"></span> -->
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>

                        <span class="ml-3 text-sm font-medium text-gray-900"> Preferences </span>
                    </div>
                </a>
            </li>
        </ul>
    </div>

    <script>
        function changeTab(tab) {
            var span = "absolute inset-x-0 -bottom-px h-1 w-full bg-gray-800",
                tabStyle = "flex justify-evenly mx-2 mt-2 overflow-hidden h-full";
            var tab1 = document.getElementById("in-out"),
                table1 = document.getElementById("in-out-table");
            var tab2 = document.getElementById("meal"),
                table2 = document.getElementById("meal-table");
            var tab3 = document.getElementById("preferences"),
                table1 = document.getElementById("preferences-table");

            var element = document.getElementById(tab);
            switch (tab) {
                case "in-out":
                    document.getElementById("in-out-table").className = tabStyle;
                    document.getElementById("meal").className = "";
                    document.getElementById("meal-table").className = "hidden";
                    document.getElementById("preferences").className = "";
                    document.getElementById("preferences-table").className = "hidden";
                    break;
                case "meal":
                    document.getElementById("meal-table").className = tabStyle;
                    document.getElementById("in-out").className = "";
                    document.getElementById("in-out-table").className = "hidden";
                    document.getElementById("preferences").className = "";
                    document.getElementById("preferences-table").className = "hidden";
                    break;
                case "preferences":
                    document.getElementById("preferences-table").className = tabStyle;
                    document.getElementById("in-out").className = "";
                    document.getElementById("in-out-table").className = "hidden";
                    document.getElementById("meal").className = "";
                    document.getElementById("meal-table").className = "hidden";
                    break;
                default:
                    // code block
            }
            element.className = span;
        }

        function toggleTable(table) {
            var element = document.getElementById(table);
            element.classList.toggle("hidden")
            // console.log(element.className);
        }

        function enableScan() {
            var input = document.getElementById("qr-input");
            var btn = document.getElementById("btn-qr");
            var icon = document.getElementById("icon-qr");
            if (input.disabled) {
                btn.title = "Cancel Scanning Mode";
                btn.className = "fixed z-90 bottom-28 right-5 bg-red-600 w-20 h-20 rounded-full border border-black shadow-lg drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-red-700 hover:drop-shadow-2xl hover:animate-bounce duration-300";
                icon.className = "fa-solid fa-xmark";
                input
            } else {
                btn.title = "QR Scanning Mode";
                btn.className = "fixed z-90 bottom-28 right-5 bg-green-600 w-20 h-20 rounded-full border border-black shadow-lg drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-green-700 hover:drop-shadow-2xl hover:animate-bounce duration-300"
                icon.className = "fa-sharp fa-solid fa-qrcode";
            }
            input.disabled = !input.disabled;
            input.focus();
            input.value = "";
        }

        function scanQR(event) {
            const form = document.querySelector('#scan-form');
            form.submit();
            event.preventDefault();
        }

        function keepFocus(event) {
            event.preventDefault();
            document.getElementById("qr-input").focus();
        }
    </script>

    <div class="h-[82vh] pb-4">
        <div id="in-out-table" class="flex justify-evenly mx-2 mt-2 overflow-hidden h-full">
            <!-- INSIDE -->
            <div class="w-1/2 border-r-2 border-white">
                <div class="flex h-auto justify-evenly items-center font-bold">
                    <h1 class="w-11/12 text-center text-3xl">ATHLETES INSIDE THE QUARTER</h1>
                    <div class="p-2 border-2 border-black w-24 bg-green-200 flex justify-center">
                        <h1 class="float-left text-6xl text-center"><?php echo $person_inside ?></h1>
                    </div>
                </div>
                <div class="h-full overflow-x-hidden mt-2 mx-2 scroll-style pb-20">

                    <?php
                    include './dbh.inc.php';
                    $sql = "SELECT event.event_id, event.event_name, personnel.person_status FROM personnel INNER JOIN event ON personnel.event_id = event.event_id WHERE personnel.person_status = 1 ORDER BY event.event_name";
                    $result = $conn->query($sql);


                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $event_id = $row["event_id"];
                            $event_name = $row["event_name"];
                            $person_status = $row["person_status"];

                            echo '
                                            <div class="flex flex-col">
                                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                                        <div class="overflow-hidden rounded-md shadow-md">
                                                            <table class="min-w-full text-center border-r-2 border-white">
                                                                <thead class="border-b bg-gray-800 cursor-pointer" onclick="toggleTable(\'' . "in-" . $event_id . '\')">
                                                                    <tr>
                                                                        <th scope="col" class="w-1/2 text-xl font-bold text-white px-6 py-4 uppercase" style="text-transform: uppercase">
                                                                            ' . $event_name . '
                                                                        </th>
                                                                        <th scope="col" class="w-1/2 text-sm font-medium text-white px-6 py-4">
                                                                            CONTACT NO: 09123456789
                                                                        </th>
                                                                    </tr>
                                                                </thead class="border-b">
                                                                <tbody id="' . "in-" . $event_id . '" class="fadeAnim hidden">';

                            $sql2 = "SELECT * FROM personnel WHERE event_id = " . $event_id . " AND person_status = 1";
                            $result2 = $conn->query($sql2);

                            if ($result2->num_rows > 0) {
                                while ($row = $result2->fetch_assoc()) {
                                    echo '
                                                    <tr class="border-b even:bg-gray-200 odd:bg-gray-100">
                                                        <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900">' . $row["person_id"] . '
                                                        </td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-3 whitespace-nowrap">
                                                            ' . $row["person_name"] . '
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


            <!-- OUTSIDE -->
            <div class="w-1/2 border-r-2 border-white ">
                <div class="flex h-auto justify-evenly items-center font-bold">
                    <h1 class="w-11/12 text-center text-3xl">ATHLETES OUTSIDE THE QUARTER</h1>
                    <div class="p-2 border-2 border-black w-24 bg-red-200 flex justify-center">
                        <h1 class="float-left text-6xl text-center"><?php echo $person_outside; ?></h1>
                    </div>
                </div>
                <div class="h-full overflow-x-hidden mt-2 mx-2 scroll-style pb-20">

                    <?php
                    include './dbh.inc.php';
                    $sql = "SELECT event.event_id, event.event_name FROM personnel INNER JOIN event ON personnel.event_id = event.event_id WHERE personnel.person_status = 0";
                    $result = $conn->query($sql);


                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $event_id = $row["event_id"];
                            $event_name = $row["event_name"];

                            echo '
                                <div class="flex flex-col">
                                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                            <div class="overflow-hidden rounded-md shadow-md">
                                                <table class="min-w-full text-center border-r-2 border-white">
                                                    <thead class="border-b bg-gray-800 cursor-pointer" onclick="toggleTable(' . $event_id  . ')">
                                                        <tr>
                                                            <th scope="col" class="w-1/2 text-xl font-bold text-white px-6 py-4 uppercase" style="text-transform: uppercase">
                                                                ' . $event_name . '
                                                            </th>
                                                            <th scope="col" class="w-1/2 text-sm font-medium text-white px-6 py-4">
                                                                CONTACT NO: 09123456789
                                                            </th>
                                                        </tr>
                                                    </thead class="border-b">
                                                    <tbody id="' . $event_id . '" class="fadeAnim hidden">';

                            $sql2 = "SELECT * FROM personnel WHERE event_id = " . $event_id . " AND person_status = 0";
                            $result2 = $conn->query($sql2);

                            if ($result2->num_rows > 0) {
                                while ($row = $result2->fetch_assoc()) {
                                    echo '
                                        <tr class="border-b even:bg-gray-200 odd:bg-gray-100">
                                            <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-gray-900">' . $row["person_id"] . '
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-3 whitespace-nowrap">
                                                ' . $row["person_name"] . '
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
        </div>

        <div class="absolute bottom-0 flex justify-center items-center w-full h-20 border shadow-lg">
            <div id="person-counts" class="flex items-center content-center justify-evenly mx-1 overflow-x-hidden bg-gray-800 text-white h-16 rounded-lg w-11/12 drop-shadow-2xl">
                <h1 class="text-2xl font-bold">Total Personnel: <?php echo $total_person ?></h1>
            </div>
        </div>

        <form id="scan-form" method="POST" action="">
            <input id="qr-input" name="scan" class="fixed bg-green-300 text-center" type="text" disabled oninput="scanQR(event)" onblur="keepFocus(event)">
        </form>



        <?php

        if (isset($_POST["scan"])) {
            $scan = $_POST["scan"];
            require_once './dbh.inc.php';

            echo '
            <span class="w-full bg-red-300 fixed -mt-8">' . $scan . '</span>
            <div id="postData"></div>';
        }
        ?>

        <button id="btn-qr" title="QR Scanning Mode" class="fixed z-90 bottom-28 right-4 bg-green-600 w-20 h-20 rounded-full border border-black shadow-lg drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-green-700 hover:drop-shadow-2xl hover:animate-bounce duration-300" onclick="enableScan()">
            <i id="icon-qr" class="fa-sharp fa-solid fa-qrcode"></i>
        </button>
        <button id="btn-add" title="Add A Personnel" class="fixed z-90 bottom-6 right-4 bg-blue-600 w-20 h-20 rounded-full border border-black shadow-lg drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-blue-700 hover:drop-shadow-2xl hover:animate-bounce duration-300">
            <i id="icon-add" class="fa-solid fa-user-plus"></i>
        </button>

        <?php
        include './Components/meal.php';
        include './Components/preferences.php';
        ?>

    </div>

</body>

</html>