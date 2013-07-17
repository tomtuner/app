<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'memberlist_archive' table.
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
class MemberlistArchiveTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.MemberlistArchiveTableMap';

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
		$this->setName('memberlist_archive');
		$this->setPhpName('MemberlistArchive');
		$this->setClassname('NewClubsORM\\MemberlistArchive');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('ORG_ID', 'OrgId', 'INTEGER', true, null, null);
		$this->addColumn('MEMBERS', 'Members', 'LONGVARCHAR', true, null, null);
		$this->addColumn('SUBMITTER', 'Submitter', 'VARCHAR', true, 50, null);
		$this->addColumn('DATE', 'Date', 'DATE', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // MemberlistArchiveTableMap
