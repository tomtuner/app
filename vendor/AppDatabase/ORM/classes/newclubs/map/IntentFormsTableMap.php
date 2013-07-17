<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'intent_forms' table.
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
class IntentFormsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.IntentFormsTableMap';

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
		$this->setName('intent_forms');
		$this->setPhpName('IntentForms');
		$this->setClassname('NewClubsORM\\IntentForms');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('ORG_ID', 'OrgId', 'INTEGER', true, null, null);
		$this->addColumn('DATE_SUBMITTED', 'DateSubmitted', 'DATE', true, null, '0000-00-00');
		$this->addColumn('LAST_UPDATED', 'LastUpdated', 'DATE', false, null, '0000-00-00');
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 100, '');
		$this->addColumn('ACRONYM', 'Acronym', 'VARCHAR', false, 6, null);
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', true, null, null);
		$this->addColumn('SPORTS_CLUB', 'SportsClub', 'BOOLEAN', true, 1, false);
		$this->addColumn('CONTACT', 'Contact', 'VARCHAR', true, 100, '');
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 50, '');
		$this->addColumn('STATUS', 'Status', 'CHAR', true, null, 'Pending');
		$this->addColumn('REASON', 'Reason', 'LONGVARCHAR', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // IntentFormsTableMap
