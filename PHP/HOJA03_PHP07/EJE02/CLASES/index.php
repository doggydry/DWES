<?php
namespace CLASES;
require_once 'TRAITS/informacionPersonal.php';
require_once 'TRAITS/informacionLaboral.php';
require_once 'empleado.php'; 
use TRAITS\informacionLaboral;
use TRAITS\informacionPersonal;

$empleado = new Empleado();
$empleado->setInformacionPersonal("Paco", 35, "Suances");
$empleado->setInformacionLaboral("ABC000", 2500);

echo $empleado->mostrarInformacion();
?>
