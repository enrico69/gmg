<?php
/**
 * Controller to add a new game in the list
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */

namespace Games\Controller\Add;

use Games\Controller\ControllerAbstract;

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
     * @return array
     */
    public function execute()
    {
        return [
            'title' => 'Ajouter un jeu',
            'content' => $this->render("Games/Add.php", "Ajouter un jeu")
        ];
    }
}
