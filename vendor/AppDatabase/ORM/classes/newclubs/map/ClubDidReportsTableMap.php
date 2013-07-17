<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'club_did_reports' table.
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
class ClubDidReportsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.ClubDidReportsTableMap';

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
		$this->setName('club_did_reports');
		$this->setPhpName('ClubDidReports');
		$this->setClassname('NewClubsORM\\ClubDidReports');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ORG_ID', 'OrgId', 'INTEGER', true, 10, 0);
		$this->addPrimaryKey('REPORT_ID', 'ReportId', 'INTEGER', true, 10, 0);
		$this->addColumn('DATE_SUBMITTED', 'DateSubmitted', 'DATE', true, null, '0000-00-00');
		$this->addColumn('UNIQUEID', 'Uniqueid', 'VARCHAR', true, 20, '0');
		$this->addColumn('SUBMIT_TYPE', 'SubmitType', 'CHAR', true, null, 'Submitted');
		$this->addColumn('ADVISOR_APPROVED', 'AdvisorApproved', 'BOOLEAN', true, 1, false);
		$this->addColumn('CCL_APPROVED', 'CclApproved', 'BOOLEAN', true, 1, false);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // ClubDidReportsTableMap
