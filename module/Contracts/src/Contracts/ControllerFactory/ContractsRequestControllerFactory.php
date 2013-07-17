<?php

namespace '/src/Contracts/ControllerFactory';

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
 
class ContractsRequestControllerFactory implements FactoryInterface
{
    /**
    * Creates a New Service
    * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
    */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        $c = new /src/Contracts/Controller/ContractsRequestController();
        $c->setServiceLocator($sm);
        return $c;
    }
}

?>