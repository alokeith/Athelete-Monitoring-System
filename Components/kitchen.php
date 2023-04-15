<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitchen AMS</title>
    <link href="../style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <div class="text-center bg-green-400 rounded m-1 h-16 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-3" fill="#f3f4f6" width="50" height="50 " viewBox="0 0 448 512">
            <path d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z" />
        </svg>
        <h1 class="text-gray-100 text-4xl font-extrabold">KITCHEN AMS</h1>
    </div>
    <div class="h-10/12 mx-4 mt-4 scroll-style overflow-auto">
        <!-- <h1 class="text-3xl font-bold">Reservations</h1> -->
        <div id="kitchen-res" class="mt-2 flex justify-evenly space-x-4">
            <?php
            include '../dbh.inc.php';
            $sql = 'SELECT * FROM meal_reserve';
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                        <div class="border-2 shadow-lg px-8 py-3 bg-gray-100 rounded-lg">
                            <form action="./claim.inc.php" method="POST">
                                <div id="reserve' . $row["reserv_id"] . '"></div>
                                <input name="reserv-id" hidden type="text" class="bg-red-300 hidden" value="' . $row["reserv_id"] . '">
                                <div class="w-full flex justify-center mt-4">
                                    <button name="claim" class="bg-green-300 rounded px-24 py-4 shadow-md hover:bg-green-200">Claim</button>
                                </div>
                            </form>
                        </div>
                        ';
                }
            }

            $conn->close();
            ?>
        </div>
        <div id="container" class="bg-green-300 w-full" hidden>
            <?php
            include '../dbh.inc.php';
            $sql = 'SELECT * FROM meal_reserve';
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                            <input hidden type="text" class="bg-red-300 hidden" value="' . $row["reserv_id"] . '">
                        ';
                }
            }

            $conn->close();
            ?>
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javscript" src="./JS/jquery.form.min.js"></script>
    <script>
        window.onload = () => {
            var inputs, index;
            container = document.getElementById('container');
            inputs = container.getElementsByTagName('input');
            for (index = 0; index < inputs.length; ++index) {
                let content = $("#reserve" + inputs[index].value);
                $.ajax({
                    type: 'POST',
                    url: './reserve-parser.php',
                    data: 'reserv_id=' + inputs[index].value,
                    dataType: 'JSON',
                    beforeSend: function() {
                        content.html("Error 1");
                    },
                    error: function(jqXHR, status, err) {
                        content.html("There's a problem parsing your request! Please seek assistance.");
                    },
                    success: function(data) {
                        content.html(data);
                    }
                });
            }
            return false;

            // document.getElementById("result").innerHTML = array;
        }
    </script>
</body>

</html>