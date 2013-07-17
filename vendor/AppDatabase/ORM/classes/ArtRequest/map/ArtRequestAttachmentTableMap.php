<?php

namespace ArtRequestORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'art_request_attachment' table.
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
class ArtRequestAttachmentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ArtRequest.map.ArtRequestAttachmentTableMap';

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
        $this->setName('art_request_attachment');
        $this->setPhpName('ArtRequestAttachment');
        $this->setClassname('ArtRequestORM\\ArtRequestAttachment');
        $this->setPackage('ArtRequest');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ART_REQUEST_ATTACHMENT_ID', 'ArtRequestAttachmentId', 'INTEGER', true, null, null);
        $this->addForeignKey('ART_REQUEST_ID', 'ArtRequestId', 'INTEGER', 'art_request', 'ART_REQUEST_ID', true, null, null);
        $this->addColumn('FILE_NAME', 'FileName', 'VARCHAR', true, 100, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ArtRequest', 'ArtRequestORM\\ArtRequest', RelationMap::MANY_TO_ONE, array('art_request_id' => 'art_request_id', ), 'CASCADE', 'CASCADE');
    } // buildRelations()

} // ArtRequestAttachmentTableMap
