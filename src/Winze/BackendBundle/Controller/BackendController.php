<?php

namespace Winze\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Winze\BackendBundle\Form\Type\PageType;
use Winze\BackendBundle\Form\Handler\PageHandler;
use Winze\PageBuilderBundle\Document\Page;
use Winze\PageBuilderBundle\Document\Menu;
use Winze\BackendBundle\Form\Handler\MenuHandler;
use Winze\BackendBundle\Form\Type\MenuType;
use Winze\PageBuilderBundle\Service\String;
use Winze\PageBuilderBundle\Document\Article;
use Winze\PageBuilderBundle\Document\Contenu;
use Winze\BackendBundle\Form\Type\ArticleType;
use Winze\BackendBundle\Form\Handler\ArticleHandler;
use Winze\PageBuilderBundle\Document\Diaporama;
use Winze\PageBuilderBundle\Document\DiaporamaPicture;
use Winze\BackendBundle\Form\Type\DiaporamaPictureType;
use Winze\BackendBundle\Form\Handler\DiaporamaPictureHandler;
use Winze\BackendBundle\Form\Type\DiaporamaType;
use Winze\BackendBundle\Form\Handler\DiaporamaHandler;

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
            $alias = "/";
            $tabAlias = array();
            if (strpos($page->getAlias(), '/') !== false and $page->getAlias() != "/") {
                $tabAlias = explode('/', $page->getAlias());
                if (count($tabAlias) > 0) {
                    foreach ($tabAlias as $url) {
                        if ($url) {
                            $alias .= String::sluggify($url) . '/';
                        }
                    }
                }
            } elseif ($page->getAlias() == "/") {
                $alias = $page->getAlias();
            } elseif (strpos($page->getAlias(), '/') === false) {
                $alias .= String::sluggify($page->getAlias()) . '/';
            }
            /*
             * on recherche si l'alias existe déjà
             */
            $pageWithAlias = $dm->getRepository('WinzePageBuilderBundle:Page')->findOneByAlias($alias);
            if ($pageWithAlias) {
                $this->get('session')->setFlash('error', "L'Url que vous avez renseigné est déjà existante veuillez en renseigner une nouvelle.");
                return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:page.add.html.twig', array(
                            'form' => $form->createView(),
                                )
                );
            }
            /*
             * alias Anglais
             */
            $aliasEn = "/";
            $tabAlias = array();
            if (strpos($page->getAliasEn(), '/') !== false and $page->getAliasEn() != "/") {
                $tabAlias = explode('/', $page->getAliasEn());
                if (count($tabAlias) > 0) {
                    foreach ($tabAlias as $url) {
                        if ($url) {
                            $aliasEn .= String::sluggify($url) . '/';
                        }
                    }
                }
            } elseif ($page->getAliasEn() == "/") {
                $aliasEn = $page->getAliasEn();
            } elseif (strpos($page->getAliasEn(), '/') === false) {
                $aliasEn .= String::sluggify($page->getAliasEn()) . '/';
            }
            /*
             * on recherche si l'alias existe déjà
             */
            $pageWithAliasEn = $dm->getRepository('WinzePageBuilderBundle:Page')->findOneByAliasEn($aliasEn);
            if ($pageWithAliasEn) {
                $this->get('session')->setFlash('error', "L'Url Anglaise que vous avez renseigné est déjà existante veuillez en renseigner une nouvelle.");
                return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:page.add.html.twig', array(
                            'form' => $form->createView(),
                                )
                );
            }
            $page->setAlias($alias);
            $page->setAliasEn($aliasEn);
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
            $alias = "/";
            $tabAlias = array();
            if (strpos($page->getAlias(), '/') !== false and $page->getAlias() != "/") {
                $tabAlias = explode('/', $page->getAlias());
                if (count($tabAlias) > 0) {
                    foreach ($tabAlias as $url) {
                        if ($url) {
                            $alias .= String::sluggify($url) . '/';
                        }
                    }
                }
            } elseif ($page->getAlias() == "/") {
                $alias = $page->getAlias();
            } elseif (strpos($page->getAlias(), '/') === false) {
                $alias .= String::sluggify($page->getAlias()) . '/';
            }
            /*
             * on recherche si l'alias existe déjà
             */
            $pageWithAlias = $dm->getRepository('WinzePageBuilderBundle:Page')->findOneByAlias($alias);
            if ($pageWithAlias) {
                $this->get('session')->setFlash('error', "L'Url que vous avez renseigné est déjà existante veuillez en renseigner une nouvelle.");
                return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:page.add.html.twig', array(
                            'form' => $form->createView(),
                                )
                );
            }
            /*
             * alias Anglais
             */
            $aliasEn = "/";
            $tabAlias = array();
            if (strpos($page->getAliasEn(), '/') !== false and $page->getAliasEn() != "/") {
                $tabAlias = explode('/', $page->getAliasEn());
                if (count($tabAlias) > 0) {
                    foreach ($tabAlias as $url) {
                        if ($url) {
                            $aliasEn .= String::sluggify($url) . '/';
                        }
                    }
                }
            } elseif ($page->getAliasEn() == "/") {
                $aliasEn = $page->getAliasEn();
            } elseif (strpos($page->getAliasEn(), '/') === false) {
                $aliasEn .= String::sluggify($page->getAliasEn()) . '/';
            }
            /*
             * on recherche si l'alias existe déjà
             */
            $pageWithAliasEn = $dm->getRepository('WinzePageBuilderBundle:Page')->findOneByAliasEn($aliasEn);
            if ($pageWithAliasEn) {
                $this->get('session')->setFlash('error', "L'Url Anglaise que vous avez renseigné est déjà existante veuillez en renseigner une nouvelle.");
                return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:page.add.html.twig', array(
                            'form' => $form->createView(),
                                )
                );
            }
            $page->setAlias($alias);
            $page->setAliasEn($aliasEn);
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

    /**
     * @Route("/page/{id}/edit/", name="admin_page_edit")
     */
    public function pageEditAction($id) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $page = $dm->getRepository('WinzePageBuilderBundle:Page')->find($id);
        if (!$id or !$page) {
            $this->get('session')->setFlash('error', "Veuillez sélectionner une page pour pouvoir l'éditer.");
            return $this->redirect($this->generateUrl('admin_page_index'));
        }
        $form = $this->createForm(new PageType($this->get('security.context')), $page);
        $formHandler = new PageHandler($form, $this->get('request'));
        if ($formHandler->process()) {
            $alias = "/";
            $tabAlias = array();
            if (strpos($page->getAlias(), '/') !== false and $page->getAlias() != "/") {
                $tabAlias = explode('/', $page->getAlias());
                if (count($tabAlias) > 0) {
                    foreach ($tabAlias as $url) {
                        if ($url) {
                            $alias .= String::sluggify($url) . '/';
                        }
                    }
                }
            } elseif ($page->getAlias() == "/") {
                $alias = $page->getAlias();
            } elseif (strpos($page->getAlias(), '/') === false) {
                $alias .= String::sluggify($page->getAlias()) . '/';
            }
            /*
             * on recherche si l'alias existe déjà
             */
            $pageWithAlias = $dm->getRepository('WinzePageBuilderBundle:Page')->findOneByAlias($alias);
            if ($pageWithAlias and $pageWithAlias->getId() != $page->getId()) {
                $this->get('session')->setFlash('error', "L'Url que vous avez renseigné est déjà existante veuillez en renseigner une nouvelle.");
                return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:page.edit.html.twig', array(
                            'page' => $page,
                            'form' => $form->createView(),
                                )
                );
            }
            /*
             * alias Anglais
             */
            $aliasEn = "/";
            $tabAlias = array();
            if (strpos($page->getAliasEn(), '/') !== false and $page->getAliasEn() != "/") {
                $tabAlias = explode('/', $page->getAliasEn());
                if (count($tabAlias) > 0) {
                    foreach ($tabAlias as $url) {
                        if ($url) {
                            $aliasEn .= String::sluggify($url) . '/';
                        }
                    }
                }
            } elseif ($page->getAliasEn() == "/") {
                $aliasEn = $page->getAliasEn();
            } elseif (strpos($page->getAliasEn(), '/') === false) {
                $aliasEn .= String::sluggify($page->getAliasEn()) . '/';
            }
            /*
             * on recherche si l'alias existe déjà
             */
            $pageWithAliasEn = $dm->getRepository('WinzePageBuilderBundle:Page')->findOneByAliasEn($aliasEn);
            if ($pageWithAliasEn and $pageWithAlias->getId() != $page->getId()) {
                $this->get('session')->setFlash('error', "L'Url Anglaise que vous avez renseigné est déjà existante veuillez en renseigner une nouvelle.");
                return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:page.edit.html.twig', array(
                            'page' => $page,
                            'form' => $form->createView(),
                                )
                );
            }
            $page->setAlias($alias);
            $page->setAliasEn($aliasEn);
            $dm->persist($page);
            $dm->flush();
            $this->get('session')->setFlash('notice', "Modification enregistré!");
        }
        return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:page.edit.html.twig', array(
                    'page' => $page,
                    'form' => $form->createView(),
                        )
        );
    }

    /**
     * @Route("/menu/{id}/remove/", name="admin_menu_remove")
     */
    public function menuRemoveAction($id) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $menu = $dm->getRepository('WinzePageBuilderBundle:Menu')->find($id);
        if (!$id or !$menu) {
            $this->get('session')->setFlash('error', "Veuillez sélectionner un menu pour pouvoir le supprimer.");
            return $this->redirect($this->generateUrl('admin_menu_index'));
        }
        if ($menu->getMenuPatern()) {
            $menuPatern = $menu->getMenuPatern();
            $menuChildren = $menuPatern->removeMenuChildren($menu->getId());
            $dm->remove($menuChildren);
            $dm->flush();
            $dm->persist($menuPatern);
            $dm->flush();
        } else {
            $dm->remove($menu);
            $dm->flush();
        }
        $this->get('session')->setFlash('notice', "Menu supprimé!");
        return $this->redirect($this->generateUrl('admin_menu_index'));
    }

    /**
     * @Route("/page/{id}/remove/", name="admin_page_remove")
     */
    public function pageRemoveAction($id) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $page = $dm->getRepository('WinzePageBuilderBundle:Page')->find($id);
        if (!$id or !$page) {
            $this->get('session')->setFlash('error', "Veuillez sélectionner une page pour pouvoir l'éditer.");
            return $this->redirect($this->generateUrl('admin_page_index'));
        }
        if ($page->getPagePatern()) {
            $pagePatern = $page->getPagePatern();
            $pageChildren = $pagePatern->removePageChildren($page->getId());
            $dm->remove($pageChildren);
            $dm->flush();
            $dm->persist($pagePatern);
            $dm->flush();
        } else {
            $dm->remove($page);
            $dm->flush();
        }
        $this->get('session')->setFlash('notice', "Page supprimé!");
        return $this->redirect($this->generateUrl('admin_page_index'));
    }

    /**
     * @Route("/page/activated/", name="admin_page_activated_ajax")
     */
    public function pageActivatedAjax() {
        $request = $this->container->get('request');

        if ($request->isXmlHttpRequest()) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $id = $request->request->get('id');
            if (!$id) {
                $return = json_encode(array('error' => 'id manquant')); //jscon encode the array
                return new Response($return, 500, array('Content-Type' => 'application/json')); //make sure it has the correct content type
            }
            $page = $dm->getRepository('WinzePageBuilderBundle:Page')->find($id);
            if (!$page) {
                $return = json_encode(array('error' => 'Page inexistante')); //jscon encode the array
                return new Response($return, 500, array('Content-Type' => 'application/json')); //make sure it has the correct content type
            }
            $page->setIsActif(!$page->getIsActif());
            $dm->persist($page);
            $dm->flush();
            $return = json_encode(array('status' => $page->getIsActif())); //jscon encode the array
            return new Response($return, 200, array('Content-Type' => 'application/json')); //make sure it has the correct content type
        }
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
     * @Route("/menu/update/order/", name="admin_menu_update_order_ajax")
     */
    public function menuUpdateOrderAjax() {
        $request = $this->container->get('request');

        if ($request->isXmlHttpRequest()) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $ids = explode(',', $request->request->get('order'));
            if (!is_array($ids) or count($ids) == 0) {
                $return = json_encode(array('error' => 'tableau vide')); //jscon encode the array
                return new Response($return, 500, array('Content-Type' => 'application/json')); //make sure it has the correct content type
            }
            $order = 1;
            foreach ($ids as $id) {
                $menu = $dm->getRepository('WinzePageBuilderBundle:Menu')->find($id);
                if ($menu) {
                    $menu->setPosition($order);
                    $dm->persist($menu);
                    $dm->flush();
                    $order++;
                }
            }
            $return = json_encode(array('valid' => 'ok')); //jscon encode the array
            return new Response($return, 200, array('Content-Type' => 'application/json')); //make sure it has the correct content type
        }
    }

    /**
     * @Route("/menu/activated/", name="admin_menu_activated_ajax")
     */
    public function menuActivatedAjax() {
        $request = $this->container->get('request');

        if ($request->isXmlHttpRequest()) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $id = $request->request->get('id');
            if (!$id) {
                $return = json_encode(array('error' => 'id manquant')); //jscon encode the array
                return new Response($return, 500, array('Content-Type' => 'application/json')); //make sure it has the correct content type
            }
            $menu = $dm->getRepository('WinzePageBuilderBundle:Menu')->find($id);
            if (!$menu) {
                $return = json_encode(array('error' => 'Page inexistante')); //jscon encode the array
                return new Response($return, 500, array('Content-Type' => 'application/json')); //make sure it has the correct content type
            }
            $menu->setIsActif(!$menu->getIsActif());
            $dm->persist($menu);
            $dm->flush();
            $return = json_encode(array('status' => $menu->getIsActif())); //jscon encode the array
            return new Response($return, 200, array('Content-Type' => 'application/json')); //make sure it has the correct content type
        }
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

    /* --------------------------
     * Contenu
     */

    /**
     * Suppression d'un contenu
     * @Route("/page/{idPage}/remove/contenu/{idContenu}/", name="admin_page_remove_contenu")
     */
    public function pageRemoveContenuAction($idPage, $idContenu) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $page = $dm->getRepository('WinzePageBuilderBundle:Page')->find($idPage);
        $contenu = $page->removeContenu($idContenu);
        if (!$contenu) {
            $this->get('session')->setFlash('notice', "Ce contenu n'est pas associé à cette page.");
            return $this->redirect($this->generateUrl('admin_page_edit', array('id' => $page->getId())));
        }
        $dm->remove($contenu);
        $dm->flush();
        $dm->persist($page);
        $dm->flush();
        $this->get('session')->setFlash('notice', "Contenu supprimé.");
        return $this->redirect($this->generateUrl('admin_page_edit', array('id' => $page->getId())));
    }

    /**
     * @Route("/page/{id}/contenu/update/order/", name="admin_page_contenu_update_order_ajax")
     */
    public function pageContenuUpdateOrderAjax() {
        $request = $this->container->get('request');

        if ($request->isXmlHttpRequest()) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $ids = explode(',', $request->request->get('order'));
            if (!is_array($ids) or count($ids) == 0) {
                $return = json_encode(array('error' => 'tableau vide')); //jscon encode the array
                return new Response($return, 500, array('Content-Type' => 'application/json')); //make sure it has the correct content type
            }
            $order = 1;
            foreach ($ids as $id) {
                $contenu = $dm->getRepository('WinzePageBuilderBundle:Contenu')->find($id);
                if ($contenu) {
                    $contenu->setPosition($order);
                    $dm->persist($contenu);
                    $order++;
                }
            }
            $dm->flush();
            $return = json_encode(array('valide' => 'ok')); //jscon encode the array
            return new Response($return, 200, array('Content-Type' => 'application/json')); //make sure it has the correct content type
        }
    }

    /**
     * @Route("/page/contenu/activated/", name="admin_contenu_activated_ajax")
     */
    public function contenuActivatedAjax() {
        $request = $this->container->get('request');

        if ($request->isXmlHttpRequest()) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $id = $request->request->get('id');
            if (!$id) {
                $return = json_encode(array('error' => 'id manquant')); //jscon encode the array
                return new Response($return, 500, array('Content-Type' => 'application/json')); //make sure it has the correct content type
            }
            $contenu = $dm->getRepository('WinzePageBuilderBundle:Contenu')->find($id);
            if (!$contenu) {
                $return = json_encode(array('error' => 'Contenu inexistante')); //jscon encode the array
                return new Response($return, 500, array('Content-Type' => 'application/json')); //make sure it has the correct content type
            }
            $contenu->setIsActif(!$contenu->getIsActif());
            $dm->persist($contenu);
            $dm->flush();
            $return = json_encode(array('status' => $contenu->getIsActif())); //jscon encode the array
            return new Response($return, 200, array('Content-Type' => 'application/json')); //make sure it has the correct content type
        }
    }

    /* --------
     * Article
     */

    /**
     * @Route("/page/{id}/add/contenu/article/", name="admin_page_add_contenu_article")
     */
    public function pageAddContenuArticleAction($id) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $page = $dm->getRepository('WinzePageBuilderBundle:Page')->find($id);
        $article = new Article();
        $form = $this->createForm(new ArticleType($this->get('security.context')), $article);
        $formHandler = new ArticleHandler($form, $this->get('request'));
        if ($formHandler->process()) {
            $contenu = new Contenu();
            $article->setIsActif(false);
            $contenu->setArticle($article);
            $page->addContenus($contenu);
            $dm->persist($page);
            $dm->flush();
            $this->get('session')->setFlash('notice', "Article ajouté à la page");
            return $this->redirect($this->generateUrl('admin_article_edit', array('idPage' => $page->getId(), 'idArticle' => $article->getId())));
        }
        return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:contenu.add.article.html.twig', array(
                    'form' => $form->createView(),
                    'page' => $page,
                    'article' => $article,
                        )
        );
    }

    /**
     * @Route("/page/{idPage}/contenu/article/{idArticle}/edit/", name="admin_article_edit")
     */
    public function pageContenuEditArticleAction($idPage, $idArticle) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $page = $dm->getRepository('WinzePageBuilderBundle:Page')->find($idPage);
        $article = $dm->getRepository('WinzePageBuilderBundle:Article')->find($idArticle);
        $form = $this->createForm(new ArticleType($this->get('security.context')), $article);
        $formHandler = new ArticleHandler($form, $this->get('request'));
        /*
         * Formulaire pour le diaporama Picture
         */

        $diaporamaPicture = new DiaporamaPicture();
        $formDiaporamaPicture = $this->createForm(new DiaporamaPictureType($this->get('security.context')), $diaporamaPicture);
        /*
         * Formulaire d'édition du diaporama
         */
        if ($article->getDiaporama()) {
            $diaporama = $article->getDiaporama();
        } else {
            $diaporama = new Diaporama();
        }
        $formDiaporama = $this->createForm(new DiaporamaType($this->get('security.context')), $diaporama);

        if ($formHandler->process()) {
            $dm->persist($article);
            $dm->flush();
            $this->get('session')->setFlash('notice', "Article Modifié");
            return $this->redirect($this->generateUrl('admin_page_edit', array('id' => $page->getId())));
        }
        return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:contenu.edit.article.html.twig', array(
                    'form' => $form->createView(),
                    'page' => $page,
                    'article' => $article,
                    'formDiaporamaPicture' => $formDiaporamaPicture->createView(),
                    'formDiaporama' => $formDiaporama->createView(),
                        )
        );
    }

    /**
     * 
     * @Route("/page/{idPage}/contenu/article/{idArticle}/add/diaporama", name="admin_page_contenu_article_add_diaporama")
     */
    public function pageContenuArticleAddDiaporamaAction($idPage, $idArticle) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $diaporama = new Diaporama();
        $page = $dm->getRepository('WinzePageBuilderBundle:Page')->find($idPage);
        $article = $dm->getRepository('WinzePageBuilderBundle:Article')->find($idArticle);
        $form = $this->createForm(new DiaporamaType($this->get('security.context')), $diaporama);
        $formHandler = new DiaporamaHandler($form, $this->get('request'));
        if ($formHandler->process()) {
            $diaporama->setIsActif(false);
            $article->setDiaporama($diaporama);
            $dm->persist($article);
            $dm->flush();
            $this->get('session')->setFlash('notice', "Diaporama ajouté");
            return $this->redirect($this->generateUrl('admin_article_edit', array('idPage' => $page->getId(), 'idArticle' => $article->getId())));
        }
        return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:article.diaporama.add.html.twig', array(
                    'form' => $form->createView(),
                    'page' => $page,
                    'article' => $article,
                        )
        );
    }

    /**
     * 
     * @Route("/page/{idPage}/contenu/article/{idArticle}/edit/diaporama/{idDiaporama}", name="admin_page_contenu_article_edit_diaporama")
     */
    public function pageContenuArticleEditDiaporamaAction($idPage, $idArticle, $idDiaporama) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $diaporama = $dm->getRepository('WinzePageBuilderBundle:Diaporama')->find($idDiaporama);
        $form = $this->createForm(new DiaporamaType($this->get('security.context')), $diaporama);
        $formHandler = new DiaporamaHandler($form, $this->get('request'));
        if ($formHandler->process()) {
            $dm->persist($diaporama);
            $dm->flush();
            $this->get('session')->setFlash('notice', "Diaporama modifié");
        } else {
            $this->get('session')->setFlash('error', "Erreur dans l'enregistrement du diaporama");
        }
        return $this->redirect($this->generateUrl('admin_article_edit', array('idPage' => $idPage, 'idArticle' => $idArticle)));
    }

    /**
     * 
     * @Route("/page/{idPage}/contenu/article/{idArticle}/diaporama/{idDiaporama}/add/picture/", name="admin_page_contenu_article_diaporama_add_picture")
     */
    public function pageContenuArticleDiaporamaAddPicture($idPage, $idArticle, $idDiaporama) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $diaporama = $dm->getRepository('WinzePageBuilderBundle:Diaporama')->find($idDiaporama);
        $diaporamaPicture = new DiaporamaPicture();
        $formDiaporamaPicture = $this->createForm(new DiaporamaPictureType($this->get('security.context')), $diaporamaPicture);
        $formDiaporamaPictureHandler = new DiaporamaPictureHandler($formDiaporamaPicture, $this->get('request'));

        if ($formDiaporamaPictureHandler->process()) {
            $diaporama->addDiaporamaPictures($diaporamaPicture);
            $dm->persist($diaporama);
            $dm->flush();
            $this->get('session')->setFlash('notice', "Image ajouté au diaporama.");
        } else {
            $this->get('session')->setFlash('error', "L'image n'a pas pu être ajouté au diaporama.");
        }
        return $this->redirect($this->generateUrl('admin_article_edit', array('idPage' => $idPage, 'idArticle' => $idArticle)));
    }

    /* --------
     * Diaporama
     */

    /**
     * 
     * @Route("/page/{id}/add/contenu/diaporama/", name="admin_page_add_contenu_diaporama")
     */
    public function pageAddContenuDiaporamaAction($id) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $diaporama = new Diaporama();
        $page = $dm->getRepository('WinzePageBuilderBundle:Page')->find($id);
        $form = $this->createForm(new DiaporamaType($this->get('security.context')), $diaporama);
        $formHandler = new DiaporamaHandler($form, $this->get('request'));
        if ($formHandler->process()) {
            $diaporama->setIsActif(false);
            $contenu = new Contenu();
            $contenu->setDiaporama($diaporama);
            $page->addContenus($contenu);
            $dm->persist($page);
            $dm->flush();
            $this->get('session')->setFlash('notice', "Diaporama ajouté");
            return $this->redirect($this->generateUrl('admin_page_edit', array('id' => $page->getId())));
        }
        return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:contenu.add.diaporama.html.twig', array(
                    'form' => $form->createView(),
                    'page' => $page,
                        )
        );
    }

    /**
     * 
     * @Route("/page/{idPage}/contenu/diaporama/{idDiaporama}/edit/", name="admin_diaporama_edit")
     */
    public function pageContenuEditDiaporamaAction($idPage, $idDiaporama) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $page = $dm->getRepository('WinzePageBuilderBundle:Page')->find($idPage);
        $diaporama = $dm->getRepository('WinzePageBuilderBundle:Diaporama')->find($idDiaporama);
        $diaporamaPicture = new DiaporamaPicture();
        /*
         * Formulaire pour le diaporama Picture
         */
        $formDiaporamaPicture = $this->createForm(new DiaporamaPictureType($this->get('security.context')), $diaporamaPicture);
        /*
         * Formulaire d'édition du diaporama
         */
        $formDiaporama = $this->createForm(new DiaporamaType($this->get('security.context')), $diaporama);
        $formDiaporamaHandler = new DiaporamaHandler($formDiaporama, $this->get('request'));

        if ($formDiaporamaHandler->process()) {
            $dm->persist($diaporama);
            $dm->flush();
            $this->get('session')->setFlash('notice', "Diaporama modifié.");
            return $this->redirect($this->generateUrl('admin_diaporama_edit', array('idPage' => $idPage, 'idDiaporama' => $idDiaporama)));
        }
        return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:contenu.edit.diaporama.html.twig', array(
                    'page' => $page,
                    'diaporama' => $diaporama,
                    'formDiaporamaPicture' => $formDiaporamaPicture->createView(),
                    'formDiaporama' => $formDiaporama->createView(),
                        )
        );
    }

    /**
     * 
     * @Route("/page/{idPage}/contenu/diaporama/{idDiaporama}/add/picture/", name="admin_diaporama_add_picture")
     */
    public function diaporamaAddPicture($idPage, $idDiaporama) {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $page = $dm->getRepository('WinzePageBuilderBundle:Page')->find($idPage);
        $diaporama = $dm->getRepository('WinzePageBuilderBundle:Diaporama')->find($idDiaporama);
        $diaporamaPicture = new DiaporamaPicture();
        $formDiaporamaPicture = $this->createForm(new DiaporamaPictureType($this->get('security.context')), $diaporamaPicture);
        $formDiaporamaPictureHandler = new DiaporamaPictureHandler($formDiaporamaPicture, $this->get('request'));

        if ($formDiaporamaPictureHandler->process()) {
            $diaporama->addDiaporamaPictures($diaporamaPicture);
            $dm->persist($diaporama);
            $dm->flush();
            $this->get('session')->setFlash('notice', "Image ajouté au diaporama.");
        } else {
            $this->get('session')->setFlash('error', "L'image n'a pas pu être ajouté au diaporama.");
        }
        return $this->redirect($this->generateUrl('admin_diaporama_edit', array('idPage' => $idPage, 'idDiaporama' => $idDiaporama)));
    }

    /**
     * @Route("/diaporama/picture/update/order/", name="admin_diaporama_picture_update_order_ajax")
     */
    public function diaporamaPictureUpdateOrderAjax() {
        $request = $this->container->get('request');

        if ($request->isXmlHttpRequest()) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $ids = explode(',', $request->request->get('order'));
            if (!is_array($ids) or count($ids) == 0) {
                $return = json_encode(array('error' => 'tableau vide')); //jscon encode the array
                return new Response($return, 500, array('Content-Type' => 'application/json')); //make sure it has the correct content type
            }
            $order = 1;
            foreach ($ids as $id) {
                $dp = $dm->getRepository('WinzePageBuilderBundle:DiaporamaPicture')->find($id);
                if ($dp) {
                    $dp->setPosition($order);
                    $dm->persist($dp);
                    $dm->flush();
                    $order++;
                }
            }
            $return = json_encode(array('valid' => 'ok')); //jscon encode the array
            return new Response($return, 200, array('Content-Type' => 'application/json')); //make sure it has the correct content type
        }
    }

    /**
     * @Route("/diaporama/picture/activated/", name="admin_diaporama_picture_activated_ajax")
     */
    public function diaporamaPictureActivatedAjax() {
        $request = $this->container->get('request');

        if ($request->isXmlHttpRequest()) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $id = $request->request->get('id');
            if (!$id) {
                $return = json_encode(array('error' => 'id manquant')); //jscon encode the array
                return new Response($return, 500, array('Content-Type' => 'application/json')); //make sure it has the correct content type
            }
            $dp = $dm->getRepository('WinzePageBuilderBundle:DiaporamaPicture')->find($id);
            if (!$dp) {
                $return = json_encode(array('error' => 'Image inexistante')); //jscon encode the array
                return new Response($return, 500, array('Content-Type' => 'application/json')); //make sure it has the correct content type
            }
            $dp->setIsActif(!$dp->getIsActif());
            $dm->persist($dp);
            $dm->flush();
            $return = json_encode(array('status' => $dp->getIsActif())); //jscon encode the array
            return new Response($return, 200, array('Content-Type' => 'application/json')); //make sure it has the correct content type
        }
    }

    /**
     * @Route("/diaporama/picture/remove/", name="admin_diaporama_picture_remove_ajax")
     */
    public function diaporamaPictureRemoveAjax() {
        $request = $this->container->get('request');

        if ($request->isXmlHttpRequest()) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $id = $request->request->get('id');
            if (!$id) {
                $return = json_encode(array('error' => 'id manquant')); //jscon encode the array
                return new Response($return, 500, array('Content-Type' => 'application/json')); //make sure it has the correct content type
            }
            $dp = $dm->getRepository('WinzePageBuilderBundle:DiaporamaPicture')->find($id);
            if (!$dp) {
                $return = json_encode(array('error' => 'Image inexistante')); //jscon encode the array
                return new Response($return, 500, array('Content-Type' => 'application/json')); //make sure it has the correct content type
            }
            $diaporama = $dp->getDiaporama();
            $diaporamaPicture = $diaporama->removePicture($id);
            if (!$diaporamaPicture) {
                $return = json_encode(array('error' => 'Image inexistante dans le diaporama')); //jscon encode the array
                return new Response($return, 500, array('Content-Type' => 'application/json')); //make sure it has the correct content type
            }
            $dm->remove($diaporamaPicture);
            $dm->flush();
            $dm->persist($diaporama);
            $dm->flush();
            $return = json_encode(array('status' => 'ok')); //jscon encode the array
            return new Response($return, 200, array('Content-Type' => 'application/json')); //make sure it has the correct content type
        }
    }

    /**
     * @Route("/page/{id}/add/contenu/formulaire/", name="admin_page_add_contenu_formulaire")
     */
    public function pageAddContenuFormulaireAction() {
        $article = new Article();
        $form = $this->createForm(new ArticleType($this->get('security.context')), $article);
        $formHandler = new ArticleHandler($form, $this->get('request'));
        if ($formHandler->process()) {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $page = $dm->getRepository('WinzePageBuilderBundle:Page')->find($id);
            $article->setPage($page);
            $menu->setIsActif(false);
            $dm->persist($menu);
            $dm->flush();
            return $this->redirect($this->generateUrl('admin_menu_index'));
        }
        return $this->get('templating')->renderResponse('WinzeBackendBundle:Backend:contenu.add.article.html.twig', array(
                    'form' => $form->createView(),
                        )
        );
    }

}
