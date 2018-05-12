<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function(Request $request, Response $response) {

    // render the layout/view
    return $this->phpView->render($response, 'layouts/default.php', [
        'view' => [
            'template' => 'pages/home.php',
            'data'     => [
                'page_title' => 'This is the Home Page',
                'a_random_list' => [
                    'the dreamscape',
                    'the subtle world',
                    'the inbetween',
                    'the upside-down',
                    'the other side'
                ]
            ]
        ]
    ]);

})->setName('home');