<?php
require_once dirname(__DIR__) . '../vendor/autoload.php';

use Vis\classes\Autenticarse;
Autenticarse::inicializar();
Autenticarse::runAccion();
Autenticarse::configurar();



