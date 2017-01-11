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
     */
    public function pack(Token $token)
    {
        $array = [
            'token'       => $token->getValue(),
            'phoneNumber' => $token->getPhoneNumber()
        ];

        $string = json_encode($array);

        $cypher = new AESCypher();
        $cypher->encode($string);
    }
}