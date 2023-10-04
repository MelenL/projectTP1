<?php
include_once 'config/config.php';
// Obtenir l'URL demandée
$requestUri = $_SERVER['REQUEST_URI'];

$requestSegments = explode('/', trim($requestUri, '/'));

// La première partie de l'URL devrait être le nom de la page
if (!empty($requestSegments[0])) {
    $page = $requestSegments[0];
} else {
    $page = 'home';
}

$controllers = [
    'home' => 'HomeController',
    'add' => 'AddContactController',
    'delete' => 'DeleteContactController',
    'edit' => 'EditContactController',
    'Recherche' => 'Recherche',
    'View' => 'ViewContactController',
];

if (array_key_exists($page, $controllers)) {
    $controllerName = $controllers[$page];
    require_once('controllers/' . $controllerName . '.php');
    $controller = new $controllerName();
    $controller->index();
} else {
    
        header('Location:views/home.php');
}
?>