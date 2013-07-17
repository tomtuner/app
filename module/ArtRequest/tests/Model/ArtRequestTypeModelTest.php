<?php

/**
 * Description of ArtRequestTypeModelTest
 *
 * @author Nikesh Hajari
 */
class ArtRequestTypeModelTest extends ModelTest
{
    
    /**
     * Test Find All Method 
     */
    public function testFindAll()
    {
        $model = new \ArtRequest\Model\ArtRequestTypeModel();
        $this->assertInstanceOf('PropelObjectCollection', $model->findAll());
    }
    
    /**
     * Test Find By Name Method
     */
    public function testFindByName()
    {
        $model = new \ArtRequest\Model\ArtRequestTypeModel();
        $this->assertInstanceOf('\ORMModel\ArtRequestType', $model->findByName('Banner Request'));
    }
    
    /**
     * Test Find By Id Method 
     */
    public function testFindById()
    {
        $model = new \ArtRequest\Model\ArtRequestTypeModel();
        $this->assertInstanceOf('\ORMModel\ArtRequestType', $model->findById('1'));
    }
    
}

?>
