<?php

/**
 * Description of CommuterServiceEntity
 *
 * @author Nikesh Hajari
 */

namespace CommuterWeek\Service\Entity;

class CommuterServiceEntity extends \AppCore\Service\Entity\AbstractServiceEntity
{

    /**
     * Get Local Address One
     * 
     * @return string|null
     */
    public function getLocalAddressOne()
    {
        return $this->getProperty('local_address_one');
    }

    /**
     * Get Local Address Two
     * 
     * @return string|null
     */
    public function getLocalAddressTwo()
    {
        return $this->getProperty('local_address_two');
    }

    /**
     * Get City Name
     * 
     * @return string|null
     */
    public function getCityName()
    {
        return $this->getProperty('city_name');
    }

    /**
     * Get State Code
     * 
     * @return string|null
     */
    public function getStateCode()
    {
        return $this->getProperty('state_code');
    }

    /**
     * Get Graduation Class Year
     * 
     * @return string|null
     */
    public function getGraduationClassYear()
    {
        return $this->getProperty('graduation_class_year');
    }

    /**
     * Get RIT College Id
     * 
     * @return string|null
     */
    public function getRITCollegeId()
    {
        return $this->getProperty('rit_college_id');
    }

    /**
     * Get Zip Code
     * 
     * @return string|null
     */
    public function getZipCode()
    {
        return $this->getProperty('zip_code');
    }

    /**
     * Get Apartment Complex Name
     * 
     * @return string|null
     */
    public function getApartmentComplexName()
    {
        return $this->getProperty('apartment_complex_name');
    }

    /**
     * Get Roommate Type Id
     * 
     * @return string|null
     */
    public function getRoommateTypeId()
    {
        return $this->getProperty('roommate_type_id');
    }

    /**
     * Get Dwelling Choice Id
     * 
     * @return string|null
     */
    public function getDwellingChoiceId()
    {
        return $this->getProperty('dwelling_choice_id');
    }

}

?>