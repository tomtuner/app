<?php

namespace UsersORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'user_status' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.users.map
 */
class UserStatusTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'users.map.UserStatusTableMap';

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
		$this->setName('user_status');
		$this->setPhpName('UserStatus');
		$this->setClassname('UsersORM\\UserStatus');
		$this->setPackage('users');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('USER_ID', 'UserId', 'SMALLINT', true, 5, 0);
		$this->addPrimaryKey('STATUS_ID', 'StatusId', 'SMALLINT', true, 1, 0);
		$this->addColumn('VERIFIED', 'Verified', 'INTEGER', true, 1, 0);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // UserStatusTableMap
