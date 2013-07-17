<?php

namespace CommuterWeek\ControllerFactory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
 
class RegistrationControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /* @var $serviceLocator \Zend\Mvc\Controller\ControllerManager */
        $sm   = $serviceLocator->getServiceLocator();
        $c = new \CommuterWeek\Controller\RegistrationController();
        $c->setServiceLocator($sm);
        return $c;
    }
}

?>