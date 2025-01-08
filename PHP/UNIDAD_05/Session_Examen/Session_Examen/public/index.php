<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use SessionExamen\Service\Autenticar;


Autenticar::inicializar();
Autenticar::runAccion();
