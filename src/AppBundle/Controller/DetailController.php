<?php
/**
 * @author     Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class DetailController
 * @package AppBundle\Controller
 */
class DetailController extends Controller
{
    /**
     * Authorized random filters
     */
    const RANDOM_FILTERS = [
        'none'  => "Détail d'un jeu au hasard",
        'solo'  => "Détail d'un jeu solo au hasard",
        'multi' => "Détail d'un jeu multi au hasard",
    ];

    /**
     * @Route("/details/{id}", name="game_detail")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param int                                       $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request, int $id)
    {
        $isJson = $request->get('json', false);

        if ($isJson) {
            $result = new JsonResponse($this->getSpecificGame($id));
        } else {
            $result = $this->render(
                'view/detail.twig',
                [
                    'url'              => $request->getRequestUri(),
                    'screenTitle'      => "Détail d'un jeu",
                    'showRandomButton' => false,
                    'showDeleteForm'   => true,
                    'gameId'           => $id,
                ]
            );
        }

        return $result;
    }

    /**
     * @Route("/random/{filter}", defaults={"filter" = "none"}, name="random_game")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param string                                    $filter
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function randomAction(Request $request, string $filter)
    {
        if (!array_key_exists($filter, self::RANDOM_FILTERS)) {
            throw $this->createNotFoundException();
        }

        $isJson = $request->get('json', false);

        if ($isJson) {
            $result = new JsonResponse($this->getRandomGame($filter));
        } else {
            $result =  $this->render(
                'view/detail.twig',
                [
                    'url'         => $request->getRequestUri(),
                    'screenTitle' => self::RANDOM_FILTERS[$filter],
                ]
            );
        }

        return $result;
    }

    /**
     * @param string $filter
     *
     * @return array
     */
    protected function getRandomGame(string $filter)
    {
        $theGame = ['msg' => ''];
        try {
            $gamesRepo       = $this->getDoctrine()->getRepository('AppBundle:Games');
            $theGame['game'] = $gamesRepo->getRandomGame($filter)->toArray();
        } catch (\Exception $ex) {
            $theGame['msg'] = 'An error occurred';
            $this->get('logger')->err(
                $ex->getMessage()
                . $ex->getTraceAsString()
            );
        }

        return $theGame;
    }

    /**
     * @param int $id
     *
     * @return array
     */
    protected function getSpecificGame(int $id)
    {
        $theGame = ['msg' => ''];
        try {
            $gamesRepo       = $this->getDoctrine()->getRepository('AppBundle:Games');
            $theGame['game'] = $gamesRepo->find($id)->toArray();
        } catch (\Exception $ex) {
            $theGame['msg'] = 'An error occurred';
            $this->get('logger')->err(
                $ex->getMessage()
                . $ex->getTraceAsString()
            );
        }

        return $theGame;
    }
}
