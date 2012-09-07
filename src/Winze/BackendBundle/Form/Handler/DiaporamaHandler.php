<?php

namespace Winze\BackendBundle\Form\Handler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Winze\PageBuilderBundle\Document\Diaporama;


/**
 * Description of ArticleHandler
 *
 * @author vincent
 */
class DiaporamaHandler {

    protected $form;
    protected $request;

    public function __construct(Form $form, Request $request) {
        $this->form = $form;
        $this->request = $request;
    }

    public function process() {
        if ($this->request->getMethod() == 'POST') {
            $this->form->bindRequest($this->request);

            if ($this->form->isValid()) {
                $this->onSuccess($this->form->getData());

                return true;
            }
        }

        return false;
    }

    public function onSuccess(Diaporama $diaporama) {
        //$this->em->persist($panier);
        //$this->em->flush();
        
    }

}
