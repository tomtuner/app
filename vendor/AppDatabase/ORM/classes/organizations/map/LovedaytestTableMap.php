<?php

namespace OrganizationsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'lovedaytest' table.
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
class LovedaytestTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'organizations.map.LovedaytestTableMap';

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
		$this->setName('lovedaytest');
		$this->setPhpName('Lovedaytest');
		$this->setClassname('OrganizationsORM\\Lovedaytest');
		$this->setPackage('organizations');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'TINYINT', true, null, null);
		$this->addColumn('CLUBNAME', 'Clubname', 'VARCHAR', true, 50, null);
		$this->addColumn('CONTACTNAME', 'Contactname', 'VARCHAR', true, 50, null);
		$this->addColumn('CONTACTEMAIL', 'Contactemail', 'VARCHAR', true, 50, null);
		$this->addColumn('ACTIVITY', 'Activity', 'LONGVARCHAR', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // LovedaytestTableMap
