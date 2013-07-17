<?php

/**
 * Description of RoommateTypeModel
 *
 * @author Nikesh Hajari
 */

namespace CommuterWeek\Model;

class RoommateTypeModel
{
    
    public function findAll()
    {
        try
        {
            $q = \CommuterWeekORM\RoommateTypeQuery::create()
                    ->find();
            
            return $q;
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Fetching Roommates Types', $e);
        }
    }
    
}

?>
