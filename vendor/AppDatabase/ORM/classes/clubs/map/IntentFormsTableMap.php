<?php

namespace ClubsORM\map;

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
 * @package    propel.generator.clubs.map
 */
class IntentFormsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'clubs.map.IntentFormsTableMap';

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
		$this->setClassname('ClubsORM\\IntentForms');
		$this->setPackage('clubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'SMALLINT', true, 8, null);
		$this->addColumn('STATUS', 'Status', 'CHAR', true, null, 'Pending');
		$this->addColumn('CLUB_NAME', 'ClubName', 'VARCHAR', true, 255, '');
		$this->addColumn('ACRONYM', 'Acronym', 'VARCHAR', true, 10, '');
		$this->addColumn('CONTACT_ID', 'ContactId', 'SMALLINT', true, 8, 0);
		$this->addColumn('SUBMITTED_ON', 'SubmittedOn', 'DATE', true, null, '0000-00-00');
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // IntentFormsTableMap
