<?php

$container = $app->getContainer();

//Override the default Not Found Handler
$container['notFoundHandler'] = function ($container) {

    return function ($request, $response) use ($container) {

        $response = $response->withStatus(404);

        return $container['phpView']->render($response, 'layouts/default.php', [
            'view' => [
                'template' => 'pages/404.php',
                'data'     => [
                    'url' => $request->getRequestTarget()
                ]
            ]
        ]);

    };

};
