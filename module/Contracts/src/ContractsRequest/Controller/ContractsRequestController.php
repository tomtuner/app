<?php

namespace Contracts\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use AppCore\Exception\ControllerException;
use Zend\View\Model\ViewModel;
use Zend\EventManager\EventManager;
use Zend\EventManager\Event;
use Zend\ServiceManager\ServiceLocatorInterface;

class ContractsRequestController extends AbstractActionController
{
    
    private $services;

    /**
     * Set Service Locator
     * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->services = $serviceLocator;
    }
    
    /**
    * Load Index
    * @throws \AppCore\Exception\ControllerException
    * @return \Zend\View\Model\ViewModel
    */
    public function indexAction()
    {   
        try
        {
           // $this->services->get('DatabaseConnection')->getConnection('art_request');

           // $m = new \ArtRequest\Model\ArtRequestTypeModel();
           // $b = new \ArtRequest\Model\BannerLocationModel();
           // $fM = new \ArtRequest\Model\FlyerFormatModel();
           // $fS = new \ArtRequest\Model\FlyerSizeModel();

           $view = new ViewModel(array(
                        // 'artRequestTypeData' => $m->findAll(),
                        // 'bannerLocationData' => $b->findAll(),
                        // 'flyerFormatData' => $fM->findAll(),
                        // 'flyerSizeData' => $fS->findAll(),
                    ));

            return $view;
        }
        catch(\Exception $e)
        {
            throw new ControllerException('Error Loading Art Request Form', $e);
        }
    }
    
    /**
    * Create New Request
    * @throws \AppCore\Exception\ControllerException
    */
    public function createAction()
    {
        try
        {
           $this->services->get('DatabaseConnection')->getConnection('art_request');
           
           $sE = new \ArtRequest\Service\Entity\ArtRequestServiceEntity($this->getRequest()->getPost());
           $s = new \ArtRequest\Service\ArtRequestService($sE);

           $s->addDataEntity($sE);
           $s->addModel(new \ArtRequest\Model\ArtRequestModel());
           $s->addModel(new \ArtRequest\Model\EventModel());
           $s->addModel(new \ArtRequest\Model\ArtRequestorModel());
           $s->addModel(new \ArtRequest\Model\ArtRequestAttachmentModel());
           $s->addModel(new \ArtRequest\Model\FlyerArtRequestModel());
           $s->addModel(new \ArtRequest\Model\BannerArtRequestModel());
           $s->addModel(new \ArtRequest\Model\ArtRequestArtRequestTypeModel());

            $s->getEventManager()->attach('add.post',
                    function(Event $event)
                    {
                        //send and prepare confirmation e-mail

                        $mail = new \ArtRequest\Email\ArtRequestSubmissionEmail($event->getParam('serviceEntity'));

                        $mailer = new \Zend\Mail\Transport\Sendmail();
                        $mailer->send($mail->getMessage());
                    });

            $s->getEventManager()->attach('add.post',
                    function(Event $event)
                    {
                        //send and prepare confirmation e-mail

                        $mail = new \ArtRequest\Email\ArtRequestConfirmationEmail($event->getParam('serviceEntity'));

                        $mailer = new \Zend\Mail\Transport\Sendmail();
                        $mailer->send($mail->getMessage());
                    });
           
           $s->add();

           return $this->redirect()->toRoute('ArtRequest-index', array('action' => 'success'));
           
        }
        catch(\Exception $e)
        {
            throw new ControllerException('Error Creating Art Request', $e);
        }
    }

    /**
    * Displays Success Action
    */
    public function successAction()
    {
    }
}

?>