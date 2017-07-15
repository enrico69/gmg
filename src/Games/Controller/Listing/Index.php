<?php
/**
 * Listing controller
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */

namespace Games\Controller\Listing;

use Games\Controller\ControllerAbstract;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Index
 *
 * @package Games\Controller\Listing
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
        $title = 'Liste des jeux';
        $filter = $request->get('filter', '');
        if ($filter != "") {
            $title .= " sur " . htmlentities($filter);
        }

        return [
            'title' => $title,
            'content' => $this->getContent($filter, $title)
            ];
    }

    /**
     * Return the content to display
     *
     * @param string $filter is the platform
     * @param string $title  the title of the page
     *
     * @return array|string;
     */
    protected function getContent($filter, $title)
    {
        $gamesRepo = $this->getRepository('Game');
        /** @var \Games\Model\Repository\Game $gamesRepo */

        $platFormList = $gamesRepo->getPlatformList();

        if (count($platFormList) == 0) { // No games in the DB
            $response = $this->getNoMatch(" sur " . htmlentities($title));
        } else {
            if ($filter == "") {
                // Missing or unknow filter: list the platforms
                $response = $this->getPlatformListResult($platFormList);
            } else {
                // Extract games of this platform
                $gamesList = $gamesRepo->getGamesBySupport($filter);
                $response = $this->getContentGameList($title, $gamesList);
            }
        }

        return $response;
    }

    /**
     * Generate content when there is no game
     *
     * @param string $filter Extra message
     *
     * @return string
     */
    protected function getNoMatch($filter = "")
    {
        return $this->render(
            "General/Message.php",
            "Il n\' y a aucun jeu enregistré en base{$filter}."
        );
    }

    /**
     * Generate content to list plaforms
     *
     * @param array $platFormList is the platform list
     *
     * @return string
     */
    protected function getPlatformListResult(array $platFormList)
    {
        return $this->render(
            "Platforms/List.php",
            $platFormList
        );
    }

    /**
     * Generate content to list games on the related platform
     *
     * @param string $title     the title of the page
     * @param array  $gamesList is the games list
     *
     * @return string
     */
    protected function getContentGameList($title, array $gamesList)
    {
        return $this->render(
            "Games/List.php",
            ['title' => $title, 'games' => $gamesList]
        );
    }
}
