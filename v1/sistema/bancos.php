<?php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
$client = new Client(['base_uri' => 'https://brasilapi.com.br']);

try {
    $parametro = $_GET['parametro'];
    $response = $client->request('GET', "/api/banks/v1/$parametro");
    echo "<pre>";
    print_r(json_decode($response->getBody()));
    echo "</pre>";
    die();
} catch (GuzzleException $e) {

}