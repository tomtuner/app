<?php

namespace ArtRequestORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'banner_location' table.
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
class BannerLocationTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ArtRequest.map.BannerLocationTableMap';

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
        $this->setName('banner_location');
        $this->setPhpName('BannerLocation');
        $this->setClassname('ArtRequestORM\\BannerLocation');
        $this->setPackage('ArtRequest');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('BANNER_LOCATION_ID', 'BannerLocationId', 'INTEGER', true, null, null);
        $this->addColumn('BANNER_LOCATION_NAME', 'BannerLocationName', 'VARCHAR', true, 100, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('BannerArtRequest', 'ArtRequestORM\\BannerArtRequest', RelationMap::ONE_TO_MANY, array('banner_location_id' => 'banner_location_id', ), 'CASCADE', 'CASCADE', 'BannerArtRequests');
    } // buildRelations()

} // BannerLocationTableMap
