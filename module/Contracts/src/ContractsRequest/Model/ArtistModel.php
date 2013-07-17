<?php

/**
 * Description of ArtistModel
 *
 * @author Sam Falconer
 */

namespace ArtRequest\Model;

use \AppCore\Exception\ModelException;

class ArtistModel
{
    
    /**
     * Find All - Return All Rows
     * 
     * @return PropelObjectCollection Contains Collection of \ORMModel\Artist Objects
     * @throws ModelException 
     */
    public function findAll()
    {
        try
        {
            $query = \ArtRequestORM\ArtistQuery::create()
                        ->orderByArtistLastName(\Criteria::ASC)
                        ->find();

            return $query;
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Retrieving Artists', $e);
        }
    }

    /**
     * Find Artist by Id
     * 
     * @param array of integers $artistIds
     * @return PropelObjectCollection Contains Collection of \ORMModel\Artist Objects
     * @throws ModelException
     */
    public function findByIds($artistIds)
    {
        try
        {
            $query = \ArtRequestORM\ArtistQuery::create()
                        ->filterByArtistId($artistIds)
                        ->find();
            
            return $query;
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Retrieving Artists', $e);
        }
    }
    
}

?>