<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = urldecode($pathinfo);

        // _wdt
        if (preg_match('#^/_wdt/(?P<token>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+?)\\.txt$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)/search/results$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

        }

        if (0 === strpos($pathinfo, '/_configurator')) {
            // _configurator_home
            if (rtrim($pathinfo, '/') === '/_configurator') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_configurator_home');
                }
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
            }

            // _configurator_step
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+?)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            // admin_index
            if (rtrim($pathinfo, '/') === '/admin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_index');
                }
                return array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::indexAction',  '_route' => 'admin_index',);
            }

            // admin_page_index
            if (rtrim($pathinfo, '/') === '/admin/page') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_page_index');
                }
                return array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageIndexAction',  '_route' => 'admin_page_index',);
            }

            // admin_page_add
            if (rtrim($pathinfo, '/') === '/admin/page/add') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_page_add');
                }
                return array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageAddAction',  '_route' => 'admin_page_add',);
            }

            // admin_page_add_page
            if (0 === strpos($pathinfo, '/admin/page') && preg_match('#^/admin/page/(?P<id>[^/]+?)/add/page$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageAddPageAction',)), array('_route' => 'admin_page_add_page'));
            }

            // admin_page_edit
            if (0 === strpos($pathinfo, '/admin/page') && preg_match('#^/admin/page/(?P<id>[^/]+?)/edit/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_page_edit');
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageEditAction',)), array('_route' => 'admin_page_edit'));
            }

            // admin_menu_remove
            if (0 === strpos($pathinfo, '/admin/menu') && preg_match('#^/admin/menu/(?P<id>[^/]+?)/remove/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_menu_remove');
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::menuRemoveAction',)), array('_route' => 'admin_menu_remove'));
            }

            // admin_page_remove
            if (0 === strpos($pathinfo, '/admin/page') && preg_match('#^/admin/page/(?P<id>[^/]+?)/remove/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_page_remove');
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageRemoveAction',)), array('_route' => 'admin_page_remove'));
            }

            // admin_page_activated_ajax
            if (rtrim($pathinfo, '/') === '/admin/page/activated') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_page_activated_ajax');
                }
                return array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageActivatedAjax',  '_route' => 'admin_page_activated_ajax',);
            }

            // admin_menu_index
            if (rtrim($pathinfo, '/') === '/admin/menu') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_menu_index');
                }
                return array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::menuIndexAction',  '_route' => 'admin_menu_index',);
            }

            // admin_menu_update_order_ajax
            if (rtrim($pathinfo, '/') === '/admin/menu/update/order') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_menu_update_order_ajax');
                }
                return array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::menuUpdateOrderAjax',  '_route' => 'admin_menu_update_order_ajax',);
            }

            // admin_menu_activated_ajax
            if (rtrim($pathinfo, '/') === '/admin/menu/activated') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_menu_activated_ajax');
                }
                return array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::menuActivatedAjax',  '_route' => 'admin_menu_activated_ajax',);
            }

            // admin_menu_add
            if (rtrim($pathinfo, '/') === '/admin/menu/add') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_menu_add');
                }
                return array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::menuAddAction',  '_route' => 'admin_menu_add',);
            }

            // admin_menu_add_menu
            if (0 === strpos($pathinfo, '/admin/menu') && preg_match('#^/admin/menu/(?P<id>[^/]+?)/add/menu$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::menuAddMenuAction',)), array('_route' => 'admin_menu_add_menu'));
            }

            // admin_page_remove_contenu
            if (0 === strpos($pathinfo, '/admin/page') && preg_match('#^/admin/page/(?P<idPage>[^/]+?)/remove/contenu/(?P<idContenu>[^/]+?)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_page_remove_contenu');
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageRemoveContenuAction',)), array('_route' => 'admin_page_remove_contenu'));
            }

            // admin_page_contenu_update_order_ajax
            if (0 === strpos($pathinfo, '/admin/page') && preg_match('#^/admin/page/(?P<id>[^/]+?)/contenu/update/order/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_page_contenu_update_order_ajax');
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageContenuUpdateOrderAjax',)), array('_route' => 'admin_page_contenu_update_order_ajax'));
            }

            // admin_contenu_activated_ajax
            if (rtrim($pathinfo, '/') === '/admin/page/contenu/activated') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_contenu_activated_ajax');
                }
                return array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::contenuActivatedAjax',  '_route' => 'admin_contenu_activated_ajax',);
            }

            // admin_page_add_contenu_article
            if (0 === strpos($pathinfo, '/admin/page') && preg_match('#^/admin/page/(?P<id>[^/]+?)/add/contenu/article/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_page_add_contenu_article');
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageAddContenuArticleAction',)), array('_route' => 'admin_page_add_contenu_article'));
            }

            // admin_article_edit
            if (0 === strpos($pathinfo, '/admin/page') && preg_match('#^/admin/page/(?P<idPage>[^/]+?)/contenu/article/(?P<idArticle>[^/]+?)/edit/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_article_edit');
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageContenuEditArticleAction',)), array('_route' => 'admin_article_edit'));
            }

            // admin_page_contenu_article_add_diaporama
            if (0 === strpos($pathinfo, '/admin/page') && preg_match('#^/admin/page/(?P<idPage>[^/]+?)/contenu/article/(?P<idArticle>[^/]+?)/add/diaporama$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageContenuArticleAddDiaporamaAction',)), array('_route' => 'admin_page_contenu_article_add_diaporama'));
            }

            // admin_page_contenu_article_edit_diaporama
            if (0 === strpos($pathinfo, '/admin/page') && preg_match('#^/admin/page/(?P<idPage>[^/]+?)/contenu/article/(?P<idArticle>[^/]+?)/edit/diaporama/(?P<idDiaporama>[^/]+?)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageContenuArticleEditDiaporamaAction',)), array('_route' => 'admin_page_contenu_article_edit_diaporama'));
            }

            // admin_page_contenu_article_diaporama_add_picture
            if (0 === strpos($pathinfo, '/admin/page') && preg_match('#^/admin/page/(?P<idPage>[^/]+?)/contenu/article/(?P<idArticle>[^/]+?)/diaporama/(?P<idDiaporama>[^/]+?)/add/picture/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_page_contenu_article_diaporama_add_picture');
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageContenuArticleDiaporamaAddPicture',)), array('_route' => 'admin_page_contenu_article_diaporama_add_picture'));
            }

            // admin_page_add_contenu_diaporama
            if (0 === strpos($pathinfo, '/admin/page') && preg_match('#^/admin/page/(?P<id>[^/]+?)/add/contenu/diaporama/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_page_add_contenu_diaporama');
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageAddContenuDiaporamaAction',)), array('_route' => 'admin_page_add_contenu_diaporama'));
            }

            // admin_diaporama_edit
            if (0 === strpos($pathinfo, '/admin/page') && preg_match('#^/admin/page/(?P<idPage>[^/]+?)/contenu/diaporama/(?P<idDiaporama>[^/]+?)/edit/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_diaporama_edit');
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageContenuEditDiaporamaAction',)), array('_route' => 'admin_diaporama_edit'));
            }

            // admin_diaporama_add_picture
            if (0 === strpos($pathinfo, '/admin/page') && preg_match('#^/admin/page/(?P<idPage>[^/]+?)/contenu/diaporama/(?P<idDiaporama>[^/]+?)/add/picture/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_diaporama_add_picture');
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::diaporamaAddPicture',)), array('_route' => 'admin_diaporama_add_picture'));
            }

            // admin_diaporama_picture_update_order_ajax
            if (rtrim($pathinfo, '/') === '/admin/diaporama/picture/update/order') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_diaporama_picture_update_order_ajax');
                }
                return array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::diaporamaPictureUpdateOrderAjax',  '_route' => 'admin_diaporama_picture_update_order_ajax',);
            }

            // admin_diaporama_picture_activated_ajax
            if (rtrim($pathinfo, '/') === '/admin/diaporama/picture/activated') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_diaporama_picture_activated_ajax');
                }
                return array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::diaporamaPictureActivatedAjax',  '_route' => 'admin_diaporama_picture_activated_ajax',);
            }

            // admin_diaporama_picture_remove_ajax
            if (rtrim($pathinfo, '/') === '/admin/diaporama/picture/remove') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_diaporama_picture_remove_ajax');
                }
                return array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::diaporamaPictureRemoveAjax',  '_route' => 'admin_diaporama_picture_remove_ajax',);
            }

            // admin_page_add_contenu_formulaire
            if (0 === strpos($pathinfo, '/admin/page') && preg_match('#^/admin/page/(?P<id>[^/]+?)/add/contenu/formulaire/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'admin_page_add_contenu_formulaire');
                }
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageAddContenuFormulaireAction',)), array('_route' => 'admin_page_add_contenu_formulaire'));
            }

        }

        // WinzeSelectLanguage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'WinzeSelectLanguage');
            }
            return array (  '_controller' => 'Winze\\FrontendBundle\\Controller\\LanguageController::indexAction',  '_route' => 'WinzeSelectLanguage',);
        }

        // WinzeFrontendBundle
        if (preg_match('#^/(?P<_locale>en|fr)/(?P<path>.+)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'WinzeFrontendBundle');
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\FrontendBundle\\Controller\\FrontendController::pathAction',)), array('_route' => 'WinzeFrontendBundle'));
        }

        // winze_frontend_default_index
        if (preg_match('#^/(?P<_locale>[^/]+?)/hello/(?P<name>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\FrontendBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'winze_frontend_default_index'));
        }

        // winze_frontend_frontend_index
        if (preg_match('#^/(?P<_locale>[^/]+?)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'winze_frontend_frontend_index');
            }
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Winze\\FrontendBundle\\Controller\\FrontendController::indexAction',)), array('_route' => 'winze_frontend_frontend_index'));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
