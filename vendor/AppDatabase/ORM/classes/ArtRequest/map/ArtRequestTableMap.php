<?php

namespace ArtRequestORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'art_request' table.
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
class ArtRequestTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ArtRequest.map.ArtRequestTableMap';

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
        $this->setName('art_request');
        $this->setPhpName('ArtRequest');
        $this->setClassname('ArtRequestORM\\ArtRequest');
        $this->setPackage('ArtRequest');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ART_REQUEST_ID', 'ArtRequestId', 'INTEGER', true, null, null);
        $this->addColumn('IS_STARTED', 'IsStarted', 'BOOLEAN', true, 1, false);
        $this->addColumn('IS_COMPLETED', 'IsCompleted', 'BOOLEAN', true, 1, false);
        $this->addColumn('IS_ARCHIVED', 'IsArchived', 'BOOLEAN', true, 1, false);
        $this->addColumn('DUE_DATE', 'DueDate', 'DATE', true, null, null);
        $this->addForeignKey('ART_REQUESTOR_ID', 'ArtRequestorId', 'INTEGER', 'art_requestor', 'ART_REQUESTOR_ID', true, null, null);
        $this->addForeignKey('EVENT_ID', 'EventId', 'INTEGER', 'event', 'EVENT_ID', true, null, null);
        $this->addColumn('ART_REQUEST_DESCRIPTION', 'ArtRequestDescription', 'LONGVARCHAR', true, null, null);
        $this->addColumn('SUBMISSION_DATE', 'SubmissionDate', 'TIMESTAMP', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ArtRequestor', 'ArtRequestORM\\ArtRequestor', RelationMap::MANY_TO_ONE, array('art_requestor_id' => 'art_requestor_id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Event', 'ArtRequestORM\\Event', RelationMap::MANY_TO_ONE, array('event_id' => 'event_id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('ArtRequestArtRequestType', 'ArtRequestORM\\ArtRequestArtRequestType', RelationMap::ONE_TO_MANY, array('art_request_id' => 'art_request_id', ), 'CASCADE', 'CASCADE', 'ArtRequestArtRequestTypes');
        $this->addRelation('ArtRequestAssignment', 'ArtRequestORM\\ArtRequestAssignment', RelationMap::ONE_TO_MANY, array('art_request_id' => 'art_request_id', ), 'CASCADE', 'CASCADE', 'ArtRequestAssignments');
        $this->addRelation('ArtRequestAttachment', 'ArtRequestORM\\ArtRequestAttachment', RelationMap::ONE_TO_MANY, array('art_request_id' => 'art_request_id', ), 'CASCADE', 'CASCADE', 'ArtRequestAttachments');
        $this->addRelation('BannerArtRequest', 'ArtRequestORM\\BannerArtRequest', RelationMap::ONE_TO_MANY, array('art_request_id' => 'art_request_id', ), 'CASCADE', 'CASCADE', 'BannerArtRequests');
        $this->addRelation('FlyerArtRequest', 'ArtRequestORM\\FlyerArtRequest', RelationMap::ONE_TO_MANY, array('art_request_id' => 'art_request_id', ), 'CASCADE', 'CASCADE', 'FlyerArtRequests');
    } // buildRelations()

} // ArtRequestTableMap
