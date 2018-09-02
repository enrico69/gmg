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
 * Class ListController
 * @package AppBundle\Controller
 */
class ListController extends Controller
{
    /**
     * Authorized filters
     */
    const FILTERS = [
        'top'    => 'Top jeux à jouer régulièrement en solo',
        'todo'   => 'Jeux à faire',
        'to-buy' => 'Jeux à acheter',
    ];

    /**
     * @Route("/list/{filter}", defaults={"filter" = "none"}, name="games_list")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param string                                    $filter
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request, string $filter)
    {
        if (!array_key_exists($filter, self::FILTERS)) {
            throw $this->createNotFoundException();
        }

        return $this->render(
            'view/list.twig',
            ['screenTitle' => self::FILTERS[$filter] . ' ']
        );
    }

    /**
     * @Route("/list-by-support", name="games_list_by_support")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Doctrine\DBAL\DBALException
     */
    public function listBySupportAction(Request $request)
    {
        $isAjax  = $request->get('ajax', false);
        $support = $request->get('support', false);

        if (!$support) {
            throw $this->createNotFoundException();
        }
        $this->verifySupport($support);

        if ($isAjax) {
            $result = new JsonResponse(
                $this->getDoctrine()
                    ->getRepository('AppBundle:Games')
                    ->getByPlatform($support)
            );
        } else {
            $result = $this->render(
                'view/list.twig',
                [
                    'screenTitle' => "Jeux sur le support '$support'",
                    'targetUrl'   => $this->container
                            ->get('router')
                            ->generate('games_list_by_support')
                                . "?ajax=true&support=$support",
                ]
            );
        }

        return $result;
    }

    /**
     * @param string $support
     * @return void
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    protected function verifySupport(string $support)
    {
        $supportList = $this->getDoctrine()
            ->getRepository('AppBundle:Games')
            ->getSupportList();

        $met = false;
        foreach ($supportList as $supportEntry) {
            if ($supportEntry['platform'] === $support) {
                $met = true;
                break;
            }
        }

        if (!$met) {
            throw $this->createNotFoundException();
        }
    }
}
