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

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Header 1</th>
                        <th>Header 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                    </tr>
                    <tr>
                        <td>Data 3</td>
                        <td>Data 4</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                    </tr>
                    <tr>
                        <td>Data 3</td>
                        <td>Data 4</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                    </tr>
                    <tr>
                        <td>Data 3</td>
                        <td>Data 4</td>
                    </tr>
                    <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                    </tr>
                    <tr>
                        <td>Data 3</td>
                        <td>Data 4</td>
                    </tr>
                </tbody>
            </table>
        </div>



    </div>



</body>

</html>