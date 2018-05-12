<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

define('DS', '/');
define('ROOT_PATH', dirname(dirname(__FILE__)));
define('SRC_PATH', ROOT_PATH . DS . 'src');
define('VIEW_PATH', SRC_PATH . DS . 'Views');

require ROOT_PATH . DS . 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails'               => true,
        'determineRouteBeforeAppMiddleware' => true
    ]
]);

require SRC_PATH . DS . "dependencies.php";
require SRC_PATH . DS . "handlers.php";
require SRC_PATH . DS . "middleware.php";

require SRC_PATH . DS . 'Routes' . DS . 'pages.php';
require SRC_PATH . DS . 'Routes' . DS . 'api.php';

$app->run();