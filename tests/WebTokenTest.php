<?php

namespace Tests;

use Minerva\WebToken\Cryptography\Salting\MD5Salter;
use Minerva\WebToken\Device\Mobile\Device;
use Minerva\WebToken\Device\Mobile\Factory\TokenFactory;

/**
 * WebTokenTest
 *
 * Teste para geração do webtoken
 *
 * @author  Lucas A. de Araújo <lucas@minervasistemas.com.br>
 * @package Tests
 */
class WebTokenTest extends \PHPUnit_Framework_TestCase
{
    public function testWebTokenGen()
    {
        $device = new Device();
        $device->setNumber(554430450505);
        
        $salter = new MD5Salter();
        $salter->setLoops(30);
        
        $factory = new TokenFactory();
        $factory->setDevice($device);
        $factory->setSalter($salter);

        $token = $factory->create();

        $length = strlen($token->getValue());
        $this->assertEquals(5, $length);
    }
}