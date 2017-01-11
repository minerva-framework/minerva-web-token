<?php

namespace Minerva\WebToken\Device\Mobile\Communication;

/**
 * Package
 *
 * Pacote contendo o token a ser enviado para o mobile
 *
 * @author  Lucas A. de Araújo <lucas@minervasistemas.com.br>
 * @package Minerva\WebToken\Device\Mobile\Communication
 */
class Package
{
    /**
     * Conteúdo do pacote
     *
     * @var string
     */
    protected $content;

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}