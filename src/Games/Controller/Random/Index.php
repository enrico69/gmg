<?php
/**
 * Controller to select a game randomly
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */

namespace Games\Controller\Random;

use Games\Controller\ControllerAbstract;
use Symfony\Component\HttpFoundation\Request;

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
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request object
     *
     * @return array
     */
    public function execute(Request $request)
    {
        $randomGame = $this->getGame($request);

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

    /**
     * Return a game according to the filter
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request object
     *
     * @return \Games\Model\Game;
     */
    protected function getGame(Request $request)
    {
        $filter = $request->get('mode', '');

        $gamesRepo = $this->getRepository('Game');
        /** @var \Games\Model\Game $gamesRepo */

        switch ($filter) {
            case "": $randomGame = $gamesRepo->getRandomGame(); break;
            case "solo": $randomGame = $gamesRepo->getRandomGameSolo(); break;
            case "multi": $randomGame = $gamesRepo->getRandomGameMulti(); break;
            default: $randomGame = $gamesRepo->getRandomGame(); break;
        }

        return $randomGame;
    }
}
