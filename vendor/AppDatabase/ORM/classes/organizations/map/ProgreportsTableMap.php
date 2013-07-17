<?php

namespace OrganizationsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'progreports' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.organizations.map
 */
class ProgreportsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'organizations.map.ProgreportsTableMap';

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
		$this->setName('progreports');
		$this->setPhpName('Progreports');
		$this->setClassname('OrganizationsORM\\Progreports');
		$this->setPackage('organizations');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('ORG_ID', 'OrgId', 'INTEGER', true, null, 0);
		$this->addColumn('DATE', 'Date', 'DATE', true, null, '0000-00-00');
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 100, null);
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', true, null, null);
		$this->addColumn('NUMMEM', 'Nummem', 'INTEGER', true, null, 0);
		$this->addColumn('TYPE', 'Type', 'INTEGER', true, null, 0);
		$this->addColumn('PARTICIPATION', 'Participation', 'INTEGER', true, null, 0);
		$this->addColumn('VIEWED', 'Viewed', 'BOOLEAN', true, 1, false);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // ProgreportsTableMap
