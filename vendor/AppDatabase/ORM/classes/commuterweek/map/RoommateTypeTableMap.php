<?php

namespace CommuterWeekORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'roommate_type' table.
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
class RoommateTypeTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'commuterweek.map.RoommateTypeTableMap';

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
		$this->setName('roommate_type');
		$this->setPhpName('RoommateType');
		$this->setClassname('CommuterWeekORM\\RoommateType');
		$this->setPackage('commuterweek');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ROOMMATE_TYPE_ID', 'RoommateTypeId', 'INTEGER', true, null, null);
		$this->addColumn('ROOMMATE_TYPE_NAME', 'RoommateTypeName', 'VARCHAR', true, 100, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Commuter', 'CommuterWeekORM\\Commuter', RelationMap::ONE_TO_MANY, array('roommate_type_id' => 'roommate_type_id', ), 'CASCADE', 'CASCADE', 'Commuters');
	} // buildRelations()

} // RoommateTypeTableMap
