<?php
/**
 * Main controller
 */

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' .
    DIRECTORY_SEPARATOR . 'autoload.php';

use Games\Config\Routes;

// Create application
$app = new Silex\Application();

// Set routes
foreach (Routes::$routes as $route => $routeData) {
    $app->get($route, function () use ($routeData) {
        $class = 'Games\Controller\\' . $routeData['Dir'] . '\\' . $routeData['File'];
        $controller = new $class();

        return $controller->execute();
    });
}

// Start application
$app->run();
