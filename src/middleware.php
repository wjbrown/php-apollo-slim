<?php

$app->add(function($request, $response, $next) {

    $response = $next($request, $response);

    // logic here

    return $response;

});