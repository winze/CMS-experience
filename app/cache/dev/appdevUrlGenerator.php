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
       'admin_index' => true,
       'admin_page_index' => true,
       'admin_page_add' => true,
       'admin_page_add_page' => true,
       'admin_menu_index' => true,
       'admin_menu_add' => true,
       'admin_menu_add_menu' => true,
       'winze_pagebuilder_default_createpage' => true,
       'winze_pagebuilder_default_openpage' => true,
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

    private function getadmin_menu_indexRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::menuIndexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/menu/',  ),));
    }

    private function getadmin_menu_addRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::menuAddAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/admin/menu/add/',  ),));
    }

    private function getadmin_menu_add_menuRouteInfo()
    {
        return array(array (  0 => 'id',), array (  '_controller' => 'Winze\\BackendBundle\\Controller\\BackendController::menuAddMenuAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/add/menu',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'id',  ),  2 =>   array (    0 => 'text',    1 => '/admin/menu',  ),));
    }

    private function getwinze_pagebuilder_default_createpageRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Winze\\PageBuilderBundle\\Controller\\DefaultController::createPageAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/create/page',  ),));
    }

    private function getwinze_pagebuilder_default_openpageRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Winze\\PageBuilderBundle\\Controller\\DefaultController::openPageAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/open/page',  ),));
    }
}
