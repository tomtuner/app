<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'club_day_clubs' table.
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
class ClubDayClubsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.ClubDayClubsTableMap';

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
		$this->setName('club_day_clubs');
		$this->setPhpName('ClubDayClubs');
		$this->setClassname('NewClubsORM\\ClubDayClubs');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('CLUB_DAY_ID', 'ClubDayId', 'INTEGER', true, 10, 0);
		$this->addPrimaryKey('CLUB_ID', 'ClubId', 'INTEGER', true, 10, 0);
		$this->addColumn('ATTENDED', 'Attended', 'INTEGER', true, 1, 0);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // ClubDayClubsTableMap
