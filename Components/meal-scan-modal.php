<div class="modal2 opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal2-overlay2 absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal2-container bg-white w-full md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

        <div class="modal-content py-4 text-left px-3 bg-gray-100">
            <!--Title-->
            <div class="w-full flex justify-center w-full space-x-2 items-center pb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 448 512">
                    <path d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z" />
                </svg>
                <p class="text-2xl font-extrabold">SCAN MEALS</p>
            </div>
            <form method="POST" action="./Components/scan.inc.php">
                <!--Body-->
                <div class="bg-white w-full mt-2 flex justify-center space-x-1 p-4 rounded-lg border shadow-inner drop-shadow">
                    <div id="meal-choice" class="w-full mr-2">
                        <p class="font-bold text-lg">Meal Type</p>
                        <div class="w-full flex flex-col mt-3 space-y-2">
                            <div class="w-full flex items-center space-x-2 px-8 rounded bg-blue-100 hover:bg-blue-300" onclick="enableReservation()">
                                <input checked id="meal-breakfast" type="radio" value="1" name="meal-type" class="w-4 h-4">
                                <label for="meal-breakfast" class="w-full py-3 text-sm font-semibold text-gray-900 dark:text-gray-300">Breakfast</label>
                            </div>
                            <div class="w-full flex items-center space-x-2 px-8 rounded bg-red-100 hover:bg-red-300" onclick="enableReservation()">
                                <input id="meal-snack1" type="radio" value="2" name="meal-type" class="w-4 h-4">
                                <label for="meal-snack1" class="w-full py-3 text-sm font-semibold text-gray-900 dark:text-gray-300">AM Snack</label>
                            </div>
                            <div class="w-full flex items-center space-x-2 px-8 rounded bg-green-100 hover:bg-green-300" onclick="enableReservation()">
                                <input id="meal-lunch" type="radio" value="3" name="meal-type" class="w-4 h-4">
                                <label for="meal-lunch" class="w-full py-3 text-sm font-semibold text-gray-900 dark:text-gray-300">Lunch</label>
                            </div>
                            <div class="w-full flex items-center space-x-2 px-8 rounded bg-indigo-100 hover:bg-indigo-300" onclick="enableReservation()">
                                <input id="meal-snack2" type="radio" value="4" name="meal-type" class="w-4 h-4">
                                <label for="meal-snack2" class="w-full py-3 text-sm font-semibold text-gray-900 dark:text-gray-300">PM Snack</label>
                            </div>
                            <div class="w-full flex items-center space-x-2 px-8 rounded bg-yellow-100 hover:bg-yellow-200" onclick="enableReservation()">
                                <input id="meal-dinner" type="radio" value="5" name="meal-type" class="w-4 h-4">
                                <label for="meal-dinner" class="w-full py-3 text-sm font-semibold text-gray-900 dark:text-gray-300">Dinner</label>
                            </div>
                            <div class="w-full flex items-center space-x-2 px-8 rounded bg-gray-200 hover:bg-gray-300" onclick="enableReservation()">
                                <input id="meal-reserve" type="radio" value="6" name="meal-type" class="w-4 h-4">
                                <label for="meal-reserve" class="w-full py-3 text-sm font-semibold text-gray-900 dark:text-gray-300">Reservation</label>
                            </div>
                        </div>
                    </div>

                    <div id="reserve-settings" class="hidden">
                        <p class="font-bold text-lg">Reservation</p>
                        <div class="mt-2">
                            <!-- DATE -->
                            <div class="mt-2">
                                <p class="mb-1 font-semibold text-sm">Reserve Date</p>
                                <input id="res-date" name="res-date" class="py-1 w-full border-2 border-gray rounded text-center" type="date" disabled>
                            </div>

                            <!-- MEAL TYPES -->
                            <div class="mt-4">
                                <h3 class="mb-1 text-sm font-semibold">Meal Type(s)</h3>
                                <div>
                                    <select id="res-meal" class="w-full" data-te-select-init multiple disabled>
                                        <option value="1">Breakfast</option>
                                        <option value="2">AM Snack</option>
                                        <option value="3">Lunch</option>
                                        <option value="4">PM Snack</option>
                                        <option value="5">Dinner</option>
                                    </select>
                                </div>
                                <input hidden id="res-meal-value" name="res-meal-value" type="text">
                            </div>

                            <!-- EVENT -->
                            <div class="mt-4">
                                <h3 class="mb-1 text-sm font-semibold">Select Event</h3>
                                <div>
                                    <select id="res-event" name="res-event" class="w-full" data-te-select-init data-te-select-filter="true" disabled>
                                        <?php
                                        include './dbh.inc.php';
                                        $sql = "SELECT * FROM event";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row["event_id"] . '">' . ucwords($row["event_name"]) . '</option>';
                                            }
                                        }

                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <!-- ATHLETES -->
                            <div class="mt-4">
                                <h3 class="mb-1 text-sm font-semibold">Select Athletes</h3>
                                <div id="div-athletes">
                                    <select id="res-athletes" name="res-athletes" class="w-full" data-te-select-init multiple disabled>
                                        <option value="1">John Doe</option>
                                        <option value="2">Jonathan Joyohoy</option>
                                        <option value="3">Brabagul Benilato</option>
                                        <option value="4">Uzumaki Naruto</option>
                                        <option value="5">Clark Kent</option>
                                    </select>
                                </div>
                                <input hidden id="res-athletes-value" name="res-athletes-value" type="text">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="flex justify-center pt-4">
                    <button id="btn-qr-meal" name="startmealscan" title="QR Scanning Mode" class="modal2-close px-16 bg-green-500 p-3 rounded-lg text-white shadow font-semibold hover:bg-green-400" onclick="enableMealScan()">
                        Start Scan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
</div>


<script>
    const overlay2 = document.querySelector('.modal2-overlay2')
    overlay2.addEventListener('click', mealModal)

    var closemodal2 = document.querySelectorAll('.modal2-close')
    for (var i = 0; i < closemodal2.length; i++) {
        closemodal2[i].addEventListener('click', mealModal)
    }

    document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
            isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal2-active')) {
            mealModal()
        }
    };

    function mealModal() {
        const body = document.querySelector('body')
        const modal2 = document.querySelector('.modal2')
        modal2.classList.toggle('opacity-0')
        modal2.classList.toggle('pointer-events-none')
        body.classList.toggle('modal2-active')
        enableReservation();
    }

    function clearNow() {
        document.getElementById("meal-breakfast").checked = true;
        enableReservation();
    }

    function enableReservation() {
        var mealChoice = document.getElementById("meal-choice");
        var reserve = document.getElementById("reserve-settings");
        var reserveRadio = document.getElementById("meal-reserve");

        if (reserveRadio.checked) {
            mealChoice.className = "w-auto mr-2 pr-2 border-r-2";
            reserve.classList = "w-7/12";
            document.getElementById("res-date").disabled = false;
            document.getElementById("res-meal").disabled = false;
            document.getElementById("res-event").disabled = false;
            document.getElementById("res-athletes").disabled = false;

        } else {
            mealChoice.className = "w-full mr-2";
            reserve.classList = "hidden";
            document.getElementById("res-date").value = "";
            document.getElementById("res-date").disabled = true;
            document.getElementById("res-meal").disabled = true;
            document.getElementById("res-event").disabled = true;
            document.getElementById("res-athletes").disabled = true;
        }
    }

    const resMeal = document.getElementById('res-meal');
    resMeal.addEventListener('valueChange.te.select', (e) => {
        document.getElementById("res-meal-value").value = e.value;
    });

    const resAth = document.getElementById('res-athletes');
    resAth.addEventListener('valueChange.te.select', (e) => {
        document.getElementById("res-athletes-value").value = e.value;
    });
</script>