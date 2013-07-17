<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'holds' table.
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
class HoldsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.HoldsTableMap';

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
		$this->setName('holds');
		$this->setPhpName('Holds');
		$this->setClassname('NewClubsORM\\Holds');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('HOLD_ID', 'HoldId', 'INTEGER', true, 10, null);
		$this->addColumn('ORG_ID', 'OrgId', 'INTEGER', true, 10, 0);
		$this->addColumn('START_DATE', 'StartDate', 'DATE', true, null, '0000-00-00');
		$this->addColumn('REASON', 'Reason', 'LONGVARCHAR', true, null, null);
		$this->addColumn('END_DATE', 'EndDate', 'DATE', true, null, '0000-00-00');
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // HoldsTableMap
