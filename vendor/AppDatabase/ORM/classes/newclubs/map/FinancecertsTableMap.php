<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'financecerts' table.
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
class FinancecertsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.FinancecertsTableMap';

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
		$this->setName('financecerts');
		$this->setPhpName('Financecerts');
		$this->setClassname('NewClubsORM\\Financecerts');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('MEMBER_ID', 'MemberId', 'INTEGER', true, 10, 0);
		$this->addColumn('CERT_DATE', 'CertDate', 'DATE', true, null, '0000-00-00');
		$this->addColumn('SCORE', 'Score', 'DOUBLE', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // FinancecertsTableMap
