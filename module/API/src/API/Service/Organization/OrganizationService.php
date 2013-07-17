<?php

/**
 * Description of OrganizationService
 *
 * @author Nikesh Hajari
 */

namespace API\Service\Organization;

use API\Service\Organization\iOrganizationService;
use AppCore\Service\EventHookType;
use AppCore\Service\Entity\iServiceEntity;
use AppCore\Exception\ServiceException;

class OrganizationService extends \AppCore\Service\AbstractService implements iOrganizationService
{
    
    /**
     * Find
     * 
     * @return string \OrganizationsORM\Organizations
     * @throws ServiceException 
     */
    public function find()
    {
        try
        {
            //pre-find event
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::PRE,
                    $this, array('serviceEntity' => $this->serviceEntity));

            //create search requeset
            $searchResult = $this->model->find($this->serviceEntity);

            //post-find event
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::POST,
                    $this,
                    array('serviceEntity' => $this->serviceEntity, 'result' => $searchResult));

            //return search result
            return $searchResult;
        } 
        catch(\Exception $e)
        {
            throw new ServiceException('Error Searching for Organizations', $e);
        }
    }

}

?>
