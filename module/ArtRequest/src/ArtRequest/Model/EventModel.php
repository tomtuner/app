<?php

/**
 * Description of EventModel
 *
 * @author Nikesh Hajari
 */

namespace ArtRequest\Model;

use \AppCore\Exception\ModelException;
use \ArtRequest\Service\Entity\ArtRequestServiceEntity;

class EventModel
{
    /**
     * Create New Event
     * 
     * @param \ArtRequest\Service\Entity\ArtRequestServiceEntity $e
     * @return integer Event Id
     * @throws ModelException
     */
    public function create(ArtRequestServiceEntity $e)
    {
        
        try
        {
            $q = new \ArtRequestORM\Event();
            $q->setEventTitle($e->getEventTitle());
            $q->setEventDescription($e->getEventDescription());
            $q->setEventLocation($e->getEventLocation());
            $q->setEventSponsorName($e->getEventSponsorName());
            $q->setEventStartTime($e->getEventStartTime());
            $q->setEventEndTime($e->getEventEndTime());
            $q->setEventStartDate($e->getEventStartDate());
            $q->setEventEndDate($e->getEventEndDate());
            $q->setEventPricingMember($e->getEventPricingMember());
            $q->setEventPricingStaff($e->getEventPricingStaff());
            $q->setEventPricingStudent($e->getEventPricingStudent());
            $q->setEventPricingPublic($e->getEventPricingPublic());
            $q->save();
                                    
            return $q->getEventId();
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Creating Event', $e);
        }
        
    }
}

?>
