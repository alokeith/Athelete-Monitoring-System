<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="output.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/df92423fc4.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <div id="container" class="flex justify-between">
        <div class="bg-gray-400 rounded-lg p-36 py-64" on>
            Reserve 1
            <input type="text" class="bg-red-300" value=10>
        </div>
        <div class="bg-gray-400 rounded-lg p-36 py-64" on>
            Reserve 1
            <input type="text" class="bg-red-300" value=20>
        </div>
    </div>

    <p id="result"></p>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javscript" src="./JS/jquery.form.min.js"></script>
    <script>
        window.onload = () => {
            var inputs, index;
            container = document.getElementById('kitchen-res');
            inputs = container.getElementsByTagName('input');
            for (index = 0; index < inputs.length; ++index) {
                var content = $("#reserve" + inputs[index].value);
                $.ajax({
                    type: 'POST',
                    url: './kitchen-parser.php',
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
                return false;
            }

            // document.getElementById("result").innerHTML = array;
        }
    </script>
</body>

</html>