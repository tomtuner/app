<?php

/**
 * Description of EventPriceModelTest
 *
 * @author Nikesh Hajari
 */
class EventPriceModelTest extends ModelTest
{
    
    /**
     * Test Event Price Model Create Method 
     */
    public function testCreate()
    {
        $fixture = new ArtRequestFixture();
                
        $model = new \ArtRequest\Model\EventPriceModel();
        $model->create($fixture->getEventPriceTypeModelFixture(), $fixture->getEventModelFixture());

        //check to see if it is successfully added
        $isSuccessfullyAdded = \ORMModel\EventPriceQuery::create()
                                ->filterByEventId('1')
                                ->count();
                
        $this->assertEquals('1', $isSuccessfullyAdded);
        
        //check the total number of rows in the table
        $totalRows = \ORMModel\EventPriceQuery::create()
                        ->count();
        
        $this->assertEquals('1', $totalRows);
    }
    
    /**
     * Test Create Method Exception Generation By Passing
     * NULL's Into The Constructor
     * 
     * @expectedException \AppCore\Exception\ModelException 
     */
    public function testCreateException()
    {
        $model = new \ArtRequest\Model\EventPriceModel();
        $model->create(NULL, NULL);
    }
    
}

?>
