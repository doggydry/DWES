<?php
namespace CLASES;

use TRAITS\informacionLaboral;
use TRAITS\informacionPersonal;
use CLASES\Empleado;

$empleado = new Empleado();
$empleado->setInformacionPersonal("Paco", 35, "Suances");
$empleado->setInformacionLaboral("ABC000", 2500);

echo $empleado->mostrarInformacion(); 
