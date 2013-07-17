<?php

namespace ClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'officers' table.
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
class OfficersTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'clubs.map.OfficersTableMap';

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
		$this->setName('officers');
		$this->setPhpName('Officers');
		$this->setClassname('ClubsORM\\Officers');
		$this->setPackage('clubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'SMALLINT', true, 8, null);
		$this->addColumn('OFFICER_LIST_ID', 'OfficerListId', 'SMALLINT', true, 8, 0);
		$this->addColumn('USER_ID', 'UserId', 'SMALLINT', true, 8, 0);
		$this->addColumn('TITLE', 'Title', 'VARCHAR', true, 50, '');
		$this->addColumn('SEND_EMAILS', 'SendEmails', 'BOOLEAN', true, 1, false);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // OfficersTableMap
