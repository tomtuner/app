<?php

/**
 * Description of ArtRequestArtStatusModel
 *
 * @author Nikesh Hajari
 */

namespace ArtRequest\Model;

use \AppCore\Exception\ModelException;

class ArtRequestArtRequestTypeModel
{
    
    /**
     * New Art Requestor Art Request Type
     * 
     * @param integer $artRequestorId
     * @param integer $artRequestId
     * @return integer Art Request Id
     * @throws ModelException 
     */
    public function create($artRequestId, $artRequestTypeId)
    {
        
        try
        {
            $q = new \ArtRequestORM\ArtRequestArtRequestType();
            $q->setArtRequestId($artRequestId);
            $q->setArtRequestTypeId($artRequestTypeId); 
            $q->save();
                        
            return $q->getArtRequestId();
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Creating Art Request', $e);
        }
        
    }
    
}

?>
