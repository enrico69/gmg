<?php
/**
 * Main routes file
 *
 * Created by PhpStorm.
 * User: Eric COURTIAL
 * Date: 13/07/2017
 * Time: 20:28
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
        '/add' => ['Dir' => 'Add', 'File' => 'Index']
    ];
}
