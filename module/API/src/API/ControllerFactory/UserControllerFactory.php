<?php

namespace API\ControllerFactory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
 
class UserControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /* @var $serviceLocator \Zend\Mvc\Controller\ControllerManager */
        $sm   = $serviceLocator->getServiceLocator();
        $c = new \API\Controller\UserController();
        $c->setServiceLocator($sm);
        return $c;
    }
}

?>
