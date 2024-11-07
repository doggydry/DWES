<?php
namespace IbanValidator;
use Brick\Math\BigInteger;

class Iban {
    private $iban;

    public function __construct($iban)
{
    $this->iban = strtoupper($iban);
}

}