<?php

namespace CommuterWeek\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use AppCore\Exception\ControllerException;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceLocatorInterface;

class RegistrationController extends AbstractActionController
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
    
    public function indexAction()
    {   
        try
        {
           $this->services->get('DatabaseConnection')->getConnection('commuter_week');
		   
           $s = new \CommuterWeek\Service\CommuterService();
           $s->addModel(new \CommuterWeek\Model\CommuterModel());

		   $a = new \AppCore\Shared\Service\Entity\ShibbolethServiceEntity();
		   
		   $allowedUsers = array('swfccl', 'sbgccl', 'cjmccl');
		   
		   if(!in_array($a->getUid(), $allowedUsers))
		   {
		    return $this->redirect()->toRoute('CommuterWeek-registration',
                            array(
                        'action' => 'access-denied'
                    ));
		   }		   
		   
           return new ViewModel(
								array('commuterCollection' => $s->getAll())
							   );
        }
        catch(\Exception $e)
        {
            throw new ControllerException('Error Loading Commuter Registration List', $e);
        }
    }
	
	public function accessDeniedAction()
	{
		 try
		 {
			return new ViewModel();
		 }
		 catch(\Exception $e)
		 {
			throw new ControllerException('Error Loading Page', $e);
		 }
	}
	

}

?>