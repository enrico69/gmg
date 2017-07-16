<?php
/**
 * Abstract controller
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace Games\Controller;

use Games\Config\General;
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
     * @return \Doctrine\DBAL\Connection
     */
    protected function getDoctrine()
    {
        return Service::getDoctrine();
    }

    /**
     * Return Monolog
     *
     * @return \Monolog\Logger
     */
    protected function getLog()
    {
        return Service::getLog();
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
     * Perform a 302 redirection
     *
     * @param string $url is the url of destination
     *
     * @return null;
     */
    protected function redirect($url)
    {
        header('Location: '.$url);
        exit;
    }

    /**
     * Check if the password is right
     *
     * @param string $password the entered password
     *
     * @return bool
     */
    protected function isPasswordValid($password)
    {
        return $password == General::PASSWORD ? true : false;
    }

    /**
     * Main method
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP request object
     *
     * @return mixed
     */
    abstract public function execute(Request $request);
}
