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
 * Class DefaultController
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        return $this->render(
            'view/home.twig',
            ['screenTitle' => 'Bienvenue sur Games!']
        );
    }

    /**
     * @Route("/homedata", name="games_home_data")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function homeDataAction(Request $request)
    {
        return new JsonResponse($this->getHomeData());
    }

    /**
     * @return array
     */
    protected function getHomeData()
    {
        $games['msg'] = '';
        try {
            $gamesRepo                   = $this->getDoctrine()->getRepository('AppBundle:Games');
            $games['ownedCount']         = $gamesRepo->getAllRealOwnedGamesCount();
            $games['toBuyCount']         = $gamesRepo->getGamesToBuyCount();
            $games['hardwareToBuyCount'] = $gamesRepo->getHardwareToBuyCount();
            $games['allOfFameGames']     = $gamesRepo->extractAllOfFame();
        } catch (\Exception $ex) {
            $games['msg']   = 'An error occurred';
            $this->get('logger')->err(
                $ex->getMessage()
                . $ex->getTraceAsString()
            );
        }

        return $games;
    }
}
