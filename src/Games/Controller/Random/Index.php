<?php
/**
 * Created by PhpStorm.
 * User: Eric
 * Date: 25/06/2017
 * Time: 15:36
 */

namespace Games\Controller\Random;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;

class Index
{
    public function execute()
    {
        return 'Random';
    }
}
