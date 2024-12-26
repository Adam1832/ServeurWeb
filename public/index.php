<?php

require '../vendor/autoload.php';

// Je créer une instance de AltoRouter (la librairie que j'ai installé)
$router = new AltoRouter();

// Vérifiez si la clé "BASE_URI" est définie, sinon l'initialisez
if (!isset($_SERVER['BASE_URI'])) {
    $_SERVER['BASE_URI'] = '/'; // Ou définissez ici la base de votre projet
}

// On fournit à AltoRouter la partie de l'URL à ne pa sprendre en compte pour faire la comparaison entre l'URL courante et l'url de la route
// LA valeur de $_SERVER['BASE_URI'] est donnée par le fichier .htaccess. Elle correspond au chemin de la racine du site, ici se termine par public
$router->setBasePath($_SERVER['BASE_URI']); // Je définis le chemin de base => ce par quoi mes routes vont commencer (localhost/.../public)

// Ici, je créer mes routes (https://altorouter.com/usage/mapping-routes.html)

// Ci dessous je dump(j'affiche) CatalogController::class
// CatalogController::class => c'est le nom complet de la classe CatalogController, cad que ca va afficher le namespace de cette classe + le nom de la classe => App\Controllers\CatalogController
$router->addRoutes(array( 
    array('GET','/', [
        'controller' => MainController::class, // Dans quel controller ?
        'action' => 'home' // Quelle méthode dans ce controller ?
    ], 'home'),

    // ICI !!!
    array('GET','/produits', [
        'controller' => MainController::class, 
        'action' => 'productList'
    ], 'produits'),
  ));
  
	// ...


require_once __DIR__ . '/../src/controllers/MainController.php';

$router = require_once __DIR__ . '/../src/router/routes.php';

var_dump($router->getRoutes());
$GLOBALS['router'] = $router;

$match = $router->match();



if ($match) {
    var_dump($match); 
    [$controller, $method] = explode('#', $match['target']);
    
    if (class_exists($controller) && method_exists($controller, $method)) {
        (new $controller())->$method();
    } else {
        (new MainController())->notFound();
    }
} else {
    (new MainController())->notFound();
}


?>