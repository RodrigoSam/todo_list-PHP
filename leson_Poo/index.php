<?php

class Caneta{

    public static function escrever($texto = "")
    {
        echo "$texto";
    }

}

$caneta = new Caneta;

$caneta->escrever("teste <br>");

Caneta::escrever("teste");










