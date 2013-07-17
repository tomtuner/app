<?php

namespace NewClubsORM\map;

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
 * @package    propel.generator.newclubs.map
 */
class QuarterlyEventsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.QuarterlyEventsTableMap';

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
		$this->setClassname('NewClubsORM\\QuarterlyEvents');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'SMALLINT', true, 8, null);
		$this->addColumn('QUARTERLY_DATA_ID', 'QuarterlyDataId', 'SMALLINT', true, 8, 0);
		$this->addColumn('TYPE', 'Type', 'CHAR', true, null, 'Fundraiser');
		$this->addColumn('HELD_ON', 'HeldOn', 'VARCHAR', true, 255, '');
		$this->addColumn('NUM_MEMBERS', 'NumMembers', 'SMALLINT', false, 5, null);
		$this->addColumn('NUM_OUTSIDE', 'NumOutside', 'SMALLINT', false, 5, null);
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
