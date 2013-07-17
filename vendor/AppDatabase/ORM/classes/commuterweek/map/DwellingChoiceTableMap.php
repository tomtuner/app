<?php

namespace CommuterWeekORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'dwelling_choice' table.
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
class DwellingChoiceTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'commuterweek.map.DwellingChoiceTableMap';

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
		$this->setName('dwelling_choice');
		$this->setPhpName('DwellingChoice');
		$this->setClassname('CommuterWeekORM\\DwellingChoice');
		$this->setPackage('commuterweek');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('DWELLING_CHOICE_ID', 'DwellingChoiceId', 'INTEGER', true, null, null);
		$this->addColumn('DWELLING_CHOICE_TYPE', 'DwellingChoiceType', 'VARCHAR', true, 100, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Commuter', 'CommuterWeekORM\\Commuter', RelationMap::ONE_TO_MANY, array('dwelling_choice_id' => 'dwelling_choice_id', ), 'CASCADE', 'CASCADE', 'Commuters');
	} // buildRelations()

} // DwellingChoiceTableMap
