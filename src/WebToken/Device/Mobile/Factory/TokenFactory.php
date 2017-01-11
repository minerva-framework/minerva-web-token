<?php

namespace Minerva\WebToken\Device\Mobile\Factory;

use Minerva\WebToken\Cryptography\Salting\Basis\Interfaces\SalterInterface;
use Minerva\WebToken\Device\Mobile\Device;
use Minerva\WebToken\Device\Mobile\Token;


/**
 * Fábrica de tokens mobile
 *
 * Responsável por gerar os tokens que serão comparados para
 * os dispositivos para validação de requisições.
 *
 * @author  Lucas A. de Araújo <lucas@minervasistemas.com.br>
 * @package Minerva\WebToken\Device\Mobile
 */
class TokenFactory
{
    /**
     * @var Device
     */
    protected $device;

    /**
     * @var SalterInterface
     */
    protected $salter;

    /**
     * @return Device
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * @param Device $device
     */
    public function setDevice($device)
    {
        $this->device = $device;
    }

    /**
     * @return SalterInterface
     */
    public function getSalter()
    {
        return $this->salter;
    }

    /**
     * @param SalterInterface $salter
     */
    public function setSalter($salter)
    {
        $this->salter = $salter;
    }

    /**
     * @return Token
     */
    public function create()
    {
        $data = (int) (new \DateTime())->format('Ymdhis');

        $token = new Token();
        $token->setValue($this->getDevice()->getNumber() * $data);
        $token = $this->getSalter()->salt($token);

        return $token;
    }
}