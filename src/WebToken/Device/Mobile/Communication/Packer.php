<?php

namespace Minerva\WebToken\Device\Mobile\Communication;

use Minerva\WebToken\Cryptography\Cypher\AESCypher;
use Minerva\WebToken\Device\Mobile\Token;

/**
 * Empacotador
 *
 * Empacota (criptografa) um token para envio ao app mobile.
 *
 * @author  Lucas A. de Araújo <lucas@minervasistemas.com.br>
 * @package Minerva\WebToken\Device\Mobile\Communication
 */
class Packer
{
    /**
     * Empacota um token para envio.
     *
     * @param Token $token
     * @param $password
     * @return Package
     */
    public function pack(Token $token, $password)
    {
        $array = [
            'token'       => $token->getValue(),
            'phoneNumber' => $token->getPhoneNumber()
        ];

        $string = json_encode($array);
        $string = AESCypher::encode($string, $password);

        $package = new Package();
        $package->setContent($string);
        return $package;
    }
}