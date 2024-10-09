<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// Clase base Producto
class Producto {
    protected $codigo;
    protected $precio;
    protected $nombre;

    public function __construct($codigo, $precio, $nombre) {
        $this->codigo = $codigo;
        $this->precio = $precio;
        $this->nombre = $nombre;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function mostrar() {
        return "Código: {$this->codigo}, Nombre: {$this->nombre}, Precio: {$this->precio} €";
    }
}

// Clase Alimentacion que hereda de Producto
class Alimentacion extends Producto {
    private $mesCaducidad;
    private $anoCaducidad;

    public function __construct($codigo, $precio, $nombre, $mesCaducidad, $anoCaducidad) {
        parent::__construct($codigo, $precio, $nombre);
        $this->mesCaducidad = $mesCaducidad;
        $this->anoCaducidad = $anoCaducidad;
    }

    public function getMesCaducidad() {
        return $this->mesCaducidad;
    }

    public function getAnoCaducidad() {
        return $this->anoCaducidad;
    }

    public function mostrar() {
        return parent::mostrar() . ", Caducidad: {$this->mesCaducidad}/{$this->anoCaducidad}";
    }
}

// Clase Electronica que hereda de Producto
class Electronica extends Producto {
    private $plazoGarantia; // en meses

    public function __construct($codigo, $precio, $nombre, $plazoGarantia) {
        parent::__construct($codigo, $precio, $nombre);
        $this->plazoGarantia = $plazoGarantia;
    }

    public function getPlazoGarantia() {
        return $this->plazoGarantia;
    }

    public function mostrar() {
        return parent::mostrar() . ", Garantía: {$this->plazoGarantia} meses";
    }
}
?>

</body>
</html>