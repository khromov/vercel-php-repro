<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Views\PhpRenderer as PhpRenderer;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App;
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer(__DIR__ . "/templates");

/**
 * Main page
 */
$app->get('/', function (Request $request, Response $response) {
    return $this->renderer->render($response, "/pages/test.php", []);
});

/**
 * Form
 */
$app->post('/submit', function (Request $request, Response $response) {
    var_dump($_SERVER['REQUEST_METHOD']);
});

$app->run();