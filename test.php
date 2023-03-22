<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <h1>TESTING</h1>
        <form method="POST" action="myform5.php">
            <input onkeydown="process_key(event)" />
            <input type="submit" value="Send" />
            <input type="hidden" name="codes" id="codes" />
        </form>

        <pre id="output">
</pre>
    </div>

</body>

</html>