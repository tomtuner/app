<?php

/**
 * Description of ArtRequestModel
 *
 * @author Nikesh Hajari
 */

namespace ArtRequest\Model;

use \AppCore\Exception\ModelException;
use \ArtRequest\Service\Entity\ArtRequestServiceEntity;
use \ArtRequest\Service\Entity\ArtRequestStatusServiceEntity;

class ArtRequestModel
{
    
    /**
     * Create New Art Request
     * 
     * @param integer $artRequestorId
     * @param \ArtRequest\Service\Entity\ArtRequestServiceEntity $e
     * @return integer Art Request Id
     * @throws ModelException 
     */
    public function create($artRequestorId, $eventId, ArtRequestServiceEntity $e)
    {
        
        try
        {
            $q = new \ArtRequestORM\ArtRequest();
            $q->setIsStarted(false);
            $q->setIsCompleted(false);
            $q->setIsArchived(false);
            $q->setArtRequestDescription($e->getArtRequestDescription());
            $q->setDueDate($e->getRequestDueDate());
            $q->setArtRequestorId($artRequestorId); 
            $q->setSubmissionDate('now');
            $q->setEventId($eventId);
            $q->save();
                        
            return $q->getArtRequestId();
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Creating Art Request', $e);
        }
        
    }

    /**
     * Update Art Request Status
     *
     * @param integer $artRequestId
     * @param \ArtRequest\Service\Entity\ArtRequestStatusServiceEntity $e
     * @return boolean was successful
     */
    public function updateStatus($artRequestId, ArtRequestStatusServiceEntity $e) {
        $a = \ArtRequestORM\ArtRequestQuery::create()
                ->filterByArtRequestId($artRequestId)
                ->findOne();
        if(!$a) {
            return false;
        }
        $a->setIsStarted($e->getIsStarted());
        $a->setIsCompleted($e->getIsCompleted());
        $a->setIsArchived($e->getIsArchived());
        $a->save();
        
        \ArtRequestORM\ArtRequestAssignmentQuery::create()
                ->filterByArtRequestId($artRequestId)
                ->delete();
        if ($e->getArtistIds()) {
            foreach($e->getArtistIds() as $artistIdToAdd) {
                $t = new \ArtRequestORM\ArtRequestAssignment();
                $t->setArtRequestId($artRequestId);
                $t->setArtistId($artistIdToAdd);
                $t->save();
            }
        }

        return true;
    }

    /**
     * Find All Art Requests
     *
     * @param $archived - find all non-archived (0), or archived (1)
     * 
     * @return PropelObjectCollection
     * @throws ModelException
     */
    public function findAll($archived)
    {
        try
        {
            $q = \ArtRequestORM\ArtRequestQuery::create()
                    ->filterByIsArchived($archived)
                    ->find();
                    
            return $q;
        }
        catch(\Exception $e)
        {
            throw new ModelException('Error Retrieving Art Requests', $e);
        }
    }

    /**
     * Find One Art Request
     * 
     * @return PropelObjectCollection
     * @throws ModelException
     * @throws TransactionException
     */
    public function findOne(ArtRequestServiceEntity $e)
    {
        try
        {
            $a = \ArtRequestORM\ArtRequestQuery::create()
                    ->filterByArtRequestId($e->getArtRequestId())
                    ->findOne();

            if($a)
            {
                return $a;
            }

            throw new TransactionException('Error Finding Record for Art Request');
        } catch(\Exception $e)
        {
            throw new ModelException('Error Finding Art Request', $e);
        }
    }
    
}

?>