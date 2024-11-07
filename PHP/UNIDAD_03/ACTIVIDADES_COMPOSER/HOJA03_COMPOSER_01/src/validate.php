<?php 
require '../vendor/autoload.php';
use IbanValidator\Iban;

if (isset($_POST['validar'])) {
$ibanInput = $_POST['validar'];
$iban = new Iban($ibanInput);

}





