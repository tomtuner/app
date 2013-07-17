<?php

/**
 * Description of LDAPServiceEntity
 *
 * @author Nikesh Hajari
 */

namespace API\Service\LDAP\Entity;

class LDAPServiceEntity extends \AppCore\Service\Entity\AbstractServiceEntity
{
    
    /**
     * Get Username
     * 
     * Get username to search LDAP
     * 
     * @return string
     */
    public function getUserName()
    {
        return $this->getProperty('user_name');
    }
    
    /**
     * Get Query
     * 
     * Get search string for LDAP Query
     * 
     * @return string
     */
    public function getQuery()
    {
        return $this->getProperty('query');
    }
    
}

?>
