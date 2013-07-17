<?php

namespace EVRRSSFeed;

use Zend\ModuleManager\ModuleManager;

class Module
{

    /**
     * Initialize Module Configuration
     * 
     * @return mixed 
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * Iniitialize Autoload Configuration
     * 
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

}