<?php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
$client = new Client(['base_uri' => 'https://brasilapi.com.br']);

try {
    $parametro = $_GET['parametro'];
    if (empty($parametro)) {
        echo "<pre>";
        print_r(403);
        echo "</pre>";
        die();
    }
    $response = $client->request('GET', "/api/ddd/v1/$parametro");
    echo "<pre>";
    print_r(json_decode($response->getBody()));
    echo "</pre>";
    die();
} catch (GuzzleException $e) {

}