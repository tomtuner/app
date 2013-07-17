<?php

/**
 * Description of FreezeFestEventRequestServiceEntity
 *
 * @author Sam Falconer
 */

namespace FreezeFest\Service\Entity;

class FreezeFestEventRequestServiceEntity extends \AppCore\Service\Entity\AbstractServiceEntity
{   
    /**
     * Get Club Name
     * 
     * @return string 
     */
    public function getClubName()
    {
        return $this->getProperty('clubName');
    }
    
    /**
     * Get Representative Name
     * 
     * @return string 
     */
    public function getRepName()
    {
        return $this->getProperty('repName');
    }
    
    /**
     * Get Representative Email
     * 
     * @return string 
     */
    public function getRepEmail()
    {
        return $this->getProperty('repEmail');
    }
    
    /**
     * Get Event Name
     * 
     * @return string 
     */
    public function getEventName()
    {
        return $this->getProperty('eventName');
    }
    
    /**
     * Get Event Description
     * 
     * @return string 
     */
    public function getEventDescription()
    {
        return $this->getProperty('eventDescription');
    }
    
    /**
     * Get Event Location
     * 
     * @return string 
     */
    public function getEventLocation()
    {
        return $this->getProperty('eventLocation');
    }
    
    /**
     * Get Event Date
     * 
     * @return string 
     */
    public function getEventDate()
    {
        return $this->getProperty('eventDate');
    }
    
    /**
     * Get Event Time Start
     * 
     * @return string 
     */
    public function getEventTimeStart()
    {
        return $this->getProperty('eventTimeStart');
    }
    
    /**
     * Get Event Time End
     * 
     * @return string 
     */
    public function getEventTimeEnd()
    {
        return $this->getProperty('eventTimeEnd');
    }
    
    /**
     * Get Attendance
     * 
     * @return string 
     */
    public function getAttendance()
    {
        return $this->getProperty('eventAttendance');
    }
    
    /**
     * Get Requested Services
     * 
     * @return array 
     */
    public function getRequestedServices()
    {
    	return $this->getProperty('service');	    
    }
    
    /**
     * Get Student Fee
     * 
     * @return string 
     */
    public function getStudentFee()
    {
        return $this->getProperty('studentFee');
    }
    
    /**
     * Get Staff Fee
     * 
     * @return string 
     */
    public function getStaffFee()
    {
        return $this->getProperty('staffFee');
    }
    
    /**
     * Get Public Fee
     * 
     * @return string 
     */
    public function getPublicFee()
    {
        return $this->getProperty('publicFee');
    }

    /**
     * Get Cost Reason
     * 
     * @return string 
     */
    public function getCostReason()
    {
        return $this->getProperty('costReason');
    }
    
    /**
     * Get Has Occurred Before
     * 
     * @return string 
     */
    public function getHasOccurredBefore()
    {
    	if ($this->getProperty('hasOccurredBefore') == "true") {
	    	return "Yes";
    	} else {
	    	return "No";
    	}
    }
    
    /**
     * Get Wants CCL Funds
     * 
     * @return string 
     */
    public function getWantsCCLFunds()
    {
    	if ($this->getProperty('wantsCCLFunds') == "true") {
	    	return "Yes";
    	} else {
	    	return "No";
    	}
    } 
}

?>