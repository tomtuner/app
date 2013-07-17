<?php

namespace OrganizationsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'organizations' table.
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
class OrganizationsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'organizations.map.OrganizationsTableMap';

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
		$this->setName('organizations');
		$this->setPhpName('Organizations');
		$this->setClassname('OrganizationsORM\\Organizations');
		$this->setPackage('organizations');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'SMALLINT', true, 5, null);
		$this->addColumn('CATEGORY_ID', 'CategoryId', 'TINYINT', true, 3, 0);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 100, '');
		$this->addColumn('ACRONYM', 'Acronym', 'VARCHAR', false, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // OrganizationsTableMap
