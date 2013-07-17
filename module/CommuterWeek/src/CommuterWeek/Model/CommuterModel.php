<?php

/**
 * Description of CommuterModel
 *
 * @author Nikesh Hajari
 */

namespace CommuterWeek\Model;

use CommuterWeek\Service\Entity\CommuterServiceEntity;
use AppCore\Exception\ModelException;

class CommuterModel
{
    
    /**
     * Create New Commuter
     * 
     * @param \CommuterWeek\Model\CommuterServiceEntity $e
     * @return integer Commuter Id
     * @throws ModelException
     */
    public function create(CommuterServiceEntity $e)
    {
       $c = \Propel::getConnection('commuter_week');
       $c->beginTransaction();
               
       try
       {
           $u = new \CommuterWeekORM\Commuter();
           $u->setFirstName($e->getShibbolethServiceEntity()->getFirstName());
           $u->setLastName($e->getShibbolethServiceEntity()->getLastName());
           $u->setEmailAddress($e->getShibbolethServiceEntity()->getEmailAddress());
           $u->setGraduationClassYear($e->getGraduationClassYear());
           $u->setRitCollegeId($e->getRITCollegeId());
           $u->setLocalAddressOne($e->getLocalAddressOne());
           $u->setLocalAddressTwo($e->getLocalAddressTwo());
           $u->setCityName($e->getCityName());
           $u->setStateCode($e->getStateCode());
           $u->setZipCode($e->getZipCode());
           $u->setApartmentComplexName($e->getApartmentComplexName());
           $u->setRoommateTypeId($e->getRoommateTypeId());
           $u->setDwellingChoiceId($e->getDwellingChoiceId());
           $u->save($c);
           
           $c->commit();
           
           return $u->getCommuterId();
       }
       catch(\Exception $e)
       {
           $c->rollBack();
           throw new ModelException('Error Adding Commuter Registration', $e);
       }
    }
	
	/**
     * Find All Commuters
     * 
     * @return PropelObjectCollection
     * @throws ModelException
     */
	public function findAll()
	{
		try
		{
			$q = \CommuterWeekORM\CommuterQuery::create()
					->find();
					
			return $q;
		}
		catch(\Exception $e)
		{
			throw new ModelException('Error Retrieving Registrations', $e);
		}
	}
    
}

?>
