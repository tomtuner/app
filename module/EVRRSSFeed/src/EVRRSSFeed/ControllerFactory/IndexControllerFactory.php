<?php

namespace EVRRSSFeed\ControllerFactory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
 
class IndexControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /* @var $serviceLocator \Zend\Mvc\Controller\ControllerManager */
        $sm   = $serviceLocator->getServiceLocator();
        $c = new \EVRRSSFeed\Controller\IndexController();
        $c->setServiceLocator($sm);
        return $c;
    }
}

?>