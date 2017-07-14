<?php
/**
 * Represents the Game Repository
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace Games\Model;

use Games\Model\AbstractRepository;

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
        $sql = "SELECT * FROM games";
        $post = $this->doctrine->fetchAssoc($sql);

        return count($post);
    }
}
