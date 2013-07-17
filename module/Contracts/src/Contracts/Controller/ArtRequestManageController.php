<?php

namespace ArtRequest\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use AppCore\Exception\ControllerException;
use Zend\View\Model\ViewModel;
use Zend\EventManager\EventManager;
use Zend\EventManager\Event;
use Zend\ServiceManager\ServiceLocatorInterface;

class ArtRequestManageController extends AbstractActionController
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
           $this->services->get('DatabaseConnection')->getConnection('art_request');

           $aM = new \ArtRequest\Model\ArtRequestModel();

           $s = new \ArtRequest\Service\ArtRequestService();
           $s->addModel(new \ArtRequest\Model\ArtRequestModel());

           $view = new ViewModel(array(
                        'artRequestCollection' => $s->getAll(0),
                    ));

            return $view;
        }
        catch(\Exception $e)
        {
            throw new ControllerException('Error Loading Art Request List', $e);
        }
    }

   /**
    * Load Archive
    * @throws \AppCore\Exception\ControllerException
    * @return \Zend\View\Model\ViewModel
    */
    public function archiveAction()
    {   
        try
        {
           $this->services->get('DatabaseConnection')->getConnection('art_request');

           $aM = new \ArtRequest\Model\ArtRequestModel();

           $s = new \ArtRequest\Service\ArtRequestService();
           $s->addModel(new \ArtRequest\Model\ArtRequestModel());

           $view = new ViewModel(array(
                        'artRequestCollection' => $s->getAll(1),
                    ));

            return $view;
        }
        catch(\Exception $e)
        {
            throw new ControllerException('Error Loading Art Request Archive List', $e);
        }
    }

    /**
    * Show Detail
    * @throws \AppCore\Exception\ControllerException
    * @return \Zend\View\Model\ViewModel
    */
    public function detailAction()
    {   
        try
        {
           $this->services->get('DatabaseConnection')->getConnection('art_request');

           $rM = new \ArtRequest\Model\ArtistModel();
           $aM = new \ArtRequest\Model\ArtRequestModel();
           $tM = new \ArtRequest\Model\ArtRequestTypeModel();
           $bM = new \ArtRequest\Model\BannerLocationModel();
           $fM = new \ArtRequest\Model\FlyerFormatModel();
           $fS = new \ArtRequest\Model\FlyerSizeModel();

           $params = new \Zend\stdlib\Parameters(array('art_request_id' => $this->params('id')));

           $sE = new \ArtRequest\Service\Entity\ArtRequestServiceEntity($params);
           $s = new \ArtRequest\Service\ArtRequestService($sE);

           $s->addDataEntity($sE);

           $s->addModel(new \ArtRequest\Model\ArtRequestModel());

           $view = new ViewModel(array(
                        'artRequest' => $s->getOne(),
                        'artists' => $rM->findAll(),
                    ));

            return $view;
        }
        catch(\Exception $e)
        {
            throw new ControllerException('Error Loading Art Request Detail', $e);
        }
    }

    /**
    * Update Detail
    * @throws \AppCore\Exception\ControllerException
    */
  public function updateStatusAction()
  {
    try
        {
           $this->services->get('DatabaseConnection')->getConnection('art_request');

           $sE = new \ArtRequest\Service\Entity\ArtRequestStatusServiceEntity($this->getRequest()->getPost());
           $s = new \ArtRequest\Service\ArtRequestService($sE);

           $s->addDataEntity($sE);
           $s->addModel(new \ArtRequest\Model\ArtRequestModel());

           $s->updateStatus($this->params('id'), $sE);

           return $this->redirect()->toRoute('ArtRequest-manage');
           
        }
        catch(\Exception $e)
        {
            throw new ControllerException('Error Updating Art Request', $e);
        }
  }

    /**
    * Download Attachments
    * @throws \AppCore\Exception\ControllerException
    */
  public function downloadAttachmentsAction()
  {
   
  	try {

  		ignore_user_abort(true);

	    $this->services->get('DatabaseConnection')->getConnection('art_request');

	    $fileBasePath = '/home/cclweb/docs/default/app/module/ArtRequest/upload/';

	    $params = new \Zend\stdlib\Parameters(array('art_request_id' => $this->params('id')));

	    $sE = new \ArtRequest\Service\Entity\ArtRequestServiceEntity($params);
	    $s = new \ArtRequest\Service\ArtRequestService($sE);

	    $s->addDataEntity($sE);

	    $s->addModel(new \ArtRequest\Model\ArtRequestModel());

	    $artRequest = $s->getOne();

	    $zipFileLocation = "/tmp/Art_Request_". microtime() ."zip";

	    $zip = new \ZipArchive();

	    if($zip->open($zipFileLocation, \ZIPARCHIVE::CREATE | \ZIPARCHIVE::OVERWRITE) !== true){
	          
	        throw new ControllerException('Could not create zip file ' . $filename);
	      
	    } else {

	        foreach($artRequest->getArtRequestAttachments() as $attachment) {
	            
	            $fileLocation = $fileBasePath . $attachment->getFileName();
	            $zip->addFile($fileLocation, $artRequest->getEvent()->getEventTitle() . "/" . $attachment->getFileName());
	        }

	    }

	    $zip->close();

	    if(!file_exists($zipFileLocation)){
	        throw new ControllerException('Could not download zip file ' . $zipFileLocation);
	    }

	    $response = $this->getResponse();
	    $response->setContent(file_get_contents($zipFileLocation));
	      
	    $headers = $response->getHeaders();

	    $headers->clearHeaders()
	        ->addHeaderLine("Content-Description: File Transfer")
	        ->addHeaderLine("Content-Type: ". mime_content_type($zipFileLocation))
	        ->addHeaderLine('Content-Disposition', 'attachment; filename="' . $artRequest->getEvent()->getEventTitle(). ".zip" . '"')
	        ->addHeaderLine("Content-Transfer-Encoding: binary");
	      
	    $response->setStatusCode(200);

	    unlink($zipFileLocation);
	      
	    return $response;

	    } catch(\Exception $e) {
	        throw new ControllerException('Error Downloading Attachments', $e);
	    }
    }


}

?>