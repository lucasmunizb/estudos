<?php
namespace Classes;

class Rota
{
    public function __construct()
    {
        echo "<pre>";
        var_dump(self::getUrl());
        echo "</pre>";
        die();
    }
    public function getUrl():string
    {
        return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    }
}