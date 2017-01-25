<?php

namespace Minerva\WebToken\Cryptography\Cypher;

/**
 * Cifrador AES
 *
 * Responsável por encodificar ou decodificar textos
 *
 * @author  Lucas A. de Araújo <lucas@minervasistemas.com.br>
 * @package Minerva\WebToken\Cryptography\Cypher
 */
class AESCypher
{
    /**
     * @param string $string
     * @param string $password
     * @return string
     */
    public static function encode($string, $password)
    {
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $code = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, md5($password), $string, MCRYPT_MODE_CBC, $iv);
        $code = $iv .'_____'. $code;
        $code = base64_encode($code);

        return $code;
    }

    /**
     * @param string $string
     * @param string $password
     * @return string
     */
    public static function decode($string, $password)
    {
        $ciphertext_dec = base64_decode($string);
        $iv_dec = explode('_____', $ciphertext_dec)[0];
        $ciphertext_dec = explode('_____', $ciphertext_dec)[1];

        if(preg_match("/^[0-9](,[0-9])*$/", $ciphertext_dec)){
            $bytes = explode(',' , $ciphertext_dec);
            $ciphertext_dec = implode(array_map("chr", $bytes));
        }

        $plaintext = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, md5($password), $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
        $plaintext = rtrim($plaintext, "\0");

        return $plaintext;
    }
}