<?php

/**
 * Description of FlyerFormatModel
 *
 * @author Nikesh Hajari
 */

namespace ArtRequest\Model;

use \AppCore\Exception\ModelException;

class FlyerFormatModel
{
    /**
     * Find All - Return All Rows
     * 
     * @return PropelObjectCollection Contains Collection of \ORMModel\FlyerFormat Objects
     * @throws ModelException 
     */
    public function findAll()
    {
        try
        {
            $query = \ArtRequestORM\FlyerFormatQuery::create()
                        ->find();

            return $query;
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Retrieving Flyer Format', $e);
        }
    }
}

?>
