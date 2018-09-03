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
 * Class SearchController
 * @package AppBundle\Controller
 */
class SearchController extends Controller
{
    /**
     * @Route("/search", name="game_search", methods={"POST"})
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $keyword = (string) trim($request->get('keyword', ''));

        if (mb_strlen($keyword) === 0) {
            $response = $this->redirectToRoute('homepage');
        } else {
            $targetUrl = $this->container
                ->get('router')
                ->generate('search-result')
                . '?keyword=' . urlencode($keyword);

            $response =  $this->render(
                'view/list.twig',
                [
                    'screenTitle' => "Recherche du terme '$keyword'",
                    'targetUrl'   => $targetUrl,
                ]
            );
        }

        return $response;
    }

    /**
     * @Route("/search-result", name="search-result")
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function searchResultAction(Request $request)
    {
        $arrayResult = [];
        $keyword     = $request->query->get('keyword', '');

        if (mb_strlen($keyword) > 0) {
            $arrayResult = $this
                ->getDoctrine()
                ->getRepository('AppBundle:Games')
                ->getSearchByName($keyword);
        }

        return new JsonResponse($arrayResult);
    }
}
