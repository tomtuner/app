<?php

namespace UsersORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'users2' table.
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
class Users2TableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'users.map.Users2TableMap';

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
		$this->setName('users2');
		$this->setPhpName('Users2');
		$this->setClassname('UsersORM\\Users2');
		$this->setPackage('users');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'SMALLINT', true, 8, null);
		$this->addColumn('UID', 'Uid', 'VARCHAR', false, 9, null);
		$this->addColumn('USERNAME', 'Username', 'VARCHAR', false, 8, null);
		$this->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', true, 50, '');
		$this->addColumn('LAST_NAME', 'LastName', 'VARCHAR', true, 50, '');
		$this->addColumn('HEARING_IMPAIRED', 'HearingImpaired', 'CHAR', false, 3, null);
		$this->addColumn('PREF_COMM_METHOD', 'PrefCommMethod', 'VARCHAR', false, 50, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 100, null);
		$this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 10, null);
		$this->addColumn('ADDRESS', 'Address', 'LONGVARCHAR', false, null, null);
		$this->addColumn('SCREEN_NAME', 'ScreenName', 'VARCHAR', false, 50, null);
		$this->addColumn('MIDDLE_INITIAL', 'MiddleInitial', 'CHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // Users2TableMap
