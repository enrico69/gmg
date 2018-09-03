<?php
/**
 * Created by Eric COURTIAL.
 * @author <e.courtial30@gmail.com>
 * Date: 18-07-29
 */
namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * Class GamesRepository
 * @package AppBundle\Entity
 */
class GamesRepository extends EntityRepository
{
    /**
     * Return the qty of entries which are real games (not hardware)
     * and really owned (not to buy), original or not.
     *
     * @return int
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getAllRealOwnedGamesCount()
    {
        $query = "SELECT COUNT(*) FROM games WHERE platform != 'A acheter'";

        $result = $this->getEntityManager()
            ->getConnection()
            ->executeQuery($query)
            ->fetch();

        return $result['COUNT(*)'];
    }

    /**
     * Return the qty of games to buy
     *
     * @return int
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getGamesToBuyCount()
    {
        $query = "SELECT COUNT(*) FROM games WHERE platform = 'A acheter' AND material != 1";

        $result = $this->getEntityManager()
            ->getConnection()
            ->executeQuery($query)
            ->fetch();

        return $result['COUNT(*)'];
    }

    /**
     * Return the qty of hardware elements to buy
     *
     * @return int
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getHardwareToBuyCount()
    {
        $query = "SELECT COUNT(*) FROM games WHERE platform = 'A acheter' AND material = 1";

        $result = $this->getEntityManager()
            ->getConnection()
            ->executeQuery($query)
            ->fetch();

        return $result['COUNT(*)'];
    }

    /**
     * Return a random game (not hardware, not to buy)
     *
     * @param string $filter
     *
     * @return \AppBundle\Entity\Games
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\NoResultException
     */
    public function getRandomGame(string $filter = '')
    {
        $query = 'SELECT id FROM games'
            . " WHERE platform != 'A acheter'"
            . ' AND material != 1';

        if ($filter === 'solo') {
            $query .= ' AND to_play_solo = 1';
        } elseif ($filter === 'multi') {
            $query .= ' AND to_play_multi = 1';
        }

        $query .= ' ORDER BY RAND() LIMIT 1';

        $result = $this->getEntityManager()
            ->getConnection()
            ->executeQuery($query)
            ->fetch();

        if (!$result) {
            throw new NoResultException();
        }

        return $this->find($result['id']);
    }

    /**
     * Return the list of all different platforms.
     *
     * @param bool $excludeToBuy
     *
     * @return array
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getSupportList($excludeToBuy = true)
    {
        $exclusion = $excludeToBuy === true ? "WHERE platform != 'A acheter'":'';

        $query = 'SELECT platform, count(*) as total FROM games '
            . " $exclusion GROUP BY platform ORDER BY platform ASC";

        $result = $this->getEntityManager()
            ->getConnection()
            ->executeQuery($query)
            ->fetchAll();

        return $result;
    }

    /**
     * Return the list of games for a given platform
     *
     * @param string $platform
     *
     * @return array
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getByPlatform(string $platform)
    {
        $query = 'SELECT id, name FROM games'
            . ' WHERE platform = :requestedPlatform ORDER BY name';

        $params = ['requestedPlatform' =>  $platform];

        $result = $this->getEntityManager()
            ->getConnection()
            ->executeQuery($query, $params)
            ->fetchAll();

        return $result;
    }

    /**
     * Return the list of games for which are solo recurring
     *
     * @return array
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getSoloRecurring()
    {
        $query = 'SELECT id, name FROM games'
            . ' WHERE top_game = 1 ORDER BY name';

        $result = $this->getEntityManager()
            ->getConnection()
            ->executeQuery($query)
            ->fetchAll();

        return $result;
    }

    /**
     * Return the list of games to do
     *
     * @return array
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getTodo()
    {
        $query = 'SELECT id, name FROM games'
            . ' WHERE to_do = 1 ORDER BY name';

        $result = $this->getEntityManager()
            ->getConnection()
            ->executeQuery($query)
            ->fetchAll();

        return $result;
    }

    /**
     * Return the list of games by keyword in title
     *
     * @param string $keyword
     *
     * @return array
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getSearchByName(string $keyword)
    {
        $query = 'SELECT id, name FROM games'
            . " WHERE name LIKE :keyword ORDER BY name";

        $result = $this->getEntityManager()
            ->getConnection()
            ->executeQuery($query, ['keyword' => "%$keyword%"])
            ->fetchAll();

        return $result;
    }
}
