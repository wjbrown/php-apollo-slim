<?php

$app->add(new \Slim\HttpCache\Cache('public', 86400));

$app->add(function($request, $response, $next) {

    $response = $next($request, $response);

    // logic here

    return $response;

});
