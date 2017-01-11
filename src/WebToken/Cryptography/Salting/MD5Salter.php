<?php

namespace Minerva\WebToken\Cryptography\Salting;

use Minerva\WebToken\Cryptography\Salting\Basis\Interfaces\SalterInterface;
use Minerva\WebToken\Device\Mobile\Token;

/**
 * Class MD5Salter
 *
 * @author  Lucas A. de Araújo <lucas@minervasistemas.com.br>
 * @package Minerva\WebToken\Cryptography\Salting
 */
class MD5Salter implements SalterInterface
{
    /**
     * Numero de vezes que a mesma string será criptografada
     *
     * @var int
     */
    protected $loops;

    /**
     * Senha que será usada para saltear a hash
     *
     * @var string
     */
    protected $password;

    /**
     * Retorna o número de loops
     *
     * @return int
     */
    public function getLoops()
    {
        return $this->loops;
    }

    /**
     * Define o número de loops
     *
     * @param int $loops
     */
    public function setLoops($loops)
    {
        $this->loops = $loops;
    }

    /**
     * Retorna a senha
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Define a senha
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param Token $token
     * @return Token
     */
    public function salt(Token $token)
    {
        $loops = $this->getLoops();
        $tokenVal = $token->getValue();

        for($i = 1; $i <= $loops; $i++){
            $tokenVal = md5($tokenVal);
        }

        $tokenVal = substr($tokenVal, 0, 5);
        $tokenVal = strtoupper($tokenVal);

        $token->setValue($tokenVal);
        return $token;
    }

}