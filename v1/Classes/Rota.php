<?php
namespace Classes;
define('ROTA_V1',dirname(__DIR__));
class Rota
{
    private string $parametro;
    private string $arquivo;

    public function __construct()
    {
        $rotaInicial = explode('sistema/',self::getUrl());
        if (!isset($rotaInicial[1])) {
            echo "404";
            exit;
        }
        $rota = explode('/',$rotaInicial[1]);
        if (!file_exists(dirname(__DIR__)."/sistema/$rota[0].php")) {
            echo "404";
            exit;
        }
        self::setArquivo(ROTA_V1."/sistema/$rota[0].php");
        $parametro = end($rota) != $rota[0] ? end($rota) : '';
        self::setParametro($parametro);
    }
    public function getUrl():string
    {
        return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
    }
    public function getArquivo(): string
    {
        return $this->arquivo;
    }
    public function setArquivo(string $arquivo): void
    {
        $this->arquivo = $arquivo;
    }
    public function getParametro(): string
    {
        return $this->parametro;
    }
    public function setParametro(string $parametro): void
    {
        $this->parametro = $parametro;
    }
}