<?php

namespace OrganizationsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'advisors' table.
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
class AdvisorsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'organizations.map.AdvisorsTableMap';

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
		$this->setName('advisors');
		$this->setPhpName('Advisors');
		$this->setClassname('OrganizationsORM\\Advisors');
		$this->setPackage('organizations');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('USER_ID', 'UserId', 'INTEGER', true, 10, 0);
		$this->addColumn('CAMPUS_PHONE', 'CampusPhone', 'VARCHAR', false, 10, null);
		$this->addColumn('ORG_ID', 'OrgId', 'INTEGER', true, 10, 0);
		$this->addColumn('ACTIVE', 'Active', 'INTEGER', true, null, 1);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // AdvisorsTableMap
