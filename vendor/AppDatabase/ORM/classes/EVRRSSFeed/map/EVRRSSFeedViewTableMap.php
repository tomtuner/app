<?php

namespace EVRRSSFeedORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'evr_rss_feed_view' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.EVRRSSFeed.map
 */
class EVRRSSFeedViewTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'EVRRSSFeed.map.EVRRSSFeedViewTableMap';

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
        $this->setName('evr_rss_feed_view');
        $this->setPhpName('EVRRSSFeedView');
        $this->setClassname('EVRRSSFeedORM\\EVRRSSFeedView');
        $this->setPackage('EVRRSSFeed');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('EVENT_ID', 'EventId', 'SMALLINT', true, 8, null);
        $this->addColumn('EVENT_NAME', 'EventName', 'VARCHAR', false, 100, null);
        $this->addColumn('EVENT_DESCRIPTION', 'EventDescription', 'LONGVARCHAR', false, null, null);
        $this->addColumn('EVENT_STATUS', 'EventStatus', 'VARCHAR', false, 1, null);
        $this->addColumn('EVENT_RESPONSIBLE_REPRESENTATIVE_NAME', 'EventResponsibleRepresentativeName', 'VARCHAR', false, 101, null);
        $this->addColumn('EVENT_RESPONSIBLE_REPRESENTATIVE_EMAIL_ADDRESS', 'EventResponsibleRepresentativeEmailAddress', 'VARCHAR', false, 100, null);
        $this->addColumn('EVENT_START_TIME', 'EventStartTime', 'VARCHAR', false, 85, null);
        $this->addColumn('EVENT_END_TIME', 'EventEndTime', 'VARCHAR', false, 85, null);
        $this->addColumn('EVENT_LOCATION', 'EventLocation', 'LONGVARCHAR', false, null, null);
        $this->addColumn('EVENT_COST', 'EventCost', 'VARCHAR', false, 134, null);
        $this->addColumn('EVENT_START_TIME_FILTER', 'EventStartTimeFilter', 'TIMESTAMP', false, null, null);
        $this->addColumn('EVENT_END_TIME_FILTER', 'EventEndTimeFilter', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // EVRRSSFeedViewTableMap
