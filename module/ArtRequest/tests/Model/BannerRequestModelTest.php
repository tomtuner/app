<?php

/**
 * Description of BannerRequestModelTest
 *
 * @author Nikesh Hajari
 */
class BannerRequestModelTest extends ModelTest
{
    
    /**
     * Test Banner Request Model Create Method 
     */
    public function testCreate()
    {
        $fixture = new ArtRequestFixture();
        $artRequestId = $fixture->getArtRequestModelFixture(
                                            $fixture->getArtRequestorModelFixture(), 
                                            $fixture->getArtRequestTypeModelFixture(), 
                                            $fixture->getEventModelFixture()
                                           );
        
        $model = new \ArtRequest\Model\BannerRequestModel();
        $lastInsertId = $model->create('3', '6', $fixture->getBannerLocationModelFixture(), $artRequestId);
        
        //check last insert id
        $this->assertEquals('1', $lastInsertId);
        
        //check to see if it is successfully added
        $isSuccessfullyAdded = \ORMModel\BannerRequestQuery::create()
                                ->filterByBannerWidth('3')
                                ->filterByBannerLength('6')
                                ->filterByArtRequestId('1')
                                ->count();
                
        $this->assertEquals('1', $isSuccessfullyAdded);
        
        //check the total number of rows in the table
        $totalRows = \ORMModel\BannerRequestQuery::create()
                        ->count();
       
        $this->assertEquals('1', $totalRows);
    }
    
    /**
     * Test Create Method Exception Generation by Passing
     * NULL's in constructor
     * 
     * @expectedException \AppCore\Exception\ModelException
     */
    public function testCreateException()
    {
        $model = new \ArtRequest\Model\BannerRequestModel();
        $model->create(NULL, NULL, NULL, NULL);
    }
    
}

?>
