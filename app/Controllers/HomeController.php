<?php

namespace App\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;

class HomeController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $this->log->warning('Bar');
        echo $this->twig->render('index.html');
        return $response;
    }

    public function hello(Request $request, Response $response, $args)
    {
        $name = $args['name'];
        $response->getBody()->write("Hello, $name");
        return $response;
    }
}