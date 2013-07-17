<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'memberlog' table.
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
class MemberlogTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.MemberlogTableMap';

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
		$this->setName('memberlog');
		$this->setPhpName('Memberlog');
		$this->setClassname('NewClubsORM\\Memberlog');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('LOG_ID', 'LogId', 'SMALLINT', true, 11, null);
		$this->addColumn('USER_ID', 'UserId', 'SMALLINT', true, 11, 0);
		$this->addColumn('ORG_ID', 'OrgId', 'SMALLINT', true, 11, 0);
		$this->addColumn('POSITION_ID', 'PositionId', 'SMALLINT', true, 11, 0);
		$this->addColumn('TIMESTAMP', 'Timestamp', 'DOUBLE', true, null, 0);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // MemberlogTableMap
