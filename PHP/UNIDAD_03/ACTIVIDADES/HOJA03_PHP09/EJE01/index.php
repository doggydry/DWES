
<?php

    if (isset($_POST['cantidad']) && isset($_POST['opcionesOrigen']) && isset($_POST['opcionesDestino'])){
        $cantidad = $_POST['cantidad'];
        $opcionesOrigen = $_POST['opcionesOrigen'];
        $opcionesDestino = $_POST['opcionesDestino'];

/**
 * Definir las tasas de cambio
 */

 $tasasDeCambio = [
    'euros' => ['dolares' =>  1.09, 'pesos' => 21.01],
    'dolares' => ['euros' => 0.91, 'pesos' => 19.28],
    'pesos' => ['euros' => 0.047, 'dolares' =>0.052]
 ];

 /**
  * Si el origen y el destino son iguales
  */
  if ($opcionesOrigen === $opcionesDestino){
    $resultado = $cantidad; //Será la misma cantidad
  } else {
    /**
     * Obtengo la tasa de cambio
     */
    $tasa = $tasasDeCambio[$opcionesOrigen][$opcionesDestino];
    $resultado = $cantidad * $tasa;
  }
  
  echo "<div class='container'>
  <div class='result'>$cantidad $opcionesOrigen son " . number_format($resultado, 2) . " $opcionesDestino</div>
  <a href='index.html'>Volver</a>
  </div>";

    } else {
        echo "Error en la conversión. Aegurate de llenar todos los campos";
    }


  
?>