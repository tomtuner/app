<?php

namespace EVRRSSFeed\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\FeedModel;
use Zend\ServiceManager\ServiceLocatorInterface;
use EVRRSSFeed\Service\RSSFeedService;
use AppCore\Exception\ControllerException;

/**
 * Description of IndexController
 *
 * @author Nikesh Hajari
 */
class IndexController extends AbstractActionController
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
     * Feed Action
     * 
     * Returns RSS Feed for EVR
	 
     * @return \Zend\View\Model\FeedModel
     * @throws ControllerException
     */
    public function feedAction()
    {
        try
        {
			//print_r("Start Here Thomas");
			
            $this->services->get('DatabaseConnection')->getConnection('evr');
			// print_r("Start Here DeMeo");
	
			$s = new RSSFeedService();
			// print_r("Here 0");
			
			$s->addModel(new \EVRRSSFeed\Model\EVRRSSFeedViewModel());
			// error_log("Here 0.5");
			
			$xml = $s->getRSSFeed();
			// error_log("Here 1");
			//returning response object so we don't have to render a view file
			$response = $this->getResponse();
			// error_log("Here 2");
			
			$response->setStatusCode(200);
			// error_log("Here 3");
			
			$response->setContent($xml);
			// error_log("Here 4");
			
			$response->getHeaders()->addHeaders(array('Content-type' => 'text/xml'));
			return $response;
        }
        catch(\Exception $e)
        {
            throw new ControllerException('Error Generating RSS Feed', $e);
        }
    }

}