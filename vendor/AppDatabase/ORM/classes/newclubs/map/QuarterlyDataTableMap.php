<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'quarterly_data' table.
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
class QuarterlyDataTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.QuarterlyDataTableMap';

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
		$this->setName('quarterly_data');
		$this->setPhpName('QuarterlyData');
		$this->setClassname('NewClubsORM\\QuarterlyData');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'SMALLINT', true, 8, null);
		$this->addColumn('REPORT_ID', 'ReportId', 'INTEGER', true, 10, 0);
		$this->addColumn('ORG_ID', 'OrgId', 'INTEGER', true, 10, 0);
		$this->addColumn('CLUBNAME', 'Clubname', 'VARCHAR', true, 40, '');
		$this->addColumn('MEETING_PLACE', 'MeetingPlace', 'VARCHAR', true, 40, '');
		$this->addColumn('DAY', 'Day', 'VARCHAR', true, 10, '');
		$this->addColumn('TIME', 'Time', 'VARCHAR', true, 8, '');
		$this->addColumn('ACTIVE', 'Active', 'INTEGER', true, 4, 0);
		$this->addColumn('ASSOCIATE', 'Associate', 'INTEGER', true, 4, 0);
		$this->addColumn('ATTENDANCE', 'Attendance', 'INTEGER', true, 4, 0);
		$this->addColumn('MEMBERS', 'Members', 'CLOB', true, null, null);
		$this->addColumn('EVENTS', 'Events', 'CLOB', true, null, null);
		$this->addColumn('UPCOMING', 'Upcoming', 'CLOB', true, null, null);
		$this->addColumn('GOALS', 'Goals', 'LONGVARCHAR', true, null, null);
		$this->addColumn('REACHGOALS', 'Reachgoals', 'LONGVARCHAR', true, null, null);
		$this->addColumn('HELP', 'Help', 'LONGVARCHAR', true, null, null);
		$this->addColumn('ACCOMPLISHMENTS', 'Accomplishments', 'LONGVARCHAR', true, null, null);
		$this->addColumn('BOARDCHANGES', 'Boardchanges', 'LONGVARCHAR', true, null, null);
		$this->addColumn('SUBMITTED_BY', 'SubmittedBy', 'VARCHAR', true, 40, '');
		$this->addColumn('ADVISOR', 'Advisor', 'VARCHAR', true, 40, '');
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // QuarterlyDataTableMap
