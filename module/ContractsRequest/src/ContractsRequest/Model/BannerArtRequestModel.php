<?php

/**
 * Description of BannerArtRequestModel
 *
 * @author Nikesh Hajari
 */

namespace ArtRequest\Model;

use \AppCore\Exception\ModelException;
use \ArtRequest\Service\Entity\ArtRequestServiceEntity;

class BannerArtRequestModel
{
    
    /**
     * Create New Banner Request
     * 
     * @param integer $artRequestId
     * @param \ArtRequest\Service\Entity\ArtRequestServiceEntity $e
     * @return integer Banner Art Request Id
     * @throws ModelException 
     */
    public function create($artRequestId, ArtRequestServiceEntity $e)
    {
        try
        {
            foreach($e->getBannerLocationId() as $currentBannerLocationId) {
                $q = new \ArtRequestORM\BannerArtRequest();
                $q->setArtRequestId($artRequestId);
                $q->setBannerLocationId($currentBannerLocationId);
                $q->save();
            }
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Creating Banner Art Request', $e);
        }
    }
    
}

?>
