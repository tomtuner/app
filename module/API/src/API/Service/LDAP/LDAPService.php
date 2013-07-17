<?php

/**
 * Description of LDAPService
 *
 * @author Nikesh Hajari
 */

namespace API\Service\LDAP;

use API\Service\LDAP\iLDAPService;
use AppLDAP\Connection\iLDAPConnection;
use API\Service\LDAP\Entity\LDAPServiceEntity;
use AppCore\Exception\ServiceException;
use AppCore\Service\EventHookType;

class LDAPService extends \AppCore\Service\AbstractService implements iLDAPService
{

    /**
     * @see iLDAPService::isValidUser()
     */
    public function isValidUser()
    {
        try
        {
            //pre event
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::PRE,
                    $this, array('serviceEntity' => $this->serviceEntity));

            //search ldap
            $requestOutput = $this->getModel('AppLDAP\Connection\LDAPConnection')
                                  ->getConnection()
                                  ->exists('uid=' . $this->serviceEntity->getUserName() . ',ou=People,dc=rit,dc=edu');

            //post event
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::POST,
                    $this,
                    array('serviceEntity' => $this->serviceEntity, 'requestOutput' => $requestOutput));

            //return intent to form request id
            return $requestOutput;
        } catch(\Exception $e)
        {
            throw new ServiceException('Error Executing Is Valid User Service', $e);
        }
    }

    /**
     * @see iLDAPService::search()
     */
    public function search()
    {
        throw new ServiceException('Not Implemented');
    }

}

?>