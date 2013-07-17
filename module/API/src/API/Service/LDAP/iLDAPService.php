<?php

/**
 * Description of iLDAPService
 *
 * @author Nikesh Hajari
 */

namespace API\Service\LDAP;

interface iLDAPService
{
    /**
     * Is Valid User
     * 
     * Checks to see if RIT User Name is Valid
     * 
     * @return boolean
     * @throws ServiceException
     */
    public function isValidUser();

    /**
     * LDAP Search
     * 
     * Search for LDAP Users
     * 
     * @todo Implement Service Method
     * @throws ServiceException
     */
    public function search();
}

?>
