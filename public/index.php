<?php
/**
 * Frontal controller
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
chdir(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
require_once 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Games\Config\Routes;
use Games\Config\General;
use Games\Helper\View;
use Games\Helper\Service;
use Silex\Provider\DoctrineServiceProvider;
use Symfony\Component\HttpFoundation\Request;

// Create application
$app = new Silex\Application();

// Declare services

// --> Doctrine
$app->register(
    new DoctrineServiceProvider(), [
        'db.options' => [
            'driver'   => 'pdo_mysql',
            'host'     => General::DB_HOST,
            'dbname'   => General::DB_NAME,
            'user'     => General::DB_LOGIN,
            'password' => General::DB_PASSWORD,
            'port'     => General::DB_PORT
        ],
    ]
);

// --> Monolog
$app->register(
    new Silex\Provider\MonologServiceProvider(), [
    'monolog.logfile' => __DIR__.'/production.log',
    ]
);

// Setting application for service access
Service::$app = $app;

// Set routes
foreach (Routes::$routes as $route => $routeData) {
    $handler = function (Request $request) use ($routeData) {
        $class = 'Games\Controller\\' . $routeData['Dir'] .
            '\\' . $routeData['File'];
        $controller = new $class();
        try {
            $render = $controller->execute($request);
            $response = View::renderPage($render['title'], $render['content']);
        } catch (\Exception $ex) {
            Service::getLog()->error($ex->getMessage());
            echo $ex->getMessage();
            $response = View::renderPage("Erreur", "Une erreur s'est produite");
        }

        return $response;
    };

    if (in_array('GET', $routeData['Methods'])) {
        $app->get($route, $handler);
    }

    if (in_array('POST', $routeData['Methods'])) {
        $app->post($route, $handler);
    }
}

// Start application
$app->run();
