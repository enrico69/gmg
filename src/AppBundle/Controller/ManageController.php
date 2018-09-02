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
use AppBundle\Entity\Games;
use AppBundle\Form\Games as GameForm;
use Symfony\Component\Form\Form;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Class ManageController
 * @package AppBundle\Controller
 */
class ManageController extends Controller
{
    /**
     * @Route("/add", name="add_game")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @Security("has_role('ROLE_ADMIN')")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $game = new Games();
        $form = $this->createForm(GameForm::class, $game, [
                'action' => $this->generateUrl('add_game'),
                'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($game);
            $em->flush();

            $response = $this->redirectToRoute('games_supports');
        } else {
            $response = $this->getFormView($form, $game);
        }

        return $response;
    }

    /**
     * @param \Symfony\Component\Form\Form $form
     * @param \AppBundle\Entity\Games      $game
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function getFormView(Form $form, Games $game)
    {
        return $this->render(
            'view/add.html.twig',
            [
                'form'        => $form->createView(),
                'game'        => $game,
                'screenTitle' => 'Ajouter une entrée',
            ]
        );
    }
}
