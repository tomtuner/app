<?php

/**
 * Description of ArtRequestService
 *
 * @author Nikesh Hajari
 */

namespace ArtRequest\Service;

use AppCore\Exception\ServiceException;
use AppCore\Service\EventHookType;

class ArtRequestService extends \AppCore\Service\AbstractService
{

    /**
     * Add New Art Request
     * 
     * @return string Art Request Id
     * @throws ServiceException
     */
    public function add()
    {
        //create art request attachments
        $fileUploader = new \AppFileUpload\FileUploader('/home/cclweb/docs/default/app/module/ArtRequest/upload/');

        try
        {
            //art request service entity
            $artRequestServiceEntity = $this->getDataEntity('ArtRequest\Service\Entity\ArtRequestServiceEntity');

            //pre-add event
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::PRE,
                    $this, array('serviceEntity' => $artRequestServiceEntity));

            //create event
            $eventId = $this->getModel('ArtRequest\Model\EventModel')
                    ->create($artRequestServiceEntity);

            //create art requestor
            $artRequestorId = $this->getModel('ArtRequest\Model\ArtRequestorModel')
                    ->create($artRequestServiceEntity);

            //create art request
            $artRequestId = $this->getModel('ArtRequest\Model\ArtRequestModel')
                    ->create($artRequestorId, $eventId, $artRequestServiceEntity);
            
            if($artRequestServiceEntity->getHasFlyerRequest() == 'true')
            {
                //create flyer art request
                $flyerRequestId = $this->getModel('ArtRequest\Model\FlyerArtRequestModel')
                        ->create($artRequestId, $artRequestServiceEntity);
            }

            if($artRequestServiceEntity->getHasBannerRequest() == 'true')
            {
                //create banner art request
                $bannerRequestId = $this->getModel('ArtRequest\Model\BannerArtRequestModel')
                        ->create($artRequestId, $artRequestServiceEntity);
            }

            //process art request attachments
            foreach($artRequestServiceEntity->getUploadedFiles() as $attachments)
            {
                //double loop is required because $artRequestServiceEntity->getUploadedFiles() returns
                //a multi-dimensional array
                foreach($attachments as $attachment)
                {
                	if($attachment['name'] != "") {
                		$file = new \AppFileUpload\File($attachment);
                        $baseName = pathinfo($attachment['name'], PATHINFO_FILENAME);
                        $attachmentName = ($baseName . "-" . uniqid() . "." . $file->getFileExtension());
                        $file->setFileName($attachmentName);
                    	$this->getModel('ArtRequest\Model\ArtRequestAttachmentModel')
                         	->create($file->getFileName(), $artRequestId);
                    	$fileUploader->addFile($file);
                	}
                }                
            }
            
            //add art request types
            foreach($artRequestServiceEntity->getArtRequestTypes() as $artRequestTypeId)
            {
                $this->getModel('ArtRequest\Model\ArtRequestArtRequestTypeModel')
                        ->create($artRequestId, $artRequestTypeId);
            }
                                
            //save files
            $fileUploader->commit();
            
            //post-add event
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::POST,
                    $this,
                    array('serviceEntity' => $this->getDataEntity('ArtRequest\Service\Entity\ArtRequestServiceEntity'), 'result' => $artRequestId));

            //art request id
            return $artRequestId;
        } 
        catch(\Exception $e)
        {
            //roll back file upload
            $fileUploader->rollBack();
            throw new ServiceException('Error Adding Art Request', $e);
        }
    }

    /**
     * Update Art Request Status By Id
     *
     * @param $id - the id of the request to update
     * @return Boolean
     * @throws ServiceException
     */
    public function updateStatus($id)
    {
        try
        {
            //art request status service entity
            $artRequestStatusServiceEntity = $this->getDataEntity('ArtRequest\Service\Entity\ArtRequestStatusServiceEntity');

            $success = $this->getModel('ArtRequest\Model\ArtRequestModel')
                            ->updateStatus($id, $artRequestStatusServiceEntity);

            if(!$success) {
                throw new ServiceException('Could Not Update Database', $e);
            }

            return true;
        } 
        catch(\Exception $e)
        {
            throw new ServiceException('Error Updating Art Request Status', $e);
        }
    }

    /**
     * Get All Art Requests
     * 
     * @param $archived - get all non-archived (0), or archived (1)
     * 
     * @return PropelObjectCollection
     * @throws ServiceException 
     */
    public function getAll($archived)
    {
        try
        {
            //pre-method hook
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::PRE, $this);

            //get art request collection
            $artRequestCollection = $this->getModel('ArtRequest\Model\ArtRequestModel')->findAll($archived);
 
            //post-method hook
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::POST,
                    $this,
                    array('result' => $artRequestCollection));

            //art request collection
            return $artRequestCollection;
        } 
        catch(\Exception $e)
        {
            throw new ServiceException('Error Retrieving Art Requests', $e);
        }
    }

    /**
     * Get Art Request
     *
     * @return PropelObjectCollection
     * @throws ServiceException 
     */
    public function getOne()
    {
        try
        {
            //service entity
            $artRequestServiceEntity = $this->getDataEntity('ArtRequest\Service\Entity\ArtRequestServiceEntity');

            //pre-method hook
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::PRE, $this);

            //get art request
            $artRequest = $this->getModel('ArtRequest\Model\ArtRequestModel')->findOne($artRequestServiceEntity);
 
            //post-method hook
            $this->getEventManager()->trigger(__FUNCTION__ . EventHookType::POST,
                    $this,
                    array('result' => $artRequestCollection));

            //art request
            return $artRequest;
        } 
        catch(\Exception $e)
        {
            throw new ServiceException('Error Retrieving Art Request', $e);
        }
    }

}

?>