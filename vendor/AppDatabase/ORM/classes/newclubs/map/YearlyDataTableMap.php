<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'yearly_data' table.
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
class YearlyDataTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.YearlyDataTableMap';

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
		$this->setName('yearly_data');
		$this->setPhpName('YearlyData');
		$this->setClassname('NewClubsORM\\YearlyData');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ORG_ID', 'OrgId', 'INTEGER', true, 10, 0);
		$this->addPrimaryKey('REPORT_ID', 'ReportId', 'INTEGER', true, 10, 0);
		$this->addColumn('RECOGNIZED', 'Recognized', 'LONGVARCHAR', true, null, null);
		$this->addColumn('MEMBERS', 'Members', 'LONGVARCHAR', true, null, null);
		$this->addColumn('FALL_PARTICIPATION', 'FallParticipation', 'LONGVARCHAR', true, null, null);
		$this->addColumn('WINTER_PARTICIPATION', 'WinterParticipation', 'LONGVARCHAR', true, null, null);
		$this->addColumn('SPRING_PARTICIPATION', 'SpringParticipation', 'LONGVARCHAR', true, null, null);
		$this->addColumn('FALL_FUND', 'FallFund', 'LONGVARCHAR', true, null, null);
		$this->addColumn('WINTER_FUND', 'WinterFund', 'LONGVARCHAR', true, null, null);
		$this->addColumn('SPRING_FUND', 'SpringFund', 'LONGVARCHAR', true, null, null);
		$this->addColumn('FALL_CS', 'FallCs', 'LONGVARCHAR', true, null, null);
		$this->addColumn('WINTER_CS', 'WinterCs', 'LONGVARCHAR', true, null, null);
		$this->addColumn('SPRING_CS', 'SpringCs', 'LONGVARCHAR', true, null, null);
		$this->addColumn('ACHIEVEMENTS', 'Achievements', 'LONGVARCHAR', true, null, null);
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

} // YearlyDataTableMap
