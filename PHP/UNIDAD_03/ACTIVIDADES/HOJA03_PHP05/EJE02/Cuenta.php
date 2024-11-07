<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
class Cuenta {
    private $numero;
    private $titular;
    private $saldo;

    // Constructor para inicializar los atributos
    public function __construct($numero, $titular, $saldo) {
        $this->numero = $numero;
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    // Método para incrementar el saldo
    public function ingreso($cantidad) {
        $this->saldo += $cantidad;
    }

    // Método para decrementar el saldo
    public function reintegro($cantidad) {
        $this->saldo -= $cantidad;
    }

    // Método para obtener el saldo
    public function getSaldo() {
        return $this->saldo; // Método para acceder al saldo
    }

    // Método para verificar si es preferencial
    public function esPreferencial($cantidad) {
        return $this->saldo > $cantidad;
    }

    // Método para mostrar los datos en formato HTML
    public function mostrar() {
        return "<h3>Cuenta</h3>
                <p>Número: {$this->numero}</p>
                <p>Titular: {$this->titular}</p>
                <p>Saldo: {$this->saldo} €</p>";
    }
}


class CuentaCorriente extends Cuenta {
    private $cuota_mantenimiento;

    // Constructor que también resta la cuota de mantenimiento
    public function __construct($numero, $titular, $saldo, $cuota_mantenimiento) {
        parent::__construct($numero, $titular, $saldo - $cuota_mantenimiento);
        $this->cuota_mantenimiento = $cuota_mantenimiento;
    }

    // Método para redefinir el reintegro
    public function reintegro($cantidad) {
        // Utiliza el método getSaldo() para acceder al saldo
        if ($this->getSaldo() - $cantidad < 20) {
            echo "No se puede realizar el reintegro, el saldo debe ser al menos 20 €.<br>";
        } else {
            parent::reintegro($cantidad);
        }
    }

    // Método para mostrar los datos de CuentaCorriente
    public function mostrar() {
        return parent::mostrar() . "<p>Cuota de Mantenimiento: {$this->cuota_mantenimiento} €</p>";
    }
}


class CuentaAhorro extends Cuenta {
    private $comision_apertura;
    private $intereses;

    // Constructor que resta la comisión de apertura
    public function __construct($numero, $titular, $saldo, $comision_apertura, $intereses) {
        parent::__construct($numero, $titular, $saldo - $comision_apertura);
        $this->comision_apertura = $comision_apertura;
        $this->intereses = $intereses;
    }

    // Método para aplicar el interés
    public function aplicaInteres() {
        $nuevoSaldo = $this->getSaldo() * (1 + $this->intereses / 100);
        $this->ingreso($nuevoSaldo - $this->getSaldo()); // Actualiza el saldo con el nuevo monto
    }

    // Método para mostrar los datos de CuentaAhorro
    public function mostrar() {
        return parent::mostrar() . "
                <p>Comisión de Apertura: {$this->comision_apertura} €</p>
                <p>Intereses: {$this->intereses} %</p>";
    }
}

?>

</body>
</html>
