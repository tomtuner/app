<?php

/**
 * Description of ArtRequestDocumentModelTest
 *
 * @author Nikesh Hajari
 */
class ArtRequestDocumentModelTest extends ModelTest
{

    /**
     * Test Create Art Request Document Model 
     */
    public function testCreate()
    {
        $fixture = new ArtRequestFixture();
        $artRequestId = $fixture->getArtRequestModelFixture($fixture->getArtRequestorModelFixture(),
                $fixture->getArtRequestTypeModelFixture(),
                $fixture->getEventModelFixture());
        
        $query = new \ArtRequest\Model\ArtRequestDocumentModel();
        $lastInsertId = $query->create('Test File', 'pdf', 'My Test PDF',
                $artRequestId);
        
        //check last insert id
        $this->assertEquals('1', $lastInsertId);
        
        //check to see if it is successfully added
        $isSuccessfullyAdded = \ORMModel\ArtRequestDocumentQuery::create()
                                ->filterByFileName('Test File')
                                ->filterByFileDescription('My Test PDF')
                                ->filterByExtensionType('pdf')
                                ->count();
                
        $this->assertEquals('1', $isSuccessfullyAdded);
        
        //check the total number of rows in the table
        $totalRows = \ORMModel\ArtRequestDocumentQuery::create()
                        ->count();
       
        $this->assertEquals('1', $totalRows);
    }
    
    /**
     * Test Create Exception by Passing a NULL in a Random
     * Field In a Constructor To Ensure Exception's Are Caught
     * 
     * @expectedException \AppCore\Exception\ModelException
     */
    public function testCreateException()
    {
        $fixture = new ArtRequestFixture();
        $artRequestId = $fixture->getArtRequestModelFixture($fixture->getArtRequestorModelFixture(),
                $fixture->getArtRequestTypeModelFixture(),
                $fixture->getEventModelFixture());
        
        $query = new \ArtRequest\Model\ArtRequestDocumentModel();
        $lastInsertId = $query->create(NULL, 'pdf', 'My Test PDF',
                $artRequestId);
    }

}

?>
