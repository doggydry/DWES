<html>
    <head>
        <title>Desarrollo Web</title>
    </head>
    <body>

        <?php 
            if (isset($_GET['enviar'])) { 
                $nombre = $_GET['nombre']; 
                $modulos = $_GET['modulos'];
                print "Nombre: " . $nombre . "<br />"; 
                foreach ($modulos as $modulo) { 
                    print "Modulo: " . $modulo . "<br />"; 
                }
            }  
        ?>
    </body> 
</html>
