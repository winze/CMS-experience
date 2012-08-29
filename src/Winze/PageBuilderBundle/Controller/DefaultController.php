<?php

namespace Winze\PageBuilderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Winze\PageBuilderBundle\Document\Page;

class DefaultController extends Controller {

    /**
     * @Route("/create/page/{name}")
     * @Template()
     */
    public function createPageAction($name) {

        $page = new Page();
        $page->setName($name);
        
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $dm->persist($page);
        $dm->flush();
        return new Response('Created page id '.$page->getId());
    }

}
