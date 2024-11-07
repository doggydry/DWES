<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJE1
    </title>
</head>

<body>
    <?php
    // Definimos el idioma y la región
    $formatter = new IntlDateFormatter('es_ES', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
    
    // Establecemos el formato que queremos
    $formatter->setPattern('EEEE, d \'de\' MMMM \'de\' y');
    
    // Mostramos la fecha actual
    echo $formatter->format(new DateTime());
    ?>
</body>

</html>