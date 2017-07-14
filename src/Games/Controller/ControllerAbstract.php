<?php
/**
 * Abstract controller
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace Games\Controller;

use Symfony\Component\HttpFoundation\Request;
use Games\Helper\View;
use Games\Helper\Service;

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
        return Service::getDoctrine();
    }

    /**
     * Return the repository object
     *
     * @param string $repoName is the repository name
     *
     * @return object is the repository
     */
    protected function getRepository($repoName)
    {
        return Service::getRepository($repoName);
    }

    /**
     * Main method
     *
     * @return mixed
     */
    abstract public function execute();
}
