<?php
/**
 * Homepage controller
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */

namespace Games\Controller\Index;

use Games\Controller\ControllerAbstract;

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
     * @return array
     */
    public function execute()
    {
        return [
            'title' => 'Accueil',
            'content' => $this->render("Games/Home.php", "Ma liste de jeux")
        ];
    }
}
