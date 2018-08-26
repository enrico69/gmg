<?php
/**
 * Created by Eric COURTIAL.
 * @author <e.courtial30@gmail.com>
 * Date: 18-07-29
 */
namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

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
        $query = 'SELECT COUNT(*) FROM games WHERE owned = 1';

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
}
