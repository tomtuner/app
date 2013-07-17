<?php

namespace ArtRequestORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'art_requestor_art_request_type' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.ArtRequest.map
 */
class ArtRequestorArtRequestTypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ArtRequest.map.ArtRequestorArtRequestTypeTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('art_requestor_art_request_type');
        $this->setPhpName('ArtRequestorArtRequestType');
        $this->setClassname('ArtRequestORM\\ArtRequestorArtRequestType');
        $this->setPackage('ArtRequest');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('ART_REQUEST_TYPE_ID', 'ArtRequestTypeId', 'INTEGER' , 'art_request_type', 'ART_REQUEST_TYPE_ID', true, null, null);
        $this->addForeignPrimaryKey('ART_REQUEST_ID', 'ArtRequestId', 'INTEGER' , 'art_request', 'ART_REQUEST_ID', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ArtRequest', 'ArtRequestORM\\ArtRequest', RelationMap::MANY_TO_ONE, array('art_request_id' => 'art_request_id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('ArtRequestType', 'ArtRequestORM\\ArtRequestType', RelationMap::MANY_TO_ONE, array('art_request_type_id' => 'art_request_type_id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ArtRequestorArtRequestTypeTableMap
