<?php

namespace API\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use AppCore\Exception\ControllerException;
use Zend\View\Model\JsonModel;

class OrganizationController extends AbstractActionController
{

    /**
     * Search
     * @throws \AppCore\Exception\ControllerException
     */
    public function searchAction()
    {
        try
        {
            $sE = new \API\Service\Organization\Entity\OrganizationServiceEntity($this->getRequest()->getQuery()); //change to post or query
            $m = new \API\Model\OrganizationModel();
            $s = new \API\Service\Organization\OrganizationService($sE, $m);
            
            $c = new \AppDatabase\Connection\ConnectionFactory();
            $c->getConnectionInstance(\AppDatabase\Connection\ConnectionName::ORGANIZATIONS);
            
            $result = new JsonModel(array(
                        'status' => 'true',
                        'results' => $s->find()->toArray()
                    ));

            return $result;
        } catch(\Exception $e)
        {
            throw new ControllerException('Error Executing Search Action', $e);
        }
    }

}

?>
