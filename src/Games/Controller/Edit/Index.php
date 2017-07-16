<?php
/**
 * Controller to edit a game in the list
 *
 * @author Eric COURTIAL <e.courtial30@gmail.com>
 */

namespace Games\Controller\Edit;

use Games\Controller\ControllerAbstract;
use Games\Config\General;
use Games\Model\Game;
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
        if ($request->isMethod('POST')) {
            $password = $request->request->get('password');
            if ($this->isPasswordValid($password)) {
                $status = $this->submitPOST($request);
                $sentence = $status['sentence'];

                if (mb_strlen(trim($sentence)) == 0) {
                    $this->redirect(
                        General::SITE_URL . 'detail?id=' .
                        $status['game']->getId()
                    );
                } else {
                    $response =  [
                        'title' => 'Erreur',
                        'content' => $this->render("General/Message.php", $sentence)
                    ];
                }
            } else {
                $response =  [
                    'title' => 'Erreur',
                    'content' => $this->render("General/Message.php", "Mot de passe invalide")
                ];
            }
        } else {
            $content = $this->getEditContent($request);

            $response =  [
                'title' => 'Editer un jeu',
                'content' => $this->render("Games/Form.php", $content)
            ];
        }

        return $response;
    }

    /**
     * Get the form for edition
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request object
     *
     * @return array
     */
    protected function getEditContent(Request $request)
    {
        $id = $request->get('id', 0);

        if (!filter_var($id, FILTER_VALIDATE_INT)) {
            $this->redirect(General::SITE_URL);
        }

        $gamesRepo = $this->getRepository('Game');
        /** @var \Games\Model\Repository\Game $gamesRepo */

        $theGame = $gamesRepo->getById($id);

        if (!$theGame) {
            $this->redirect(General::SITE_URL);
        }

        $platforms = $gamesRepo->getPlatformList();
        $title = 'Edition de ' . htmlentities($theGame->getName());

        return [
            'game' => $theGame,
            'platforms' => $platforms,
            'title' => $title,
            'url' => 'edit'
        ];
    }

    /**
     * Upadte the edited game
     *
     * @param \Symfony\Component\HttpFoundation\Request $request HTTP Request object
     *
     * @return array
     */
    protected function submitPOST(Request $request)
    {
        $game = new Game();
        $game->hydrate($request->request->all());

        $messages = $game->validate();
        $sentence = "";
        if (count($messages) == 0) {
            $sentence = "Problème durant la validation:<ul>";
            foreach ($messages as $message) {
                $sentence .= "<li>$messages</li>";
            }
            $sentence .= "</ul><p>Merci de faire 'Précédent'</p>";
        }

        $gamesRepo = $this->getRepository('Game');
        /** @var \Games\Model\Repository\Game $gamesRepo */
        $gamesRepo->updateGame($game);

        return ['sentence' => $sentence, 'game' => $game];
    }
}
