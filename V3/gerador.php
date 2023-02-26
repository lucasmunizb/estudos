<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
$conexaoPdo = new PDO('mysql:host=localhost','root','password');
require 'query.php';

if(isset($_POST['log_banco'])) {
    $_POST['tabelas_log'] = 'tblog'.substr($_POST['tabelas'],2);
    $verificarExistenciaLog = buscarTabela($_POST,$conexaoPdo);
    if(!$verificarExistenciaLog) {
        $retorno = criarTabelaLog($_POST,$conexaoPdo);
    }
}
if(isset($_POST['arquivo'])) {
    mkdir('./Arquivos/Model',0777);
    $nomeArquivo= ucfirst(substr($_POST['tabelas'],2));
    file_put_contents("./Arquivos/Model/{$nomeArquivo}Model.php",'');
    mkdir('./Arquivos/View',0777);
    file_put_contents("./Arquivos/View/{$nomeArquivo}View.php",'');
    mkdir('./Arquivos/Controller',0777);
    file_put_contents("./Arquivos/Controller/{$nomeArquivo}Controller.php",'');
}
?>







