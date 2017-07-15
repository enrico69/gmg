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

Service::$app = $app;

// Set routes
foreach (Routes::$routes as $route => $routeData) {
    $app->get(
        $route, function (Request $request) use ($routeData) {
            $class = 'Games\Controller\\' . $routeData['Dir'] .
                '\\' . $routeData['File'];
            $controller = new $class();
            $render = $controller->execute($request);

            return View::renderPage($render['title'], $render['content']);
        }
    );
}

// Start application
$app->run();
