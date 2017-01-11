<?php

namespace Minerva\WebToken\Device\Mobile;

/**
 * Token mobile
 *
 * @author  Lucas A. de Araújo <lucas@minervasistemas.com.br>
 * @package Minerva\WebToken\Device\Mobile
 */
class Token
{
    /**
     * Número do telefone ao qual o token pertence
     *
     * @var string
     */
    protected $phoneNumber;

    /**
     * Valor do token gerado
     *
     * @var string
     */
    protected $value;

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}