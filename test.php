<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="test.css">
</head>

<body id="hell">

    <script>
        var codes = "";
        var codes_el = document.getElementById('codes');
        var output_el = document.getElementById('output');

        function process_key(event) {

            var letter = event.key;

            if (letter === 'Enter') {
                event.preventDefault();
                letter = "\n";
                event.target.value = "";
            }

            // match numbers and letters for barcode
            if (letter.match(/^[a-z0-9]$/gi)) {
                codes += letter;
            }


            codes_el.value = codes;
            output_el.innerHTML = codes;

        }
    </script>

    <div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="" width="40" height="40" viewBox="0 0 512 512">
            <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
        </svg>


        <h1>TESTING</h1>
        <form method="POST" action="myform5.php">
            <input onkeydown="process_key(event)" />
            <input type="submit" value="Send" />
            <input type="hidden" name="codes" id="codes" />
        </form><br><br>

        <div>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <title>Tailwind CSS Modal</title>
                <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
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

            <body class="bg-gray-200 flex items-center justify-center h-screen">

                <button class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full" onclick="toggleModal()">Open Modal</button>

                <!--Modal-->
                <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

                    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

                        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                            </svg>
                            <span class="text-sm">(Esc)</span>
                        </div>

                        <!-- Start Copy Here -->
                        <div class="modal-content py-4 text-left px-6 bg-gray-100">
                            <!--Title-->
                            <div class="w-full flex justify-center w-full space-x-2 items-center pb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 448 512">
                                    <path d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z" />
                                </svg>
                                <p class="text-2xl font-extrabold">SCAN MEALS</p>
                            </div>

                            <!--Body-->
                            <div class="bg-white w-full mt-2 flex justify-between space-x-1 p-4 rounded-lg border shadow-inner drop-shadow">
                                <div id="meal-choice" class="w-full mr-2 pr-2 border-r-2">
                                    <p class="font-bold text-lg">Meal Type</p>
                                    <div class="w-full flex flex-col mt-2 space-y-2">
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

                                <div id="reserve-settings" class="w-7/12 hidden">
                                    <p class="font-bold text-lg">Reservation</p>
                                    <div class="mt-2">
                                        <div class="mt-2">
                                            <p class="font-semibold text-sm">Reserve Date</p>
                                            <input id="res-date" class="mt-1 w-full border-2 border-gray rounded text-center" disabled type="date">
                                        </div>

                                        <h3 class="mb-4 text-sm font-semibold text-gray-900 dark:text-white">Meal Type</h3>
                                        <ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                <div class="flex items-center pl-3">
                                                    <input id="vue-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    <label for="vue-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vue JS</label>
                                                </div>
                                            </li>
                                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                <div class="flex items-center pl-3">
                                                    <input id="react-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    <label for="react-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">React</label>
                                                </div>
                                            </li>
                                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                <div class="flex items-center pl-3">
                                                    <input id="angular-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    <label for="angular-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Angular</label>
                                                </div>
                                            </li>
                                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                                <div class="flex items-center pl-3">
                                                    <input id="laravel-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    <label for="laravel-checkbox" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laravel</label>
                                                </div>
                                            </li>
                                        </ul>

                                    </div>
                                </div>

                            </div>
                            <div class="flex justify-center pt-2">
                                <button class="modal2-close px-16 bg-green-400 p-3 rounded-lg text-white shadow font-semibold hover:bg-green-300">Start Scan</button>
                            </div>
                        </div>
                    </div>

                    <script>
                        // var openmodal = document.querySelectorAll('.modal-open')
                        // for (var i = 0; i < openmodal.length; i++) {
                        //     openmodal[i].addEventListener('click', function(event) {
                        //         event.preventDefault()
                        //         toggleModal()
                        //     })
                        // }

                        const overlay = document.querySelector('.modal-overlay')
                        overlay.addEventListener('click', toggleModal)

                        var closemodal = document.querySelectorAll('.modal-close')
                        for (var i = 0; i < closemodal.length; i++) {
                            closemodal[i].addEventListener('click', toggleModal)
                        }

                        document.onkeydown = function(evt) {
                            evt = evt || window.event
                            var isEscape = false
                            if ("key" in evt) {
                                isEscape = (evt.key === "Escape" || evt.key === "Esc")
                            } else {
                                isEscape = (evt.keyCode === 27)
                            }
                            if (isEscape && document.body.classList.contains('modal-active')) {
                                toggleModal()
                            }
                        };


                        function toggleModal() {
                            const body = document.querySelector('body')
                            const modal = document.querySelector('.modal')
                            modal.classList.toggle('opacity-0')
                            modal.classList.toggle('pointer-events-none')
                            body.classList.toggle('modal-active')
                        }
                    </script>
            </body>

            </html>
        </div>

    </div>



</body>

</html>