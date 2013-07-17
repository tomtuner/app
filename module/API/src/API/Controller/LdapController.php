<?php

namespace API\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use AppCore\Exception\ControllerException;
use Zend\View\Model\JsonModel;

class LdapController extends AbstractActionController
{

    /**
     * Is Valid User Action
     * @throws \AppCore\Exception\ControllerException
     */
    public function validateUsernameAction()
    {
        try
        {
            $sE = new \API\Service\LDAP\Entity\LDAPServiceEntity($this->getRequest()->getPost());
            $lC = new \AppLDAP\Connection\LDAPConnection();
            $s = new \API\Service\LDAP\LDAPService($sE);
            $s->addModel($lC);

            $result = new JsonModel(
                            array(
                                'status' => 'true',
                                'results' => array('is_valid_user' => $s->isValidUser())
                            )
            );

            return $result;
        } catch(\Exception $e)
        {
            throw new ControllerException('Error Executing Is Valid User Action');
        }
    }

}

?>
