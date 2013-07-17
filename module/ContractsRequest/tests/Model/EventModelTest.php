<?php

/**
 * Description of EventModelTest
 *
 * @author Nikesh Hajari
 */
class EventModelTest extends ModelTest
{
    
    /**
     * Test Create Mehtod For Event Model 
     */
    public function testCreate()
    {
        $model = new \ArtRequest\Model\EventModel();
        $eventTime = time();
        $lastInsertId = $model->create('My Event', 'Event Description', 'SAU', 'CCL', $eventTime, $eventTime);
        
        //check last insert id
        $this->assertEquals('1', $lastInsertId);
        
        //check to see if it is successfully added
        $isSuccessfullyAdded = \ORMModel\EventQuery::create()
                                ->filterByEventName('My Event')
                                ->filterByEventDescription('Event Description')
                                ->filterByEventSponsorName('CCL')
                                ->filterByEventLocation('SAU')
                                ->filterByEventStartTime($eventTime)
                                ->filterByEventEndTime($eventTime)
                                ->count();
                
        $this->assertEquals('1', $isSuccessfullyAdded);
        
        //check the total number of rows in the table
        $totalRows = \ORMModel\EventQuery::create()
                        ->count();
       
        $this->assertEquals('1', $totalRows);
    }
    
    /**
     * Test Create Method Exception Generation By Passing In
     * NULL's
     * 
     * @expectedException \AppCore\Exception\ModelException 
     */
    public function testCreateException()
    {
        $model = new \ArtRequest\Model\EventModel();
        $model->create(NULL, NULL, NULL, NULL, NULL, NULL);
    }
}

?>
