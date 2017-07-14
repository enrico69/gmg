<?php
/**
 * Frontal controller
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
chdir(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
require_once 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Games\Config\Routes;
use Games\Helper\View;
use Silex\Provider\DoctrineServiceProvider;

// Create application
$app = new Silex\Application();

// Declare services
$app->register(
    new Silex\Provider\DoctrineServiceProvider(), [
        'db.options' => [
            'driver'   => 'pdo_mysql',
            'path'     => __DIR__.'/app.db',
        ],
    ]
);

// Set routes
foreach (Routes::$routes as $route => $routeData) {
    $app->get(
        $route, function () use ($routeData, $app) {
            $class = 'Games\Controller\\' . $routeData['Dir'] .
                '\\' . $routeData['File'];
            $controller = new $class($app);
            $render = $controller->execute();

            return View::renderPage($render['title'], $render['content']);
        }
    );
}

// Start application
$app->run();
