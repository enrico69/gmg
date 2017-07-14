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
     * Application instance
     *
     * @var \Silex\Application
     */
    private $application;

    /**
     * ControllerAbstract constructor.
     *
     * @param \Silex\Application $app is the application object
     */
    public function __construct($app)
    {
        $this->application = $app;
    }

    /**
     * Method to render a template
     *
     * @param string $templateName is the template name
     * @param string $content      is the content to display
     *
     * @return string
     */
    protected function render($templateName, $content)
    {
        return View::render($templateName, $content);
    }

    /**
     * Return Doctrine Connection
     *
     * @return Doctrine\DBAL\Connection
     */
    protected function getDoctrine()
    {
        return $this->application['db'];
    }

    /**
     * Main method
     *
     * @return mixed
     */
    abstract public function execute();
}
