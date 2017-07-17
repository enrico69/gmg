<?php
/**
 * Controller to search for games
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace Games\Controller\Listing;

use Games\Controller\ControllerAbstract;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Search
 *
 * @package Games\Controller\Listing
 */
class Search extends ControllerAbstract
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
        $query = $request->get('search', '');
        if (mb_strlen(trim($query)) == 0) {
            $content['games'] = [];
        } else {
            $gamesRepo = $this->getRepository('Game');
            /** @var \Games\Model\Repository\Game $gamesRepo */
            $content['games'] = $gamesRepo->searchGames($query);
        }

        $content['title'] = "Recherche avec le mot clef " . htmlentities($query);

        return [
            'title' => $content['title'],
            'content' => $this->render("Games/List.php", $content)
        ];
    }
}
