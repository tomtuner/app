<?php

/**
 * Description of iFreezeFestEventRequestService
 *
 * @author Sam Falconer
 */

namespace FreezeFest\Service;

interface iFreezeFestEventRequestService
{

    /**
     * Send Message
     *
     * Send confirmation email
     * 
     * @throws ServiceException 
     */
    public function sendMessage();
}

?>