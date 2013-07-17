<?php

namespace OrganizationsORM\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use OrganizationsORM\EafApprovalsPeer;
use OrganizationsORM\EafFormInfo;
use OrganizationsORM\EafFormInfoPeer;
use OrganizationsORM\map\EafFormInfoTableMap;

/**
 * Base static class for performing query and update operations on the 'eaf_form_info' table.
 *
 * 
 *
 * @package    propel.generator.organizations.om
 */
abstract class BaseEafFormInfoPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'organizations';

	/** the table name for this class */
	const TABLE_NAME = 'eaf_form_info';

	/** the related Propel class for this table */
	const OM_CLASS = 'OrganizationsORM\\EafFormInfo';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'organizations.EafFormInfo';

	/** the related TableMap class for this table */
	const TM_CLASS = 'EafFormInfoTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 37;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 37;

	/** the column name for the ID field */
	const ID = 'eaf_form_info.ID';

	/** the column name for the EAF_FORM_NO field */
	const EAF_FORM_NO = 'eaf_form_info.EAF_FORM_NO';

	/** the column name for the VISA_NO field */
	const VISA_NO = 'eaf_form_info.VISA_NO';

	/** the column name for the TXN_DUE_DATE field */
	const TXN_DUE_DATE = 'eaf_form_info.TXN_DUE_DATE';

	/** the column name for the REQ_NAME field */
	const REQ_NAME = 'eaf_form_info.REQ_NAME';

	/** the column name for the EAF_DATE field */
	const EAF_DATE = 'eaf_form_info.EAF_DATE';

	/** the column name for the REQ_EMAIL field */
	const REQ_EMAIL = 'eaf_form_info.REQ_EMAIL';

	/** the column name for the REQ_PHONE field */
	const REQ_PHONE = 'eaf_form_info.REQ_PHONE';

	/** the column name for the REQ_CLUB_NAME field */
	const REQ_CLUB_NAME = 'eaf_form_info.REQ_CLUB_NAME';

	/** the column name for the ALT_REQ_NAME field */
	const ALT_REQ_NAME = 'eaf_form_info.ALT_REQ_NAME';

	/** the column name for the ALT_REQ_PHONE field */
	const ALT_REQ_PHONE = 'eaf_form_info.ALT_REQ_PHONE';

	/** the column name for the ALT_REQ_EMAIL field */
	const ALT_REQ_EMAIL = 'eaf_form_info.ALT_REQ_EMAIL';

	/** the column name for the ACCOUNT_NO field */
	const ACCOUNT_NO = 'eaf_form_info.ACCOUNT_NO';

	/** the column name for the CASH_NEEDED field */
	const CASH_NEEDED = 'eaf_form_info.CASH_NEEDED';

	/** the column name for the CHECK_PAYMENT field */
	const CHECK_PAYMENT = 'eaf_form_info.CHECK_PAYMENT';

	/** the column name for the VEHICLE_RENTAL field */
	const VEHICLE_RENTAL = 'eaf_form_info.VEHICLE_RENTAL';

	/** the column name for the HUB field */
	const HUB = 'eaf_form_info.HUB';

	/** the column name for the VISA field */
	const VISA = 'eaf_form_info.VISA';

	/** the column name for the AFAF_ATF_AWARD_NO field */
	const AFAF_ATF_AWARD_NO = 'eaf_form_info.AFAF_ATF_AWARD_NO';

	/** the column name for the TRANS_FUNDS field */
	const TRANS_FUNDS = 'eaf_form_info.TRANS_FUNDS';

	/** the column name for the OFF_MAX_PURCHASE field */
	const OFF_MAX_PURCHASE = 'eaf_form_info.OFF_MAX_PURCHASE';

	/** the column name for the CHECK_MAILED field */
	const CHECK_MAILED = 'eaf_form_info.CHECK_MAILED';

	/** the column name for the TRAVEL field */
	const TRAVEL = 'eaf_form_info.TRAVEL';

	/** the column name for the CHECK_PICKED field */
	const CHECK_PICKED = 'eaf_form_info.CHECK_PICKED';

	/** the column name for the EVENT_NAME field */
	const EVENT_NAME = 'eaf_form_info.EVENT_NAME';

	/** the column name for the DESTINATION field */
	const DESTINATION = 'eaf_form_info.DESTINATION';

	/** the column name for the EVENT_DATE field */
	const EVENT_DATE = 'eaf_form_info.EVENT_DATE';

	/** the column name for the COMP_NAME field */
	const COMP_NAME = 'eaf_form_info.COMP_NAME';

	/** the column name for the COMP_ADDRESS field */
	const COMP_ADDRESS = 'eaf_form_info.COMP_ADDRESS';

	/** the column name for the COMP_CITY field */
	const COMP_CITY = 'eaf_form_info.COMP_CITY';

	/** the column name for the COMP_STATE field */
	const COMP_STATE = 'eaf_form_info.COMP_STATE';

	/** the column name for the COMP_ZIP field */
	const COMP_ZIP = 'eaf_form_info.COMP_ZIP';

	/** the column name for the COMP_PHONE field */
	const COMP_PHONE = 'eaf_form_info.COMP_PHONE';

	/** the column name for the COMP_FAX field */
	const COMP_FAX = 'eaf_form_info.COMP_FAX';

	/** the column name for the STUDENT_ID field */
	const STUDENT_ID = 'eaf_form_info.STUDENT_ID';

	/** the column name for the PURCHASE_DESC field */
	const PURCHASE_DESC = 'eaf_form_info.PURCHASE_DESC';

	/** the column name for the TOTAL field */
	const TOTAL = 'eaf_form_info.TOTAL';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of EafFormInfo objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array EafFormInfo[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'EafFormNo', 'VisaNo', 'TxnDueDate', 'ReqName', 'EafDate', 'ReqEmail', 'ReqPhone', 'ReqClubName', 'AltReqName', 'AltReqPhone', 'AltReqEmail', 'AccountNo', 'CashNeeded', 'CheckPayment', 'VehicleRental', 'Hub', 'Visa', 'AfafAtfAwardNo', 'TransFunds', 'OffMaxPurchase', 'CheckMailed', 'Travel', 'CheckPicked', 'EventName', 'Destination', 'EventDate', 'CompName', 'CompAddress', 'CompCity', 'CompState', 'CompZip', 'CompPhone', 'CompFax', 'StudentId', 'PurchaseDesc', 'Total', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'eafFormNo', 'visaNo', 'txnDueDate', 'reqName', 'eafDate', 'reqEmail', 'reqPhone', 'reqClubName', 'altReqName', 'altReqPhone', 'altReqEmail', 'accountNo', 'cashNeeded', 'checkPayment', 'vehicleRental', 'hub', 'visa', 'afafAtfAwardNo', 'transFunds', 'offMaxPurchase', 'checkMailed', 'travel', 'checkPicked', 'eventName', 'destination', 'eventDate', 'compName', 'compAddress', 'compCity', 'compState', 'compZip', 'compPhone', 'compFax', 'studentId', 'purchaseDesc', 'total', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::EAF_FORM_NO, self::VISA_NO, self::TXN_DUE_DATE, self::REQ_NAME, self::EAF_DATE, self::REQ_EMAIL, self::REQ_PHONE, self::REQ_CLUB_NAME, self::ALT_REQ_NAME, self::ALT_REQ_PHONE, self::ALT_REQ_EMAIL, self::ACCOUNT_NO, self::CASH_NEEDED, self::CHECK_PAYMENT, self::VEHICLE_RENTAL, self::HUB, self::VISA, self::AFAF_ATF_AWARD_NO, self::TRANS_FUNDS, self::OFF_MAX_PURCHASE, self::CHECK_MAILED, self::TRAVEL, self::CHECK_PICKED, self::EVENT_NAME, self::DESTINATION, self::EVENT_DATE, self::COMP_NAME, self::COMP_ADDRESS, self::COMP_CITY, self::COMP_STATE, self::COMP_ZIP, self::COMP_PHONE, self::COMP_FAX, self::STUDENT_ID, self::PURCHASE_DESC, self::TOTAL, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'EAF_FORM_NO', 'VISA_NO', 'TXN_DUE_DATE', 'REQ_NAME', 'EAF_DATE', 'REQ_EMAIL', 'REQ_PHONE', 'REQ_CLUB_NAME', 'ALT_REQ_NAME', 'ALT_REQ_PHONE', 'ALT_REQ_EMAIL', 'ACCOUNT_NO', 'CASH_NEEDED', 'CHECK_PAYMENT', 'VEHICLE_RENTAL', 'HUB', 'VISA', 'AFAF_ATF_AWARD_NO', 'TRANS_FUNDS', 'OFF_MAX_PURCHASE', 'CHECK_MAILED', 'TRAVEL', 'CHECK_PICKED', 'EVENT_NAME', 'DESTINATION', 'EVENT_DATE', 'COMP_NAME', 'COMP_ADDRESS', 'COMP_CITY', 'COMP_STATE', 'COMP_ZIP', 'COMP_PHONE', 'COMP_FAX', 'STUDENT_ID', 'PURCHASE_DESC', 'TOTAL', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'eaf_form_no', 'visa_no', 'txn_due_date', 'req_name', 'eaf_date', 'req_email', 'req_phone', 'req_club_name', 'alt_req_name', 'alt_req_phone', 'alt_req_email', 'account_no', 'cash_needed', 'check_payment', 'vehicle_rental', 'hub', 'visa', 'afaf_atf_award_no', 'trans_funds', 'off_max_purchase', 'check_mailed', 'travel', 'check_picked', 'event_name', 'destination', 'event_date', 'comp_name', 'comp_address', 'comp_city', 'comp_state', 'comp_zip', 'comp_phone', 'comp_fax', 'student_id', 'purchase_desc', 'total', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'EafFormNo' => 1, 'VisaNo' => 2, 'TxnDueDate' => 3, 'ReqName' => 4, 'EafDate' => 5, 'ReqEmail' => 6, 'ReqPhone' => 7, 'ReqClubName' => 8, 'AltReqName' => 9, 'AltReqPhone' => 10, 'AltReqEmail' => 11, 'AccountNo' => 12, 'CashNeeded' => 13, 'CheckPayment' => 14, 'VehicleRental' => 15, 'Hub' => 16, 'Visa' => 17, 'AfafAtfAwardNo' => 18, 'TransFunds' => 19, 'OffMaxPurchase' => 20, 'CheckMailed' => 21, 'Travel' => 22, 'CheckPicked' => 23, 'EventName' => 24, 'Destination' => 25, 'EventDate' => 26, 'CompName' => 27, 'CompAddress' => 28, 'CompCity' => 29, 'CompState' => 30, 'CompZip' => 31, 'CompPhone' => 32, 'CompFax' => 33, 'StudentId' => 34, 'PurchaseDesc' => 35, 'Total' => 36, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'eafFormNo' => 1, 'visaNo' => 2, 'txnDueDate' => 3, 'reqName' => 4, 'eafDate' => 5, 'reqEmail' => 6, 'reqPhone' => 7, 'reqClubName' => 8, 'altReqName' => 9, 'altReqPhone' => 10, 'altReqEmail' => 11, 'accountNo' => 12, 'cashNeeded' => 13, 'checkPayment' => 14, 'vehicleRental' => 15, 'hub' => 16, 'visa' => 17, 'afafAtfAwardNo' => 18, 'transFunds' => 19, 'offMaxPurchase' => 20, 'checkMailed' => 21, 'travel' => 22, 'checkPicked' => 23, 'eventName' => 24, 'destination' => 25, 'eventDate' => 26, 'compName' => 27, 'compAddress' => 28, 'compCity' => 29, 'compState' => 30, 'compZip' => 31, 'compPhone' => 32, 'compFax' => 33, 'studentId' => 34, 'purchaseDesc' => 35, 'total' => 36, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::EAF_FORM_NO => 1, self::VISA_NO => 2, self::TXN_DUE_DATE => 3, self::REQ_NAME => 4, self::EAF_DATE => 5, self::REQ_EMAIL => 6, self::REQ_PHONE => 7, self::REQ_CLUB_NAME => 8, self::ALT_REQ_NAME => 9, self::ALT_REQ_PHONE => 10, self::ALT_REQ_EMAIL => 11, self::ACCOUNT_NO => 12, self::CASH_NEEDED => 13, self::CHECK_PAYMENT => 14, self::VEHICLE_RENTAL => 15, self::HUB => 16, self::VISA => 17, self::AFAF_ATF_AWARD_NO => 18, self::TRANS_FUNDS => 19, self::OFF_MAX_PURCHASE => 20, self::CHECK_MAILED => 21, self::TRAVEL => 22, self::CHECK_PICKED => 23, self::EVENT_NAME => 24, self::DESTINATION => 25, self::EVENT_DATE => 26, self::COMP_NAME => 27, self::COMP_ADDRESS => 28, self::COMP_CITY => 29, self::COMP_STATE => 30, self::COMP_ZIP => 31, self::COMP_PHONE => 32, self::COMP_FAX => 33, self::STUDENT_ID => 34, self::PURCHASE_DESC => 35, self::TOTAL => 36, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'EAF_FORM_NO' => 1, 'VISA_NO' => 2, 'TXN_DUE_DATE' => 3, 'REQ_NAME' => 4, 'EAF_DATE' => 5, 'REQ_EMAIL' => 6, 'REQ_PHONE' => 7, 'REQ_CLUB_NAME' => 8, 'ALT_REQ_NAME' => 9, 'ALT_REQ_PHONE' => 10, 'ALT_REQ_EMAIL' => 11, 'ACCOUNT_NO' => 12, 'CASH_NEEDED' => 13, 'CHECK_PAYMENT' => 14, 'VEHICLE_RENTAL' => 15, 'HUB' => 16, 'VISA' => 17, 'AFAF_ATF_AWARD_NO' => 18, 'TRANS_FUNDS' => 19, 'OFF_MAX_PURCHASE' => 20, 'CHECK_MAILED' => 21, 'TRAVEL' => 22, 'CHECK_PICKED' => 23, 'EVENT_NAME' => 24, 'DESTINATION' => 25, 'EVENT_DATE' => 26, 'COMP_NAME' => 27, 'COMP_ADDRESS' => 28, 'COMP_CITY' => 29, 'COMP_STATE' => 30, 'COMP_ZIP' => 31, 'COMP_PHONE' => 32, 'COMP_FAX' => 33, 'STUDENT_ID' => 34, 'PURCHASE_DESC' => 35, 'TOTAL' => 36, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'eaf_form_no' => 1, 'visa_no' => 2, 'txn_due_date' => 3, 'req_name' => 4, 'eaf_date' => 5, 'req_email' => 6, 'req_phone' => 7, 'req_club_name' => 8, 'alt_req_name' => 9, 'alt_req_phone' => 10, 'alt_req_email' => 11, 'account_no' => 12, 'cash_needed' => 13, 'check_payment' => 14, 'vehicle_rental' => 15, 'hub' => 16, 'visa' => 17, 'afaf_atf_award_no' => 18, 'trans_funds' => 19, 'off_max_purchase' => 20, 'check_mailed' => 21, 'travel' => 22, 'check_picked' => 23, 'event_name' => 24, 'destination' => 25, 'event_date' => 26, 'comp_name' => 27, 'comp_address' => 28, 'comp_city' => 29, 'comp_state' => 30, 'comp_zip' => 31, 'comp_phone' => 32, 'comp_fax' => 33, 'student_id' => 34, 'purchase_desc' => 35, 'total' => 36, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. EafFormInfoPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(EafFormInfoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(EafFormInfoPeer::ID);
			$criteria->addSelectColumn(EafFormInfoPeer::EAF_FORM_NO);
			$criteria->addSelectColumn(EafFormInfoPeer::VISA_NO);
			$criteria->addSelectColumn(EafFormInfoPeer::TXN_DUE_DATE);
			$criteria->addSelectColumn(EafFormInfoPeer::REQ_NAME);
			$criteria->addSelectColumn(EafFormInfoPeer::EAF_DATE);
			$criteria->addSelectColumn(EafFormInfoPeer::REQ_EMAIL);
			$criteria->addSelectColumn(EafFormInfoPeer::REQ_PHONE);
			$criteria->addSelectColumn(EafFormInfoPeer::REQ_CLUB_NAME);
			$criteria->addSelectColumn(EafFormInfoPeer::ALT_REQ_NAME);
			$criteria->addSelectColumn(EafFormInfoPeer::ALT_REQ_PHONE);
			$criteria->addSelectColumn(EafFormInfoPeer::ALT_REQ_EMAIL);
			$criteria->addSelectColumn(EafFormInfoPeer::ACCOUNT_NO);
			$criteria->addSelectColumn(EafFormInfoPeer::CASH_NEEDED);
			$criteria->addSelectColumn(EafFormInfoPeer::CHECK_PAYMENT);
			$criteria->addSelectColumn(EafFormInfoPeer::VEHICLE_RENTAL);
			$criteria->addSelectColumn(EafFormInfoPeer::HUB);
			$criteria->addSelectColumn(EafFormInfoPeer::VISA);
			$criteria->addSelectColumn(EafFormInfoPeer::AFAF_ATF_AWARD_NO);
			$criteria->addSelectColumn(EafFormInfoPeer::TRANS_FUNDS);
			$criteria->addSelectColumn(EafFormInfoPeer::OFF_MAX_PURCHASE);
			$criteria->addSelectColumn(EafFormInfoPeer::CHECK_MAILED);
			$criteria->addSelectColumn(EafFormInfoPeer::TRAVEL);
			$criteria->addSelectColumn(EafFormInfoPeer::CHECK_PICKED);
			$criteria->addSelectColumn(EafFormInfoPeer::EVENT_NAME);
			$criteria->addSelectColumn(EafFormInfoPeer::DESTINATION);
			$criteria->addSelectColumn(EafFormInfoPeer::EVENT_DATE);
			$criteria->addSelectColumn(EafFormInfoPeer::COMP_NAME);
			$criteria->addSelectColumn(EafFormInfoPeer::COMP_ADDRESS);
			$criteria->addSelectColumn(EafFormInfoPeer::COMP_CITY);
			$criteria->addSelectColumn(EafFormInfoPeer::COMP_STATE);
			$criteria->addSelectColumn(EafFormInfoPeer::COMP_ZIP);
			$criteria->addSelectColumn(EafFormInfoPeer::COMP_PHONE);
			$criteria->addSelectColumn(EafFormInfoPeer::COMP_FAX);
			$criteria->addSelectColumn(EafFormInfoPeer::STUDENT_ID);
			$criteria->addSelectColumn(EafFormInfoPeer::PURCHASE_DESC);
			$criteria->addSelectColumn(EafFormInfoPeer::TOTAL);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.EAF_FORM_NO');
			$criteria->addSelectColumn($alias . '.VISA_NO');
			$criteria->addSelectColumn($alias . '.TXN_DUE_DATE');
			$criteria->addSelectColumn($alias . '.REQ_NAME');
			$criteria->addSelectColumn($alias . '.EAF_DATE');
			$criteria->addSelectColumn($alias . '.REQ_EMAIL');
			$criteria->addSelectColumn($alias . '.REQ_PHONE');
			$criteria->addSelectColumn($alias . '.REQ_CLUB_NAME');
			$criteria->addSelectColumn($alias . '.ALT_REQ_NAME');
			$criteria->addSelectColumn($alias . '.ALT_REQ_PHONE');
			$criteria->addSelectColumn($alias . '.ALT_REQ_EMAIL');
			$criteria->addSelectColumn($alias . '.ACCOUNT_NO');
			$criteria->addSelectColumn($alias . '.CASH_NEEDED');
			$criteria->addSelectColumn($alias . '.CHECK_PAYMENT');
			$criteria->addSelectColumn($alias . '.VEHICLE_RENTAL');
			$criteria->addSelectColumn($alias . '.HUB');
			$criteria->addSelectColumn($alias . '.VISA');
			$criteria->addSelectColumn($alias . '.AFAF_ATF_AWARD_NO');
			$criteria->addSelectColumn($alias . '.TRANS_FUNDS');
			$criteria->addSelectColumn($alias . '.OFF_MAX_PURCHASE');
			$criteria->addSelectColumn($alias . '.CHECK_MAILED');
			$criteria->addSelectColumn($alias . '.TRAVEL');
			$criteria->addSelectColumn($alias . '.CHECK_PICKED');
			$criteria->addSelectColumn($alias . '.EVENT_NAME');
			$criteria->addSelectColumn($alias . '.DESTINATION');
			$criteria->addSelectColumn($alias . '.EVENT_DATE');
			$criteria->addSelectColumn($alias . '.COMP_NAME');
			$criteria->addSelectColumn($alias . '.COMP_ADDRESS');
			$criteria->addSelectColumn($alias . '.COMP_CITY');
			$criteria->addSelectColumn($alias . '.COMP_STATE');
			$criteria->addSelectColumn($alias . '.COMP_ZIP');
			$criteria->addSelectColumn($alias . '.COMP_PHONE');
			$criteria->addSelectColumn($alias . '.COMP_FAX');
			$criteria->addSelectColumn($alias . '.STUDENT_ID');
			$criteria->addSelectColumn($alias . '.PURCHASE_DESC');
			$criteria->addSelectColumn($alias . '.TOTAL');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(EafFormInfoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			EafFormInfoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(EafFormInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Selects one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     EafFormInfo
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = EafFormInfoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Selects several row from the DB.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return EafFormInfoPeer::populateObjects(EafFormInfoPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(EafFormInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			EafFormInfoPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      EafFormInfo $value A EafFormInfo object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool($obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A EafFormInfo object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof EafFormInfo) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or EafFormInfo object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     EafFormInfo Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to eaf_form_info
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
	}

	/**
	 * Retrieves the primary key from the DB resultset row
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return (int) $row[$startcol];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = EafFormInfoPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = EafFormInfoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = EafFormInfoPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				EafFormInfoPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (EafFormInfo object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = EafFormInfoPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = EafFormInfoPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + EafFormInfoPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = EafFormInfoPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			EafFormInfoPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseEafFormInfoPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseEafFormInfoPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new EafFormInfoTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? EafFormInfoPeer::CLASS_DEFAULT : EafFormInfoPeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a EafFormInfo or Criteria object.
	 *
	 * @param      mixed $values Criteria or EafFormInfo object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(EafFormInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from EafFormInfo object
		}

		if ($criteria->containsKey(EafFormInfoPeer::ID) && $criteria->keyContainsValue(EafFormInfoPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.EafFormInfoPeer::ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Performs an UPDATE on the database, given a EafFormInfo or Criteria object.
	 *
	 * @param      mixed $values Criteria or EafFormInfo object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(EafFormInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(EafFormInfoPeer::ID);
			$value = $criteria->remove(EafFormInfoPeer::ID);
			if ($value) {
				$selectCriteria->add(EafFormInfoPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(EafFormInfoPeer::TABLE_NAME);
			}

		} else { // $values is EafFormInfo object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the eaf_form_info table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(EafFormInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(EafFormInfoPeer::TABLE_NAME, $con, EafFormInfoPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			EafFormInfoPeer::clearInstancePool();
			EafFormInfoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a EafFormInfo or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or EafFormInfo object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(EafFormInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			EafFormInfoPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof EafFormInfo) { // it's a model object
			// invalidate the cache for this single object
			EafFormInfoPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EafFormInfoPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				EafFormInfoPeer::removeInstanceFromPool($singleval);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			EafFormInfoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given EafFormInfo object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      EafFormInfo $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EafFormInfoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EafFormInfoPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(EafFormInfoPeer::DATABASE_NAME, EafFormInfoPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     EafFormInfo
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = EafFormInfoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(EafFormInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(EafFormInfoPeer::DATABASE_NAME);
		$criteria->add(EafFormInfoPeer::ID, $pk);

		$v = EafFormInfoPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(EafFormInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(EafFormInfoPeer::DATABASE_NAME);
			$criteria->add(EafFormInfoPeer::ID, $pks, Criteria::IN);
			$objs = EafFormInfoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseEafFormInfoPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseEafFormInfoPeer::buildTableMap();

