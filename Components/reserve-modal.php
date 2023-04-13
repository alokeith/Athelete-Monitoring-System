<div class="modal3 opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal3-overlay3 absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal3-container bg-white w-full md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div id="receipt" class="modal-content py-4 text-left px-3 bg-gray-100">
            <div id="reserve-body">
                <div class="w-full flex justify-center w-full space-x-2 items-center pb-3">
                    <p class="text-2xl font-extrabold">Reserve Modal</p>
                </div>

                <p>Modal content can go here</p>
                <p>...</p>
                <p>...</p>
                <p>...</p>
                <p>...</p>
            </div>
            <div class="flex justify-center pt-2 mt-2">
                <button class="modal3-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400" onclick="printReceipt()">Print Claim Receipt</button>
            </div>
        </div>
    </div>
</div>
</div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javscript" src="./JS/jquery.form.min.js"></script>

<script>
    const overlay3 = document.querySelector('.modal3-overlay3')
    overlay3.addEventListener('click', reserveModal)

    var closemodal3 = document.querySelectorAll('.modal3-close')
    for (var i = 0; i < closemodal3.length; i++) {
        closemodal3[i].addEventListener('click', reserveModal)
    }

    document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
            isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal3-active')) {
            reserveModal()
        }
    };

    function reserveModal(reserveID) {
        const body = document.querySelector('body')
        const modal3 = document.querySelector('.modal3')
        modal3.classList.toggle('opacity-0')
        modal3.classList.toggle('pointer-events-none')
        body.classList.toggle('modal3-active')


        var content = $("#reserve-body");
        $.ajax({
            type: 'POST',
            url: './Components/reserve-parser.php',
            data: 'reserv_id=' + reserveID,
            dataType: 'JSON',
            beforeSend: function() {
                content.html("Error 1");
            },
            error: function(jqXHR, status, err) {
                content.html("There's a problem parsing your request! Please seek assistance.");
                //$('#add-training-stat').html("<div class='alert alert-danger' role='alert'><b class='text-danger'>Error 101 occured! Please consult the ICT.</b></div>");
            },
            success: function(data) {
                content.html(data);
            }
        });
        return false;
    }

    function printReceipt() {
        var printContents = document.getElementById("receipt").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>