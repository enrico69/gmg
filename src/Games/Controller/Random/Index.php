<?php
/**
 * Controller to select a game randomly
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */

namespace Games\Controller\Random;

use Games\Controller\ControllerAbstract;

/**
 * Class Index
 *
 * @package Games\Controller\Random
 */
class Index extends ControllerAbstract
{
    /**
     * Main method
     *
     * @return array
     */
    public function execute()
    {
        $gamesRepo = $this->getRepository('Game');
        /** @var \Games\Model\Game $gamesRepo */
        $randomGame = $gamesRepo->getRandomGame();

        if ($randomGame !==null) {
            $response = [
                'title' => 'Un jeu au hasard',
                'content' => $this->render("Games/Detail.php", $randomGame)
            ];
        } else {
            $response = [
                'title' => 'Un jeu au hasard',
                'content' => $this->render(
                    "General/Message.php",
                    'Il n\' y a aucun jeu enregistré en base.'
                )
            ];
        }

        return $response;
    }
}
