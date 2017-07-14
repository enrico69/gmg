<?php
/**
 * Service Manager
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace Games\Helper;

/**
 * Class Service
 *
 * @package Games\Helper
 */
class Service
{
    /**
     * Application handle
     *
     * @var Silex\Application
     */
    public static $app;

    /**
     * Will contain all the repository for lazy loading
     *
     * @var array
     */
    protected static $loadedRepos = [];

    /**
     * Get Doctrine connexion
     *
     * @return \Doctrine\DBAL\Connection
     */
    public static function getDoctrine()
    {
        return self::$app['db'];
    }

    /**
     * Return the asked repository
     *
     * @param string $repoName is the repository name
     *
     * @return object
     */
    public static function getRepository($repoName)
    {
        if (!array_key_exists($repoName, self::$loadedRepos)) {
            $className = "Games\\Model\\" . $repoName;
            self::$loadedRepos[$repoName] = new $className(
                self::getDoctrine()
            );
        }

        return self::$loadedRepos[$repoName];
    }
}
