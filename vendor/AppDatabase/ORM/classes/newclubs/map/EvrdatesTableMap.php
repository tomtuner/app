<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'evrdates' table.
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
class EvrdatesTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.EvrdatesTableMap';

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
		$this->setName('evrdates');
		$this->setPhpName('Evrdates');
		$this->setClassname('NewClubsORM\\Evrdates');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('DATE', 'Date', 'DATE', true, null, '0000-00-00');
		$this->addColumn('START_TIME', 'StartTime', 'TIME', true, null, '00:00:00');
		$this->addColumn('END_TIME', 'EndTime', 'TIME', true, null, '00:00:00');
		$this->addColumn('LOCATION', 'Location', 'VARCHAR', true, 25, '');
		$this->addColumn('YEAR', 'Year', 'VARCHAR', true, 6, '');
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // EvrdatesTableMap
