<?php
/**
 * Homepage controller
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */

namespace Games\Controller\Index;

use Games\Controller\ControllerAbstract;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Index
 *
 * @package Games\Controller\Index
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
        $gamesRepo = $this->getRepository('Game');
        /** @var \Games\Model\Game $gamesRepo */

        $content = $gamesRepo->countGames();

        return [
            'title' => 'Accueil',
            'content' => $this->render("Games/Home.php", $content)
        ];
    }
}
