<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'form_elements' table.
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
class FormElementsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.FormElementsTableMap';

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
		$this->setName('form_elements');
		$this->setPhpName('FormElements');
		$this->setClassname('NewClubsORM\\FormElements');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 50, '');
		$this->addColumn('DISPLAY', 'Display', 'LONGVARCHAR', true, null, null);
		$this->addColumn('ELEMENT', 'Element', 'LONGVARCHAR', true, null, null);
		$this->addColumn('POS_VALUES', 'PosValues', 'LONGVARCHAR', true, null, null);
		$this->addColumn('POSITION', 'Position', 'INTEGER', true, null, 0);
		$this->addColumn('SECTION', 'Section', 'INTEGER', true, null, 0);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // FormElementsTableMap
