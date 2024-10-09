<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $verbos_regulares = array("andar", "coger", "mirar","respirar","comer");
    /*Con esto seleccionamos un verbo al azar
    */
    $verbo_aleatorio = $verbos_regulares[array_rand($verbos_regulares)];

     /**
      * Con esta funcion conjugaremos los verbos en presente indicativo
      */
    function conjugarVerbo($verbos_regulares){
        /**
         * Con esto extraemos la raiz del verbo, (todo menos las dos ultimas letras)
         */
        $raiz = substr($verbos_regulares,0,-2);
        $terminacion = substr($verbos_regulares,-2);

        /**
         * Con este swith definimos para cada terminacion la conjugacion 
         * que necesitemos (ar, er o ir)
         */
        switch ($terminacion){
            case "ar":
                $terminaciones = ["o","as","a","amos","ais","an"]; 
                break;
            case "er":
                $terminaciones = ["o","es","e","emos","éis","en"];
                break;
            case "ir":
                $terminaciones = ["o","es","e","imos","is","en"];
                break;
            default:
                echo 'Verbo no reconocido';
        }

        /**
         * Con este array, definiremos los pronombres personales para 
         * luego conjugarlos con los tiempos verbales
         */
        $pronombres = ["Yo","Tú","Él","Nosotros","Vosotros","Ellos"];

        /**
         * Con este for juntaremos todo para que la conjugacion quede 
         * completa 
         */        

         /**
          * Variable para almacenar la conjugacion 
          */
         $conjugacion = [];

         for ($i=0;$i<count($terminaciones);$i++){
            $conjugacion[] = $pronombres[$i]. " " .$raiz.$terminaciones[$i];
         }
         
         /**
          * Devolvemos la conjugacion
          */
          return $conjugacion;
    }

    /**
     * Mostramos la conjugacion del verbo elegido
     */

     echo "Verbo elegido: $verbo_aleatorio<br>";
     $conjugacion = conjugarVerbo($verbo_aleatorio);

     /**
      * Añadimos salto de linea en cada iteracion
      */
     foreach($conjugacion as $linea){
        echo $linea . "<br>";
     }
     
    ?>
</body>
</html>