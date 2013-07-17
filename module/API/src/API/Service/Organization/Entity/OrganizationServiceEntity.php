<?php

/**
 * Description of OrganizationServiceEntity
 *
 * @author Nikesh Hajari
 */

namespace API\Service\Organization\Entity;

class OrganizationServiceEntity extends \AppCore\Service\Entity\AbstractServiceEntity
{

    public function getOrganizationName()
    {
        return $this->getProperty('organization_name');
    }

    public function getOrganizationAcronym()
    {
        return $this->getProperty('organization_acronym');
    }

    public function getOrganizationId()
    {
        return $this->getProperty('organization_id');
    }

    /**
     * Get Query
     * 
     * @return string
     */
    public function getQuery()
    {
        return $this->getProperty('q');
    }
    
    public function getSearchFields()
    {
        return explode(',', $this->getProperty('fl'));
    }

}

?>
