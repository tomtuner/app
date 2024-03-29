<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'log' table.
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
class LogTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.LogTableMap';

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
		$this->setName('log');
		$this->setPhpName('Log');
		$this->setClassname('NewClubsORM\\Log');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'SMALLINT', true, 11, null);
		$this->addColumn('USERID', 'Userid', 'VARCHAR', true, 10, '');
		$this->addColumn('MODE', 'Mode', 'VARCHAR', true, 20, '');
		$this->addColumn('PAGE', 'Page', 'VARCHAR', true, 20, '');
		$this->addColumn('DATA', 'Data', 'LONGVARCHAR', true, null, null);
		$this->addColumn('DATE', 'Date', 'DATE', true, null, '0000-00-00');
		$this->addColumn('TIME', 'Time', 'TIME', true, null, '00:00:00');
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // LogTableMap
