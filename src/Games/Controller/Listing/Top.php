<?php
/**
 * Controller to list top games
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace Games\Controller\Listing;

use Games\Controller\ControllerAbstract;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Top
 *
 * @package Games\Controller\Listing
 */
class Top extends ControllerAbstract
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
        $gamesRepo = $this->getRepository('Game');
        /** @var \Games\Model\Repository\Game $gamesRepo */
        $content['games'] = $gamesRepo->getTopGames();
        $content['title'] = "Top jeux à jouer régulièrement en solo";

        return [
            'title' => 'Top jeux',
            'content' => $this->render("Games/List.php", $content)
        ];
    }
}
