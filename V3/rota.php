<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
require 'query.php';
function getUrl():string
{
    return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
}

if(getUrl() === '/'){
    require_once 'gerenciador.php';
    die();
}
if(getUrl() === '/rota.php'){
    if(file_exists(__DIR__.'/'.$_POST['url_destino'])) {
        require "{$_POST['url_destino']}";
        die();
    }
}

if(file_exists(__DIR__.getUrl().'.php')) {
    require_once __DIR__.getUrl().'.php';
    die();
}