<div class="modal2 opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal2-overlay2 absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal2-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal2-content py-4 text-left px-6">
            <div class="flex justify-between w-full items-center pb-3 w-full">
                <p class="text-2xl font-bold w-full text-center">Scan Meals</p>
            </div>

            <!--Body-->
            <div class="bg-white w-full mt-2 flex">
                <div class="bg-red-300 w-6/12 border-r-2 border-black">
                    <p class="font-bold">Meal Type</p>
                    <div class="w-full flex flex-col space-y-3 mt-2">
                        <div>
                            <input checked id="meal-breakfast" type="radio" value="breakfast" name="meal-type" class="w-4 h-4">
                            <label for="meal-breakfast" class="w-full py-4 ml-2 text-sm font-semibold text-gray-900 dark:text-gray-300">Breakfast</label>
                        </div>
                        <div>
                            <input id="meal-lunch" type="radio" value="lunch" name="meal-type" class="w-4 h-4">
                            <label for="meal-lunch" class="w-full py-4 ml-2 text-sm font-semibold text-gray-900 dark:text-gray-300">Lunch</label>
                        </div>
                        <div>
                            <input id="meal-dinner" type="radio" value="dinner" name="meal-type" class="w-4 h-4">
                            <label for="meal-dinner" class="w-full py-4 ml-2 text-sm font-semibold text-gray-900 dark:text-gray-300">Dinner</label>
                        </div>
                        <div>
                            <input id="meal-snack" type="radio" value="snack" name="meal-type" class="w-4 h-4">
                            <label for="meal-snack" class="w-full py-4 ml-2 text-sm font-semibold text-gray-900 dark:text-gray-300">Snack</label>
                        </div>
                        <div> <input id="meal-reserve" type="radio" value="reserve" name="meal-type" class="w-4 h-4">
                            <label for="meal-reserve" class="w-full py-4 ml-2 text-sm font-semibold text-gray-900 dark:text-gray-300">Reserve</label>
                        </div>
                    </div>
                </div>

                <div class="w-1/2">
                    Reserve
                </div>

            </div>

            <div class="flex justify-end pt-2">
                <button class="modal2-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Start Scan</button>
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
</script>