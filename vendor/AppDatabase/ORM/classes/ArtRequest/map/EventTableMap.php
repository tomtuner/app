<?php

namespace ArtRequestORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'event' table.
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
class EventTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ArtRequest.map.EventTableMap';

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
        $this->setName('event');
        $this->setPhpName('Event');
        $this->setClassname('ArtRequestORM\\Event');
        $this->setPackage('ArtRequest');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('EVENT_ID', 'EventId', 'INTEGER', true, null, null);
        $this->addColumn('EVENT_TITLE', 'EventTitle', 'VARCHAR', true, 100, null);
        $this->addColumn('EVENT_DESCRIPTION', 'EventDescription', 'LONGVARCHAR', true, null, null);
        $this->addColumn('EVENT_LOCATION', 'EventLocation', 'VARCHAR', true, 100, null);
        $this->addColumn('EVENT_SPONSOR_NAME', 'EventSponsorName', 'VARCHAR', true, 100, null);
        $this->addColumn('EVENT_START_TIME', 'EventStartTime', 'VARCHAR', true, 10, null);
        $this->addColumn('EVENT_END_TIME', 'EventEndTime', 'VARCHAR', true, 10, null);
        $this->addColumn('EVENT_START_DATE', 'EventStartDate', 'DATE', true, null, null);
        $this->addColumn('EVENT_END_DATE', 'EventEndDate', 'DATE', true, null, null);
        $this->addColumn('EVENT_PRICING_MEMBER', 'EventPricingMember', 'DECIMAL', true, null, null);
        $this->addColumn('EVENT_PRICING_STAFF', 'EventPricingStaff', 'DECIMAL', true, null, null);
        $this->addColumn('EVENT_PRICING_STUDENT', 'EventPricingStudent', 'DECIMAL', true, null, null);
        $this->addColumn('EVENT_PRICING_PUBLIC', 'EventPricingPublic', 'DECIMAL', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('ArtRequest', 'ArtRequestORM\\ArtRequest', RelationMap::ONE_TO_MANY, array('event_id' => 'event_id', ), 'CASCADE', 'CASCADE', 'ArtRequests');
    } // buildRelations()

} // EventTableMap
