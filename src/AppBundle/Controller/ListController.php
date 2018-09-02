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
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function indexAction(Request $request, string $filter)
    {
        if (!array_key_exists($filter, self::FILTERS)) {
            throw $this->createNotFoundException();
        }

        $targetUrl = $this->getIndexTargetUrl($filter);

        return $this->render(
            'view/list.twig',
            [
                'screenTitle' => self::FILTERS[$filter] . ' ',
                'targetUrl'   => $targetUrl,
            ]
        );
    }

    /**
     * @Route("/list-by-support", name="games_list_by_support")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function listBySupportAction(Request $request)
    {
        $isAjax  = $request->get('ajax', false);
        $support = $request->get('support', false);

        if (!$support) {
            throw $this->createNotFoundException();
        }
        $excludeToBuy = $support === 'A acheter' ? false:true;
        $this->verifySupport($support, $excludeToBuy);

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
     * @param bool   $excludeToBuy
     *
     * @return void
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    protected function verifySupport(string $support, bool $excludeToBuy)
    {
        $supportList = $this->getDoctrine()
            ->getRepository('AppBundle:Games')
            ->getSupportList($excludeToBuy);

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

    /**
     * @param string $filter
     *
     * @return string
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    protected function getIndexTargetUrl(string $filter)
    {
        switch ($filter) {
            case 'to-buy':
                $targetUrl = $this->container
                        ->get('router')
                        ->generate('games_list_by_support')
                    . '?ajax=true&support=' . urlencode('A acheter');
                break;

            default:
                throw $this->createNotFoundException();
        }

        return $targetUrl;
    }
}
