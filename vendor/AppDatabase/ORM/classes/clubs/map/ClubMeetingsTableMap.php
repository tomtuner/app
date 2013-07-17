<?php

namespace ClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'club_meetings' table.
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
class ClubMeetingsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'clubs.map.ClubMeetingsTableMap';

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
		$this->setName('club_meetings');
		$this->setPhpName('ClubMeetings');
		$this->setClassname('ClubsORM\\ClubMeetings');
		$this->setPackage('clubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'SMALLINT', true, 8, null);
		$this->addColumn('LOCATION', 'Location', 'VARCHAR', true, 255, '');
		$this->addColumn('STARTS_AT', 'StartsAt', 'TIME', false, null, null);
		$this->addColumn('ENDS_AT', 'EndsAt', 'TIME', false, null, null);
		$this->addColumn('MONDAY', 'Monday', 'BOOLEAN', true, 1, false);
		$this->addColumn('TUESDAY', 'Tuesday', 'BOOLEAN', true, 1, false);
		$this->addColumn('WEDNESDAY', 'Wednesday', 'BOOLEAN', true, 1, false);
		$this->addColumn('THURSDAY', 'Thursday', 'BOOLEAN', true, 1, false);
		$this->addColumn('FRIDAY', 'Friday', 'BOOLEAN', true, 1, false);
		$this->addColumn('SATURDAY', 'Saturday', 'BOOLEAN', true, 1, false);
		$this->addColumn('SUNDAY', 'Sunday', 'BOOLEAN', true, 1, false);
		$this->addColumn('OTHER', 'Other', 'LONGVARCHAR', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // ClubMeetingsTableMap
