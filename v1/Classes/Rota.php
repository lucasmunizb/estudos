<?php

namespace Classes;

class Rota
{
    public static function getUrl()
    {
        return $_SERVER['REQUEST_URI'];
    }
}