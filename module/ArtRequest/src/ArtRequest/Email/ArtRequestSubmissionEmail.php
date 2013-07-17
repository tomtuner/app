<?php

/**
 * Description of ArtRequestSubmissionEmail
 *
 * @author Sam Falconer
 */

namespace ArtRequest\Email;

use AppCore\Shared\Email\iEmail;

class ArtRequestSubmissionEmail implements iEmail
{
            
    /**
     * Service Entity
     * @var ArtRequest\Service\Entity\ArtRequestEntity
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
        $m->setSubject('New Artwork Request for ' . $this->serviceEntity->getEventTitle());
        
        //set from e-mail address
        $m->setFromEmailAddress('no-reply@campuslife.rit.edu', 'No-Reply Center for Campus Life');
        
        //set to e-mail address
        $m->setToEmailAddress('radccl@rit.edu', 'Becca Delaney');

        $artRequestTypeString = "";
        
        //set message content
       
        $mailBody = <<<EOT
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	    <title>Artwork Request</title>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	</head>
	<body>
	    <table cellpadding="0" cellspacing="0" border="0" width="99%" bgcolor="#EDECE4">
		    <tr>
			    <td height="30">
	            </td>
	        </tr>
		    <tr>
			    <td align="center">
					<table cellpadding="25px" cellspacing="0" border="0" width="640" bgcolor="#ffffff" style="color:#523126; font-family:Helvetica, Arial, sans-serif; box-shadow: 0 0 4px rgba(0, 0, 0, 0.2), inset 0 0 50px rgba(0, 0, 0, 0.1);">
						<tr>
							<td>
								<div style="font-size:24pt; line-height:130%;">Artwork Request</div><br/>
							    <br/>
							    Becca,<br/>
							    <br/>
							    We just wanted to let you know that a new artwork request has been submitted for <b>{$this->serviceEntity->getEventTitle()}</b>. The submitter has requested that this be completed by <b>{$this->serviceEntity->getRequestDueDate()}</b>.<br/>
							    <br/>
							    Thanks,<br/>
							    The Web Team<br/>
							    Center for Campus Life
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