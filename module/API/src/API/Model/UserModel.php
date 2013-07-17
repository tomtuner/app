<?php

/**
 * Description of UserModel
 *
 * @author Nikesh Hajari
 */

namespace API\Model;

use AppCore\Exception\ModelException;
use API\Service\User\Entity\UserServiceEntity;

class UserModel
{

    /**
     * Create User
     * 
     * @param \API\Service\User\Entity\UserServiceEntity $entity
     * @return string User Id
     * @throws ModelException
     */
    public function create(UserServiceEntity $entity)
    {
        try
        {
            $query = new \UsersORM\Users();
            $query->setFirstName($entity->getFirstName());
            $query->setLastName($entity->getLastName());
            $query->setUid($entity->getUniversityId());
            $query->setUsername($entity->getUserName());
            $query->setHearingImpaired(NULL);
            $query->setPrefCommMethod(NULL);
            $query->setEmail($entity->getEmailAddress());
            $query->setPhone($entity->getPhoneNumber());
            $query->setAddress(NULL);
            $query->setScreenName(NULL);
            $query->setMiddleInitial(NULL);
            $query->save();

            return $query->getId();
        } catch(\Exception $e)
        {
            throw new ModelException('Model error trying to invoke ' . __METHOD__ . ' in ' . __CLASS__, $e);
        }
    }

    /**
     * Check to See If User Exists
     * 
     * @param \API\Service\User\Entity\UserServiceEntity $entity
     * @return boolean
     * @throws ModelException
     */
    public function exists(UserServiceEntity $entity)
    {
        try
        {
            $rowCountQuery = \UsersORM\UsersQuery::create()
                                ->filterByUsername($entity->getUserName())
                                ->count();

            if($rowCountQuery == 1)
            {
                return true;
            }

            return false;
        } catch(\Exception $e)
        {
            throw new ModelException('Model error trying to invoke ' . __METHOD__ . ' in ' . __CLASS__, $e);
        }
    }

}

?>