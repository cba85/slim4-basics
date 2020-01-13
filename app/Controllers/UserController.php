<?php

namespace App\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use PDO;

class UserController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $query = $this->pdo->query('SELECT * FROM users');
        $users = $query->fetchAll(PDO::FETCH_OBJ);
        echo $this->twig->render('users/index.html', compact('users'));
        return $response;
    }
}