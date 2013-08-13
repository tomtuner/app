<?php

/**
 * Description of RSSFeedService
 *
 * @author Nikesh Hajari
 */

namespace EVRRSSFeed\Service;

use AppCore\Service\AbstractService;
use AppCore\Exception\ServiceException;
use AppCore\Service\EventHookType;
use Zend\Feed\Writer\Feed;

class RSSFeedService extends AbstractService
{

    public function getRSSFeed()
	{
		try
		{
			// print_r("Start Here RSS Before");
			
			$resultSet = $this->getModel('EVRRSSFeed\Model\EVRRSSFeedViewModel')
					  ->getEvents();
			// print_r("Start Here RSS");
					  
			//create dom document
			$d = new \DOMDocument('1.0', 'utf-8');
			
			//create rss header
			$rssElement = $d->createElement('rss');
			$rssElement->setAttribute('version', '2.0');
			$rssElement->setAttributeNS('http://www.w3.org/2000/xmlns/' ,'xmlns:atom', 'http://www.w3.org/2005/Atom');
			$rssRoot = $d->appendChild($rssElement);
			// print_r("Start Here RSS 1");
			
			//create channel
			$c = $rssRoot->appendChild(new \DOMElement('channel'));
			
			//add channel title
			$cT = $c->appendChild(new \DOMElement('title'));
			$cT->appendChild(new \DOMText('EVR Events Feed'));
			
			//add channel description
			$cD = $c->appendChild(new \DOMElement('description'));
			$cD->appendChild(new \DOMText('EVR Upcoming Events - Campus Center for Life'));		
			// print_r("Start Here RSS 2");
			
			foreach($resultSet as $r)
			{	
				//create item
				$e = $c->appendChild(new \DOMElement('item'));
				
				//add title
				$title = $e->appendChild(new \DOMElement('title'));
				$title->appendChild(new \DOMCdataSection($r->getEventName()));
							
				//add link
				$link = $e->appendChild(new \DOMElement('link'));
				
				//add description
				$description = $e->appendChild(new \DOMElement('description'));
				$description->appendChild(new \DOMCdataSection($r->getEventDescription()));
				
				//add status
				$status = $e->appendChild(new \DOMElement('status'));
				$status->appendChild(new \DOMText($r->getEventStatus()));
				
				//add cost
				$cost = $e->appendChild(new \DOMElement('cost'));
				$cost->appendChild(new \DOMText($r->getEventCost()));
				
				//add cname
				$cname = $e->appendChild(new \DOMElement('cname'));
				$cname->appendChild(new \DOMCdataSection($r->getEventResponsibleRepresentativeName()));
				
				//add cphone
				$cphone = $e->appendChild(new \DOMElement('cphone'));
				
				//add cemail
				$cemail = $e->appendChild(new \DOMElement('cemail'));
				$cemail->appendChild(new \DOMCdataSection($r->getEventResponsibleRepresentativeEmailAddress()));
				
				//add ctty
				$ctty = $e->appendChild(new \DOMElement('ctty'));

				//add location
				$location = $e->appendChild(new \DOMElement('location'));
				$location->appendChild(new \DOMCdataSection($r->getEventLocation()));
				
				//add start date
				$startDate = $e->appendChild(new \DOMElement('startdate'));
				$startDate->appendChild(new \DOMText($r->getEventStartTime()));
				
				//add end date
				$endDate = $e->appendChild(new \DOMElement('enddate'));
				$endDate->appendChild(new \DOMText($r->getEventEndTime()));
			}
			// print_r("Start Here RSS 3");
			
	 			
			return $d->saveXML();

		}
		catch(\Exception $e)
		{
			throw new ServiceException('Error Processing RSS Feed', $e);
		}
	}

}

?>