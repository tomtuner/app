<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'club_profile' table.
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
class ClubProfileTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.ClubProfileTableMap';

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
		$this->setName('club_profile');
		$this->setPhpName('ClubProfile');
		$this->setClassname('NewClubsORM\\ClubProfile');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'SMALLINT', true, 5, null);
		$this->addColumn('ORG_ID', 'OrgId', 'SMALLINT', true, 5, null);
		$this->addColumn('ACRONYM', 'Acronym', 'VARCHAR', false, 10, null);
		$this->addColumn('LISTNAME', 'Listname', 'VARCHAR', false, 100, null);
		$this->addColumn('PROJECT', 'Project', 'INTEGER', false, 5, null);
		$this->addColumn('DATE_FORMED', 'DateFormed', 'DATE', false, null, '0000-00-00');
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
		$this->addColumn('CATEGORY_ID', 'CategoryId', 'INTEGER', false, 2, 0);
		$this->addColumn('CLUSTER_ID', 'ClusterId', 'INTEGER', true, null, 1);
		$this->addColumn('SECOND_CLUSTER_ID', 'SecondClusterId', 'INTEGER', true, null, 7);
		$this->addColumn('WEB_SITE', 'WebSite', 'VARCHAR', false, 100, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 50, null);
		$this->addColumn('CONSTITUTION_DATE', 'ConstitutionDate', 'DATE', false, null, null);
		$this->addColumn('LASTMODIFIED_CCL', 'LastmodifiedCcl', 'DATE', false, null, null);
		$this->addColumn('LASTMODIFIED_CLUB', 'LastmodifiedClub', 'DATE', false, null, null);
		$this->addColumn('INITIAL_MEETING', 'InitialMeeting', 'INTEGER', false, 1, 0);
		$this->addColumn('INACTIVE', 'Inactive', 'INTEGER', false, 1, 0);
		$this->addColumn('RECOGNIZED', 'Recognized', 'DATE', false, null, '0000-00-00');
		$this->addColumn('SHOW_WEB', 'ShowWeb', 'INTEGER', false, 1, 1);
		$this->addColumn('MEETING_DAY', 'MeetingDay', 'VARCHAR', false, 255, null);
		$this->addColumn('MEETING_TIME', 'MeetingTime', 'VARCHAR', false, 255, null);
		$this->addColumn('MEETING_LOC', 'MeetingLoc', 'VARCHAR', false, 40, null);
		$this->addColumn('MEETING_FREQ', 'MeetingFreq', 'VARCHAR', false, 40, null);
		$this->addColumn('FINANCIAL_TIER', 'FinancialTier', 'VARCHAR', true, 10, '');
		$this->addColumn('FINANCIAL_TIER_DATE', 'FinancialTierDate', 'DATE', true, null, '0000-00-00');
		$this->addColumn('CRB_EXEMPT', 'CrbExempt', 'BOOLEAN', true, 1, false);
		$this->addColumn('SPORTS_CLUB', 'SportsClub', 'BOOLEAN', true, 1, false);
		$this->addColumn('SEASON', 'Season', 'VARCHAR', false, 25, null);
		$this->addColumn('CFIRST', 'Cfirst', 'VARCHAR', false, 40, null);
		$this->addColumn('CLAST', 'Clast', 'VARCHAR', false, 40, null);
		$this->addColumn('CPHONE', 'Cphone', 'VARCHAR', false, 40, null);
		$this->addColumn('CEMAIL', 'Cemail', 'VARCHAR', false, 40, null);
		$this->addColumn('LEAGUE', 'League', 'VARCHAR', false, 60, null);
		$this->addColumn('LEAGUEFEES', 'Leaguefees', 'VARCHAR', false, 60, null);
		$this->addColumn('SPORTS_TRAVEL', 'SportsTravel', 'BOOLEAN', true, 1, false);
		$this->addColumn('SPORTSEXPENSES', 'Sportsexpenses', 'VARCHAR', false, 100, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // ClubProfileTableMap
