<?php
/**
 * Controller to select a game randomly
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */

namespace Games\Controller\Random;

use Games\Controller\ControllerAbstract;

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
     * @return array
     */
    public function execute()
    {
        return [
            'title' => 'Un jeu au hasard',
            'content' => $this->render("Games/Random.php", "Un jeu au hasard")
        ];
    }
}
