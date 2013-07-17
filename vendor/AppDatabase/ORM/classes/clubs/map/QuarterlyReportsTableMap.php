<?php

namespace ClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'quarterly_reports' table.
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
class QuarterlyReportsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'clubs.map.QuarterlyReportsTableMap';

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
		$this->setName('quarterly_reports');
		$this->setPhpName('QuarterlyReports');
		$this->setClassname('ClubsORM\\QuarterlyReports');
		$this->setPackage('clubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'SMALLINT', true, 8, null);
		$this->addColumn('YEAR', 'Year', 'INTEGER', true, 4, 0);
		$this->addColumn('QUARTER', 'Quarter', 'TINYINT', true, null, 0);
		$this->addColumn('ORGANIZATION_ID', 'OrganizationId', 'SMALLINT', true, 5, 0);
		$this->addColumn('MEMBER_LIST_ID', 'MemberListId', 'SMALLINT', true, 8, 0);
		$this->addColumn('CLUB_MEETING_ID', 'ClubMeetingId', 'SMALLINT', true, 8, 0);
		$this->addColumn('CLUB_NAME', 'ClubName', 'VARCHAR', true, 255, '');
		$this->addColumn('NUM_ACTIVE_MEMBERS', 'NumActiveMembers', 'SMALLINT', true, 5, 0);
		$this->addColumn('NUM_ASSOCIATE_MEMBERS', 'NumAssociateMembers', 'SMALLINT', true, 5, 0);
		$this->addColumn('AVG_MEETING_ATTENDANCE', 'AvgMeetingAttendance', 'SMALLINT', true, 5, 0);
		$this->addColumn('GOALS', 'Goals', 'LONGVARCHAR', true, null, null);
		$this->addColumn('ACCOMPLISH_GOALS', 'AccomplishGoals', 'LONGVARCHAR', true, null, null);
		$this->addColumn('HELP', 'Help', 'LONGVARCHAR', true, null, null);
		$this->addColumn('OTHER', 'Other', 'LONGVARCHAR', true, null, null);
		$this->addColumn('BOARD_CHANGES', 'BoardChanges', 'LONGVARCHAR', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // QuarterlyReportsTableMap
