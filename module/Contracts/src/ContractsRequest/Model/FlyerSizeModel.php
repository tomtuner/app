<?php

/**
 * Description of FlyerSizeModel
 *
 * @author Nikesh Hajari
 */

namespace ArtRequest\Model;

use \AppCore\Exception\ModelException;

class FlyerSizeModel
{
    
    /**
     * Find All - Return All Rows
     * 
     * @return PropelObjectCollection Contains Collection of \ORMModel\FlyerSize Objects
     * @throws ModelException 
     */
    public function findAll()
    {
        try
        {
            $query = \ArtRequestORM\FlyerSizeQuery::create()
                        ->find();

            return $query;
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Retrieving Flyer Size', $e);
        }
    }
}

?>
