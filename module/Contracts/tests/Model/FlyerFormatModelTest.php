<?php

/**
 * Description of FlyerFormatModelTest
 *
 * @author Nikesh Hajari
 */
class FlyerFormatModelTest extends ModelTest
{
   
    /**
     * Test Find All Method 
     */
    public function testFindAll()
    {
        $model = new \ArtRequest\Model\FlyerFormatModel();
        $this->assertInstanceOf('PropelObjectCollection', $model->findAll());
    }
    
}

?>
