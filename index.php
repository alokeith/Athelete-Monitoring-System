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

$conn->close();
?>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <title>AMS</title>
    <link href="style.css" rel="stylesheet">

</head>

<body>
    <div class="bg-gray-300">
        <ul class="flex border-b border-gray-100">
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
    </script>

    <div class="h-[80vh]">

        <?php

        include './Components/in-out.php';
        include './Components/meal.php';
        include './Components/preferences.php';

        ?>

        <div class="absolute bottom-0 flex justify-center w-full h-20">
            <div id="person-counts" class="flex items-center content-center justify-evenly mx-1 overflow-x-hidden bg-gray-800 text-white h-16 rounded-lg w-11/12 shadow-xl">
                <h1 class="text-2xl font-bold">Total Personnel</h1>
            </div>

        </div>

    </div>
</body>

</html>