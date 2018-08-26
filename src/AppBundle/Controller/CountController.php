<?php
/**
 * @author     Eric COURTIAL <ecourtial@absolunet.com>
 * @copyright  Copyright (c) 2018 Absolunet (http://www.absolunet.com)
 * @link       http://www.absolunet.com
 */
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class CountController
 * @package AppBundle\Controller
 */
class CountController extends Controller
{
    /**
     * @Route("/count/global", name="games_global_count")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function indexAction(Request $request)
    {
        return new JsonResponse($this->getCountData());
    }

    /**
     * @return array
     */
    protected function getCountData()
    {
        $games['msg'] = '';
        try {
            $gamesRepo                   = $this->getDoctrine()->getRepository('AppBundle:Games');
            $games['ownedCount']         = $gamesRepo->getAllRealOwnedGamesCount();
            $games['toBuyCount']         = $gamesRepo->getGamesToBuyCount();
            $games['hardwareToBuyCount'] = $gamesRepo->getHardwareToBuyCount();
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
