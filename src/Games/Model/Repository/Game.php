<?php
/**
 * Represents the Game Repository
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace Games\Model\Repository;

use Games\Model\Repository\AbstractRepository;
use Games\Model\Game as GameEntity;

/**
 * Class Game
 *
 * @package Games\Model
 */
class Game extends AbstractRepository
{
    /**
     * Return the number of games registered in the database
     *
     * @return int
     * @throws \Exception
     */
    public function countGames()
    {
        $sql = "SELECT COUNT(*) FROM games";
        $result = $this->doctrine->query($sql)->fetch();

        return $result['COUNT(*)'];
    }

    /**
     * Return a random game
     *
     * @return \Games\Model\Game|null
     */
    public function getRandomGame()
    {
        $gameCount = $this->countGames();
        $result = null;

        if ($gameCount > 0) {
            $random = random_int(1, $gameCount);
            $result = $this->getById($random);
        }

        return $result;
    }

    /**
     * Return a random game to play in solo
     *
     * @return \Games\Model\Game|null
     */
    public function getRandomGameSolo()
    {
        $gameCount = $this->countGames();
        $result = null;

        if ($gameCount > 0) {
            $sql = "SELECT * FROM games WHERE to_play_solo = 1" .
                " ORDER BY RAND() LIMIT 1";

            $query = $this->doctrine->prepare($sql);
            $query->execute();
            $query->setFetchMode(\PDO::FETCH_CLASS, GameEntity::class);
            $result = $query->fetch();
        }

        return $result;
    }

    /**
     * Return a random game to play in solo
     *
     * @return \Games\Model\Game|null
     */
    public function getRandomGameMulti()
    {
        $gameCount = $this->countGames();
        $result = null;

        if ($gameCount > 0) {
            $sql = "SELECT * FROM games WHERE to_play_multi = 1" .
                " ORDER BY RAND() LIMIT 1";

            $query = $this->doctrine->prepare($sql);
            $query->execute();
            $query->setFetchMode(\PDO::FETCH_CLASS, GameEntity::class);
            $result = $query->fetch();
        }

        return $result;
    }

    /**
     * Return a random game to play in solo
     *
     * @param int $id is the game id
     *
     * @return \Games\Model\Game|null
     */
    public function getById($id)
    {
        $sql = "SELECT * FROM games WHERE id = ?";

        $query = $this->doctrine->prepare($sql);
        $query->bindValue(1, $id);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS, GameEntity::class);
        $result = $query->fetch();

        return $result;
    }

    /**
     * Return the list of platform
     *
     * @return array
     */
    public function getPlatformList()
    {
        $gameCount = $this->countGames();
        $result = [];

        if ($gameCount > 0) {
            $sql = "SELECT DISTINCT platform FROM games ORDER BY platform";

            $query = $this->doctrine->prepare($sql);
            $query->execute();
            $query->setFetchMode(\PDO::FETCH_ASSOC);
            $result = $query->fetchAll();
        }

        return $result;
    }

    /**
     * Return a random game to play in solo
     *
     * @param string $support is the support the game is played on
     *
     * @return array|null
     */
    public function getGamesBySupport($support)
    {
        $sql = "SELECT * FROM games WHERE platform = ? ORDER BY name";

        $query = $this->doctrine->prepare($sql);
        $query->bindValue(1, $support);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS, GameEntity::class);
        $result = $query->fetchAll();

        return $result;
    }
}
