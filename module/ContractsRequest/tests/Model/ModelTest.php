<?php

/**
 * Description of ModelTest
 *
 * @author Nikesh Hajari
 */

abstract class ModelTest extends PHPUnit_Framework_TestCase
{
 
    /**
     * Model setup method initializing in-memory database 
     */
    public function setUp()
    {
        
        //initialize Propel configuration
        Propel::init('C:\Art_Request\module\ArtRequest\tests\Model\configs\orm-conf.php');

        //initialize Propel
        Propel::initialize();

        //get Propel connection
        $con = Propel::getConnection();

        //initialize database structure
        PropelSQLParser::executeFile('C:\Art_Request\module\ArtRequest\tests\Model\configs\schema.sql', $con);

        //insert master data
        PropelSQLParser::executeFile('C:\Art_Request\module\ArtRequest\tests\Model\configs\data.sql', $con);

        //explicitly call parent tear down method
        parent::setUp();
        
    }
    
    /**
     * Model test tear down method which closes the Propel connection 
     */
    public function tearDown()
    {
        //close Propel connection
        Propel::close();
        
        //explicitly call parent tear down method
        parent::tearDown();
    }
    
}

?>
