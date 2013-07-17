<?php

namespace ClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'yearly_reports' table.
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
class YearlyReportsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'clubs.map.YearlyReportsTableMap';

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
		$this->setName('yearly_reports');
		$this->setPhpName('YearlyReports');
		$this->setClassname('ClubsORM\\YearlyReports');
		$this->setPackage('clubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'SMALLINT', true, 8, null);
		$this->addColumn('YEAR', 'Year', 'INTEGER', true, 4, 0);
		$this->addColumn('ORGANIZATION_ID', 'OrganizationId', 'SMALLINT', true, 5, 0);
		$this->addColumn('RECOGNIZED_ON', 'RecognizedOn', 'VARCHAR', true, 50, '');
		$this->addColumn('NUM_MEMBERS', 'NumMembers', 'SMALLINT', true, 5, 0);
		$this->addColumn('EVENTS_FALL', 'EventsFall', 'LONGVARCHAR', true, null, null);
		$this->addColumn('EVENTS_WINTER', 'EventsWinter', 'LONGVARCHAR', true, null, null);
		$this->addColumn('EVENTS_SPRING', 'EventsSpring', 'LONGVARCHAR', true, null, null);
		$this->addColumn('FUNDRAISING_FALL', 'FundraisingFall', 'LONGVARCHAR', true, null, null);
		$this->addColumn('FUNDRAISING_WINTER', 'FundraisingWinter', 'LONGVARCHAR', true, null, null);
		$this->addColumn('FUNDRAISING_SPRING', 'FundraisingSpring', 'LONGVARCHAR', true, null, null);
		$this->addColumn('SERVICE_FALL', 'ServiceFall', 'LONGVARCHAR', true, null, null);
		$this->addColumn('SERVICE_WINTER', 'ServiceWinter', 'LONGVARCHAR', true, null, null);
		$this->addColumn('SERVICE_SPRING', 'ServiceSpring', 'LONGVARCHAR', true, null, null);
		$this->addColumn('ACHIEVEMENTS', 'Achievements', 'LONGVARCHAR', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // YearlyReportsTableMap
