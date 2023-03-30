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

        <?php
        include './Components/in-out.php';
        include './Components/meal.php';

        // include './Components/preferences.php';
        ?>

        <div id="preferences-table" class="hidden flex flex-col bg-blue-300">
            <div class="w-full space-y-10">
                <div class="w-full text-center bg-gray-300">
                    <h1 class="text-2xl font-bold ">Preferences</h1>
                </div>

                <div id="logs" class="max-h-40">
                    <h1 class="text-2xl font-bold ">In and Out Logs</h1>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-center border-r-2 border-white">
                                        <thead class="border-b bg-gray-800 cursor-pointer">
                                            <tr>
                                                <th scope="col" class="text-xl font-bold text-white px-6 py-4">
                                                    NAME
                                                </th>
                                                <th scope="col" class="text-xl font-bold text-white px-6 py-4">
                                                    EVENT
                                                </th>
                                                <th scope="col" class="text-xl font-bold text-white px-6 py-4">
                                                    STATUS
                                                </th>
                                                <th scope="col" class="text-xl font-bold text-white px-6 py-4">
                                                    DATE / TIME
                                                </th>
                                            </tr>
                                        </thead class="border-b">
                                        <tbody>
                                            <?php
                                            include './dbh.inc.php';
                                            $sql = "SELECT personnel.person_name, event.event_name, log.log_status, log.log_date, log.log_time 
                                            FROM personnel INNER JOIN event ON personnel.event_id = event.event_id INNER JOIN log ON personnel.person_id = log.person_id";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {

                                                    if ($row["log_status"] == 1) {
                                                        $status = "Logged In";
                                                    } else {
                                                        $status = "Logged Out";
                                                    }

                                                    echo '
                                                        <tr class="border-b even:bg-gray-100">
                                                            <td class="px-6 py-4 whitespace-nowrap text-md font-medium text-gray-900">' . $row["person_name"] . '
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
?>