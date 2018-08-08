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
     * @Route("/list/{filter}", defaults={"filter" = "none"}, name="games_list")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        return $this->render(
            'view/detail.twig', // To change according to the request
            ['screenTitle' => 'Détail du jeu '] // To change according to the request
        );
    }
}
