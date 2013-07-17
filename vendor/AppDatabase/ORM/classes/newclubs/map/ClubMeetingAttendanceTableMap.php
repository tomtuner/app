<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'club_meeting_attendance' table.
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
class ClubMeetingAttendanceTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.ClubMeetingAttendanceTableMap';

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
		$this->setName('club_meeting_attendance');
		$this->setPhpName('ClubMeetingAttendance');
		$this->setClassname('NewClubsORM\\ClubMeetingAttendance');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'SMALLINT', true, null, null);
		$this->addColumn('ORG_ID', 'OrgId', 'INTEGER', true, 10, 0);
		$this->addColumn('MEETING_ID', 'MeetingId', 'INTEGER', true, 10, 0);
		$this->addColumn('MADE_UP', 'MadeUp', 'SMALLINT', true, null, 0);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // ClubMeetingAttendanceTableMap
