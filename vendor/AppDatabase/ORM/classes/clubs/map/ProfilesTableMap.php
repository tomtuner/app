<?php

namespace ClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'profiles' table.
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
class ProfilesTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'clubs.map.ProfilesTableMap';

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
		$this->setName('profiles');
		$this->setPhpName('Profiles');
		$this->setClassname('ClubsORM\\Profiles');
		$this->setPackage('clubs');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ORGANIZATION_ID', 'OrganizationId', 'SMALLINT', true, 5, 0);
		$this->addColumn('CATEGORY_ID', 'CategoryId', 'TINYINT', true, 3, 0);
		$this->addColumn('CLUB_MEETING_ID', 'ClubMeetingId', 'SMALLINT', true, 8, 0);
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', true, null, null);
		$this->addColumn('URL', 'Url', 'VARCHAR', true, 255, '');
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 100, '');
		$this->addColumn('PROJECT_NUM', 'ProjectNum', 'VARCHAR', true, 5, '');
		$this->addColumn('ACTIVE', 'Active', 'BOOLEAN', true, 1, false);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // ProfilesTableMap
