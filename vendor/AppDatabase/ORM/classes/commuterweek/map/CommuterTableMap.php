<?php

namespace CommuterWeekORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'commuter' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.commuterweek.map
 */
class CommuterTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'commuterweek.map.CommuterTableMap';

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
		$this->setName('commuter');
		$this->setPhpName('Commuter');
		$this->setClassname('CommuterWeekORM\\Commuter');
		$this->setPackage('commuterweek');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('COMMUTER_ID', 'CommuterId', 'INTEGER', true, null, null);
		$this->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', true, 100, null);
		$this->addColumn('LAST_NAME', 'LastName', 'VARCHAR', true, 100, null);
		$this->addColumn('LOCAL_ADDRESS_ONE', 'LocalAddressOne', 'VARCHAR', false, 100, null);
		$this->addColumn('LOCAL_ADDRESS_TWO', 'LocalAddressTwo', 'VARCHAR', false, 100, null);
		$this->addColumn('CITY_NAME', 'CityName', 'VARCHAR', true, 100, null);
		$this->addColumn('STATE_CODE', 'StateCode', 'VARCHAR', true, 2, null);
		$this->addColumn('ZIP_CODE', 'ZipCode', 'INTEGER', true, 5, null);
		$this->addColumn('GRADUATION_CLASS_YEAR', 'GraduationClassYear', 'INTEGER', true, 4, null);
		$this->addForeignKey('RIT_COLLEGE_ID', 'RitCollegeId', 'INTEGER', 'rit_college', 'RIT_COLLEGE_ID', true, null, null);
		$this->addColumn('APARTMENT_COMPLEX_NAME', 'ApartmentComplexName', 'VARCHAR', false, 100, null);
		$this->addForeignKey('DWELLING_CHOICE_ID', 'DwellingChoiceId', 'INTEGER', 'dwelling_choice', 'DWELLING_CHOICE_ID', true, null, null);
		$this->addForeignKey('ROOMMATE_TYPE_ID', 'RoommateTypeId', 'INTEGER', 'roommate_type', 'ROOMMATE_TYPE_ID', true, null, null);
		$this->addColumn('EMAIL_ADDRESS', 'EmailAddress', 'VARCHAR', true, 100, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('RoommateType', 'CommuterWeekORM\\RoommateType', RelationMap::MANY_TO_ONE, array('roommate_type_id' => 'roommate_type_id', ), 'CASCADE', 'CASCADE');
		$this->addRelation('RitCollege', 'CommuterWeekORM\\RitCollege', RelationMap::MANY_TO_ONE, array('rit_college_id' => 'rit_college_id', ), 'CASCADE', 'CASCADE');
		$this->addRelation('DwellingChoice', 'CommuterWeekORM\\DwellingChoice', RelationMap::MANY_TO_ONE, array('dwelling_choice_id' => 'dwelling_choice_id', ), 'CASCADE', 'CASCADE');
	} // buildRelations()

} // CommuterTableMap
