<?php

namespace Tests;

use Minerva\WebToken\Cryptography\Cypher\AESCypher;

/**
 * AES CypherTest
 *
 * @author  Lucas A. de Araújo <lucas@minervasistemas.com.br>
 * @package Tests
 */
class AESCypherTest extends \PHPUnit_Framework_TestCase
{
    public function testEncodeAndDecode()
    {
        $password = 'gottmituns';
        $string   = 'Blitz into France trough Belgium and Luxemburg';
        $encoded  = AESCypher::encode($string, $password);
        $decoded  = AESCypher::decode($encoded, $password);

        $this->assertNotEquals($encoded, $string);
        $this->assertEquals($decoded, $string);
    }
}