<?php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
$client = new Client(['base_uri' => 'https://brasilapi.com.br']);

try {
    $response = $client->request('GET', '/api/banks/v1');
    echo "<pre>";
    print_r(json_decode($response->getBody()));
    echo "</pre>";
    die();
} catch (GuzzleException $e) {

}