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
            $random = random_int(1, --$gameCount);
            $sql = "SELECT * FROM games WHERE id = $random";

            $query = $this->doctrine->prepare($sql);
            $query->execute();
            $query->setFetchMode(\PDO::FETCH_CLASS, GameEntity::class);
            $result = $query->fetch();
        }

        return $result;
    }
}
