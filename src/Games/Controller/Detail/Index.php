<?php
/**
 * Controller to see the detais of a game
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */

namespace Games\Controller\Detail;

use Games\Controller\ControllerAbstract;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Index
 *
 * @package Games\Controller\Detail
 */
class Index extends ControllerAbstract
{
    /**
     * Main method
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request object
     *
     * @return array
     */
    public function execute(Request $request)
    {
        $id = $request->get('id', 0);

        $gamesRepo = $this->getRepository('Game');
        /** @var \Games\Model\Repository\Game $gamesRepo */

        $theGame = $gamesRepo->getById($id);
        if ($theGame) {
            $response = [
                'title' => $theGame->getName(),
                'content' => $this->render(
                    "Games/Detail.php",
                    $theGame
                )
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
