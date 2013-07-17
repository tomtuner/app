<?php

/**
 * Description of CommuterRegistrationConfirmationUserEmail
 *
 * @author Nikesh Hajari
 */

namespace CommuterWeek\Email;

use AppCore\Shared\Email\iEmail;
use AppCore\Service\Entity\iServiceEntity;

class CommuterRegistrationConfirmationUserEmail implements iEmail
{

    /**
     * Service Entity
     * @var Applicant\Service\Entity\ApplicantServiceEntity
     */
    private $serviceEntity;

    /**
     * @see \AppCore\Shared\Email\iEmail::__construct
     */
    public function __construct(iServiceEntity $serviceEntity)
    {
        $this->serviceEntity = $serviceEntity;
    }

    /**
     * @see \AppCore\Shared\Email\iEmail::getMessage()
     */
    public function getMessage()
    {
        $m = new \Zend\Mail\Message();

        $m->setEncoding('utf-8');

        $m->addFrom('noreply-commuterweek@rit.edu',
                "ACE Commuter Week Notifcation");

        $m->addTo($this->serviceEntity->getShibbolethServiceEntity()->getEmailAddress(),
                $this->serviceEntity->getShibbolethServiceEntity()->getFirstName() . " " . $this->serviceEntity->getShibbolethServiceEntity()->getLastName());

        $m->setSubject('ACE Commuter Week Registration Notification');

        $m->setBody("Thank you for registering to participate in RIT's first-ever Commuter SpiRIT Week! This serves as confirmation that you are registered to be able to participate in activities, win free giveaways, free food, and receive coupons and incentives specifically for commuter students throughout the week of March 11-15, 2013.
		
Things to Keep in Mind:
		
        1. Please visit rit.edu/ace for a full calendar of events, or ACE at RIT on Facebook

        2. After you received this confirmation email you can come to the ACE Office, in the Campus Center A650 to receive your wristband anytime the week prior to the event.  You can also collect your wristband on Monday March 11th at the Commuter Fair in the Fireside Lounge in the Campus Center.  If alternative arrangements need to be made please contact cjmccl@rit.edu<mailto:cjmccl@rit.edu>

        3. By entering your information into the registration system you are eligible for items specifically for commuter students and will be kept aware and updated of events happening on campus for commuter and off campus populations

        4. You MUST have your wristband represented to participate in the events during Commuter SpiRIT Week - you don't need to be wearing it, but you need to show you have it.

        Please contact cjmccl@rit.edu<mailto:cjmccl@rit.edu> with any questions you might have!  Thank you, and see you there!");

        return $m;
    }

}

?>
