<?php

$container = $app->getContainer();

$container['phpView'] = function ($container) {

    return new \Slim\Views\PhpRenderer(VIEW_PATH);

};



