<?php

/**
 * Description of UserServiceEntity
 *
 * @author Nikesh Hajari
 */

namespace API\Service\User\Entity;

class UserServiceEntity extends \AppCore\Service\Entity\AbstractServiceEntity
{
    
    public function getUserName()
    {
        return $this->getProperty('user_name');
    }

    public function getFirstName()
    {
        return $this->getProperty('first_name');
    }
    
    public function getLastName()
    {
        return $this->getProperty('last_name');
    }
    
    public function getUniversityId()
    {
        return $this->getProperty('university_id');
    }
    
    public function getEmailAddress()
    {
        return $this->getProperty('email_address');
    }
    
    public function getPhoneNumber()
    {
        return $this->getProperty('phone_number');
    }
    
}

?>