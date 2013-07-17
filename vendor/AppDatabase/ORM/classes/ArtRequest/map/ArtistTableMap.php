<?php

namespace ArtRequestORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'artist' table.
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
class ArtistTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ArtRequest.map.ArtistTableMap';

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
        $this->setName('artist');
        $this->setPhpName('Artist');
        $this->setClassname('ArtRequestORM\\Artist');
        $this->setPackage('ArtRequest');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ARTIST_ID', 'ArtistId', 'INTEGER', true, null, null);
        $this->addColumn('ARTIST_DCE_NAME', 'ArtistDceName', 'VARCHAR', true, 10, null);
        $this->addColumn('ARTIST_FIRST_NAME', 'ArtistFirstName', 'VARCHAR', true, 100, null);
        $this->addColumn('ARTIST_LAST_NAME', 'ArtistLastName', 'VARCHAR', true, 100, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ArtRequestAssignment', 'ArtRequestORM\\ArtRequestAssignment', RelationMap::ONE_TO_MANY, array('artist_id' => 'artist_id', ), 'CASCADE', 'CASCADE', 'ArtRequestAssignments');
    } // buildRelations()

} // ArtistTableMap
