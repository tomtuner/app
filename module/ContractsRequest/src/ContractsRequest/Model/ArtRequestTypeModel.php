<?php

/**
 * Description of ArtRequestTypeModel
 *
 * @author Nikesh Hajari
 */

namespace ArtRequest\Model;

use \AppCore\Exception\ModelException;

class ArtRequestTypeModel
{
    
    /**
     * Find All - Return All Rows
     * 
     * @return PropelObjectCollection Contains Collection of \ORMModel\ArtRequestType Objects
     * @throws ModelException 
     */
    public function findAll()
    {
        try
        {
            $query = \ArtRequestORM\ArtRequestTypeQuery::create()
                        ->orderByArtRequestTypeId(\Criteria::ASC)
                        ->find();

            return $query;
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Retrieving Art Request Types', $e);
        }
    }
    
    /**
     * Find Art Request Type by Name
     * 
     * @param string $artRequestTypeName
     * @return \ORMModel\ArtRequestType - Returns Single Object
     * @throws ModelException 
     */
    public function findByName($artRequestTypeName)
    {
        try
        {
            $query = \ArtRequestORM\ArtRequestTypeQuery::create()
                        ->filterByArtRequestTypeName($artRequestTypeName)
                        ->findOne();
            
            return $query;
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Retrieving Art Request Type', $e);
        }
        
    }
    
    /**
     * Find Art Request Type by Id
     * 
     * @param integer $artRequestTypeId
     * @return \ORMModel\ArtRequestType - Returns Single Object
     * @throws ModelException 
     */
    public function findById($artRequestTypeId)
    {
        try
        {
            $query = \ArtRequestORM\ArtRequestTypeQuery::create()
                        ->filterByArtRequestTypeId($artRequestTypeId)
                        ->findOne();
            
            return $query;
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Retrieving Art Request Type', $e);
        }
    }
    
}

?>
