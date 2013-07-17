<?php

/**
 * Description of ArtRequestorModel
 *
 * @author Nikesh Hajari
 */

namespace ArtRequest\Model;

use \AppCore\Exception\ModelException;
use \ArtRequest\Service\Entity\ArtRequestServiceEntity;

class ArtRequestorModel
{

    /**
     * Create's new art requestor if one does not exist otherwise
     * the ID of the existing requestor Id is returned
     * 
     * @param \ArtRequest\Service\Entity\ArtRequestServiceEntity $e
     * @return integer Art Requestor Id
     * @throws ModelException
     */
    public function create(ArtRequestServiceEntity $e)
    {
        
        try
        {        
            $q = \ArtRequestORM\ArtRequestorQuery::create()
                        ->filterByDceName($e->getRequestorDCE())
                        ->findOneOrCreate();
            
            if($q->isNew())
            {
                $q->setFirstName($e->getRequestorFirstName());
                $q->setLastName($e->getRequestorLastName());
                $q->setEmailAddress($e->getRequestorEmail());
                $q->setPhoneNumber($e->getRequestorPhoneNumber());
                $q->save();
            }
            
            return $q->getArtRequestorId();
            
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Creating Art Requestor', $e);
        }
        
    }
}

?>