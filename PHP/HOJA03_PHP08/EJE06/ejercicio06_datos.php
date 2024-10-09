<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
     print ("Tabla de multiplicar: <br>");
     if (isset($_POST["enviar"])){
        $numero = $_POST['numero'];
        for ($i=0; $i<=10 ;$i++){
            print $i." x ".$numero. " = " .$numero*$i."</br>"; 
        }
     }
    ?>
    <form  action="ejercicio06.html" method="post">
    <button type="submit">Volver</button>
</body>
</html>