<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


/**
 * appdevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRouteNames = array(
       '_wdt' => true,
       '_profiler_search' => true,
       '_profiler_purge' => true,
       '_profiler_import' => true,
       '_profiler_export' => true,
       '_profiler_search_results' => true,
       '_profiler' => true,
       '_configurator_home' => true,
       '_configurator_step' => true,
       '_configurator_final' => true,
       'fos_user_security_login' => true,
       'fos_user_security_check' => true,
       'fos_user_security_logout' => true,
       'fos_user_profile_show' => true,
       'fos_user_profile_edit' => true,
       'fos_user_registration_register' => true,
       'fos_user_registration_check_email' => true,
       'fos_user_registration_confirm' => true,
       'fos_user_registration_confirmed' => true,
       'fos_user_resetting_request' => true,
       'fos_user_resetting_send_email' => true,
       'fos_user_resetting_check_email' => true,
       'fos_user_resetting_reset' => true,
       'fos_user_change_password' => true,
       'admin_index' => true,
       'admin_page_index' => true,
       'admin_page_add' => true,
       'admin_page_add_page' => true,
       'admin_page_edit' => true,
       'admin_menu_remove' => true,
       'admin_page_remove' => true,
       'admin_page_activated_ajax' => true,
       'admin_menu_index' => true,
       'admin_menu_update_order_ajax' => true,
       'admin_menu_activated_ajax' => true,
       'admin_menu_add' => true,
       'admin_menu_add_menu' => true,
       'admin_page_remove_contenu' => true,
       'admin_page_contenu_update_order_ajax' => true,
       'admin_contenu_activated_ajax' => true,
       'admin_page_add_contenu_article' => true,
       'admin_article_edit' => true,
       'admin_page_contenu_article_add_diaporama' => true,
       'admin_page_contenu_article_edit_diaporama' => true,
       'admin_page_contenu_article_diaporama_add_picture' => true,
       'admin_page_add_contenu_diaporama' => true,
       'admin_diaporama_edit' => true,
       'admin_diaporama_add_picture' => true,
       'admin_diaporama_picture_update_order_ajax' => true,
       'admin_diaporama_picture_activated_ajax' => true,
       'admin_diaporama_picture_remove_ajax' => true,
       'admin_page_add_contenu_formulaire' => true,
       'WinzeSelectLanguage' => true,
       'WinzeFrontendBundle' => true,
       'winze_frontend_default_index' => true,
       'winze_frontend_frontend_index' => true,
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function generate($name, $parameters = array(), $absolute = false)
    {
        if (!isset(self::$declaredRouteNames[$name])) {
            throw new RouteNotFoundException(sprintf('Route "%s" does not exist.', $name));
        }

        $escapedName = str_replace('.', '__', $name);

        list($variables, $defaults, $requirements, $tokens) = $this->{'get'.$escapedName.'RouteInfo'}();

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }

    private function get_wdtRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_wdt',  ),));
    }

    private function get_profiler_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/search',  ),));
    }

    private function get_profiler_purgeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/purge',  ),));
    }

    private function get_profiler_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/import',  ),));
    }

    private function get_profiler_exportRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '.txt',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler/export',  ),));
    }

    private function get_profiler_search_resultsRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search/results',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_profilerRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_configurator_homeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/',  ),));
    }

    private function get_configurator_stepRouteInfo()
    {
        return array(array (  0 => 'index',), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'index',  ),  1 =>   array (    0 => 'text',    1 => '/_configurator/step',  ),));
    }

    private function get_configurator_finalRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/final',  ),));
    }

    private function getfos_user_security_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/login',  ),));
    }

    private function getfos_user_security_checkRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/login_check',  ),));
    }

    private function getfos_user_security_logoutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/logout',  ),));
    }

    private function getfos_user_profile_showRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/profile/',  ),));
    }

    private function getfos_user_profile_editRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/profile/edit',  ),));
    }

    private function getfos_user_registration_registerRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/register/',  ),));
    }

    private function getfos_user_registration_check_emailRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/register/check-email',  ),));
    }

    private function getfos_user_registration_confirmRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/register/confirm',  ),));
    }

    private function getfos_user_registration_confirmedRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/register/confirmed',  ),));
    }

    private function getfos_user_resetting_requestRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/resetting/request',  ),));
    }

    private function getfos_user_resetting_send_emailRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',), array (  '_method' => 'POST',), array (  0 =>   array (    0 => 'text',    1 => '/resetting/send-email',  ),));
    }

    private function getfos_user_resetting_check_emailRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',), array (  '_method' => 'GET',), array (  0 =>   array (    0 => 'text',    1 => '/resetting/check-email',  ),));
    }

    private function getfos_user_resetting_resetRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',), array (  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/resetting/reset',  ),));
    }

    private function getfos_user_change_passwordRouteInfo()
    {
        return array(array (), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',), array (  '_method' => 'GET|POST',), array (  0 =>   array (    0 => 'text',    1 => '/profile/change-password',  ),));
    }

    private function getadmin_indexRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/',  ),));
    }

    private function getadmin_page_indexRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageIndexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/page/',  ),));
    }

    private function getadmin_page_addRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageAddAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/page/add/',  ),));
    }

    private function getadmin_page_add_pageRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageAddPageAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/add/page',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/admin/page',  ),));
    }

    private function getadmin_page_editRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageEditAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/admin/page',  ),));
    }

    private function getadmin_menu_removeRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::menuRemoveAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/remove/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/admin/menu',  ),));
    }

    private function getadmin_page_removeRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageRemoveAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/remove/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/admin/page',  ),));
    }

    private function getadmin_page_activated_ajaxRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageActivatedAjax',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/page/activated/',  ),));
    }

    private function getadmin_menu_indexRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::menuIndexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/menu/',  ),));
    }

    private function getadmin_menu_update_order_ajaxRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::menuUpdateOrderAjax',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/menu/update/order/',  ),));
    }

    private function getadmin_menu_activated_ajaxRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::menuActivatedAjax',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/menu/activated/',  ),));
    }

    private function getadmin_menu_addRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::menuAddAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/menu/add/',  ),));
    }

    private function getadmin_menu_add_menuRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::menuAddMenuAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/add/menu',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/admin/menu',  ),));
    }

    private function getadmin_page_remove_contenuRouteInfo()
    {
        return array(array (  0 => 'idPage',  1 => 'idContenu',), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageRemoveContenuAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idContenu',  ),  2 =>   array (    0 => 'text',    1 => '/remove/contenu',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idPage',  ),  4 =>   array (    0 => 'text',    1 => '/admin/page',  ),));
    }

    private function getadmin_page_contenu_update_order_ajaxRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageContenuUpdateOrderAjax',), array (), array (  0 =>   array (    0 => 'text',    1 => '/contenu/update/order/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/admin/page',  ),));
    }

    private function getadmin_contenu_activated_ajaxRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::contenuActivatedAjax',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/page/contenu/activated/',  ),));
    }

    private function getadmin_page_add_contenu_articleRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageAddContenuArticleAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/add/contenu/article/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/admin/page',  ),));
    }

    private function getadmin_article_editRouteInfo()
    {
        return array(array (  0 => 'idPage',  1 => 'idArticle',), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageContenuEditArticleAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idArticle',  ),  2 =>   array (    0 => 'text',    1 => '/contenu/article',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idPage',  ),  4 =>   array (    0 => 'text',    1 => '/admin/page',  ),));
    }

    private function getadmin_page_contenu_article_add_diaporamaRouteInfo()
    {
        return array(array (  0 => 'idPage',  1 => 'idArticle',), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageContenuArticleAddDiaporamaAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/add/diaporama',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idArticle',  ),  2 =>   array (    0 => 'text',    1 => '/contenu/article',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idPage',  ),  4 =>   array (    0 => 'text',    1 => '/admin/page',  ),));
    }

    private function getadmin_page_contenu_article_edit_diaporamaRouteInfo()
    {
        return array(array (  0 => 'idPage',  1 => 'idArticle',  2 => 'idDiaporama',), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageContenuArticleEditDiaporamaAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idDiaporama',  ),  1 =>   array (    0 => 'text',    1 => '/edit/diaporama',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idArticle',  ),  3 =>   array (    0 => 'text',    1 => '/contenu/article',  ),  4 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idPage',  ),  5 =>   array (    0 => 'text',    1 => '/admin/page',  ),));
    }

    private function getadmin_page_contenu_article_diaporama_add_pictureRouteInfo()
    {
        return array(array (  0 => 'idPage',  1 => 'idArticle',  2 => 'idDiaporama',), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageContenuArticleDiaporamaAddPicture',), array (), array (  0 =>   array (    0 => 'text',    1 => '/add/picture/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idDiaporama',  ),  2 =>   array (    0 => 'text',    1 => '/diaporama',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idArticle',  ),  4 =>   array (    0 => 'text',    1 => '/contenu/article',  ),  5 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idPage',  ),  6 =>   array (    0 => 'text',    1 => '/admin/page',  ),));
    }

    private function getadmin_page_add_contenu_diaporamaRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageAddContenuDiaporamaAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/add/contenu/diaporama/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/admin/page',  ),));
    }

    private function getadmin_diaporama_editRouteInfo()
    {
        return array(array (  0 => 'idPage',  1 => 'idDiaporama',), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageContenuEditDiaporamaAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/edit/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idDiaporama',  ),  2 =>   array (    0 => 'text',    1 => '/contenu/diaporama',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idPage',  ),  4 =>   array (    0 => 'text',    1 => '/admin/page',  ),));
    }

    private function getadmin_diaporama_add_pictureRouteInfo()
    {
        return array(array (  0 => 'idPage',  1 => 'idDiaporama',), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::diaporamaAddPicture',), array (), array (  0 =>   array (    0 => 'text',    1 => '/add/picture/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idDiaporama',  ),  2 =>   array (    0 => 'text',    1 => '/contenu/diaporama',  ),  3 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'idPage',  ),  4 =>   array (    0 => 'text',    1 => '/admin/page',  ),));
    }

    private function getadmin_diaporama_picture_update_order_ajaxRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::diaporamaPictureUpdateOrderAjax',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/diaporama/picture/update/order/',  ),));
    }

    private function getadmin_diaporama_picture_activated_ajaxRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::diaporamaPictureActivatedAjax',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/diaporama/picture/activated/',  ),));
    }

    private function getadmin_diaporama_picture_remove_ajaxRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::diaporamaPictureRemoveAjax',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/diaporama/picture/remove/',  ),));
    }

    private function getadmin_page_add_contenu_formulaireRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::pageAddContenuFormulaireAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/add/contenu/formulaire/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/admin/page',  ),));
    }

    private function getWinzeSelectLanguageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Winze\\FrontendBundle\\Controller\\LanguageController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getWinzeFrontendBundleRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'path',), array (  '_controller' => 'Winze\\FrontendBundle\\Controller\\FrontendController::pathAction',), array (  '_locale' => 'en|fr',  'path' => '.+',), array (  0 =>   array (    0 => 'text',    1 => '/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '.+',    3 => 'path',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => 'en|fr',    3 => '_locale',  ),));
    }

    private function getwinze_frontend_default_indexRouteInfo()
    {
        return array(array (  0 => '_locale',  1 => 'name',), array (  '_controller' => 'Winze\\FrontendBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/hello',  ),  2 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }

    private function getwinze_frontend_frontend_indexRouteInfo()
    {
        return array(array (  0 => '_locale',), array (  '_controller' => 'Winze\\FrontendBundle\\Controller\\FrontendController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => '_locale',  ),));
    }
}
