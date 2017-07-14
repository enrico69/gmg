<?php
/**
 * Abstract controller
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace Games\Controller;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Games\Helper\View;

/**
 * Class ControllerAbstract
 *
 * @package Games\Controller
 */
abstract class ControllerAbstract
{
    /**
     * Method to render a template
     *
     * @param string $templateName
     * @param string $content
     *
     * @return string
     */
    protected function render($templateName, $content)
    {
        return View::render($templateName, $content);
    }

    /**
     * Main method
     *
     * @return mixed
     */
    abstract public function execute();
}
