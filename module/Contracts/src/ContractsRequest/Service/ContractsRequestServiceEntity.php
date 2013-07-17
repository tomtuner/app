<?php

/**
 * Description of ContractsRequestServiceEntity
 *
 * @author Thomas DeMeo
 */

namespace Contracts\Service\Entity;

class ContractsRequestServiceEntity extends \AppCore\Service\Entity\AbstractServiceEntity
{
    public function getContractsRequestId()
    {
        return $this->getProperty('contracts_request_id');
    }

    public function getRequestorDCE()
    {
        return $this->getShibbolethServiceEntity()->getUid();
    }

    public function getRequestorFirstName()
    {
        return $this->getShibbolethServiceEntity()->getFirstName();
    }

    public function getRequestorLastName()
    {
        return $this->getShibbolethServiceEntity()->getLastName();
    }

    public function getRequestorEmail()
    {
        return $this->getShibbolethServiceEntity()->getEmailAddress();
    }

    public function getRequestorPhoneNumber()
    {
        return $this->getProperty('phone_number');
    }   
}

?>