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
        document.getElementById("hell").onload = hello();

        function hello() {
            var elem = document.getElementById("hello");
            // console.log("fail");

            if (elem) {
                console.log("success");
            }
            if (!elem) {
                console.log("fail");
            }
        }
    </script>

    <div>
        <h1>TESTING</h1>
        <input id="testbox" type="text" value=20 onmouseenter="hello(this)">
        <h1 id="hello">RESULT</h1>
    </div>

</body>

</html>