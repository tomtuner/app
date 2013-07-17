<?php

/**
 * Description of ArtRequestStatusServiceEntity
 *
 * @author Sam Falconer
 */

namespace ArtRequest\Service\Entity;

class ArtRequestStatusServiceEntity extends \AppCore\Service\Entity\AbstractServiceEntity
{

    public function getArtistIds()
    {
        return $this->getProperty('artist_ids');
    }

    public function getIsStarted()
    {
        return $this->getProperty('is_started');
    }

    public function getIsCompleted()
    {
        return $this->getProperty('is_completed');
    }

    public function getIsArchived()
    {
        return $this->getProperty('is_archived');
    }
    
}

?>