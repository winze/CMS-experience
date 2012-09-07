<?php

namespace Winze\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class FrontendController extends Controller {

    /**
     * @Route("/")
     */
    public function indexAction() {
        $url = '/';
        return $this->affichePage($url);
    }

    public function pathAction($path) {
        $url = '/' . $path;
        return $this->affichePage($url);
    }

    private function affichePage($url) {
        $request = $this->getRequest();
        $locale = $request->getLocale();
        $this->get('session')->set('_locale', $locale);
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $page = $dm->getRepository('WinzePageBuilderBundle:Page')->findOneByAlias($url);
        $menus = $dm->getRepository('WinzePageBuilderBundle:Menu')->findAllParternActif();
        
        if (!$page) {
            return new Response('La page est inexistante', 404);
        }
        return $this->get('templating')->renderResponse('WinzeFrontendBundle:Frontend:page.print.html.twig', array(
                    'url' => $url,
                    'page' => $page,
                    'menus' => $menus,
                    'locale' => $locale,
                        )
        );
    }

}
