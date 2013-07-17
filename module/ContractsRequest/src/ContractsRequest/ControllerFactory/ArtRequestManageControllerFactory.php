<?php

namespace ArtRequest\ControllerFactory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use AppCore\Exception\ControllerException;
 
class ArtRequestManageControllerFactory implements FactoryInterface
{
    /**
    * Creates a New Service
    * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
    */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $a = new \AppCore\Shared\Service\Entity\ShibbolethServiceEntity();
           
        $allowedUsers = array('swfccl', 'radccl', 'artccl', 'brsrla', 'tjdccl');
           
        if(in_array($a->getUid(), $allowedUsers)) {
            $sm = $serviceLocator->getServiceLocator();
            $c = new \ArtRequest\Controller\ArtRequestManageController();
            $c->setServiceLocator($sm);
            return $c;
        }
        return new \ArtRequest\Controller\ArtRequestAccessDeniedController();
    }
}

?>