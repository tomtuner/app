<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'positions' table.
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
class PositionsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.PositionsTableMap';

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
		$this->setName('positions');
		$this->setPhpName('Positions');
		$this->setClassname('NewClubsORM\\Positions');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('ORG_ID', 'OrgId', 'INTEGER', true, null, null);
		$this->addColumn('EBOARD', 'Eboard', 'SMALLINT', true, null, null);
		$this->addColumn('IS_PRESIDENT', 'IsPresident', 'SMALLINT', true, null, 0);
		$this->addColumn('DATE_ADDED', 'DateAdded', 'DATE', true, null, null);
		$this->addColumn('POSITION', 'Position', 'VARCHAR', true, 50, '');
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // PositionsTableMap
