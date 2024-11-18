<?php
require_once dirname(__DIR__) . "/vendor/autoload.php";

use Funicular\Clases\FuncionesBD;
use Funicular\Clases\ConexionBD;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llegada</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

</head>

<body class="container">
    <h1>LLegada</h1>
    <hr>
    <form action="llegada.php" method="post">
        <button type="submit" id="llegadaBtn" name="llegadaBtn"> Llegada</button>
    </form>
    <?php $llegada = FuncionesBD::llegadaFunicular();
    if (isset($_POST['llegada'])) {
        echo $llegada ;
    }; ?>
    <a href="index.php">Volver</a>
</body>

</html>