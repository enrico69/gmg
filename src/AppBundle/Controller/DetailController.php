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
        'multi' => "Détail d'un jeu au hasard",
    ];

    /**
     * @Route("/details/{id}", name="game_detail")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        return $this->render(
            'view/detail.twig',
            ['screenTitle' => 'Détail du jeu ']
        );
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

        return $this->render(
            'view/detail.twig',
            ['screenTitle' => self::RANDOM_FILTERS[$filter]]
        );
    }
}
