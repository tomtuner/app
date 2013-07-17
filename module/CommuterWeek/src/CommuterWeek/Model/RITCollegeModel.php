<?php

/**
 * Description of RITCollegeModel
 *
 * @author Nikesh Hajari
 */

namespace CommuterWeek\Model;

class RITCollegeModel
{
    
    /**
     * Find All RIT Colleges
     * 
     * @return PropelObjectCollection
     * @throws ModelException
     */
    public function findAll()
    {               
       try
       {
           $c = \CommuterWeekORM\RitCollegeQuery::create()
                    ->find();
           
           return $c;
       }
       catch(\Exception $e)
       {
           throw new ModelException('Error Finding All RIT Colleges', $e);
       }
    }
    
}

?>
