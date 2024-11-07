<?php 

if (isset($_POST["enviar"])){
    $numero1  = $_POST['numero1'];
    $numero2  = $_POST['numero2'];
    $opcion = $_POST['opcion'];

    switch ($opcion){
        case 'suma':
            $resultado = $numero1 + $numero2;
            echo "EL resultado de la suma es: " . $resultado;
            break;
        case 'resta':
            $resultado = $numero1 - $numero2;
            echo "EL resultado de la resta es: " . $resultado;
            break;
        case 'producto':
            $resultado = $numero1 * $numero2;
            echo "EL resultado del prodcuto es: " . $resultado;
            break;
        case 'cociente':
            $resultado = $numero1 / $numero2;
            echo "EL resultado del cociente es: " . $resultado;
            break;
    }

    
}
