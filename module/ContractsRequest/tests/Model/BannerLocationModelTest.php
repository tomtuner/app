<?php

/**
 * Description of BannerLocationModelTest
 *
 * @author Nikesh Hajari
 */
class BannerLocationModelTest extends ModelTest
{
    
    /**
     * Test Find All Method 
     */
    public function testFindAll()
    {
        $model = new \ArtRequest\Model\BannerLocationModel();
        $this->assertInstanceOf('PropelObjectCollection', $model->findAll());
    }
    
}

?>
