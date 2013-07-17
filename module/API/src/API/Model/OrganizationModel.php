<?php

/**
 * Description of OrganizationModel
 *
 * @author Nikesh Hajari
 */

namespace API\Model;

use API\Service\Organization\Entity\OrganizationServiceEntity;
use AppCore\Search\SearchQuery;

class OrganizationModel
{
    
    /**
     * Find
     * 
     * @param \API\Service\Organization\Entity\OrganizationServiceEntity $entity
     * @return type
     */
    public function find(OrganizationServiceEntity $entity)
    {
        $query = $this->buildSearchQuery($entity)
                      ->find();        
        
        return $query;
    }
    
    /**
     * Build Search Query
     * 
     * @todo Abstract Into Better Function - Look at adding method names
     * to search method array and looping through it to _OR it all
     * @param type $entity
     * @return \OrganizationsORM\OrganizationsQuery
     */
    private function buildSearchQuery($entity)
    {
       
       $query = \OrganizationsORM\OrganizationsQuery::create();
       
       if(!is_null($entity->getOrganizationName()))
       {
           $query->filterByName('%'.$entity->getOrganizationName().'%', \OrganizationsORM\OrganizationsQuery::LIKE);
       }
       
       if(!is_null($entity->getOrganizationAcronym()))
       {
           $query->_or();
           $query->filterByAcronym('%'.$entity->getOrganizationAcronym().'%', \OrganizationsORM\OrganizationsQuery::LIKE);
       }
       
       return $query;
       
    }
    
    private function buildNewSearchQuery($entity)
    {
       $query = \OrganizationsORM\OrganizationsQuery::create();
       
       foreach($entity->getSearchFields() as $fieldName)
       {
           $query->condition($fieldName, $fieldName . ' = ?', '%'.$entity->get.$fieldName.'()'.'%');
       }
       
       //get fields array
       //check for or OR and
      $query->where(array($entity->getSearchFields()), 'or');
        
    }

}

?>
