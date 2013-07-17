<?php

namespace ArtRequestORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'art_request_assignment' table.
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
class ArtRequestAssignmentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ArtRequest.map.ArtRequestAssignmentTableMap';

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
        $this->setName('art_request_assignment');
        $this->setPhpName('ArtRequestAssignment');
        $this->setClassname('ArtRequestORM\\ArtRequestAssignment');
        $this->setPackage('ArtRequest');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('ART_REQUEST_ID', 'ArtRequestId', 'INTEGER' , 'art_request', 'ART_REQUEST_ID', true, null, null);
        $this->addForeignPrimaryKey('ARTIST_ID', 'ArtistId', 'INTEGER' , 'artist', 'ARTIST_ID', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ArtRequest', 'ArtRequestORM\\ArtRequest', RelationMap::MANY_TO_ONE, array('art_request_id' => 'art_request_id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Artist', 'ArtRequestORM\\Artist', RelationMap::MANY_TO_ONE, array('artist_id' => 'artist_id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ArtRequestAssignmentTableMap
