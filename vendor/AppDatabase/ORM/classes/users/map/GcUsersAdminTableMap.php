<?php

namespace UsersORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'gc_users_admin' table.
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
class GcUsersAdminTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'users.map.GcUsersAdminTableMap';

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
		$this->setName('gc_users_admin');
		$this->setPhpName('GcUsersAdmin');
		$this->setClassname('UsersORM\\GcUsersAdmin');
		$this->setPackage('users');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('USER_ID', 'UserId', 'SMALLINT', true, 4, null);
		$this->addColumn('USERNAME', 'Username', 'VARCHAR', true, 100, null);
		$this->addColumn('FIRSTNAME', 'Firstname', 'VARCHAR', true, 100, null);
		$this->addColumn('LASTNAME', 'Lastname', 'VARCHAR', true, 100, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // GcUsersAdminTableMap
