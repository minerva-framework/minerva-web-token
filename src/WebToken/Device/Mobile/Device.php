<?php

namespace Minerva\WebToken\Device\Mobile;

use Minerva\WebToken\Device\Basis\Abstractions\AbstractDevice;

/**
 * Dispositivo mobile
 *
 * Essa classe irá criar objetos que representam as propriedades
 * de um dispositivo mobile para gerar um WebToken.
 *
 * @author  Lucas A. de Araújo <lucas@minervasistemas.com.br>
 * @package Minerva\WebToken\Device\Mobile
 */
class Device extends AbstractDevice
{
    /**
     * Número do dispositivo móvel
     *
     * @var int
     */
    protected $number;

    /**
     * Retorna número do dispositivo móvel
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Define número do dispositivo móvel
     * 
     * @param int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }
}