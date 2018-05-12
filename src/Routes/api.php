<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/clients/{client_id}', function(Request $request, Response $response) {

    $id = $request->getAttribute('client_id');

    // get the client from the id
    $client = [
        'id' => 123,
        'name' => 'Mr Test'
    ];

    return $response->withJSON(
        ['Client' => $client],
        200
    );

})->setName('get_client');






