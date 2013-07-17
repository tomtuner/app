<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'recognition_data' table.
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
class RecognitionDataTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.RecognitionDataTableMap';

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
		$this->setName('recognition_data');
		$this->setPhpName('RecognitionData');
		$this->setClassname('NewClubsORM\\RecognitionData');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('CLUBTYPE', 'Clubtype', 'VARCHAR', true, 10, '');
		$this->addColumn('ITF', 'Itf', 'VARCHAR', true, 10, '');
		$this->addColumn('CLUBNAME', 'Clubname', 'VARCHAR', true, 100, '');
		$this->addColumn('ACRONYM', 'Acronym', 'VARCHAR', false, 20, null);
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
		$this->addColumn('URL', 'Url', 'LONGVARCHAR', false, null, null);
		$this->addColumn('GEN_EMAIL', 'GenEmail', 'LONGVARCHAR', false, null, null);
		$this->addColumn('SUBMITTER', 'Submitter', 'VARCHAR', true, 40, '');
		$this->addColumn('S_POSITION', 'SPosition', 'VARCHAR', true, 40, '');
		$this->addColumn('S_EMAIL', 'SEmail', 'VARCHAR', true, 40, '');
		$this->addColumn('A_FIRST', 'AFirst', 'VARCHAR', true, 40, '');
		$this->addColumn('A_LAST', 'ALast', 'VARCHAR', true, 40, '');
		$this->addColumn('A_CPHONE', 'ACphone', 'VARCHAR', false, 12, '');
		$this->addColumn('A_HPHONE', 'AHphone', 'VARCHAR', false, 12, null);
		$this->addColumn('A_OFFICE', 'AOffice', 'VARCHAR', false, 40, null);
		$this->addColumn('A_DEPT', 'ADept', 'VARCHAR', true, 40, '');
		$this->addColumn('A_EMAIL', 'AEmail', 'VARCHAR', true, 40, '');
		$this->addColumn('TARGET', 'Target', 'VARCHAR', false, 40, null);
		$this->addColumn('MEETINGS', 'Meetings', 'VARCHAR', false, 80, null);
		$this->addColumn('MEMBERCOUNT', 'Membercount', 'VARCHAR', false, 4, null);
		$this->addColumn('FEES', 'Fees', 'VARCHAR', false, 5, null);
		$this->addColumn('ELECTIONS', 'Elections', 'VARCHAR', false, 40, null);
		$this->addColumn('S_PHONE', 'SPhone', 'VARCHAR', false, 10, null);
		$this->addColumn('PURPOSE', 'Purpose', 'LONGVARCHAR', true, null, null);
		$this->addColumn('SIGNATURE', 'Signature', 'VARCHAR', true, 40, '');
		$this->addColumn('ORG_ID', 'OrgId', 'SMALLINT', true, 11, 0);
		$this->addColumn('REPORT_ID', 'ReportId', 'SMALLINT', true, 11, 0);
		$this->addColumn('PRESIDENT', 'President', 'VARCHAR', true, 255, null);
		$this->addColumn('VICE', 'Vice', 'VARCHAR', false, 255, null);
		$this->addColumn('TREASURER', 'Treasurer', 'VARCHAR', false, 255, null);
		$this->addColumn('SECRETARY', 'Secretary', 'VARCHAR', false, 255, null);
		$this->addColumn('BOARD', 'Board', 'LONGVARCHAR', true, null, null);
		$this->addColumn('MEMBERS', 'Members', 'CLOB', true, null, null);
		$this->addColumn('FALL', 'Fall', 'LONGVARCHAR', false, null, null);
		$this->addColumn('WINTER', 'Winter', 'LONGVARCHAR', false, null, null);
		$this->addColumn('SPRING', 'Spring', 'LONGVARCHAR', false, null, null);
		$this->addColumn('SUMMER', 'Summer', 'LONGVARCHAR', false, null, null);
		$this->addColumn('OPEN_HOUSE', 'OpenHouse', 'VARCHAR', false, 100, null);
		$this->addColumn('PROMO', 'Promo', 'LONGVARCHAR', true, null, null);
		$this->addColumn('SIG_PRES', 'SigPres', 'VARCHAR', true, 40, '');
		$this->addColumn('SIG_ADV', 'SigAdv', 'VARCHAR', true, 40, '');
		$this->addColumn('REASON', 'Reason', 'LONGVARCHAR', true, null, null);
		$this->addColumn('STATUS', 'Status', 'VARCHAR', true, 50, null);
		$this->addColumn('LAST_UPDATED', 'LastUpdated', 'DATE', true, null, null);
		$this->addColumn('DATE', 'Date', 'DATE', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // RecognitionDataTableMap
