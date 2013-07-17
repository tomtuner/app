<?php

/**
 * Description of ArtRequestModelTest
 *
 * @author Nikesh Hajari
 */
class ArtRequestModelTest extends ModelTest
{

    /**
     * Test Create Method for Art Request Model 
     */
    public function testCreate()
    {
        //initialize fixture
        $fixture = new ArtRequestFixture();
        
        $model = new \ArtRequest\Model\ArtRequestModel();
        $lastInsertId = $model->create(
                        $fixture->getArtRequestorModelFixture(), 
                        $fixture->getArtRequestTypeModelFixture(), 
                        $fixture->getEventModelFixture(), 
                        time()
                      );
        
        //check last insert id
        $this->assertEquals('1', $lastInsertId);
        
        //check to see if it is successfully added
        $isSuccessfullyAdded = \ORMModel\ArtRequestQuery::create()
                                ->filterByEventId('1')
                                ->filterByArtRequestorId('1')
                                ->count();
        
        $this->assertEquals('1', $isSuccessfullyAdded);
        
        //check the total number of rows in the table
        $totalRows = \ORMModel\ArtRequestQuery::create()
                        ->count();
       
        $this->assertEquals('1', $totalRows);
    }
    
    /**
     * Test Create Method Exception Generation By Passinh NULL's
     * 
     * @expectedException \AppCore\Exception\ModelException
     */
    public function testCreateException()
    {
        $model = new \ArtRequest\Model\ArtRequestModel();
        $model->create(NULL, NULL, NULL, NULL);
    }
    
}

?>
