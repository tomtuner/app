<?php

/**
 * Description of ArtRequestServiceEntity
 *
 * @author Nikesh Hajari
 */

namespace ArtRequest\Service\Entity;

class ArtRequestServiceEntity extends \AppCore\Service\Entity\AbstractServiceEntity
{
    public function getArtRequestId()
    {
        return $this->getProperty('art_request_id');
    }

    public function getRequestorDCE()
    {
        return $this->getShibbolethServiceEntity()->getUid();
    }

    public function getRequestorFirstName()
    {
        return $this->getShibbolethServiceEntity()->getFirstName();
    }

    public function getRequestorLastName()
    {
        return $this->getShibbolethServiceEntity()->getLastName();
    }

    public function getRequestorEmail()
    {
        return $this->getShibbolethServiceEntity()->getEmailAddress();
    }

    public function getRequestorPhoneNumber()
    {
        return $this->getProperty('phone_number');
    }

    public function getRequestDueDate()
    {
        return $this->getProperty('request_due_date');
    }

    public function getEventTitle()
    {
        return $this->getProperty('event_title');
    }

    public function getEventLocation()
    {
        return $this->getProperty('event_location');
    }

    public function getEventSponsorName()
    {
        return $this->getProperty('event_sponsor_name');
    }

    public function getEventStartDate()
    {
        return $this->getProperty('event_start_date');
    }

    public function getEventEndDate()
    {
        return $this->getProperty('event_end_date');
    }

    public function getEventStartTime()
    {
        return $this->getProperty('event_start_time');
    }

    public function getEventEndTime()
    {
        return $this->getProperty('event_end_time');
    }

    public function getEventDescription()
    {
        return $this->getProperty('event_description');
    }

    public function getEventPricingMember()
    {
        return $this->getProperty('event_pricing_member');
    }

    public function getEventPricingStudent()
    {
        return $this->getProperty('event_pricing_student');
    }

    public function getEventPricingPublic()
    {
        return $this->getProperty('event_pricing_public');
    }

    public function getEventPricingStaff()
    {
        return $this->getProperty('event_pricing_staff');
    }
    
    public function getArtRequestDescription()
    {
        return $this->getProperty('request_description');
    }
    
    public function getFlyerFormatId()
    {
        return $this->getProperty('flyer_format_id');
    }
    
    public function getFlyerSizeId()
    {
        return $this->getProperty('flyer_size_id');
    }
    
    public function getBannerLocationId()
    {
        return $this->getProperty('banner_location_id');
    }
    
    public function getArtRequestTypes()
    {
        return $this->getProperty('art_request_type');
    }

    public function getHasBannerRequest()
    {
        return $this->getProperty('has_banner_request');
    }

    public function getHasFlyerRequest()
    {
        return $this->getProperty('has_flyer_request');
    }
    
}

?>