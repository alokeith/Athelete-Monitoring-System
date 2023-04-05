<!DOCTYPE html>
<?php
include './dbh.inc.php';

session_start();

$sqlIn = "SELECT COUNT(*) as inside FROM personnel WHERE person_status = 1";
$resIn = mysqli_query($conn, $sqlIn);
$dataIn = mysqli_fetch_assoc($resIn);

$sqlOut = "SELECT COUNT(*) as outside FROM personnel WHERE person_status = 0";
$resOut = mysqli_query($conn, $sqlOut);
$dataOut = mysqli_fetch_assoc($resOut);


$person_inside = $dataIn['inside'];
$person_outside = $dataOut['outside'];
$total_person = $person_inside + $person_outside;


$sqlAth = "SELECT COUNT(*) as athletes FROM personnel WHERE role_id = 1";
$resAth = mysqli_query($conn, $sqlAth);
$dataAth = mysqli_fetch_assoc($resAth);
$athletes = $dataAth["athletes"];

$sqlCoach = "SELECT COUNT(*) as coach FROM personnel WHERE role_id = 2";
$resCoach = mysqli_query($conn, $sqlCoach);
$dataCoach = mysqli_fetch_assoc($resCoach);
$coach = $dataCoach["coach"];

$sqlass = "SELECT COUNT(*) as ass FROM personnel WHERE role_id = 3";
$resass = mysqli_query($conn, $sqlass);
$dataass = mysqli_fetch_assoc($resass);
$assistant = $dataass["ass"];

$sqltrainer = "SELECT COUNT(*) as trainer FROM personnel WHERE role_id = 4";
$restrainer = mysqli_query($conn, $sqltrainer);
$datatrainer = mysqli_fetch_assoc($restrainer);
$trainer = $datatrainer["trainer"];

$sqlofficial = "SELECT COUNT(*) as official FROM personnel WHERE role_id = 5";
$resofficial = mysqli_query($conn, $sqlofficial);
$dataofficial = mysqli_fetch_assoc($resofficial);
$official = $dataofficial["official"];

$sqlcommittee = "SELECT COUNT(*) as committee FROM personnel WHERE role_id = 6";
$rescommittee = mysqli_query($conn, $sqlcommittee);
$datacommittee = mysqli_fetch_assoc($rescommittee);
$committee = $datacommittee["committee"];

$sqlchaperone = "SELECT COUNT(*) as chaperone FROM personnel WHERE role_id = 7";
$reschaperone = mysqli_query($conn, $sqlchaperone);
$datachaperone = mysqli_fetch_assoc($reschaperone);
$chaperone = $datachaperone["chaperone"];


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

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>

    <style>
        .modal {
            transition: opacity 0.25s ease;
        }

        body.modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }
    </style>

</head>

<body onload="hideBanner()">
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
                <a id="meal-tab" class="relative block p-4" onclick="changeTab('meal')">
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

                        <span class="ml-3 text-sm font-medium text-gray-900"> Preferences and Logs </span>
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
            element.classList.toggle("hidden");
        }

        function toggleLog(log) {
            var element = document.getElementById(log);

            if (log == "in-out-log") {
                document.getElementById("meal-log").className = "hidden";
                element.className = "max-h-[29.688rem] shadow-lg"
                document.getElementById("btn-in-out").className = "flex space-x-2 py-1 pb-2 px-4 rounded-t-lg bg-gray-800 text-white hover:bg-gray-700"
                document.getElementById("btn-meal").className = "flex space-x-2 py-1 pb-2 px-4 rounded-t-lg bg-gray-700 shadow-inner text-white hover:bg-gray-800"
            }
            if (log == "meal-log") {
                document.getElementById("in-out-log").className = "hidden";
                element.className = "max-h-[29.688rem] shadow-lg"
                document.getElementById("btn-meal").className = "flex space-x-2 py-1 pb-2 px-4 rounded-t-lg bg-gray-800 text-white hover:bg-gray-700"
                document.getElementById("btn-in-out").className = "flex space-x-2 py-1 pb-2 px-4 rounded-t-lg bg-gray-700 shadow-inner text-white hover:bg-gray-800"
            }

        }

        function enableScan() {
            var input = document.getElementById("qr-input");
            var btn = document.getElementById("btn-qr");
            var icon = document.getElementById("icon-qr");
            if (input.disabled) {
                btn.title = "Cancel Scanning Mode";
                btn.className = "fixed z-90 bottom-28 right-5 bg-red-600 w-20 h-20 rounded-full border border-black shadow-lg drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-red-700 hover:drop-shadow-2xl hover:animate-bounce duration-300";
                icon.className = "fa-solid fa-xmark";
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
        }

        function keepFocus(event) {
            event.preventDefault();
            document.getElementById("qr-input").focus();
        }

        function hideBanner() {
            var banner = document.getElementById("scan-banner");
            if (!banner) {
                setTimeout(() => {
                    try {
                        document.getElementById("scan-banner").className = 'hidden';
                    } catch (err) {
                        // console.log("No Banne")
                    }
                }, 3000);
            }
        }

        function hideBanner2() {
            var banner = document.getElementById("scan-banner");
            banner.className = "hidden";
        }

        document.addEventListener("keydown", function(event) {
            if (event.key === " ") {
                document.getElementById("btn-qr").click();
            }
        });
        window.onload = hideBanner();
    </script>

    <div class="h-[84vh] pb-4">
        <!-- IN OUT TABLE -->
        <div id="in-out-table" class="flex justify-evenly mx-2 mt-2 overflow-hidden h-full">
            <!-- INSIDE -->
            <div class="w-1/2 border-r-2 border-white">
                <div class="flex h-auto justify-evenly items-center font-bold">
                    <h1 class="w-11/12 text-center text-3xl">ATHLETES INSIDE THE QUARTER</h1>
                    <div class="p-2 border-2 border-black min-w-[5.6rem] w-auto bg-green-200 flex justify-center">
                        <h1 class="float-left text-6xl text-center"><?php echo $person_inside ?></h1>
                    </div>
                </div>
                <div class="h-full overflow-x-hidden mt-2 mr-1 scroll-style pb-28 short-scroll">
                    <?php
                    include './dbh.inc.php';
                    $sql = "SELECT DISTINCT event.event_id, event.event_name FROM personnel INNER JOIN event ON personnel.event_id = event.event_id WHERE personnel.person_status = 1 ORDER BY event.event_name";
                    $result = $conn->query($sql);


                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $event_id = $row["event_id"];
                            $event_name = $row["event_name"];

                            $sqlCount = "SELECT COUNT(*) as members FROM personnel WHERE event_id = $event_id AND person_status = 1";
                            $countQuery = mysqli_query($conn, $sqlCount);
                            $fetchQuery = mysqli_fetch_assoc($countQuery);

                            $memberCount = $fetchQuery['members'];

                            echo '
                                            <div class="flex flex-col">
                                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                                        <div class="overflow-hidden rounded-md shadow-md">
                                                            <table class="min-w-full text-center border-r-2 border-white">
                                                                <thead class="border-b bg-gray-800 cursor-pointer" onclick="toggleTable(\'' . "in-" . $event_id . '\')">
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
                                                                <tbody id="' . "in-" . $event_id . '" class="fadeAnim hidden">';

                            $sql2 = "SELECT * FROM personnel WHERE event_id = " . $event_id . " AND person_status = 1";
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

                            echo ' 
                                </tbody>
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
                    <div class="p-2 border-2 text-center border-black min-w-[5.6rem] w-auto bg-red-200 flex justify-center items-center">
                        <h1 class="text-6xl"><?php echo $person_outside; ?></h1>
                    </div>
                </div>
                <div class="h-full overflow-x-hidden mt-2 ml-1 scroll-style pb-28 short-scroll">

                    <?php
                    include './dbh.inc.php';
                    $sql = "SELECT DISTINCT event.event_id, event.event_name FROM personnel INNER JOIN event ON personnel.event_id = event.event_id WHERE personnel.person_status = 0 ORDER BY event.event_name";
                    $result = $conn->query($sql);


                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $event_id = $row["event_id"];
                            $event_name = $row["event_name"];

                            $sqlCount = "SELECT COUNT(*) as members FROM personnel WHERE event_id = $event_id AND person_status = 0";
                            $countQuery = mysqli_query($conn, $sqlCount);
                            $fetchQuery = mysqli_fetch_assoc($countQuery);

                            $memberCount = $fetchQuery['members'];

                            echo '
                                    <div class="flex flex-col">
                                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                                <div class="overflow-hidden rounded-md shadow-md">
                                                    <table class="min-w-full text-center border-r-2 border-white">
                                                        <thead class="border-b bg-gray-800 cursor-pointer" onclick="toggleTable(\'' . "out-" . $event_id . '\')">
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
                                                        <tbody id="' . "out-" . $event_id . '" class="fadeAnim hidden">';

                            $sql2 = "SELECT * FROM personnel WHERE event_id = " . $event_id . " AND person_status = 0";
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


            <div class="absolute bg-gray-800 bottom-0 flex justify-evenly items-center w-full h-20 border shadow-lg">
                <div class="flex items-center content-center justify-evenly mx-1 overflow-x-hidden bg-gray-800 text-white h-16 px-8 rounded-lg drop-shadow-2xl hover:bg-gray-700 cursor-default">
                    <h1 class="text-xl font-semibold">Athletes : <?php echo $athletes ?></h1>
                </div>
                <div class="flex items-center content-center justify-evenly mx-1 overflow-x-hidden bg-gray-800 text-white h-16 px-8 rounded-lg drop-shadow-2xl hover:bg-gray-700 cursor-default">
                    <h1 class="text-xl font-semibold">Coaches : <?php echo $coach ?></h1>
                </div>
                <div class="flex items-center content-center justify-evenly mx-1 overflow-x-hidden bg-gray-800 text-white h-16 px-8 rounded-lg drop-shadow-2xl hover:bg-gray-700 cursor-default">
                    <h1 class="text-xl font-semibold">Committees : <?php echo $committee ?></h1>
                </div>
                <div class="flex items-center content-center justify-evenly mx-1 overflow-x-hidden bg-gray-800 text-white h-16 px-8 rounded-lg drop-shadow-2xl hover:bg-gray-700 cursor-default">
                    <h1 class="text-xl font-semibold">Officiating Officials : <?php echo $official ?></h1>
                </div>
                <div class="flex items-center content-center justify-evenly mx-1 overflow-x-hidden bg-gray-800 text-white h-16 px-8 rounded-lg drop-shadow-2xl hover:bg-gray-700 cursor-default">
                    <h1 class="text-xl font-semibold">Assistant Coaches : <?php echo $assistant ?></h1>
                </div>
                <div class="flex items-center content-center justify-evenly mx-1 overflow-x-hidden bg-gray-800 text-white h-16 px-8 rounded-lg drop-shadow-2xl hover:bg-gray-700 cursor-default">
                    <h1 class="text-xl font-semibold">Trainers : <?php echo $trainer ?></h1>
                </div>
                <div class="flex items-center content-center justify-evenly mx-1 overflow-x-hidden bg-gray-800 text-white h-16 px-8 rounded-lg drop-shadow-2xl hover:bg-gray-700 cursor-default">
                    <h1 class="text-xl font-semibold">Chaperones : <?php echo $chaperone ?></h1>
                </div>
            </div>

            <?php
            include './dbh.inc.php';
            if (isset($_SESSION["scanmode"])) {
                echo '
                        <script>
                            window.onload = function() {
                                document.getElementById("qr-input").focus();
                            };                
                        </script>
                        <form id="scan-form" method="POST" action="./Components/scan.inc.php"">
                            <input id="qr-input" name="scan" class="opacity-0 fixed bg-green-300 text-center" type="text" onkeypress="scanQR(event)" onblur="keepFocus(event)" autocomplete="off">
                        </form>

                        <form method="POST" action="./Components/scan.inc.php">
                            <button id="btn-qr" name="stopscan" title="Stop Scanning Mode" class="fixed z-90 bottom-28 right-5 bg-red-600 w-20 h-20 rounded-full border border-black shadow-lg drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-red-700 hover:drop-shadow-2xl hover:animate-bounce duration-300" onclick="enableScan()">
                                <svg fill="white" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 384 512">
                                    <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
                                </svg>
                            </button>

                            <button id="btn-add" title="Add A Personnel" class="hidden fixed z-90 bottom-6 right-4 bg-blue-600 w-20 h-20 rounded-full border border-black shadow-lg drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-blue-700 hover:drop-shadow-2xl hover:animate-bounce duration-300">
                                <i id="icon-add" class="fa-solid fa-user-plus"></i>
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
                                        <div id="scan-banner" class="z-100 fixed w-[99%] rounded flex items-center justify-center drop-shadow bg-green-500 text-white text-sm shadow-lg font-bold px-4 py-3" role="alert" onmouseenter="hideBanner2()">
                                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                                            <p><strong>' . $name["person_name"] . '</strong> was scanned.</p>
                                        </div>';
                    } else {
                        echo '
                                        <div id="scan-banner" class="z-100 fixed w-[99%] rounded flex items-center justify-center drop-shadow bg-red-500 text-white text-sm shadow-lg font-bold px-4 py-3" role="alert" onmouseenter="hideBanner2()">
                                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                                            <p><strong>Sorry, wrong ID scanned!</strong> Please try again.</p>
                                        </div>';
                    }
                }
            } else {
                echo '
                                <form id="scan-form" method="POST" action="./Components/scan.inc.php"">
                                    <input id="qr-input" name="scan" class="opacity-0 fixed bg-green-300 text-center" type="number" disabled onblur="keepFocus(event) autocomplete="off">
                                </form>

                                <form method="POST" action="./Components/scan.inc.php">
                                    <button id="btn-qr" name="startscan" title="QR Scanning Mode" class="fixed z-90 bottom-28 right-4 bg-green-600 w-20 h-20 rounded-full border border-black shadow-lg drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-green-700 hover:drop-shadow-2xl hover:animate-bounce duration-300" onclick="enableScan()">
                                        <svg fill="white" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 448 512">
                                            <path d="M0 80C0 53.5 21.5 32 48 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80zM64 96v64h64V96H64zM0 336c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336zm64 16v64h64V352H64zM304 32h96c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H304c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48zm80 64H320v64h64V96zM256 304c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s7.2-16 16-16s16 7.2 16 16v96c0 8.8-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s-7.2-16-16-16s-16 7.2-16 16v64c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V304zM368 480a16 16 0 1 1 0-32 16 16 0 1 1 0 32zm64 0a16 16 0 1 1 0-32 16 16 0 1 1 0 32z" />
                                        </svg>
                                    </button>
                                </form>
                            ';
            }
            ?>
        </div>

        <?php
        // include './Components/in-out.php';
        include './Components/meal.php';
        // include './Components/preferences.php';
        ?>

        <!-- PREFERENCES -->
        <div id="preferences-table" class="hidden flex flex-col">
            <div class="w-full space-y-10 h-full overflow-x-hidden scroll-style">
                <div class="w-full space-y-4 bg-orange-200 pb-4 drop-shadow-xl rounded-xl">
                    <div class="drop-shadow flex items-center justify-center space-x-2 text-gray-900 bg-orange-300 text-2xl font-bold rounded py-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="rgb(31 41 55)" width="40" height="40" viewBox="0 0 640 512">
                            <path d="M144 160A80 80 0 1 0 144 0a80 80 0 1 0 0 160zm368 0A80 80 0 1 0 512 0a80 80 0 1 0 0 160zM0 298.7C0 310.4 9.6 320 21.3 320H234.7c.2 0 .4 0 .7 0c-26.6-23.5-43.3-57.8-43.3-96c0-7.6 .7-15 1.9-22.3c-13.6-6.3-28.7-9.7-44.6-9.7H106.7C47.8 192 0 239.8 0 298.7zM320 320c24 0 45.9-8.8 62.7-23.3c2.5-3.7 5.2-7.3 8-10.7c2.7-3.3 5.7-6.1 9-8.3C410 262.3 416 243.9 416 224c0-53-43-96-96-96s-96 43-96 96s43 96 96 96zm65.4 60.2c-10.3-5.9-18.1-16.2-20.8-28.2H261.3C187.7 352 128 411.7 128 485.3c0 14.7 11.9 26.7 26.7 26.7H455.2c-2.1-5.2-3.2-10.9-3.2-16.4v-3c-1.3-.7-2.7-1.5-4-2.3l-2.6 1.5c-16.8 9.7-40.5 8-54.7-9.7c-4.5-5.6-8.6-11.5-12.4-17.6l-.1-.2-.1-.2-2.4-4.1-.1-.2-.1-.2c-3.4-6.2-6.4-12.6-9-19.3c-8.2-21.2 2.2-42.6 19-52.3l2.7-1.5c0-.8 0-1.5 0-2.3s0-1.5 0-2.3l-2.7-1.5zM533.3 192H490.7c-15.9 0-31 3.5-44.6 9.7c1.3 7.2 1.9 14.7 1.9 22.3c0 17.4-3.5 33.9-9.7 49c2.5 .9 4.9 2 7.1 3.3l2.6 1.5c1.3-.8 2.6-1.6 4-2.3v-3c0-19.4 13.3-39.1 35.8-42.6c7.9-1.2 16-1.9 24.2-1.9s16.3 .6 24.2 1.9c22.5 3.5 35.8 23.2 35.8 42.6v3c1.3 .7 2.7 1.5 4 2.3l2.6-1.5c16.8-9.7 40.5-8 54.7 9.7c2.3 2.8 4.5 5.8 6.6 8.7c-2.1-57.1-49-102.7-106.6-102.7zm91.3 163.9c6.3-3.6 9.5-11.1 6.8-18c-2.1-5.5-4.6-10.8-7.4-15.9l-2.3-4c-3.1-5.1-6.5-9.9-10.2-14.5c-4.6-5.7-12.7-6.7-19-3L574.4 311c-8.9-7.6-19.1-13.6-30.4-17.6v-21c0-7.3-4.9-13.8-12.1-14.9c-6.5-1-13.1-1.5-19.9-1.5s-13.4 .5-19.9 1.5c-7.2 1.1-12.1 7.6-12.1 14.9v21c-11.2 4-21.5 10-30.4 17.6l-18.2-10.5c-6.3-3.6-14.4-2.6-19 3c-3.7 4.6-7.1 9.5-10.2 14.6l-2.3 3.9c-2.8 5.1-5.3 10.4-7.4 15.9c-2.6 6.8 .5 14.3 6.8 17.9l18.2 10.5c-1 5.7-1.6 11.6-1.6 17.6s.6 11.9 1.6 17.5l-18.2 10.5c-6.3 3.6-9.5 11.1-6.8 17.9c2.1 5.5 4.6 10.7 7.4 15.8l2.4 4.1c3 5.1 6.4 9.9 10.1 14.5c4.6 5.7 12.7 6.7 19 3L449.6 457c8.9 7.6 19.2 13.6 30.4 17.6v21c0 7.3 4.9 13.8 12.1 14.9c6.5 1 13.1 1.5 19.9 1.5s13.4-.5 19.9-1.5c7.2-1.1 12.1-7.6 12.1-14.9v-21c11.2-4 21.5-10 30.4-17.6l18.2 10.5c6.3 3.6 14.4 2.6 19-3c3.7-4.6 7.1-9.4 10.1-14.5l2.4-4.2c2.8-5.1 5.3-10.3 7.4-15.8c2.6-6.8-.5-14.3-6.8-17.9l-18.2-10.5c1-5.7 1.6-11.6 1.6-17.5s-.6-11.9-1.6-17.6l18.2-10.5zM472 384a40 40 0 1 1 80 0 40 40 0 1 1 -80 0z" />
                        </svg>
                        <h1>Manage</h1>
                    </div>
                    <div class="flex justify-center space-x-3">
                        <a href="./Components/id-printing/index.php">
                            <button type="button" class="shadow drop-shadow bg-gray-800 text-white font-bold py-3 rounded px-10 hover:bg-gray-700 flex justify-between items-center space-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="-ml-3" fill="white" width="30" height="30">
                                    <path d="M0 96l576 0c0-35.3-28.7-64-64-64H64C28.7 32 0 60.7 0 96zm0 32V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128H0zM64 405.3c0-29.5 23.9-53.3 53.3-53.3H234.7c29.5 0 53.3 23.9 53.3 53.3c0 5.9-4.8 10.7-10.7 10.7H74.7c-5.9 0-10.7-4.8-10.7-10.7zM176 192a64 64 0 1 1 0 128 64 64 0 1 1 0-128zm176 16c0-8.8 7.2-16 16-16H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16z" />
                                </svg>
                                <p>Print IDs</p>
                            </button>
                        </a>
                        <a href="">
                            <button type="button" class="shadow drop-shadow bg-gray-800 text-white font-bold py-3 rounded px-10 hover:bg-gray-700 flex justify-between items-center space-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-3" fill="white" width="30" height="30" viewBox="0 0 640 512">
                                    <path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                </svg>
                                <p>Add a Personnel</p>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="w-full space-y-4 pb-4 bg-orange-200 drop-shadow-xl rounded-xl">
                    <div class="drop-shadow flex items-center justify-center space-x-2 text-gray-900 bg-orange-300 text-2xl font-bold rounded py-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="rgb(31 41 55)" width="40" height="40" viewBox="0 0 576 512">
                            <path d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H512c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H512c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm96 64a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm104 0c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm-72-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM96 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                        </svg>
                        <h1>Logs</h1>
                    </div>

                    <div class="mx-2">
                        <div class="flex space-x-2">
                            <button id="btn-in-out" class="flex space-x-2 py-1 pb-2 px-4 rounded-t-lg bg-gray-800 text-white hover:bg-gray-700" onclick="toggleLog('in-out-log')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-6 flex-shrink-0 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                                <h1 class="font-semibold text-md">In and Out Logs</h1>
                            </button>
                            <button id="btn-meal" class="flex space-x-2 py-1 pb-2 px-4 rounded-t-lg bg-gray-700 shadow-inner text-white hover:bg-gray-800" onclick="toggleLog('meal-log')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-6 flex-shrink-0 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                </svg>
                                <h1 class="font-semibold text-md">Meal Logs</h1>
                            </button>
                        </div>
                        <!-- IN OUT -->
                        <div id="in-out-log" class="max-h-[29.688rem] shadow-lg">
                            <!-- THEAD -->
                            <div class="sticky z-1 w-full bg-gray-800">
                                <table class="w-full text-center border-r-2 bg-gray-800 rounded drop-shadow">
                                    <thead class="border-b bg-gray-800 cursor-pointer">
                                        <tr>
                                            <th scope="col" class="text-xl font-bold text-white px-16 py-3 hover:bg-gray-700">
                                                NAME
                                            </th>
                                            <th scope="col" class="text-xl font-bold text-white px-14 py-3 hover:bg-gray-700">
                                                EVENT
                                            </th>
                                            <th scope="col" class="text-xl font-bold text-white px-4 py-3 hover:bg-gray-700">
                                                STATUS
                                            </th>
                                            <th scope="col" class="text-xl font-bold text-white px-3 py-3 hover:bg-gray-700">
                                                DATE / TIME
                                            </th>
                                        </tr>
                                    </thead class="border-b">
                                </table>
                            </div>
                            <!-- TBODY -->
                            <div class="max-h-[26.375rem] overflow-y-auto scroll-style">
                                <table class="w-full text-center border-r-2 border-white bg-white rounded">
                                    <tbody>
                                        <?php
                                        include './dbh.inc.php';
                                        $sql = "SELECT personnel.person_name, event.event_name, log.log_status, log.log_date, log.log_time 
                                            FROM personnel INNER JOIN event ON personnel.event_id = event.event_id INNER JOIN log ON personnel.person_id = log.person_id";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $name = strtolower($row["person_name"]);

                                                if ($row["log_status"] == 1) {
                                                    $status = "Logged In";
                                                } else {
                                                    $status = "Logged Out";
                                                }

                                                echo '
                                            <tr class="border-b even:bg-gray-100">
                                                <td class="px-6 py-4 whitespace-nowrap text-md font-bold text-gray-900">' . ucwords($name) . '
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap" style="text-transform: capitalize">
                                                    ' . $row["event_name"] . '
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    ' . $status . '
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    ' . $row["log_date"] . " " . $row["log_time"] . '
                                                </td>
                                            </tr class="bg-white border-b">
                                            ';
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- MEAL -->
                        <div id="meal-log" class="max-h-[29.688rem] shadow-lg hidden">
                            <!-- THEAD -->
                            <div class="sticky z-1 w-full bg-gray-800">
                                <table class="w-full text-center border-r-2 bg-gray-800 rounded drop-shadow">
                                    <thead class="border-b bg-gray-800 cursor-pointer">
                                        <tr>
                                            <th scope="col" class="text-xl font-bold text-white px-24 py-3 hover:bg-gray-700">
                                                NAME
                                            </th>
                                            <th scope="col" class="text-xl font-bold text-white px-14 pl-24 py-3 hover:bg-gray-700">
                                                EVENT
                                            </th>
                                            <th scope="col" class="text-xl font-bold text-white -px-4 py-3 hover:bg-gray-700">
                                                MEAL TYPE
                                            </th>
                                            <th scope="col" class="text-xl font-bold text-white px-[3.25rem] pl-[0.875rem] py-3 hover:bg-gray-700">
                                                DATE / TIME
                                            </th>
                                        </tr>
                                    </thead class="border-b">
                                </table>
                            </div>
                            <!-- TBODY -->
                            <div class="max-h-[26.375rem] overflow-y-auto scroll-style">
                                <table class="w-full text-center border-r-2 border-white bg-white rounded">
                                    <tbody>
                                        <?php
                                        include './dbh.inc.php';
                                        $sql = "SELECT personnel.person_name, event.event_name, meal_log.meal_type, meal_log.meal_date, meal_log.meal_time 
                                            FROM personnel INNER JOIN event ON personnel.event_id = event.event_id INNER JOIN meal_log ON personnel.person_id = meal_log.person_id";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $name = strtolower($row["person_name"]);

                                                echo '
                                            <tr class="border-b even:bg-gray-100">
                                                <td class="px-6 py-4 whitespace-nowrap text-md font-bold text-gray-900">' . ucwords($name) . '
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap" style="text-transform: capitalize">
                                                    ' . $row["event_name"] . '
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    ' . $row["meal_type"] . '
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    ' . $row["meal_date"] . " " . $row["meal_time"] . '
                                                </td>
                                            </tr class="bg-white border-b">
                                            ';
                                            }
                                        }
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


</body>

</html>
<?php
if (isset($_SESSION["mealscanmode"])) {
    echo '
            <script>
                document.getElementById("meal-tab").click();
            </script>';
}
include './Components/person-info-modal.php';
include './Components/meal-scan-modal.php';
?>