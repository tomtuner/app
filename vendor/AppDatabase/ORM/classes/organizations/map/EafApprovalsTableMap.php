<?php

namespace OrganizationsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'eaf_approvals' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.organizations.map
 */
class EafApprovalsTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'organizations.map.EafApprovalsTableMap';

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
		$this->setName('eaf_approvals');
		$this->setPhpName('EafApprovals');
		$this->setClassname('OrganizationsORM\\EafApprovals');
		$this->setPackage('organizations');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('EAF_FORM_NO', 'EafFormNo', 'INTEGER', 'eaf_form_info', 'EAF_FORM_NO', true, 12, null);
		$this->addColumn('ADVISOR_NAME', 'AdvisorName', 'VARCHAR', true, 20, null);
		$this->addColumn('APPROVED', 'Approved', 'VARCHAR', true, 1, '0');
		$this->addColumn('NOTES', 'Notes', 'CLOB', true, null, null);
		$this->addColumn('APPROVAL_DATE', 'ApprovalDate', 'DATE', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('EafFormInfo', 'OrganizationsORM\\EafFormInfo', RelationMap::MANY_TO_ONE, array('eaf_form_no' => 'eaf_form_no', ), null, null);
	} // buildRelations()

} // EafApprovalsTableMap
