<?php

namespace FreezeFest\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\EventManager\EventManager;
use Zend\EventManager\Event;
use AppCore\Exception\ControllerException;

class IndexController extends AbstractActionController
{

    /**
     * Index Action
     * 
     * Loads Freeze Fest Request Form 
     */
    public function indexAction()
    {
    
    	$sE = new \FreezeFest\Service\Entity\FreezeFestEventRequestServiceEntity($this->getRequest()->getPost());
    
		$view = new ViewModel(array(
			'autofillName' => $sE->getShibbolethServiceEntity()->getFirstName() . " " . $sE->getShibbolethServiceEntity()->getLastName(),
			'autofillEmail' => $sE->getShibbolethServiceEntity()->getEmailAddress(),
		));
		
		return $view;
    }

    /**
     * Create Action
     * 
     * Sends new FreezeFest Form Confirmation E-mail
     * 
     * @todo Replace Mail Sender Logic
     * @throws ControllerException 
     */
    public function createAction()
    {

        try
        {

            //get post data
            $sE = new \FreezeFest\Service\Entity\FreezeFestEventRequestServiceEntity($this->getRequest()->getPost());

            //initialize FreezeFest Event Request Service
            $s = new \FreezeFest\Service\FreezeFestEventRequestService($sE);

            //add post-service event
            $s->getEventManager()->attach('sendMessage.post',
                    function(Event $event)
                    {
                        //send and prepare confirmation e-mail
                        $mail = new \FreezeFest\Email\FreezeFestEventRequestEmail($event->getParam('serviceEntity'));

                        $mailer = new \Zend\Mail\Transport\Sendmail();
                        $mailer->send($mail->getMessage());
                    });

            //execute action
            $s->sendMessage();
            
            return $this->redirect()->toRoute('FreezeFest-index', array('action'=>'success'));
            
        } catch(\Exception $e)
        {
            throw new ControllerException('Error Creating Freeze Fest Event Request', $e);
        }
    }
    
    /**
     * Success Action
     * 
     * Displays success message
     * 
     * @throws ControllerException 
     */
    public function successAction()
    {

	    $view = new ViewModel(array(
                        'message' => 'Success! You will receive an email confirmation shortly.',
                    ));
            return $view;

    }

}


?>