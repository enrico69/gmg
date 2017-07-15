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
        return [
            'title' => 'Liste des jeux',
            'content' => $this->render("Games/List.php", "Ma liste")
            ];
    }
}
