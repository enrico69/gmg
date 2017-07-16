<?php
/**
 * Controller to select a game randomly
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */

namespace Games\Controller\Random;

use Games\Controller\ControllerAbstract;
use Games\Config\General;
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
        $content = $this->getGame($request);

        if ($content['game'] !==null) {
            $urlToRedirect = General::SITE_URL . 'detail?id=' . $content['game']->getId();
            $urlToRedirect .= $content['filter'];
            $this->redirect($urlToRedirect);
        }

        return [
            'title' => 'Un jeu au hasard',
            'content' => $this->render(
                "General/Message.php",
                'Il n\' y a aucun jeu enregistré en base.'
            )
        ];
    }

    /**
     * Return a game according to the filter
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request object
     *
     * @return array
     */
    protected function getGame(Request $request)
    {
        $filter = $request->get('mode', '');

        $gamesRepo = $this->getRepository('Game');
        /** @var \Games\Model\Repository\Game $gamesRepo */

        switch ($filter) {
            case "": $randomGame = $gamesRepo->getRandomGame(); $filter = "&mode=random"; break;
            case "solo": $randomGame = $gamesRepo->getRandomGameSolo(); $filter = '&mode=solo'; break;
            case "multi": $randomGame = $gamesRepo->getRandomGameMulti(); $filter = '&mode=multi'; break;
            default: $randomGame = $gamesRepo->getRandomGame(); $filter = "&mode=random"; break;
        }

        return ['game' => $randomGame, 'filter' => $filter];
    }
}
