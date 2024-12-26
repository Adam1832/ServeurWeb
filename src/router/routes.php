<?php

require_once __DIR__ . '/../controllers/MainController.php';
require __DIR__ . '/../../vendor/autoload.php';

$router = new AltoRouter();

// Calcul automatique de la base path (en incluant /public)
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');

$router->setBasePath('/SiteServeurWeb/public');

// Routes
$router->map('GET', '/', 'MainController#home', 'home');
$router->map('GET', '/../src/views/produits', 'MainController#produits', 'produits');
$router->map('GET', '/../src/views/panier', 'MainController#panier', 'panier');
$router->map('GET', '/../src/views/inscription', 'MainController#inscription', 'inscription');
$router->map('GET', '/../src/views/connexion', 'MainController#connexion', 'connexion');

// Retourne l'objet router
return $router;