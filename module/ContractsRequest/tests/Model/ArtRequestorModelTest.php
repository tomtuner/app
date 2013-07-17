<?php

/**
 * Description of ArtRequestorModelTest
 *
 * @author Nikesh Hajari
 */
class ArtRequestorModelTest extends ModelTest
{
    /**
     * Test Create Function for Art Request Model 
     */
    public function testCreate()
    {
        //test create
        $model = new \ArtRequest\Model\ArtRequestorModel();
        $lastInsertId = $model->create('abc1234', 'Johnny', 'Appleseed', 'abc1234@rit.edu', '585-343-3043');
        
        //check last insert id
        $this->assertEquals('1', $lastInsertId);
        
        //check to see if it is successfully added
        $isSuccessfullyAdded = \ORMModel\ArtRequestorQuery::create()
                                ->filterByDceName('abc1234')
                                ->filterByFirstName('Johnny')
                                ->filterByLastName('Appleseed')
                                ->filterByEmailAddress('abc1234@rit.edu')
                                ->filterByPhoneNumber('585-343-3043')
                                ->count();
        
        $this->assertEquals('1', $isSuccessfullyAdded);
        
        //check the total number of rows in the table
        $totalRows = \ORMModel\ArtRequestorQuery::create()
                        ->count();
       
        $this->assertEquals('1', $totalRows);
    }
    
    /**
     * Test Create Unique User - If Art Requestor Id Exists
     * The Existing Id Is Returned 
     */
    public function testCreateUniqueUser()
    {
        //test create
        $model = new \ArtRequest\Model\ArtRequestorModel();
        $lastInsertId = $model->create('abc1234', 'Johnny', 'Appleseed', 'abc1234@rit.edu', '585-343-3043');
        
        //check last insert id
        $this->assertEquals('1', $lastInsertId);
        
        //try inserting again
        $newInsertId = $model->create('bcd1232', 'Ashley', 'Johnson', 'ajg2342@rit.edu', '340-349-3044');
        
        //check last insert id
        $this->assertEquals('2', $newInsertId);
        
        //check to see if we can get original user
        $originalUserId = $model->create('abc1234', 'Johnny', 'Appleseed', 'abc1234@rit.edu', '585-343-3043');
        
        //returns origial user id
        $this->assertEquals('1', $originalUserId);
    }
        
    /**
     * Test Create Exception by Passing a NULL in a Random
     * Field In a Constructor To Ensure Exception's Are Caught
     * 
     * @expectedException \AppCore\Exception\ModelException
     */
    public function testCreateException()
    {        
       $model = new \ArtRequest\Model\ArtRequestorModel();
       $model->create('abc1234', 'Johnny', NULL, 'abc1234@rit.edu', '585-343-3043');
    }

}

?>
