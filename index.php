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
                        console.log("eror")
                    }
                }, 3000);
            }
        }

        function hideBanner2() {
            var banner = document.getElementById("scan-banner");
            banner.className = "hidden";
        }

        document.addEventListener("keydown", function(event) {
            if (event.key === "s") {
                document.getElementById("btn-qr").click();
            }
        });

        window.onload = hideBanner();
    </script>

    <div class="h-[84vh] pb-4">
        <div id="in-out-table" class="flex justify-evenly mx-2 mt-2 overflow-hidden h-full">
            <!-- INSIDE -->
            <div class="w-1/2 border-r-2 border-white">
                <div class="flex h-auto justify-evenly items-center font-bold">
                    <h1 class="w-11/12 text-center text-3xl">ATHLETES INSIDE THE QUARTER</h1>
                    <div class="p-2 border-2 border-black w-24 bg-green-200 flex justify-center">
                        <h1 class="float-left text-6xl text-center"><?php echo $person_inside ?></h1>
                    </div>
                </div>
                <div class="h-full overflow-x-hidden mt-2 mr-1 scroll-style pb-20">
                    <?php
                    include './dbh.inc.php';
                    $sql = "SELECT DISTINCT event.event_id, event.event_name FROM personnel INNER JOIN event ON personnel.event_id = event.event_id WHERE personnel.person_status = 1 ORDER BY event.event_name";
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
                <div class="h-full overflow-x-hidden mt-2 ml-1 scroll-style pb-20">

                    <?php
                    include './dbh.inc.php';
                    $sql = "SELECT DISTINCT event.event_id, event.event_name FROM personnel INNER JOIN event ON personnel.event_id = event.event_id WHERE personnel.person_status = 0 ORDER BY event.event_name";
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
                                                        <thead class="border-b bg-gray-800 cursor-pointer" onclick="toggleTable(\'' . "out-" . $event_id . '\')">
                                                            <tr>
                                                                <th scope="col" class="w-1/2 text-xl font-bold text-white px-6 py-4 uppercase" style="text-transform: uppercase">
                                                                    ' . $event_name . '
                                                                </th>
                                                                <th scope="col" class="w-1/2 text-sm font-medium text-white px-6 py-4">
                                                                    CONTACT NO: 09123456789
                                                                </th>
                                                            </tr>
                                                        </thead class="border-b">
                                                        <tbody id="' . "out-" . $event_id . '" class="fadeAnim hidden">';

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

            <div class="absolute bottom-0 flex justify-center items-center w-full h-20 border shadow-lg">
                <div on id="person-counts" class="flex items-center content-center justify-evenly mx-1 overflow-x-hidden bg-gray-800 text-white h-16 rounded-lg w-11/12 drop-shadow-2xl">
                    <h1 class="text-2xl font-bold">Total Personnel: <?php echo $total_person ?></h1>
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
                            <input id="qr-input" name="scan" class="opacity-0 fixed bg-green-300 text-center" type="number" oninput="scanQR(event)" onblur="keepFocus(event)" autocomplete="off">
                        </form>

                        <form method="POST" action="./Components/scan.inc.php">
                            <button id="btn-qr" name="stopscan" title="QR Scanning Mode" class="fixed z-90 bottom-28 right-5 bg-red-600 w-20 h-20 rounded-full border border-black shadow-lg drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-red-700 hover:drop-shadow-2xl hover:animate-bounce duration-300" onclick="enableScan()">
                                <i id="icon-qr" class="fa-solid fa-xmark"></i>
                            </button>

                            <button id="btn-add" title="Add A Personnel" class="fixed z-90 bottom-6 right-4 bg-blue-600 w-20 h-20 rounded-full border border-black shadow-lg drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-blue-700 hover:drop-shadow-2xl hover:animate-bounce duration-300">
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
                    $sqlName = "SELECT personnel.person_name FROM personnel WHERE person_id = $id";
                    $getName = mysqli_query($conn, $sqlName);
                    $name = mysqli_fetch_assoc($getName);

                    if (isset($name["person_name"])) {
                        echo '<script>console.log("' . $name["person_name"] . '")</script>';
                        echo '
                        <div id="scan-banner" class="z-100 fixed w-[99%] rounded flex items-center justify-center drop-shadow bg-green-500 text-white text-sm shadow-lg font-bold px-4 py-3" role="alert" onmouseenter="hideBanner2()">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                            <p><strong>' . $name["person_name"] . '</strong> is checked.</p>
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
                            <input id="qr-input" name="scan" class="opacity-0 fixed bg-green-300 text-center" type="number" disabled oninput="scanQR(event)" onblur="keepFocus(event) autocomplete="off">
                        </form>

                        <form method="POST" action="./Components/scan.inc.php">
                            <button id="btn-qr" name="startscan" title="QR Scanning Mode" class="fixed z-90 bottom-28 right-4 bg-green-600 w-20 h-20 rounded-full border border-black shadow-lg drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-green-700 hover:drop-shadow-2xl hover:animate-bounce duration-300" onclick="enableScan()">
                                <i id="icon-qr" class="fa-sharp fa-solid fa-qrcode"></i>
                            </button>

                            <button id="btn-add" title="Add A Personnel" class="fixed z-90 bottom-6 right-4 bg-blue-600 w-20 h-20 rounded-full border border-black shadow-lg drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-blue-700 hover:drop-shadow-2xl hover:animate-bounce duration-300">
                                <i id="icon-add" class="fa-solid fa-user-plus"></i>
                            </button>
                        </form>
                    ';
            }
            ?>
        </div>



        <?php
        include './Components/meal.php';
        include './Components/preferences.php';
        ?>

    </div>

</body>

</html>