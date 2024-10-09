<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST["enviar"])) {
        $numero = $_POST['numero'];
        if ($numero % 2 == 0) {
            print "El número " . $numero . " es par";
        } else {
            print "El número " . $numero . " es impar";
        }
    }
    ?>
    </br>
    </br>
    <form action="index.html" method="get">
    <button type="submit">Volver</button>
</form>
</body>
</html>