<div class="modal2 opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal2-overlay2 absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal2-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6 bg-gray-100">
            <!--Title-->
            <div class="w-full flex justify-center w-full space-x-2 items-center pb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 448 512">
                    <path d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z" />
                </svg>
                <p class="text-2xl font-extrabold">SCAN MEALS</p>
            </div>

            <!--Body-->
            <div class="bg-white w-full mt-2 flex justify-center space-x-1 p-4 rounded-lg border shadow-inner drop-shadow">
                <div id="meal-choice" class="w-full mr-2">
                    <p class="font-bold text-lg">Meal Type</p>
                    <div class="w-full flex flex-col mt-3 space-y-2">
                        <div class="w-full flex items-center space-x-2 px-8 border border-gray-500 rounded bg-gray-200 hover:bg-gray-300" onclick="enableReservation()">
                            <input checked id="meal-breakfast" type="radio" value="breakfast" name="meal-type" class="w-4 h-4">
                            <label for="meal-breakfast" class="w-full py-3 text-sm font-semibold text-gray-900 dark:text-gray-300">Breakfast</label>
                        </div>
                        <div class="w-full flex items-center space-x-2 px-8 border border-gray-500 rounded bg-gray-200 hover:bg-gray-300" onclick="enableReservation()">
                            <input id="meal-snack1" type="radio" value="snack1" name="meal-type" class="w-4 h-4">
                            <label for="meal-snack1" class="w-full py-3 text-sm font-semibold text-gray-900 dark:text-gray-300">AM Snack</label>
                        </div>
                        <div class="w-full flex items-center space-x-2 px-8 border border-gray-500 rounded bg-gray-200 hover:bg-gray-300" onclick="enableReservation()">
                            <input id="meal-lunch" type="radio" value="lunch" name="meal-type" class="w-4 h-4">
                            <label for="meal-lunch" class="w-full py-3 text-sm font-semibold text-gray-900 dark:text-gray-300">Lunch</label>
                        </div>
                        <div class="w-full flex items-center space-x-2 px-8 border border-gray-500 rounded bg-gray-200 hover:bg-gray-300" onclick="enableReservation()">
                            <input id="meal-snack2" type="radio" value="snack2" name="meal-type" class="w-4 h-4">
                            <label for="meal-snack2" class="w-full py-3 text-sm font-semibold text-gray-900 dark:text-gray-300">PM Snack</label>
                        </div>
                        <div class="w-full flex items-center space-x-2 px-8 border border-gray-500 rounded bg-gray-200 hover:bg-gray-300" onclick="enableReservation()">
                            <input id="meal-dinner" type="radio" value="dinner" name="meal-type" class="w-4 h-4">
                            <label for="meal-dinner" class="w-full py-3 text-sm font-semibold text-gray-900 dark:text-gray-300">Dinner</label>
                        </div>
                        <div class="w-full flex items-center space-x-2 px-8 border border-gray-500 rounded bg-gray-200 hover:bg-gray-300" onclick="enableReservation()">
                            <input id="meal-reserve" type="radio" value="reserve" name="meal-type" class="w-4 h-4">
                            <label for="meal-reserve" class="w-full py-3 text-sm font-semibold text-gray-900 dark:text-gray-300">Reservation</label>
                        </div>
                    </div>
                </div>

                <div id="reserve-settings" class="hidden">
                    <p class="font-bold text-lg">Reservation</p>
                    <div class="mt-2">



                        <!-- DATE -->
                        <div class="mt-2">
                            <p class="font-semibold text-sm">Reserve Date</p>
                            <input id="res-date" class="mt-1 w-full border-2 border-gray rounded text-center" disabled type="date">
                        </div>

                        <!-- MEAL TYPES -->
                        <div class="mt-3">
                            <h3 class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">Meal Type</h3>
                            <ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="breakfast-res" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded">
                                        <label for="breakfast-res" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Breakfast</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="snack1-res" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded">
                                        <label for="snack1-res" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">AM Snack</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="lunch-res" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded">
                                        <label for="lunch-res" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lunch</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="snack2-res" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded">
                                        <label for="snack2-res" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">PM Snack</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="dinner-res" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded">
                                        <label for="dinner-res" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dinner</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex justify-center pt-4">
                <form method="POST" action="./Components/scan.inc.php">
                    <button id="btn-qr-meal" name="startmealscan" title="QR Scanning Mode" class="modal2-close px-16 bg-green-500 p-3 rounded-lg text-white shadow font-semibold hover:bg-green-400" onclick="enableMealScan()">
                        Start Scan
                    </button>
                </form>
            </div>


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
    }

    function enableReservation() {
        var mealChoice = document.getElementById("meal-choice");
        var reserve = document.getElementById("reserve-settings");

        var reserveRadio = document.getElementById("meal-reserve");

        if (reserveRadio.checked) {
            mealChoice.className = "w-auto mr-2 pr-2 border-r-2";
            reserve.classList = "w-7/12";
            document.getElementById("res-date").disabled = false
        } else {
            mealChoice.className = "w-full mr-2";
            reserve.classList = "hidden";
            document.getElementById("res-date").value = "";

            var c = document.getElementsByTagName('input');
            for (var i = 0; i < c.length; i++) {
                if (c[i].type == 'checkbox') {
                    c[i].checked = false;
                }
            }
        }
    }
</script>