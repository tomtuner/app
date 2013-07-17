<?php

/**
 * Description of FlyerSizeModelTest
 *
 * @author Nikesh Hajari
 */
class FlyerSizeModelTest extends ModelTest
{
   
    /**
     * Test Find All Method 
     */
    public function testFindAll()
    {
        $model = new \ArtRequest\model\FlyerSizeModel();
        $this->assertInstanceOf('PropelObjectCollection', $model->findAll());
    }
    
}

?>
