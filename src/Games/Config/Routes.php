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
        '/' => ['Dir' => 'Index', 'File' => 'Index'],
        '/list' => ['Dir' => 'Listing', 'File' => 'Index'],
        '/list/top' => ['Dir' => 'Listing', 'File' => 'Top'],
        '/random' => ['Dir' => 'Random', 'File' => 'Index'],
        '/add' => ['Dir' => 'Add', 'File' => 'Index'],
        '/detail' => ['Dir' => 'Detail', 'File' => 'Index']
    ];
}
