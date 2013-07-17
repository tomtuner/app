<?php

/**
 * Description of BannerLocationModel
 *
 * @author Nikesh Hajari
 */

namespace ArtRequest\Model;

use \AppCore\Exception\ModelException;

class BannerLocationModel
{
    /**
     * Find All - Return All Rows
     * 
     * @return PropelObjectCollection Contains Collection of \ORMModel\BannerLocation Objects
     * @throws ModelException 
     */
    public function findAll()
    {
        try
        {
            $query = \ArtRequestORM\BannerLocationQuery::create()
                        ->find();

            return $query;
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Retrieving Banner Locations', $e);
        }
    }
}

?>
