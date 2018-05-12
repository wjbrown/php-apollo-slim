<?php

$container = $app->getContainer();

$container['mdView'] = function ($container) {

    return new \DavidePastore\Slim\Views\MarkdownRenderer(VIEW_PATH . DS . 'posts');

};

$container['phpView'] = function ($container) {

    return new \Slim\Views\PhpRenderer(VIEW_PATH);

};

$container['httpCache'] = function() {

    return new \Slim\HttpCache\CacheProvider();

};

