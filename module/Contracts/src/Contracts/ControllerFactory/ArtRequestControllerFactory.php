<?php

namespace Contracts\ControllerFactory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
 
class ArtRequestControllerFactory implements FactoryInterface
{
    /**
    * Creates a New Service
    * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
    */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        $c = new \ArtRequest\Controller\ArtRequestController();
        $c->setServiceLocator($sm);
        return $c;
    }
}

?>