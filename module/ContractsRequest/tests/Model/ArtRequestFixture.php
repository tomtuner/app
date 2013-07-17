<?php

/**
 * Description of ArtRequestFixture
 *
 * @author Nikesh Hajari
 */
class ArtRequestFixture
{
    
    /**
     * Get Art Request Model Fixture
     * @param integer $artRequestorId
     * @param integer $artRequestTypeId
     * @param integer $eventId
     * @return integer Art Request Id 
     */
    public function getArtRequestModelFixture($artRequestorId, $artRequestTypeId, $eventId)
    {
        $query = new \ORMModel\ArtRequest();
        $query->setIsStarted(false);
        $query->setIsCompleted(false);
        $query->setIsArchived(false);
        $query->setIsRequestConfirmed(false);
        $query->setStartDate('now');
        $query->setCompletionDate('now');
        $query->setDueDate('now');
        $query->setArtRequestorId($artRequestorId);
        $query->setArtRequestTypeId($artRequestTypeId);
        $query->setEventId($eventId);
        $query->save();
        
        return $query->getArtRequestId();
    }
    
    /**
     * Get Art Requestor Model Fixture
     * @return integer Art Requestor Id 
     */
    public function getArtRequestorModelFixture()
    {
        $query = new \ORMModel\ArtRequestor();
        $query->setDceName('abc1234');
        $query->setFirstName('Johnny');
        $query->setLastName('Appleseed');
        $query->setEmailAddress('abc1234@rit.edu');
        $query->setPhoneNumber('585-475-2384');
        $query->save();
        
        return $query->getArtRequestorId();
    }
    
    /**
     * Get Event Model Fixture
     * @return integer Event Id 
     */
    public function getEventModelFixture()
    {
        $query = new \ORMModel\Event();
        $query->setEventName('Test Event');
        $query->setEventLocation('My Location');
        $query->setEventDescription('Test Description');
        $query->setEventSponsorName('Me');
        $query->setEventStartTime('now');
        $query->setEventEndTime('now');
        $query->save();
        
        return $query->getEventId();
    }
    
    /**
     * Get Art Request Type Model Fixture
     * @return integer Random Row Id
     */
    public function getArtRequestTypeModelFixture()
    {
        $query = \ORMModel\ArtRequestTypeQuery::create()
                    ->findOne();
        
        return $query->getArtRequestTypeId();
    }
    
    /**
     * Get Banner Location Model Fixture
     * @return integer Random Row Id
     */
    public function getBannerLocationModelFixture()
    {
        $query = \ORMModel\BannerLocationQuery::create()
                    ->findOne();
        
        return $query->getBannerLocationId();
    }
    
    /**
     * Get Event Price Type Model Fixture
     * @return integer Random Row Id
     */
    public function getEventPriceTypeModelFixture()
    {
        $query = \ORMModel\EventPriceTypeQuery::create()
                         ->findOne();
            
        return $query->getEventPriceTypeId();
    }
    
    /**
     * Get Flyer Size Model Fixture
     * @return integer Random Row Id
     */
    public function getFlyerSizeModelFixture()
    {
        $query = \ORMModel\FlyerSizeQuery::create()
                    ->findOne();
        
        return $query->getFlyerSizeId();
    }
    
    /**
     * Get Flyer Format Model Fixture
     * @return integer Random Row Id 
     */
    public function getFlyerFormatModelFixture()
    {
        $query = \ORMModel\FlyerFormatQuery::create()
                    ->findOne();
        
        return $query->getFlyerFormatId();
    }
}

?>
