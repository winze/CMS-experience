<?php

namespace Winze\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Winze\BackendBundle\Form\Type\PageType;
use Winze\BackendBundle\Form\Handler\PageHandler;
use Winze\PageBuilderBundle\Document\Page;
use Winze\PageBuilderBundle\Document\Menu;
use Winze\BackendBundle\Form\Handler\MenuHandler;
use Winze\BackendBundle\Form\Type\MenuType;
use Winze\PageBuilderBundle\Service\String;

/**
 * @Route("/admin")
 */
class BackendController extends Controller {

    /**
     * @Route("/", name="admin_index")
     */
    public function indexAction() {
        return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:index.html.twig', array(
                        )
        );
    }

    /**
     * @Route("/page/", name="admin_page_index")
     */
    public function pageIndexAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $pages = $dm->getRepository('WinzePageBuilderBundle:Page')->findAllPartern();
        return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:page.index.html.twig', array(
                    'pages' => $pages,
                        )
        );
    }

    /**
     * @Route("/page/add/", name="admin_page_add")
     */
    public function pageAddAction() {
        $page = new Page();
        $form = $this->createForm(new PageType($this->get('security.context')), $page);
        $formHandler = new PageHandler($form, $this->get('request'));
        if ($formHandler->process()) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $page->setAlias(String::sluggify($page->getAlias()));
            $page->setIsActif(false);
            $dm->persist($page);
            $dm->flush();
            $this->get('session')->setFlash('notice', "La page '" . $page->getTitle() . "' vient d'être ajouté!");
            return $this->redirect($this->generateUrl('admin_page_index'));
        }
        return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:page.add.html.twig', array(
                    'form' => $form->createView(),
                        )
        );
    }

    /**
     * @Route("/page/{id}/add/page", name="admin_page_add_page")
     */
    public function pageAddPageAction($id) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $pagePatern = $dm->getRepository('WinzePageBuilderBundle:Page')->find($id);
        if (!$id or !$pagePatern) {
            $this->get('session')->setFlash('error', "Veuillez sélectionner une page pour ajouter une sous page.");
            return $this->redirect($this->generateUrl('admin_page_index'));
        }
        $page = new Page();
        $form = $this->createForm(new PageType($this->get('security.context')), $page);
        $formHandler = new PageHandler($form, $this->get('request'));
        if ($formHandler->process()) {
            $page->setAlias($pagePatern->getAlias() . '/' . String::sluggify($page->getAlias()));
            $page->setIsActif(true);
            $pagePatern->addPageChildren($page);
            $dm->persist($pagePatern);
            $dm->flush();
            $this->get('session')->setFlash('notice', "La sous page '" . $page->getTitle() . "' vient d'être ajouté!");
            return $this->redirect($this->generateUrl('admin_page_index'));
        }
        return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:page.add.page.html.twig', array(
                    'pagePatern' => $pagePatern,
                    'form' => $form->createView(),
                        )
        );
    }

    /* --------------------------------------
     * Gestion du menu
     */

    /**
     * @Route("/menu/", name="admin_menu_index")
     */
    public function menuIndexAction() {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $menus = $dm->getRepository('WinzePageBuilderBundle:Menu')->findAllPartern();
        return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:menu.index.html.twig', array(
                    'menus' => $menus,
                        )
        );
    }

    /**
     * @Route("/menu/add/", name="admin_menu_add")
     */
    public function menuAddAction() {
        $menu = new Menu();
        $form = $this->createForm(new MenuType($this->get('security.context')), $menu);
        $formHandler = new MenuHandler($form, $this->get('request'));
        if ($formHandler->process()) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $page = $dm->getRepository('WinzePageBuilderBundle:Page')->findOneByAlias($menu->getAlias());
            if (!$page) {
                $this->get('session')->setFlash('error', "Veuillez renseigner un alias existant.");
            } else {
                $menu->setPage($page);
                $menu->setIsActif(false);
                $dm->persist($menu);
                $dm->flush();
                return $this->redirect($this->generateUrl('admin_menu_index'));
            }
        }
        return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:menu.add.html.twig', array(
                    'form' => $form->createView(),
                        )
        );
    }

    /**
     * @Route("/menu/{id}/add/menu", name="admin_menu_add_menu")
     */
    public function menuAddMenuAction($id) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $menuPatern = $dm->getRepository('WinzePageBuilderBundle:Menu')->find($id);
        if (!$id or !$menuPatern) {
            $this->get('session')->setFlash('error', "Veuillez sélectionner une menu pour ajouter une sous menu.");
            return $this->redirect($this->generateUrl('admin_menu_index'));
        }
        $menu = new Menu();
        $form = $this->createForm(new MenuType($this->get('security.context')), $menu);
        $formHandler = new MenuHandler($form, $this->get('request'));
        if ($formHandler->process()) {
            $page = $dm->getRepository('WinzePageBuilderBundle:Page')->findOneByAlias($menu->getAlias());
            if (!$page) {
                $this->get('session')->setFlash('error', "Veuillez renseigner un alias existant.");
            } else {
                $menu->setPage($page);
                $menu->setIsActif(true);
                $menuPatern->addMenuChildren($menu);
                $dm->persist($menuPatern);
                $dm->flush();
                $this->get('session')->setFlash('notice', "La sous menu '" . $menu->getTitle() . "' vient d'être ajouté!");
                return $this->redirect($this->generateUrl('admin_menu_index'));
            }
        }
        return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:menu.add.menu.html.twig', array(
                    'menuPatern' => $menuPatern,
                    'form' => $form->createView(),
                        )
        );
    }

}
