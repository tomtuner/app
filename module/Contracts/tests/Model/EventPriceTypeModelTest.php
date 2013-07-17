<?php

/**
 * Description of EventPriceTypeModelTest
 *
 * @author Nikesh Hajari
 */
class EventPriceTypeModelTest extends ModelTest
{
    
    /**
     * Test Find All Method 
     */
    public function testFindAll()
    {
        $model = new \ArtRequest\Model\EventPriceTypeModel();
        $this->assertInstanceOf('PropelObjectCollection', $model->findAll());
    }
    
}

?>
