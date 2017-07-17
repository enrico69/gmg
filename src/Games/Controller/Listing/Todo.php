<?php
/**
 * Controller to list the games to be played soon
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace Games\Controller\Listing;

use Games\Controller\ControllerAbstract;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Todo
 *
 * @package Games\Controller\Listing
 */
class Todo extends ControllerAbstract
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
        $content['games'] = $gamesRepo->getGamesToBePlayedSoon();
        $content['title'] = "Jeu à faire en solo prochainement";

        return [
            'title' => 'Top jeux',
            'content' => $this->render("Games/List.php", $content)
        ];
    }
}
