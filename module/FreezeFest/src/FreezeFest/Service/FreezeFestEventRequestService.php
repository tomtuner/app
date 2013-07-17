<?php

/**
 * Description of FreezeFestEventRequestService
 *
 * @author Sam Falconer
 */

namespace FreezeFest\Service;

use AppCore\Service\Entity\iServiceEntity;
use AppCore\Exception\ServiceException;
use AppCore\Service\EventHookType;

class FreezeFestEventRequestService extends \AppCore\Service\AbstractService implements \FreezeFest\Service\iFreezeFestEventRequestService
{

    /**
     * FreezeFest Event Request Service Entitiy
     * @var FreezeFest\Service\FreezeFestEventRequestServiceEntity
     */
    private $serviceEntity;

    /**
     * FreezeFest Event Request Service Default Constructor
     * @param iServiceEntity $serviceEntity
     */
    public function __construct(iServiceEntity $serviceEntity)
    {
        $this->serviceEntity = $serviceEntity;
    }

    /**
     * Send confirmation email
     * 
     * @throws ServiceException 
     */
    public function sendMessage()
    {
        try
        {
            //pre-add event
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::PRE,
                    $this, array('serviceEntity' => $this->serviceEntity));


            //post-add event
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::POST,
                    $this,
                    array('serviceEntity' => $this->serviceEntity));

        } 
        catch(\Exception $e)
        {
           throw new ServiceException('Error Processing Send Request', $e);
        }
    }

}

?>