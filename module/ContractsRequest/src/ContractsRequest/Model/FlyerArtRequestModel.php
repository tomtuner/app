<?php

/**
 * Description of FlyerArtRequestModel
 *
 * @author Nikesh Hajari
 */

namespace ArtRequest\Model;

use \AppCore\Exception\ModelException;
use \ArtRequest\Service\Entity\ArtRequestServiceEntity;

class FlyerArtRequestModel
{
    /**
     * Create New Flyer Art Request
     * 
     * @param integer $artRequestId
     * @param \ArtRequest\Service\Entity\ArtRequestServiceEntity $e
     * @return integer Flyer Art Request Id
     * @throws ModelException
     */
    public function create($artRequestId, ArtRequestServiceEntity $e)
    {
        
        try
        {
            $q = new \ArtRequestORM\FlyerArtRequest();
            $q->setArtRequestId($artRequestId);
            $q->setFlyerSizeId($e->getFlyerSizeId());
            $q->setFlyerFormatId($e->getFlyerFormatId());
            $q->save();
                        
            return $q->getFlyerArtRequestId();
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Creating Flyer Art Request', $e);
        }
    }
    
}

?>
