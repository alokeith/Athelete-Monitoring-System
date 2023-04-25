<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <div class="w-full flex justify-center">
                <img id="person-img" class="shadow-lg border" src="" width="260" height="260" alt="TEstin">
            </div>
            <div class="flex justify-center items-center mt-4 pb-3">
                <p id="person-name" class="text-2xl font-bold"></p>
            </div>

            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque esse, et nihil ad corporis vero magni ratione quasi laborum aperiam quis. Officia, ex eum autem harum nisi provident excepturi veritatis!</p>

            <div class="flex justify-center pt-2 mt-2">
                <button class="modal-close px-4 bg-indigo-500 p-3 px-24 rounded-lg text-white hover:bg-indigo-400">Close</button>
            </div>

        </div>
    </div>
</div>


<script>
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


    function toggleModal(id, name) {
        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-active')

        document.getElementById("person-name").innerHTML = name;
        document.getElementById("person-img").src = "./Components/id-printing/pictures/" + id + ".jpg";
    }
</script>