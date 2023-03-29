<div id="preferences-table" class="hidden flex flex-col">
    <div class="w-full space-y-10">
        <div class="w-full text-center bg-gray-300">
            <h1 class="text-2xl font-bold ">Preferences</h1>
        </div>

        <div id="logs">
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