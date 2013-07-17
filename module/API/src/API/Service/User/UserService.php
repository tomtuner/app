<?php

/**
 * Description of UserService
 *
 * @author Nikesh Hajari
 */

namespace API\Service\User;

use API\Service\User\iUserService;
use AppCore\Service\EventHookType;
use AppCore\Service\Entity\iServiceEntity;
use AppCore\Exception\ServiceException;

class UserService extends \AppCore\Service\AbstractService implements iUserService
{
    
    /**
     * Add
     * 
     * @return string User Id
     * @throws ServiceException 
     */
    public function add()
    {
        try
        {
            //pre-add event
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::PRE,
                    $this, array('serviceEntity' => $this->serviceEntity));

            //save data
            $insertId = $this->getModel('API\Model\UserModel')->create($this->serviceEntity);

            //post-add event
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::POST,
                    $this,
                    array('serviceEntity' => $this->serviceEntity, 'result' => $insertId));

            //return insert id
            return $insertId;
        } 
        catch(\Exception $e)
        {
            throw new ServiceException('Error Adding User', $e);
        }
    }
    
    /**
     * Does Exist
     * @return boolean
     * @throws ServiceException
     */
    public function doesExist()
    {
        
        try
        {
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::PRE,
                    $this, array('serviceEntity' => $this->serviceEntity));

            $searchResult = $this->getModel('API\Model\UserModel')->exists($this->serviceEntity);

            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::POST,
                    $this,
                    array('serviceEntity' => $this->serviceEntity, 'result' => $searchResult));

            return $searchResult;
        }
        catch(\Exception $e)
        {
            throw new ServiceException('Error Checking to See If User Exists', $e);
        }
        
    }
    
}

?>
