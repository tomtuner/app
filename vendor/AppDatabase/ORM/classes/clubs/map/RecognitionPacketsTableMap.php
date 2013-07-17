<?php

namespace ClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'recognition_packets' table.
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
class RecognitionPacketsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'clubs.map.RecognitionPacketsTableMap';

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
		$this->setName('recognition_packets');
		$this->setPhpName('RecognitionPackets');
		$this->setClassname('ClubsORM\\RecognitionPackets');
		$this->setPackage('clubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'SMALLINT', true, 8, null);
		$this->addColumn('YEAR', 'Year', 'INTEGER', true, 4, 0);
		$this->addColumn('ORGANIZATION_ID', 'OrganizationId', 'SMALLINT', true, 5, 0);
		$this->addColumn('ADVISOR_LIST_ID', 'AdvisorListId', 'SMALLINT', true, 8, 0);
		$this->addColumn('OFFICER_LIST_ID', 'OfficerListId', 'SMALLINT', true, 8, 0);
		$this->addColumn('MEMBER_LIST_ID', 'MemberListId', 'SMALLINT', true, 8, 0);
		$this->addColumn('CLUB_MEETING_ID', 'ClubMeetingId', 'SMALLINT', true, 8, 0);
		$this->addColumn('CLUB_NAME', 'ClubName', 'VARCHAR', true, 255, '');
		$this->addColumn('ACRONYM', 'Acronym', 'VARCHAR', true, 10, '');
		$this->addColumn('URL', 'Url', 'VARCHAR', true, 255, '');
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 100, '');
		$this->addColumn('ADVISOR_ID', 'AdvisorId', 'SMALLINT', true, 8, 0);
		$this->addColumn('ADVISOR_OFFICE', 'AdvisorOffice', 'VARCHAR', true, 30, '');
		$this->addColumn('ADVISOR_DEPARTMENT', 'AdvisorDepartment', 'VARCHAR', true, 40, '');
		$this->addColumn('TARGET_MEMBERSHIP', 'TargetMembership', 'LONGVARCHAR', true, null, null);
		$this->addColumn('NUM_MEMBERS', 'NumMembers', 'SMALLINT', true, 5, 0);
		$this->addColumn('FEES', 'Fees', 'VARCHAR', true, 20, '');
		$this->addColumn('EXPECTED_COSTS_YEAR', 'ExpectedCostsYear', 'VARCHAR', true, 20, '');
		$this->addColumn('EXPECTED_COSTS_FUTURE', 'ExpectedCostsFuture', 'VARCHAR', true, 20, '');
		$this->addColumn('PROMO', 'Promo', 'LONGVARCHAR', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // RecognitionPacketsTableMap
