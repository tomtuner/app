<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'budgets' table.
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
class BudgetsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.BudgetsTableMap';

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
		$this->setName('budgets');
		$this->setPhpName('Budgets');
		$this->setClassname('NewClubsORM\\Budgets');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('CLUB_ID', 'ClubId', 'INTEGER', true, 10, 0);
		$this->addColumn('DATE_SUBMITTED', 'DateSubmitted', 'DATE', true, null, '0000-00-00');
		$this->addColumn('AMOUNT_REQUESTED', 'AmountRequested', 'FLOAT', true, null, 0);
		$this->addColumn('AMOUNT_APPROVED', 'AmountApproved', 'FLOAT', true, null, 0);
		$this->addColumn('YEAR', 'Year', 'VARCHAR', true, 6, '');
		$this->addColumn('NOTES', 'Notes', 'LONGVARCHAR', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // BudgetsTableMap
