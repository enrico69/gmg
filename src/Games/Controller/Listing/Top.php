<?php
/**
 * Controller to list top games
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace Games\Controller\Listing;

use Games\Controller\ControllerAbstract;

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
     * @return array
     */
    public function execute()
    {
        return [
            'title' => 'Top jeux',
            'content' => $this->render("Games/List.php", "Mes top jeux")
        ];
    }
}
