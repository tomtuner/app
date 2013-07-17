<?php

/**
 * Description of CommuterService
 *
 * @author Nikesh Hajari
 */

namespace CommuterWeek\Service;

use AppCore\Exception\ServiceException;
use AppCore\Service\EventHookType;

class CommuterService extends \AppCore\Service\AbstractService
{

    /**
     * Add New Commuter
     * 
     * @return string Commuter Id
     * @throws ServiceException 
     */
    public function add()
    {        
        try
        {
            //commuter service entity
            $commuterServiceEntity = $this->getDataEntity('CommuterWeek\Service\Entity\CommuterServiceEntity');

            //pre-method hook
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::PRE,
                    $this, array('serviceEntity' => $commuterServiceEntity));

            //create commuter
            $commuterId = $this->getModel('CommuterWeek\Model\CommuterModel')->create($commuterServiceEntity);    
 
            //post-method hook
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::POST,
                    $this,
                    array('serviceEntity' => $commuterServiceEntity, 'result' => $commuterId));

            //commuter id
            return $commuterId;
        } catch(\Exception $e)
        {
            throw new ServiceException('Error Adding Commuter', $e);
        }
    }
	
	/**
     * Get All Commuters
     * 
     * @return PropelObjectCollection
     * @throws ServiceException 
     */
	public function getAll()
	{
        try
        {
            //pre-method hook
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::PRE, $this);

            //get commuter collection
            $commuterCollection = $this->getModel('CommuterWeek\Model\CommuterModel')->findAll();    
 
            //post-method hook
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::POST,
                    $this,
                    array('result' => $commuterCollection));

            //commuter collection
            return $commuterCollection;
        } 
		catch(\Exception $e)
        {
            throw new ServiceException('Error Retrieving Commuters', $e);
        }
	}
    
}

?>