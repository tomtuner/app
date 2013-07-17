<?php

/**
 * Description of LogoArtRequestModelTest
 *
 * @author Nikesh Hajari
 */
class LogoArtRequestModelTest extends ModelTest
{

    /**
     * Test Logo Art Request Model Create Method 
     */
    public function testCreate()
    {
        $fixture = new ArtRequestFixture();
        $artRequestId = $fixture->getArtRequestModelFixture(
                $fixture->getArtRequestorModelFixture(),
                $fixture->getArtRequestTypeModelFixture(),
                $fixture->getEventModelFixture()
        );

        $model = new \ArtRequest\Model\LogoArtRequestModel();
        $lastInsertId = $model->create('Test Description', $artRequestId);

        //check last insert id
        $this->assertEquals('1', $lastInsertId);

        //check to see if it is successfully added
        $isSuccessfullyAdded = \ORMModel\LogoArtRequestQuery::create()
                ->filterByDescriptionText('Test Description')
                ->filterByArtRequestId('1')
                ->count();

        $this->assertEquals('1', $isSuccessfullyAdded);

        //check the total number of rows in the table
        $totalRows = \ORMModel\LogoArtRequestQuery::create()
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
        $model = new \ArtRequest\Model\LogoArtRequestModel();
        $model->create(NULL, NULL, NULL, NULL);
    }

}

?>
