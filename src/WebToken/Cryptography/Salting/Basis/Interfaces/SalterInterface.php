<?php

namespace Minerva\WebToken\Cryptography\Salting\Basis\Interfaces;

use Minerva\WebToken\Device\Mobile\Token;

/**
 * Interface SalterInterface
 *
 * @author  Lucas A. de Araújo <lucas@minervasistemas.com.br>
 * @package Minerva\WebToken\Cryptography\Salting
 */
interface SalterInterface
{
    /**
     * @param Token $token
     * @return mixed
     */
    public function salt(Token $token);
}