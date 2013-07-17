<?php

namespace ClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'quarterly_events' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.clubs.map
 */
class QuarterlyEventsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'clubs.map.QuarterlyEventsTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
		// attributes
		$this->setName('quarterly_events');
		$this->setPhpName('QuarterlyEvents');
		$this->setClassname('ClubsORM\\QuarterlyEvents');
		$this->setPackage('clubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'SMALLINT', true, 8, null);
		$this->addColumn('QUARTERLY_REPORT_ID', 'QuarterlyReportId', 'SMALLINT', true, 8, 0);
		$this->addColumn('QUARTERLY_EVENT_TYPE_ID', 'QuarterlyEventTypeId', 'TINYINT', true, 3, 0);
		$this->addColumn('HELD_ON', 'HeldOn', 'VARCHAR', true, 50, '');
		$this->addColumn('NUM_MEMBERS', 'NumMembers', 'SMALLINT', true, 5, 0);
		$this->addColumn('NUM_OUTSIDE', 'NumOutside', 'SMALLINT', true, 5, 0);
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // QuarterlyEventsTableMap
