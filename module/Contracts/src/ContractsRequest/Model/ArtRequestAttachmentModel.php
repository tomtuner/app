<?php

/**
 * Description of ArtRequestAttachmentModel
 *
 * @author Nikesh Hajari
 */

namespace ArtRequest\Model;

use \AppCore\Exception\ModelException;

class ArtRequestAttachmentModel
{
    
    /**
     * Create Art Request Attachment
     * 
     * @param string $fileName
     * @param integer $artRequestId
     * @return integer Art Request Document Id
     * @throws ModelException 
     */
    public function create($fileName, $artRequestId)
    {
        
        try
        {
            $q = new \ArtRequestORM\ArtRequestAttachment();
            $q->setArtRequestId($artRequestId);
            $q->setFileName($fileName);
            $q->save();
                        
            return $q->getArtRequestAttachmentId();
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Creating New Art Request Attachment', $e);
        }
    }
    
}

?>
