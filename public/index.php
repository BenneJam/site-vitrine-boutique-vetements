<?php

/**
 * Front Controller - Point d'entrée de l'application
 * Route les requêtes vers le contrôleur approprié
 */

// Démarrage de la session
session_start();

// Inclusion du controlleur utilisateur
require_once __DIR__ . '/../src/controllers/utilisateurController.php';

// Inclusion de la classe Request
require_once __DIR__ . '/../src/Http/Request.php';

// Inclusion de la classe Response
require_once __DIR__ . '/../src/Http/Response.php';

// Inclusion de la classe Router
require_once __DIR__ . '/../src/Routing/Router.php';

// Création de l'objet Request
$request = new Request();
// Création de l'object Response
$response = new Response();
// Création de l'objet Router
$router = new Router($request, $response);

$router
    ->addRoute('index', 'indexBoutique', ['GET'])
    ->addRoute('login', 'loginBoutique', ['GET', 'POST'])
    ->addRoute('signin', 'signinBoutique', ['GET', 'POST']);

$router->handleRequest();
