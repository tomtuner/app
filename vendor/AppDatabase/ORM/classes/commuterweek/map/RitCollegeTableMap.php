<?php

namespace CommuterWeekORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rit_college' table.
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
class RitCollegeTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'commuterweek.map.RitCollegeTableMap';

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
		$this->setName('rit_college');
		$this->setPhpName('RitCollege');
		$this->setClassname('CommuterWeekORM\\RitCollege');
		$this->setPackage('commuterweek');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('RIT_COLLEGE_ID', 'RitCollegeId', 'INTEGER', true, null, null);
		$this->addColumn('RIT_COLLEGE_NAME', 'RitCollegeName', 'VARCHAR', true, 100, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Commuter', 'CommuterWeekORM\\Commuter', RelationMap::ONE_TO_MANY, array('rit_college_id' => 'rit_college_id', ), 'CASCADE', 'CASCADE', 'Commuters');
	} // buildRelations()

} // RitCollegeTableMap
