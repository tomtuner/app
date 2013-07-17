<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'quarterly_data_old' table.
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
class QuarterlyDataOldTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.QuarterlyDataOldTableMap';

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
		$this->setName('quarterly_data_old');
		$this->setPhpName('QuarterlyDataOld');
		$this->setClassname('NewClubsORM\\QuarterlyDataOld');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('REPORT_ID', 'ReportId', 'INTEGER', true, 10, 0);
		$this->addPrimaryKey('ORG_ID', 'OrgId', 'INTEGER', true, 10, 0);
		$this->addColumn('CLUBNAME', 'Clubname', 'VARCHAR', true, 40, '');
		$this->addColumn('MEETING_PLACE', 'MeetingPlace', 'VARCHAR', true, 40, '');
		$this->addColumn('DAY', 'Day', 'VARCHAR', true, 10, '');
		$this->addColumn('TIME', 'Time', 'VARCHAR', true, 8, '');
		$this->addColumn('ACTIVE', 'Active', 'INTEGER', true, 4, 0);
		$this->addColumn('ASSOCIATE', 'Associate', 'INTEGER', true, 4, 0);
		$this->addColumn('ATTENDANCE', 'Attendance', 'INTEGER', true, 4, 0);
		$this->addColumn('COS', 'Cos', 'INTEGER', true, 3, 0);
		$this->addColumn('CIAS', 'Cias', 'INTEGER', true, 3, 0);
		$this->addColumn('COB', 'Cob', 'INTEGER', true, 3, 0);
		$this->addColumn('COE', 'Coe', 'INTEGER', true, 3, 0);
		$this->addColumn('CLA', 'Cla', 'INTEGER', true, 3, 0);
		$this->addColumn('NTID', 'Ntid', 'INTEGER', true, 3, 0);
		$this->addColumn('GCCIS', 'Gccis', 'INTEGER', true, 3, 0);
		$this->addColumn('CAST', 'Cast', 'INTEGER', true, 3, 0);
		$this->addColumn('NONRIT', 'Nonrit', 'INTEGER', true, 3, 0);
		$this->addColumn('ONE', 'One', 'INTEGER', true, 3, 0);
		$this->addColumn('TWO', 'Two', 'INTEGER', true, 3, 0);
		$this->addColumn('THREE', 'Three', 'INTEGER', true, 3, 0);
		$this->addColumn('FOUR', 'Four', 'INTEGER', true, 3, 0);
		$this->addColumn('FIVE', 'Five', 'INTEGER', true, 3, 0);
		$this->addColumn('G', 'G', 'INTEGER', true, 3, 0);
		$this->addColumn('OTHER_YEAR', 'OtherYear', 'INTEGER', true, 3, 0);
		$this->addColumn('ASIAN', 'Asian', 'INTEGER', true, 3, 0);
		$this->addColumn('AFRICAN', 'African', 'INTEGER', true, 3, 0);
		$this->addColumn('NATIVE', 'Native', 'INTEGER', true, 3, 0);
		$this->addColumn('LATINO', 'Latino', 'INTEGER', true, 3, 0);
		$this->addColumn('CAUCASIAN', 'Caucasian', 'INTEGER', true, 3, 0);
		$this->addColumn('INTERNATIONAL', 'International', 'INTEGER', true, 3, 0);
		$this->addColumn('OTHER', 'Other', 'INTEGER', true, 3, 0);
		$this->addColumn('MALE', 'Male', 'INTEGER', true, 3, 0);
		$this->addColumn('FEMALE', 'Female', 'INTEGER', true, 3, 0);
		$this->addColumn('EVENTS', 'Events', 'CLOB', true, null, null);
		$this->addColumn('UPCOMING', 'Upcoming', 'CLOB', true, null, null);
		$this->addColumn('MEMBERS', 'Members', 'CLOB', true, null, null);
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

} // QuarterlyDataOldTableMap
