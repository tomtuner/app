<?php

/**
 * Description of OtherArtRequestModelTest
 *
 * @author Nikesh Hajari
 */
class OtherArtRequestModelTest extends ModelTest
{

    /**
     * Test Other Art Request Model Create Method 
     */
    public function testCreate()
    {
        $fixture = new ArtRequestFixture();
        $artRequestId = $fixture->getArtRequestModelFixture(
                $fixture->getArtRequestorModelFixture(),
                $fixture->getArtRequestTypeModelFixture(),
                $fixture->getEventModelFixture()
        );

        $model = new \ArtRequest\Model\OtherArtRequestModel();
        $lastInsertId = $model->create('Test Description', $artRequestId);

        //check last insert id
        $this->assertEquals('1', $lastInsertId);

        //check to see if it is successfully added
        $isSuccessfullyAdded = \ORMModel\OtherArtRequestQuery::create()
                                ->filterByDescriptionText('Test Description')
                                ->filterByArtRequestId('1')
                                ->count();

        $this->assertEquals('1', $isSuccessfullyAdded);

        //check the total number of rows in the table
        $totalRows = \ORMModel\OtherArtRequestQuery::create()
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
        $model = new \ArtRequest\Model\OtherArtRequestModel();
        $model->create(NULL, NULL);
    }

}

?>
