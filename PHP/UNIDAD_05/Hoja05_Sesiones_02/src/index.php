<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    
    <title>Document</title>
</head>
<body class="container">
    <h1>Bienvenido a la pagina de las cookies</h1>
</body>
</html>
<?php
//? Formato de fecha y hora actual (dia/mes/año hora:minuto:segundo)
$fechaActual = date("d/m/Y H:i:s");

//? Si si la cookie existe, mostramos al usuario la última visita
if(isset($_COOKIE['ultimaVez'])){
    echo "Bienvenido de nuevo, tu última visita fue el: ". $_COOKIE['ultimaVez'];
}else {
    echo "Vaya, es tu primera vez por aquí";
}

//? Si el usuario se ha metido más veces actualizamos, sino
//? definimos la cookie con la fecha

setcookie('ultimaVez',$fechaActual, time() + 86400,false,false);

?>