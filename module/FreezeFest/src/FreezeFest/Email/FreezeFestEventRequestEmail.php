<?php

/**
 * Description of FreezeFestEventRequestEmail
 *
 * @author Sam Falconer
 */

namespace FreezeFest\Email;

use AppCore\Shared\Email\iEmail;

class FreezeFestEventRequestEmail implements iEmail
{
            
    /**
     * Service Entity
     * @var FreezeFest\Service\Entity\FreezeFestEventRequestEntity
     */
    private $serviceEntity;
    
    /**
     * @see \AppCore\Shared\Email\iEmail::__construct
     */
    public function __construct(\AppCore\Service\Entity\iServiceEntity $serviceEntity)
    {
        $this->serviceEntity = $serviceEntity;
    }
    
   /**
    * @see \AppCore\Shared\Email\iEmail::getMessage()
    */
    public function getMessage()
    {
        //construct new email message
        $m = new \AppMail\EmailMessage();
        
        //set subject
        $m->setSubject('FreezeFest Event Request #' . rand(1000000,9999999));
        
        //set from e-mail address
        $m->setFromEmailAddress('no-reply@campuslife.rit.edu', 'Center for Campus Life');
        
        //set to e-mail address
        $m->setToEmailAddress($this->serviceEntity->getRepEmail(), $this->serviceEntity->getRepName());
        
        //set bcc e-mail address
        $m->setBccEmailAddress('radccl@rit.edu', 'Becca Delaney');
        
        if ($this->serviceEntity->getRequestedServices() == "") {
        
        	$requestedServices = "None";
	        
        } else {
	        
	        $requestedServices = implode(", ", $this->serviceEntity->getRequestedServices());
	        
        }
        
        //set message content
       
        $mailBody = <<<EOT
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	    <title>FreezeFest Event Request</title>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	</head>
	<body>
	    <table cellpadding="0" cellspacing="0" border="0" width="99%" bgcolor="#072898">
		    <tr>
			    <td height="30">
	            </td>
	        </tr>
		    <tr>
			    <td align="center">
					<table cellpadding="25px" cellspacing="0" border="0" width="640" bgcolor="#ffffff" style="font-family:Helvetica, Arial, sans-serif; box-shadow: 0 0 4px rgba(0, 0, 0, 0.2), inset 0 0 50px rgba(0, 0, 0, 0.1);">
						<tr>
							<td>
								<div style="font-size:24pt; line-height:130%;">Thank You</div><br/>
								Thank you for submitting your request for FreezeFest 2013. A Center for Campus Life representative will contact you to confirm if and when your event will occur during the weekend schedule.<br/>
							    <br/>
							    Please note you will receive a separate email when and <b>if your event is confirmed</b>.<br/><br/>
							    You can expect to hear from a Campus Life representative by Friday, December 21st.<br/><br/>
							    <b>If your event is approved at that time</b>, you will need to EVR your event through Event Registration. You will receive directions on how to EVR your event with the confirmation email on December 21st.
							    <br/>
							    <br/>
							    <table border="0" cellpadding="5" style="margin-left:35px;">
							    <tr>
							    <td width="225px">
							    <b>
							    	Club Name
							    </b>
							    </td>
							    <td>
							    	{$this->serviceEntity->getClubName()}
							    </td>
							    </tr>
							    <tr>
							    <td width="225px">
							    <b>
							    	Representative Name
							    </b>
							    </td>
							    <td>
							    	{$this->serviceEntity->getRepName()}
							    </td>
							    </tr>
							    <tr>
							    <td width="225px">
							    <b>
							    	Representative Email
							    </b>
							    </td>
							    <td>
							    	{$this->serviceEntity->getRepEmail()}
							    </td>
							    </tr>
							    <tr>
							    <td width="225px">
							    <b>
							    	Proposed Event Name
							    </b>
							    </td>
							    <td>
							    	{$this->serviceEntity->getEventName()}
							    </td>
							    </tr>
							    <tr>
							    <td width="225px">
							    <b>
							    	Event Description
							    </b>
							    </td>
							    <td>
							    	{$this->serviceEntity->getEventDescription()}
							    </td>
							    </tr>
							    <tr>
							    <td width="225px">
							    <b>
							    	Requested Event Location
							    </b>
							    </td>
							    <td>
							    	{$this->serviceEntity->getEventLocation()}
							    </td>
							    </tr>
							    <tr>
							    <td width="225px">
							    <b>
							    	Requested Event Time
							    </b>
							    </td>
							    <td>
							    	{$this->serviceEntity->getEventDate()} from {$this->serviceEntity->getEventTimeStart()} to {$this->serviceEntity->getEventTimeEnd()}
							    </td>
							    </tr>
							    <tr>
							    <td width="225px">
							    <b>
							    	Estimated Attendance
							    </b>
							    </td>
							    <td>
							    	{$this->serviceEntity->getAttendance()}
							    </td>
							    </tr>
							    <tr>
							    <td width="225px">
							    <b>
							    	Requested Services
							    </b>
							    </td>
							    <td>
							    	{$requestedServices}
							    </td>
							    </tr>
							    <tr>
							    <td width="225px">
							    <b>
							    	Student Fee
							    </b>
							    </td>
							    <td>
							    	{$this->serviceEntity->getStudentFee()}
							    </td>
							    </tr>
							    <tr>
							    <td width="225px">
							    <b>
							    	Staff Fee
							    </b>
							    </td>
							    <td>
							    	{$this->serviceEntity->getStaffFee()}
							    </td>
							    </tr>
							    <tr>
							    <td width="225px">
							    <b>
							    	Public Fee
							    </b>
							    </td>
							    <td>
							    	{$this->serviceEntity->getPublicFee()}
							    </td>
							    </tr>
							    <tr>
							    <td width="225px">
							    <b>
							    	Cost Reason
							    </b>
							    </td>
							    <td>
							    	{$this->serviceEntity->getCostReason()}
							    </td>
							    </tr>
							    <tr>
							    <td width="225px">
							    <b>
							    	Has Occurred Before
							    </b>
							    </td>
							    <td>
							    	{$this->serviceEntity->getHasOccurredBefore()}
							    </td>
							    </tr>
							    <tr>
							    <td width="225px">
							    <b>
							    	Wants CCL Funds
							    </b>
							    </td>
							    <td>
							    	{$this->serviceEntity->getWantsCCLFunds()}
							    </td>
							    </tr>

							    </table>
							    <br/>
							    <br/>
							    Thank You,<br/>
							    <b>Center for Campus Life</b>
								
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
			    <td height="30">
	            </td>
	        </tr>
	    </table>
	</body>
</html>	
EOT;
		     
        //set message content
        $m->setHTMLMessage($mailBody);
        
        //return message
        return $m->getEmailMessage();
    }
    
}

?>