<?php

namespace API\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use AppCore\Exception\ControllerException;
use Zend\View\Model\JsonModel;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserController extends AbstractActionController
{

    protected $services;

    /**
     * Set Service Locator
     * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->services = $serviceLocator;
    }
    
    /**
     * Create User Action
     * @throws \AppCore\Exception\ControllerException
     */
    public function createAction()
    {
        
        $this->services->get('db.UsersConnection')->getConnection();
        
        try
        {
            
            $sE = new \API\Service\User\Entity\UserServiceEntity($this->getRequest()->getPost());
            $s = new \API\Service\User\UserService($sE);
            $s->addModel(new \API\Model\UserModel());

            $result = new JsonModel(
                            array(
                                'status' => 'true',
                                'results' => array('user_id' => $s->add())
                            )
            );
            
            return $result;
        } 
        catch(\Exception $e)
        {
            throw new ControllerException('Error Adding User', $e);
        }
    }
    
    public function userExistsAction()
    {
        try
        {
            $this->services->get('db.UsersConnection')->getConnection();

            $sE = new \API\Service\User\Entity\UserServiceEntity($this->getRequest()->getPost());
            $s = new \API\Service\User\UserService($sE);
            $s->addModel(new \API\Model\UserModel());

            $result = new JsonModel(
                            array(
                                'status' => 'true',
                                'results' => array('user_exists' => $s->doesExist())
                            )
            );

            return $result;
        } 
        catch(\Exception $e)
        {
            throw new ControllerException('Error Adding User', $e);
        }
    }

}

?>