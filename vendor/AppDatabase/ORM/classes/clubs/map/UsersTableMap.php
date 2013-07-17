<?php

namespace ClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'users' table.
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
class UsersTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'clubs.map.UsersTableMap';

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
		$this->setName('users');
		$this->setPhpName('Users');
		$this->setClassname('ClubsORM\\Users');
		$this->setPackage('clubs');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('USER_ID', 'UserId', 'SMALLINT', true, 8, 0);
		$this->addColumn('LEVEL', 'Level', 'TINYINT', true, 3, 1);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // UsersTableMap
