<?php

namespace Winze\BackendBundle\Form\Handler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Winze\PageBuilderBundle\Document\DiaporamaPicture;

/**
 * Description of ArticleHandler
 *
 * @author vincent
 */
class DiaporamaPictureHandler {

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

    public function onSuccess(DiaporamaPicture $diaporamaPicture) {
        //$this->em->persist($panier);
        //$this->em->flush();
    }

}
