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
}
