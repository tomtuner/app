<?php

/**
 * Description of DwellingChoiceModel
 *
 * @author Nikesh Hajari
 */

namespace CommuterWeek\Model;

class DwellingChoiceModel
{
   
    public function findAll()
    {
        try
        {
            $q = \CommuterWeekORM\DwellingChoiceQuery::create()
                    ->find();
            
            return $q;
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Fetching Dwelling Choices', $e);
        }
    }
    
}

?>
