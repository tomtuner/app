<?php

/**
 * Description of FlyerArtRequestModelTest
 *
 * @author Nikesh Hajari
 */
class FlyerArtRequestModelTest extends ModelTest
{
    
    /**
     * Test Flyer Art Request Model Create 
     */
    public function testCreate()
    {
        $fixture = new ArtRequestFixture();
        $artRequestId = $fixture->getArtRequestModelFixture(
                                                            $fixture->getArtRequestorModelFixture(), 
                                                            $fixture->getArtRequestTypeModelFixture(), 
                                                            $fixture->getEventModelFixture()
                                                            );
        
        $model = new \ArtRequest\Model\FlyerArtRequestModel();
        $lastInsertId = $model->create(
                        $fixture->getFlyerSizeModelFixture(), 
                        $fixture->getFlyerFormatModelFixture(), 
                        $artRequestId
                      );
        
        //check last insert id
        $this->assertEquals('1', $lastInsertId);
        
        //check to see if it is successfully added
        $isSuccessfullyAdded = \ORMModel\FlyerArtRequestQuery::create()
                                ->filterByArtRequestId('1')
                                ->count();
                
        $this->assertEquals('1', $isSuccessfullyAdded);
        
        //check the total number of rows in the table
        $totalRows = \ORMModel\FlyerArtRequestQuery::create()
                        ->count();
        
        $this->assertEquals('1', $totalRows);
    }
    
    /**
     * Test Flyer Art Model Create Method Exception Generation
     * Using NULL's in the Constructor
     * @expectedException \AppCore\Exception\ModelException 
     */
    public function testCreateException()
    {
        $model = new \ArtRequest\Model\FlyerArtRequestModel();
        $model->create(NULL, NULL, NULL);
    }
    
}

?>
