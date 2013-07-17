<?php

namespace CommuterWeek\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use AppCore\Exception\ControllerException;
use Zend\View\Model\ViewModel;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\EventManager\Event;

class IndexController extends AbstractActionController
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

           $m = new \CommuterWeek\Model\RITCollegeModel();
           $d = new \CommuterWeek\Model\DwellingChoiceModel();
           $r = new \CommuterWeek\Model\RoommateTypeModel();

           $view = new ViewModel(array(
                        'ritCollegeTypes' => $m->findAll(),
                        'roomMateTypes' => $r->findAll(),
                        'dwellingTypes' => $d->findAll(),
                    ));

            return $view;
            
            return new ViewModel();
        }
        catch(\Exception $e)
        {
            throw new ControllerException('Error Loading Commuter Week Registration Form', $e);
        }
    }

    public function createAction()
    {
        try
        {
           $this->services->get('DatabaseConnection')->getConnection('commuter_week');
           
           $s = new \CommuterWeek\Service\CommuterService();
           $sE = new \CommuterWeek\Service\Entity\CommuterServiceEntity($this->getRequest()->getPost());
           $s->addDataEntity($sE);
           $s->addModel(new \CommuterWeek\Model\CommuterModel());
           
           //add post-service event
            $s->getEventManager()->attach('add.post', function(Event $e) {
              //initialize mailer
              $mailer = new \Zend\Mail\Transport\Sendmail();

              //send and prepare commuter registration confirmation e-mail
              $userEmail = new \CommuterWeek\Email\CommuterRegistrationConfirmationUserEmail($e->getParam('serviceEntity'));
              $mailer->send($userEmail->getMessage());
            });
           
           $s->add();
           
           return $this->redirect()->toRoute('CommuterWeek-index',
                            array(
                        'action' => 'success'
                    ));
           
        }
        catch(\Exception $e)
        {
            throw new ControllerException('Error Processing Commuter Registration', $e);
        }
    }

    public function successAction()
    {
        try
        {
            return new ViewModel();
        } catch(\Exception $e)
        {
            throw new ControllerException('Error Loading Success Message', $e);
        }
    }

}

?>
