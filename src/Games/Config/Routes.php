<?php
/**
 * Routes configuration file
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace Games\Config;

/**
 * Class Routes
 *
 * @package Games\Config
 */
class Routes
{
    public static $routes = [
        '/' => ['Methods' => ['GET'], 'Dir' => 'Index', 'File' => 'Index'],
        '/list' => ['Methods' => ['GET'], 'Dir' => 'Listing', 'File' => 'Index'],
        '/list/top' => ['Methods' => ['GET'], 'Dir' => 'Listing', 'File' => 'Top'],
        '/random' => ['Methods' => ['GET'], 'Dir' => 'Random', 'File' => 'Index'],
        '/add' => ['Methods' => ['GET', 'POST'], 'Dir' => 'Add', 'File' => 'Index'],
        '/detail' => ['Methods' => ['GET'], 'Dir' => 'Detail', 'File' => 'Index'],
        '/edit' => ['Methods' => ['GET', 'POST'], 'Dir' => 'Edit', 'File' => 'Index'],
        '/search' => ['Methods' => ['POST'], 'Dir' => 'Listing', 'File' => 'Search'],
        '/todo' => ['Methods' => ['GET'], 'Dir' => 'Listing', 'File' => 'Todo']
    ];
}
