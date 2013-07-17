<?php

namespace OrganizationsORM\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'eaf_form_info' table.
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
class EafFormInfoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'organizations.map.EafFormInfoTableMap';

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
		$this->setName('eaf_form_info');
		$this->setPhpName('EafFormInfo');
		$this->setClassname('OrganizationsORM\\EafFormInfo');
		$this->setPackage('organizations');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('EAF_FORM_NO', 'EafFormNo', 'INTEGER', true, 12, null);
		$this->addColumn('VISA_NO', 'VisaNo', 'INTEGER', false, null, null);
		$this->addColumn('TXN_DUE_DATE', 'TxnDueDate', 'DATE', true, null, null);
		$this->addColumn('REQ_NAME', 'ReqName', 'VARCHAR', true, 50, null);
		$this->addColumn('EAF_DATE', 'EafDate', 'DATE', true, null, null);
		$this->addColumn('REQ_EMAIL', 'ReqEmail', 'VARCHAR', true, 100, null);
		$this->addColumn('REQ_PHONE', 'ReqPhone', 'VARCHAR', true, 25, null);
		$this->addColumn('REQ_CLUB_NAME', 'ReqClubName', 'VARCHAR', true, 100, null);
		$this->addColumn('ALT_REQ_NAME', 'AltReqName', 'VARCHAR', false, 50, null);
		$this->addColumn('ALT_REQ_PHONE', 'AltReqPhone', 'VARCHAR', false, 25, null);
		$this->addColumn('ALT_REQ_EMAIL', 'AltReqEmail', 'VARCHAR', false, 100, null);
		$this->addColumn('ACCOUNT_NO', 'AccountNo', 'VARCHAR', false, 100, null);
		$this->addColumn('CASH_NEEDED', 'CashNeeded', 'CHAR', false, 2, '0');
		$this->addColumn('CHECK_PAYMENT', 'CheckPayment', 'CHAR', false, 2, '0');
		$this->addColumn('VEHICLE_RENTAL', 'VehicleRental', 'CHAR', false, 2, '0');
		$this->addColumn('HUB', 'Hub', 'CHAR', false, 2, '0');
		$this->addColumn('VISA', 'Visa', 'CHAR', false, 2, '0');
		$this->addColumn('AFAF_ATF_AWARD_NO', 'AfafAtfAwardNo', 'VARCHAR', false, 50, '0');
		$this->addColumn('TRANS_FUNDS', 'TransFunds', 'VARCHAR', false, 50, '0');
		$this->addColumn('OFF_MAX_PURCHASE', 'OffMaxPurchase', 'CHAR', false, 2, '0');
		$this->addColumn('CHECK_MAILED', 'CheckMailed', 'CHAR', false, 2, '0');
		$this->addColumn('TRAVEL', 'Travel', 'CHAR', false, 2, '0');
		$this->addColumn('CHECK_PICKED', 'CheckPicked', 'CHAR', false, 2, '0');
		$this->addColumn('EVENT_NAME', 'EventName', 'VARCHAR', true, 20, null);
		$this->addColumn('DESTINATION', 'Destination', 'VARCHAR', true, 20, null);
		$this->addColumn('EVENT_DATE', 'EventDate', 'DATE', true, null, null);
		$this->addColumn('COMP_NAME', 'CompName', 'VARCHAR', true, 50, null);
		$this->addColumn('COMP_ADDRESS', 'CompAddress', 'VARCHAR', true, 50, null);
		$this->addColumn('COMP_CITY', 'CompCity', 'VARCHAR', true, 20, null);
		$this->addColumn('COMP_STATE', 'CompState', 'VARCHAR', true, 20, null);
		$this->addColumn('COMP_ZIP', 'CompZip', 'VARCHAR', true, 10, null);
		$this->addColumn('COMP_PHONE', 'CompPhone', 'VARCHAR', true, 25, null);
		$this->addColumn('COMP_FAX', 'CompFax', 'VARCHAR', true, 25, null);
		$this->addColumn('STUDENT_ID', 'StudentId', 'INTEGER', true, null, null);
		$this->addColumn('PURCHASE_DESC', 'PurchaseDesc', 'CLOB', true, null, null);
		$this->addColumn('TOTAL', 'Total', 'INTEGER', true, 5, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('EafApprovals', 'OrganizationsORM\\EafApprovals', RelationMap::ONE_TO_MANY, array('eaf_form_no' => 'eaf_form_no', ), null, null, 'EafApprovalss');
	} // buildRelations()

} // EafFormInfoTableMap
