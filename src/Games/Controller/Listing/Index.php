<?php
/**
 * Listing controller
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */

namespace Games\Controller\Listing;

use Games\Controller\ControllerAbstract;

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
     * @return array
     */
    public function execute()
    {
        return [
            'title' => 'Liste des jeux',
            'content' => $this->render("Games/List.php", "Ma liste")
            ];
    }
}
