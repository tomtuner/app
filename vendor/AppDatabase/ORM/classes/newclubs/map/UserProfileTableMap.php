<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'user_profile' table.
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
class UserProfileTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.UserProfileTableMap';

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
		$this->setName('user_profile');
		$this->setPhpName('UserProfile');
		$this->setClassname('NewClubsORM\\UserProfile');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('USER_ID', 'UserId', 'INTEGER', true, null, 0);
		$this->addColumn('TYPE', 'Type', 'CHAR', true, null, 's');
		$this->addColumn('SEND_EMAIL', 'SendEmail', 'INTEGER', true, 1, 0);
		$this->addColumn('PREFFERED_EMAIL', 'PrefferedEmail', 'VARCHAR', true, 40, '');
		$this->addColumn('HOME_PHONE', 'HomePhone', 'VARCHAR', true, 12, '');
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // UserProfileTableMap
