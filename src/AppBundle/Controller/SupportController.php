<?php
/**
 * @author     Eric COURTIAL <e.courtial30@gmail.com>
 */
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SupportController
 * @package AppBundle\Controller
 */
class SupportController extends Controller
{
    /**
     * @Route("/supports", name="games_supports")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function indexAction(Request $request)
    {
        $gamesRepo = $this->getDoctrine()->getRepository('AppBundle:Games');

        return $this->render(
            'view/supports.twig',
            [
                'screenTitle' => 'Par support',
                'supports'    => $gamesRepo->getSupportList(),
            ]
        );
    }
}
