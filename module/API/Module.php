<?php

namespace API;

class Module
{

    /**
     * Iniitialize Autoload Configuration
     * 
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                ),
            ),
        );
    }

    /**
     * Initialize Module Configuration
     * 
     * @return mixed 
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

}

?>
