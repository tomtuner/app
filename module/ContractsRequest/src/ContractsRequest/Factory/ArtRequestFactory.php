<?php

/**
 * Description of ArtRequestFactory
 *
 * @author Nikesh Hajari
 */

namespace ArtRequest\Factory;

use \AppCore\Exception\ApplicationException;

class ArtRequestFactory
{
    
    /**
     * Get Art Request Type
     * @param string $artRequestType
     * @throws ApplicationException 
     * @return object|null Returns NULL if Model Type Exists
     */
    public function getArtRequestType($artRequestType)
    {
        switch($artRequestType)
        {
           
            case \ArtRequest\Factory\ArtRequestType::BANNER_REQUEST:
                return new \ArtRequest\Model\BannerRequestModel();
                break;
            case \ArtRequest\Factory\ArtRequestType::FLYER_REQUEST:
                return new \ArtRequest\Model\FlyerArtRequestModel();
                break;
            case \ArtRequest\Factory\ArtRequestType::LCD_SCREEN_REQUEST:
                return null;
                break;
            case \ArtRequest\Factory\ArtRequestType::LOGO_REQUEST:
                return new \ArtRequest\Model\LogoArtRequestModel();
                break;
            case \ArtRequest\Factory\ArtRequestType::OTHER_REQUEST:
                return new \ArtRequest\Model\OtherArtRequestModel();
                break;
            case \ArtRequest\Factory\ArtRequestType::POSTCARD_REQUEST:
                return null;
                break;
            case \ArtRequest\Factory\ArtRequestType::TABLE_TENT_REQUEST:
                return null;
                break;
            case \ArtRequest\Factory\ArtRequestType::TICKET_REQUEST:
                return null;
                break;
            case \ArtRequest\Factory\ArtRequestType::WINDOW_REQUEST:
                return null;
                break;
            default:
                throw new ApplicationException('Invalid Art Request Type');
        }
        
    }
    
}

?>
