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
    <div>
        <audio id="error-audio">
            <source src="./Components/error.mp3" type="audio/mpeg">
        </audio>

        <button onclick="playAudio()">Play</button>

        <script>
            function playAudio() {
                var x = new Audio("./Components/error.mp3");
                x.play();
            }
        </script>
    </div>
</body>

</html>