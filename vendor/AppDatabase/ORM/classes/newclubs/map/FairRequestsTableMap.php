<?php

namespace NewClubsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'fair_requests' table.
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
class FairRequestsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'newclubs.map.FairRequestsTableMap';

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
		$this->setName('fair_requests');
		$this->setPhpName('FairRequests');
		$this->setClassname('NewClubsORM\\FairRequests');
		$this->setPackage('newclubs');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'SMALLINT', true, null, null);
		$this->addColumn('ORGANIZATION_NAME', 'OrganizationName', 'VARCHAR', true, 50, null);
		$this->addColumn('RESPONSIBLE_REP', 'ResponsibleRep', 'VARCHAR', true, 50, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 30, null);
		$this->addColumn('PHONE', 'Phone', 'VARCHAR', true, 12, null);
		$this->addColumn('POWER_SOURCE', 'PowerSource', 'TINYINT', true, null, 0);
		$this->addColumn('INTERP_SERVICES', 'InterpServices', 'TINYINT', true, null, 0);
		$this->addColumn('OTHER_REQUESTS', 'OtherRequests', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DATE', 'Date', 'DATE', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // FairRequestsTableMap
