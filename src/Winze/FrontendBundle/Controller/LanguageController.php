<?php

namespace Winze\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class LanguageController extends Controller {

    /**
     * @Template()
     */
    public function indexAction() {
        $name = "toto";
        return array('name' => $name);
    }

}
