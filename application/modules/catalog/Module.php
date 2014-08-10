<?php
/**
 * @author Patsura Dmitry <zaets28rus@gmail.com>
 */

namespace Catalog;

class Module implements \Phalcon\Mvc\ModuleDefinitionInterface
{
    public function registerAutoloaders()
    {
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces(array(
            'Catalog\Controller' => APPLICATION_PATH . '/modules/catalog/controllers/',
            'Catalog\Model' => APPLICATION_PATH . '/modules/catalog/models/',
        ));
        $loader->register();
    }

    public function registerServices($di)
    {
        $dispatcher = $di->get('dispatcher');
        $dispatcher->setDefaultNamespace('Catalog\Controller');

        /**
         * @var \Phalcon\Mvc\View
         */
        $view = $di->get('view');
        $view->setLayout('index');
        $view->setViewsDir(APPLICATION_PATH . '/modules/catalog/views/');
        $view->setLayoutsDir('../../common/layouts/');

        $di->set('view', $view);
    }
}
