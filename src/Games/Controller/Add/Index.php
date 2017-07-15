<?php
/**
 * Controller to add a new game in the list
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */

namespace Games\Controller\Add;

use Games\Controller\ControllerAbstract;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Index
 *
 * @package Games\Controller\Add
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
        return [
            'title' => 'Ajouter un jeu',
            'content' => $this->render("Games/Add.php", "Ajouter un jeu")
        ];
    }
}
