<div id="in-out-table" class="flex justify-evenly mx-2 mt-2 overflow-hidden h-full">

    <!-- INSIDE -->
    <div class="w-1/2 border-r-4 border-white">
        <div class="flex h-auto justify-evenly items-center font-bold">
            <h1 class="w-11/12 text-center text-3xl">ATHLETES INSIDE THE QUARTER</h1>
            <div class="p-2 border-2 border-black w-24 bg-green-200 flex justify-center">
                <h1 class="float-left text-6xl text-center"><?php echo $person_inside ?></h1>
            </div>
        </div>
        <div class="h-full overflow-y-auto mt-2 scroll-style">
            <!-- TABLE -->
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden rounded-md">
                            <table class="min-w-full text-center border-r-2 border-white">
                                <thead class="border-b bg-gray-800 cursor-pointer" onclick="toggleTable('basketball-table-in')">
                                    <tr>
                                        <th scope="col" class="text-xl font-bold text-white px-6 py-4">
                                            EVENT: BASKETBALL

                                        </th>
                                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                            CONTACT NO: 09123456789
                                        </th>
                                    </tr>
                                </thead class="border-b">
                                <tbody id="basketball-table-in" class="fadeAnim hidden bg-gray-200 drop-shadow-lg">
                                    <?php
                                    include './dbh.inc.php';
                                    $sql = "SELECT * FROM personnel WHERE event_id = 1 AND person_status = 1";
                                    $result = $conn->query($sql);


                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '
                                                    <tr class="border-b even:bg-gray-100">
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">' . $row["person_id"] . '
                                                        </td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            ' . $row["person_name"] . '
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
            <!-- /TABLE -->

            <!-- TABLE -->
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden rounded-md">
                            <table class="min-w-full text-center border-r-2 border-white">
                                <thead class="border-b bg-gray-800 cursor-pointer" onclick="toggleTable('volleyball-table-in')">
                                    <tr>
                                        <th scope="col" class="text-xl font-bold text-white px-6 py-4">
                                            EVENT: VOLLEYBALL

                                        </th>
                                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                            CONTACT NO: 09123456789
                                        </th>
                                    </tr>
                                </thead class="border-b">
                                <tbody id="volleyball-table-in" class="fadeAnim hidden bg-gray-200 drop-shadow-lg">
                                    <?php
                                    include './dbh.inc.php';
                                    $sql = "SELECT * FROM personnel WHERE event_id = 2 AND person_status = 1";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '
                                                    <tr class="border-b even:bg-gray-100">
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">' . $row["person_id"] . '
                                                        </td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            ' . $row["person_name"] . '
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
            <!-- /TABLE -->

            <!-- TABLE -->
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full text-center border-r-2 border-white">
                                <thead class="border-b bg-gray-800 cursor-pointer">
                                    <tr>
                                        <th scope="col" class="text-xl font-bold text-white px-6 py-4">
                                            EVENT: BASKETBALL
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                            CONTACT NO: 09123456789
                                        </th>
                                    </tr>
                                </thead class="border-b">
                                <tbody>
                                    <tr class="border-b even:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            Jonathan Joyohoy
                                        </td>
                                    </tr class="bg-white border-b">
                                    <tr class="border-b even:bg-gray-200">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            Jonathan Joyohoy
                                        </td>
                                    </tr class="bg-white border-b">
                                    <tr class="border-b even:bg-gray-200">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">3
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            Jonathan Joyohoy
                                        </td>
                                    </tr class="bg-white border-b">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /TABLE -->
        </div>
    </div>


    <!-- OUTSIDE -->
    <div class="w-1/2 border-l-4 border-white">
        <div class=" flex justify-evenly items-center font-bold">
            <h1 class="w-11/12 text-center text-3xl">ATHLETES OUTSIDE THE QUARTER</h1>
            <div class="p-2 border-2 border-black w-24 bg-red-200 flex justify-center">
                <h1 class="float-left text-6xl text-center"><?php echo $person_outside; ?></h1>
            </div>
        </div>
        <div class="h-full overflow-y-auto mt-2">

            <!-- TABLE -->
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden rounded-md">
                            <table class="min-w-full text-center border-r-2 border-white">
                                <thead class="border-b bg-gray-800 cursor-pointer" onclick="toggleTable('basketball-table-out')">
                                    <tr>
                                        <th scope="col" class="text-xl font-bold text-white px-6 py-4">
                                            EVENT: BASKETBALL

                                        </th>
                                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                            CONTACT NO: 09123456789
                                        </th>
                                    </tr>
                                </thead class="border-b">
                                <tbody id="basketball-table-out" class="fadeAnim hidden bg-gray-200 drop-shadow-lg">
                                    <?php
                                    include './dbh.inc.php';
                                    $sql = "SELECT * FROM personnel WHERE event_id = 1 AND person_status = 0";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '
                                                    <tr class="border-b even:bg-gray-100">
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">' . $row["person_id"] . '
                                                        </td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            ' . $row["person_name"] . '
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
            <!-- /TABLE -->

        </div>
    </div>

</div>