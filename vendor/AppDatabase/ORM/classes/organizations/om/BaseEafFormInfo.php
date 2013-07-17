<?php

namespace OrganizationsORM\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \DateTime;
use \DateTimeZone;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelDateTime;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use OrganizationsORM\EafApprovals;
use OrganizationsORM\EafApprovalsQuery;
use OrganizationsORM\EafFormInfoPeer;
use OrganizationsORM\EafFormInfoQuery;

/**
 * Base class that represents a row from the 'eaf_form_info' table.
 *
 * 
 *
 * @package    propel.generator.organizations.om
 */
abstract class BaseEafFormInfo extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'OrganizationsORM\\EafFormInfoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        EafFormInfoPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the eaf_form_no field.
	 * @var        int
	 */
	protected $eaf_form_no;

	/**
	 * The value for the visa_no field.
	 * @var        int
	 */
	protected $visa_no;

	/**
	 * The value for the txn_due_date field.
	 * @var        string
	 */
	protected $txn_due_date;

	/**
	 * The value for the req_name field.
	 * @var        string
	 */
	protected $req_name;

	/**
	 * The value for the eaf_date field.
	 * @var        string
	 */
	protected $eaf_date;

	/**
	 * The value for the req_email field.
	 * @var        string
	 */
	protected $req_email;

	/**
	 * The value for the req_phone field.
	 * @var        string
	 */
	protected $req_phone;

	/**
	 * The value for the req_club_name field.
	 * @var        string
	 */
	protected $req_club_name;

	/**
	 * The value for the alt_req_name field.
	 * @var        string
	 */
	protected $alt_req_name;

	/**
	 * The value for the alt_req_phone field.
	 * @var        string
	 */
	protected $alt_req_phone;

	/**
	 * The value for the alt_req_email field.
	 * @var        string
	 */
	protected $alt_req_email;

	/**
	 * The value for the account_no field.
	 * @var        string
	 */
	protected $account_no;

	/**
	 * The value for the cash_needed field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $cash_needed;

	/**
	 * The value for the check_payment field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $check_payment;

	/**
	 * The value for the vehicle_rental field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $vehicle_rental;

	/**
	 * The value for the hub field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $hub;

	/**
	 * The value for the visa field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $visa;

	/**
	 * The value for the afaf_atf_award_no field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $afaf_atf_award_no;

	/**
	 * The value for the trans_funds field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $trans_funds;

	/**
	 * The value for the off_max_purchase field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $off_max_purchase;

	/**
	 * The value for the check_mailed field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $check_mailed;

	/**
	 * The value for the travel field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $travel;

	/**
	 * The value for the check_picked field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $check_picked;

	/**
	 * The value for the event_name field.
	 * @var        string
	 */
	protected $event_name;

	/**
	 * The value for the destination field.
	 * @var        string
	 */
	protected $destination;

	/**
	 * The value for the event_date field.
	 * @var        string
	 */
	protected $event_date;

	/**
	 * The value for the comp_name field.
	 * @var        string
	 */
	protected $comp_name;

	/**
	 * The value for the comp_address field.
	 * @var        string
	 */
	protected $comp_address;

	/**
	 * The value for the comp_city field.
	 * @var        string
	 */
	protected $comp_city;

	/**
	 * The value for the comp_state field.
	 * @var        string
	 */
	protected $comp_state;

	/**
	 * The value for the comp_zip field.
	 * @var        string
	 */
	protected $comp_zip;

	/**
	 * The value for the comp_phone field.
	 * @var        string
	 */
	protected $comp_phone;

	/**
	 * The value for the comp_fax field.
	 * @var        string
	 */
	protected $comp_fax;

	/**
	 * The value for the student_id field.
	 * @var        int
	 */
	protected $student_id;

	/**
	 * The value for the purchase_desc field.
	 * @var        string
	 */
	protected $purchase_desc;

	/**
	 * The value for the total field.
	 * @var        int
	 */
	protected $total;

	/**
	 * @var        array EafApprovals[] Collection to store aggregation of EafApprovals objects.
	 */
	protected $collEafApprovalss;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $eafApprovalssScheduledForDeletion = null;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->cash_needed = '0';
		$this->check_payment = '0';
		$this->vehicle_rental = '0';
		$this->hub = '0';
		$this->visa = '0';
		$this->afaf_atf_award_no = '0';
		$this->trans_funds = '0';
		$this->off_max_purchase = '0';
		$this->check_mailed = '0';
		$this->travel = '0';
		$this->check_picked = '0';
	}

	/**
	 * Initializes internal state of BaseEafFormInfo object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [eaf_form_no] column value.
	 * 
	 * @return     int
	 */
	public function getEafFormNo()
	{
		return $this->eaf_form_no;
	}

	/**
	 * Get the [visa_no] column value.
	 * 
	 * @return     int
	 */
	public function getVisaNo()
	{
		return $this->visa_no;
	}

	/**
	 * Get the [optionally formatted] temporal [txn_due_date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getTxnDueDate($format = '%x')
	{
		if ($this->txn_due_date === null) {
			return null;
		}


		if ($this->txn_due_date === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->txn_due_date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->txn_due_date, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [req_name] column value.
	 * 
	 * @return     string
	 */
	public function getReqName()
	{
		return $this->req_name;
	}

	/**
	 * Get the [optionally formatted] temporal [eaf_date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getEafDate($format = '%x')
	{
		if ($this->eaf_date === null) {
			return null;
		}


		if ($this->eaf_date === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->eaf_date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->eaf_date, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [req_email] column value.
	 * 
	 * @return     string
	 */
	public function getReqEmail()
	{
		return $this->req_email;
	}

	/**
	 * Get the [req_phone] column value.
	 * 
	 * @return     string
	 */
	public function getReqPhone()
	{
		return $this->req_phone;
	}

	/**
	 * Get the [req_club_name] column value.
	 * 
	 * @return     string
	 */
	public function getReqClubName()
	{
		return $this->req_club_name;
	}

	/**
	 * Get the [alt_req_name] column value.
	 * 
	 * @return     string
	 */
	public function getAltReqName()
	{
		return $this->alt_req_name;
	}

	/**
	 * Get the [alt_req_phone] column value.
	 * 
	 * @return     string
	 */
	public function getAltReqPhone()
	{
		return $this->alt_req_phone;
	}

	/**
	 * Get the [alt_req_email] column value.
	 * 
	 * @return     string
	 */
	public function getAltReqEmail()
	{
		return $this->alt_req_email;
	}

	/**
	 * Get the [account_no] column value.
	 * 
	 * @return     string
	 */
	public function getAccountNo()
	{
		return $this->account_no;
	}

	/**
	 * Get the [cash_needed] column value.
	 * 
	 * @return     string
	 */
	public function getCashNeeded()
	{
		return $this->cash_needed;
	}

	/**
	 * Get the [check_payment] column value.
	 * 
	 * @return     string
	 */
	public function getCheckPayment()
	{
		return $this->check_payment;
	}

	/**
	 * Get the [vehicle_rental] column value.
	 * 
	 * @return     string
	 */
	public function getVehicleRental()
	{
		return $this->vehicle_rental;
	}

	/**
	 * Get the [hub] column value.
	 * 
	 * @return     string
	 */
	public function getHub()
	{
		return $this->hub;
	}

	/**
	 * Get the [visa] column value.
	 * 
	 * @return     string
	 */
	public function getVisa()
	{
		return $this->visa;
	}

	/**
	 * Get the [afaf_atf_award_no] column value.
	 * 
	 * @return     string
	 */
	public function getAfafAtfAwardNo()
	{
		return $this->afaf_atf_award_no;
	}

	/**
	 * Get the [trans_funds] column value.
	 * 
	 * @return     string
	 */
	public function getTransFunds()
	{
		return $this->trans_funds;
	}

	/**
	 * Get the [off_max_purchase] column value.
	 * 
	 * @return     string
	 */
	public function getOffMaxPurchase()
	{
		return $this->off_max_purchase;
	}

	/**
	 * Get the [check_mailed] column value.
	 * 
	 * @return     string
	 */
	public function getCheckMailed()
	{
		return $this->check_mailed;
	}

	/**
	 * Get the [travel] column value.
	 * 
	 * @return     string
	 */
	public function getTravel()
	{
		return $this->travel;
	}

	/**
	 * Get the [check_picked] column value.
	 * 
	 * @return     string
	 */
	public function getCheckPicked()
	{
		return $this->check_picked;
	}

	/**
	 * Get the [event_name] column value.
	 * 
	 * @return     string
	 */
	public function getEventName()
	{
		return $this->event_name;
	}

	/**
	 * Get the [destination] column value.
	 * 
	 * @return     string
	 */
	public function getDestination()
	{
		return $this->destination;
	}

	/**
	 * Get the [optionally formatted] temporal [event_date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getEventDate($format = '%x')
	{
		if ($this->event_date === null) {
			return null;
		}


		if ($this->event_date === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->event_date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->event_date, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [comp_name] column value.
	 * 
	 * @return     string
	 */
	public function getCompName()
	{
		return $this->comp_name;
	}

	/**
	 * Get the [comp_address] column value.
	 * 
	 * @return     string
	 */
	public function getCompAddress()
	{
		return $this->comp_address;
	}

	/**
	 * Get the [comp_city] column value.
	 * 
	 * @return     string
	 */
	public function getCompCity()
	{
		return $this->comp_city;
	}

	/**
	 * Get the [comp_state] column value.
	 * 
	 * @return     string
	 */
	public function getCompState()
	{
		return $this->comp_state;
	}

	/**
	 * Get the [comp_zip] column value.
	 * 
	 * @return     string
	 */
	public function getCompZip()
	{
		return $this->comp_zip;
	}

	/**
	 * Get the [comp_phone] column value.
	 * 
	 * @return     string
	 */
	public function getCompPhone()
	{
		return $this->comp_phone;
	}

	/**
	 * Get the [comp_fax] column value.
	 * 
	 * @return     string
	 */
	public function getCompFax()
	{
		return $this->comp_fax;
	}

	/**
	 * Get the [student_id] column value.
	 * 
	 * @return     int
	 */
	public function getStudentId()
	{
		return $this->student_id;
	}

	/**
	 * Get the [purchase_desc] column value.
	 * 
	 * @return     string
	 */
	public function getPurchaseDesc()
	{
		return $this->purchase_desc;
	}

	/**
	 * Get the [total] column value.
	 * 
	 * @return     int
	 */
	public function getTotal()
	{
		return $this->total;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [eaf_form_no] column.
	 * 
	 * @param      int $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setEafFormNo($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->eaf_form_no !== $v) {
			$this->eaf_form_no = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::EAF_FORM_NO;
		}

		return $this;
	} // setEafFormNo()

	/**
	 * Set the value of [visa_no] column.
	 * 
	 * @param      int $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setVisaNo($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->visa_no !== $v) {
			$this->visa_no = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::VISA_NO;
		}

		return $this;
	} // setVisaNo()

	/**
	 * Sets the value of [txn_due_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setTxnDueDate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->txn_due_date !== null || $dt !== null) {
			$currentDateAsString = ($this->txn_due_date !== null && $tmpDt = new DateTime($this->txn_due_date)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->txn_due_date = $newDateAsString;
				$this->modifiedColumns[] = EafFormInfoPeer::TXN_DUE_DATE;
			}
		} // if either are not null

		return $this;
	} // setTxnDueDate()

	/**
	 * Set the value of [req_name] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setReqName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->req_name !== $v) {
			$this->req_name = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::REQ_NAME;
		}

		return $this;
	} // setReqName()

	/**
	 * Sets the value of [eaf_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setEafDate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->eaf_date !== null || $dt !== null) {
			$currentDateAsString = ($this->eaf_date !== null && $tmpDt = new DateTime($this->eaf_date)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->eaf_date = $newDateAsString;
				$this->modifiedColumns[] = EafFormInfoPeer::EAF_DATE;
			}
		} // if either are not null

		return $this;
	} // setEafDate()

	/**
	 * Set the value of [req_email] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setReqEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->req_email !== $v) {
			$this->req_email = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::REQ_EMAIL;
		}

		return $this;
	} // setReqEmail()

	/**
	 * Set the value of [req_phone] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setReqPhone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->req_phone !== $v) {
			$this->req_phone = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::REQ_PHONE;
		}

		return $this;
	} // setReqPhone()

	/**
	 * Set the value of [req_club_name] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setReqClubName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->req_club_name !== $v) {
			$this->req_club_name = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::REQ_CLUB_NAME;
		}

		return $this;
	} // setReqClubName()

	/**
	 * Set the value of [alt_req_name] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setAltReqName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->alt_req_name !== $v) {
			$this->alt_req_name = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::ALT_REQ_NAME;
		}

		return $this;
	} // setAltReqName()

	/**
	 * Set the value of [alt_req_phone] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setAltReqPhone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->alt_req_phone !== $v) {
			$this->alt_req_phone = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::ALT_REQ_PHONE;
		}

		return $this;
	} // setAltReqPhone()

	/**
	 * Set the value of [alt_req_email] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setAltReqEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->alt_req_email !== $v) {
			$this->alt_req_email = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::ALT_REQ_EMAIL;
		}

		return $this;
	} // setAltReqEmail()

	/**
	 * Set the value of [account_no] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setAccountNo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->account_no !== $v) {
			$this->account_no = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::ACCOUNT_NO;
		}

		return $this;
	} // setAccountNo()

	/**
	 * Set the value of [cash_needed] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setCashNeeded($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cash_needed !== $v) {
			$this->cash_needed = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::CASH_NEEDED;
		}

		return $this;
	} // setCashNeeded()

	/**
	 * Set the value of [check_payment] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setCheckPayment($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->check_payment !== $v) {
			$this->check_payment = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::CHECK_PAYMENT;
		}

		return $this;
	} // setCheckPayment()

	/**
	 * Set the value of [vehicle_rental] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setVehicleRental($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->vehicle_rental !== $v) {
			$this->vehicle_rental = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::VEHICLE_RENTAL;
		}

		return $this;
	} // setVehicleRental()

	/**
	 * Set the value of [hub] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setHub($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->hub !== $v) {
			$this->hub = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::HUB;
		}

		return $this;
	} // setHub()

	/**
	 * Set the value of [visa] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setVisa($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->visa !== $v) {
			$this->visa = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::VISA;
		}

		return $this;
	} // setVisa()

	/**
	 * Set the value of [afaf_atf_award_no] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setAfafAtfAwardNo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->afaf_atf_award_no !== $v) {
			$this->afaf_atf_award_no = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::AFAF_ATF_AWARD_NO;
		}

		return $this;
	} // setAfafAtfAwardNo()

	/**
	 * Set the value of [trans_funds] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setTransFunds($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->trans_funds !== $v) {
			$this->trans_funds = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::TRANS_FUNDS;
		}

		return $this;
	} // setTransFunds()

	/**
	 * Set the value of [off_max_purchase] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setOffMaxPurchase($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->off_max_purchase !== $v) {
			$this->off_max_purchase = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::OFF_MAX_PURCHASE;
		}

		return $this;
	} // setOffMaxPurchase()

	/**
	 * Set the value of [check_mailed] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setCheckMailed($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->check_mailed !== $v) {
			$this->check_mailed = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::CHECK_MAILED;
		}

		return $this;
	} // setCheckMailed()

	/**
	 * Set the value of [travel] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setTravel($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->travel !== $v) {
			$this->travel = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::TRAVEL;
		}

		return $this;
	} // setTravel()

	/**
	 * Set the value of [check_picked] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setCheckPicked($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->check_picked !== $v) {
			$this->check_picked = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::CHECK_PICKED;
		}

		return $this;
	} // setCheckPicked()

	/**
	 * Set the value of [event_name] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setEventName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->event_name !== $v) {
			$this->event_name = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::EVENT_NAME;
		}

		return $this;
	} // setEventName()

	/**
	 * Set the value of [destination] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setDestination($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->destination !== $v) {
			$this->destination = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::DESTINATION;
		}

		return $this;
	} // setDestination()

	/**
	 * Sets the value of [event_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setEventDate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->event_date !== null || $dt !== null) {
			$currentDateAsString = ($this->event_date !== null && $tmpDt = new DateTime($this->event_date)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->event_date = $newDateAsString;
				$this->modifiedColumns[] = EafFormInfoPeer::EVENT_DATE;
			}
		} // if either are not null

		return $this;
	} // setEventDate()

	/**
	 * Set the value of [comp_name] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setCompName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comp_name !== $v) {
			$this->comp_name = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::COMP_NAME;
		}

		return $this;
	} // setCompName()

	/**
	 * Set the value of [comp_address] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setCompAddress($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comp_address !== $v) {
			$this->comp_address = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::COMP_ADDRESS;
		}

		return $this;
	} // setCompAddress()

	/**
	 * Set the value of [comp_city] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setCompCity($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comp_city !== $v) {
			$this->comp_city = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::COMP_CITY;
		}

		return $this;
	} // setCompCity()

	/**
	 * Set the value of [comp_state] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setCompState($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comp_state !== $v) {
			$this->comp_state = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::COMP_STATE;
		}

		return $this;
	} // setCompState()

	/**
	 * Set the value of [comp_zip] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setCompZip($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comp_zip !== $v) {
			$this->comp_zip = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::COMP_ZIP;
		}

		return $this;
	} // setCompZip()

	/**
	 * Set the value of [comp_phone] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setCompPhone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comp_phone !== $v) {
			$this->comp_phone = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::COMP_PHONE;
		}

		return $this;
	} // setCompPhone()

	/**
	 * Set the value of [comp_fax] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setCompFax($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comp_fax !== $v) {
			$this->comp_fax = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::COMP_FAX;
		}

		return $this;
	} // setCompFax()

	/**
	 * Set the value of [student_id] column.
	 * 
	 * @param      int $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setStudentId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->student_id !== $v) {
			$this->student_id = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::STUDENT_ID;
		}

		return $this;
	} // setStudentId()

	/**
	 * Set the value of [purchase_desc] column.
	 * 
	 * @param      string $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setPurchaseDesc($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->purchase_desc !== $v) {
			$this->purchase_desc = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::PURCHASE_DESC;
		}

		return $this;
	} // setPurchaseDesc()

	/**
	 * Set the value of [total] column.
	 * 
	 * @param      int $v new value
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function setTotal($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->total !== $v) {
			$this->total = $v;
			$this->modifiedColumns[] = EafFormInfoPeer::TOTAL;
		}

		return $this;
	} // setTotal()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->cash_needed !== '0') {
				return false;
			}

			if ($this->check_payment !== '0') {
				return false;
			}

			if ($this->vehicle_rental !== '0') {
				return false;
			}

			if ($this->hub !== '0') {
				return false;
			}

			if ($this->visa !== '0') {
				return false;
			}

			if ($this->afaf_atf_award_no !== '0') {
				return false;
			}

			if ($this->trans_funds !== '0') {
				return false;
			}

			if ($this->off_max_purchase !== '0') {
				return false;
			}

			if ($this->check_mailed !== '0') {
				return false;
			}

			if ($this->travel !== '0') {
				return false;
			}

			if ($this->check_picked !== '0') {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->eaf_form_no = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->visa_no = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->txn_due_date = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->req_name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->eaf_date = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->req_email = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->req_phone = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->req_club_name = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->alt_req_name = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->alt_req_phone = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->alt_req_email = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->account_no = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->cash_needed = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->check_payment = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->vehicle_rental = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->hub = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->visa = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->afaf_atf_award_no = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->trans_funds = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->off_max_purchase = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
			$this->check_mailed = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
			$this->travel = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
			$this->check_picked = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
			$this->event_name = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
			$this->destination = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
			$this->event_date = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
			$this->comp_name = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
			$this->comp_address = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
			$this->comp_city = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
			$this->comp_state = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
			$this->comp_zip = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
			$this->comp_phone = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
			$this->comp_fax = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
			$this->student_id = ($row[$startcol + 34] !== null) ? (int) $row[$startcol + 34] : null;
			$this->purchase_desc = ($row[$startcol + 35] !== null) ? (string) $row[$startcol + 35] : null;
			$this->total = ($row[$startcol + 36] !== null) ? (int) $row[$startcol + 36] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 37; // 37 = EafFormInfoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating EafFormInfo object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EafFormInfoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = EafFormInfoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collEafApprovalss = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EafFormInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = EafFormInfoQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EafFormInfoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				EafFormInfoPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() || $this->isModified()) {
				// persist changes
				if ($this->isNew()) {
					$this->doInsert($con);
				} else {
					$this->doUpdate($con);
				}
				$affectedRows += 1;
				$this->resetModified();
			}

			if ($this->eafApprovalssScheduledForDeletion !== null) {
				if (!$this->eafApprovalssScheduledForDeletion->isEmpty()) {
					EafApprovalsQuery::create()
						->filterByPrimaryKeys($this->eafApprovalssScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->eafApprovalssScheduledForDeletion = null;
				}
			}

			if ($this->collEafApprovalss !== null) {
				foreach ($this->collEafApprovalss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Insert the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @throws     PropelException
	 * @see        doSave()
	 */
	protected function doInsert(PropelPDO $con)
	{
		$modifiedColumns = array();
		$index = 0;

		$this->modifiedColumns[] = EafFormInfoPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . EafFormInfoPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(EafFormInfoPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::EAF_FORM_NO)) {
			$modifiedColumns[':p' . $index++]  = '`EAF_FORM_NO`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::VISA_NO)) {
			$modifiedColumns[':p' . $index++]  = '`VISA_NO`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::TXN_DUE_DATE)) {
			$modifiedColumns[':p' . $index++]  = '`TXN_DUE_DATE`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::REQ_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`REQ_NAME`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::EAF_DATE)) {
			$modifiedColumns[':p' . $index++]  = '`EAF_DATE`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::REQ_EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`REQ_EMAIL`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::REQ_PHONE)) {
			$modifiedColumns[':p' . $index++]  = '`REQ_PHONE`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::REQ_CLUB_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`REQ_CLUB_NAME`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::ALT_REQ_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`ALT_REQ_NAME`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::ALT_REQ_PHONE)) {
			$modifiedColumns[':p' . $index++]  = '`ALT_REQ_PHONE`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::ALT_REQ_EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`ALT_REQ_EMAIL`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::ACCOUNT_NO)) {
			$modifiedColumns[':p' . $index++]  = '`ACCOUNT_NO`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::CASH_NEEDED)) {
			$modifiedColumns[':p' . $index++]  = '`CASH_NEEDED`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::CHECK_PAYMENT)) {
			$modifiedColumns[':p' . $index++]  = '`CHECK_PAYMENT`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::VEHICLE_RENTAL)) {
			$modifiedColumns[':p' . $index++]  = '`VEHICLE_RENTAL`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::HUB)) {
			$modifiedColumns[':p' . $index++]  = '`HUB`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::VISA)) {
			$modifiedColumns[':p' . $index++]  = '`VISA`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::AFAF_ATF_AWARD_NO)) {
			$modifiedColumns[':p' . $index++]  = '`AFAF_ATF_AWARD_NO`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::TRANS_FUNDS)) {
			$modifiedColumns[':p' . $index++]  = '`TRANS_FUNDS`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::OFF_MAX_PURCHASE)) {
			$modifiedColumns[':p' . $index++]  = '`OFF_MAX_PURCHASE`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::CHECK_MAILED)) {
			$modifiedColumns[':p' . $index++]  = '`CHECK_MAILED`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::TRAVEL)) {
			$modifiedColumns[':p' . $index++]  = '`TRAVEL`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::CHECK_PICKED)) {
			$modifiedColumns[':p' . $index++]  = '`CHECK_PICKED`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::EVENT_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`EVENT_NAME`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::DESTINATION)) {
			$modifiedColumns[':p' . $index++]  = '`DESTINATION`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::EVENT_DATE)) {
			$modifiedColumns[':p' . $index++]  = '`EVENT_DATE`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::COMP_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`COMP_NAME`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::COMP_ADDRESS)) {
			$modifiedColumns[':p' . $index++]  = '`COMP_ADDRESS`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::COMP_CITY)) {
			$modifiedColumns[':p' . $index++]  = '`COMP_CITY`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::COMP_STATE)) {
			$modifiedColumns[':p' . $index++]  = '`COMP_STATE`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::COMP_ZIP)) {
			$modifiedColumns[':p' . $index++]  = '`COMP_ZIP`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::COMP_PHONE)) {
			$modifiedColumns[':p' . $index++]  = '`COMP_PHONE`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::COMP_FAX)) {
			$modifiedColumns[':p' . $index++]  = '`COMP_FAX`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::STUDENT_ID)) {
			$modifiedColumns[':p' . $index++]  = '`STUDENT_ID`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::PURCHASE_DESC)) {
			$modifiedColumns[':p' . $index++]  = '`PURCHASE_DESC`';
		}
		if ($this->isColumnModified(EafFormInfoPeer::TOTAL)) {
			$modifiedColumns[':p' . $index++]  = '`TOTAL`';
		}

		$sql = sprintf(
			'INSERT INTO `eaf_form_info` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`ID`':
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
						break;
					case '`EAF_FORM_NO`':
						$stmt->bindValue($identifier, $this->eaf_form_no, PDO::PARAM_INT);
						break;
					case '`VISA_NO`':
						$stmt->bindValue($identifier, $this->visa_no, PDO::PARAM_INT);
						break;
					case '`TXN_DUE_DATE`':
						$stmt->bindValue($identifier, $this->txn_due_date, PDO::PARAM_STR);
						break;
					case '`REQ_NAME`':
						$stmt->bindValue($identifier, $this->req_name, PDO::PARAM_STR);
						break;
					case '`EAF_DATE`':
						$stmt->bindValue($identifier, $this->eaf_date, PDO::PARAM_STR);
						break;
					case '`REQ_EMAIL`':
						$stmt->bindValue($identifier, $this->req_email, PDO::PARAM_STR);
						break;
					case '`REQ_PHONE`':
						$stmt->bindValue($identifier, $this->req_phone, PDO::PARAM_STR);
						break;
					case '`REQ_CLUB_NAME`':
						$stmt->bindValue($identifier, $this->req_club_name, PDO::PARAM_STR);
						break;
					case '`ALT_REQ_NAME`':
						$stmt->bindValue($identifier, $this->alt_req_name, PDO::PARAM_STR);
						break;
					case '`ALT_REQ_PHONE`':
						$stmt->bindValue($identifier, $this->alt_req_phone, PDO::PARAM_STR);
						break;
					case '`ALT_REQ_EMAIL`':
						$stmt->bindValue($identifier, $this->alt_req_email, PDO::PARAM_STR);
						break;
					case '`ACCOUNT_NO`':
						$stmt->bindValue($identifier, $this->account_no, PDO::PARAM_STR);
						break;
					case '`CASH_NEEDED`':
						$stmt->bindValue($identifier, $this->cash_needed, PDO::PARAM_STR);
						break;
					case '`CHECK_PAYMENT`':
						$stmt->bindValue($identifier, $this->check_payment, PDO::PARAM_STR);
						break;
					case '`VEHICLE_RENTAL`':
						$stmt->bindValue($identifier, $this->vehicle_rental, PDO::PARAM_STR);
						break;
					case '`HUB`':
						$stmt->bindValue($identifier, $this->hub, PDO::PARAM_STR);
						break;
					case '`VISA`':
						$stmt->bindValue($identifier, $this->visa, PDO::PARAM_STR);
						break;
					case '`AFAF_ATF_AWARD_NO`':
						$stmt->bindValue($identifier, $this->afaf_atf_award_no, PDO::PARAM_STR);
						break;
					case '`TRANS_FUNDS`':
						$stmt->bindValue($identifier, $this->trans_funds, PDO::PARAM_STR);
						break;
					case '`OFF_MAX_PURCHASE`':
						$stmt->bindValue($identifier, $this->off_max_purchase, PDO::PARAM_STR);
						break;
					case '`CHECK_MAILED`':
						$stmt->bindValue($identifier, $this->check_mailed, PDO::PARAM_STR);
						break;
					case '`TRAVEL`':
						$stmt->bindValue($identifier, $this->travel, PDO::PARAM_STR);
						break;
					case '`CHECK_PICKED`':
						$stmt->bindValue($identifier, $this->check_picked, PDO::PARAM_STR);
						break;
					case '`EVENT_NAME`':
						$stmt->bindValue($identifier, $this->event_name, PDO::PARAM_STR);
						break;
					case '`DESTINATION`':
						$stmt->bindValue($identifier, $this->destination, PDO::PARAM_STR);
						break;
					case '`EVENT_DATE`':
						$stmt->bindValue($identifier, $this->event_date, PDO::PARAM_STR);
						break;
					case '`COMP_NAME`':
						$stmt->bindValue($identifier, $this->comp_name, PDO::PARAM_STR);
						break;
					case '`COMP_ADDRESS`':
						$stmt->bindValue($identifier, $this->comp_address, PDO::PARAM_STR);
						break;
					case '`COMP_CITY`':
						$stmt->bindValue($identifier, $this->comp_city, PDO::PARAM_STR);
						break;
					case '`COMP_STATE`':
						$stmt->bindValue($identifier, $this->comp_state, PDO::PARAM_STR);
						break;
					case '`COMP_ZIP`':
						$stmt->bindValue($identifier, $this->comp_zip, PDO::PARAM_STR);
						break;
					case '`COMP_PHONE`':
						$stmt->bindValue($identifier, $this->comp_phone, PDO::PARAM_STR);
						break;
					case '`COMP_FAX`':
						$stmt->bindValue($identifier, $this->comp_fax, PDO::PARAM_STR);
						break;
					case '`STUDENT_ID`':
						$stmt->bindValue($identifier, $this->student_id, PDO::PARAM_INT);
						break;
					case '`PURCHASE_DESC`':
						$stmt->bindValue($identifier, $this->purchase_desc, PDO::PARAM_STR);
						break;
					case '`TOTAL`':
						$stmt->bindValue($identifier, $this->total, PDO::PARAM_INT);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

		try {
			$pk = $con->lastInsertId();
		} catch (Exception $e) {
			throw new PropelException('Unable to get autoincrement id.', $e);
		}
		$this->setId($pk);

		$this->setNew(false);
	}

	/**
	 * Update the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @see        doSave()
	 */
	protected function doUpdate(PropelPDO $con)
	{
		$selectCriteria = $this->buildPkeyCriteria();
		$valuesCriteria = $this->buildCriteria();
		BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
	}

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = EafFormInfoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEafApprovalss !== null) {
					foreach ($this->collEafApprovalss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EafFormInfoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getEafFormNo();
				break;
			case 2:
				return $this->getVisaNo();
				break;
			case 3:
				return $this->getTxnDueDate();
				break;
			case 4:
				return $this->getReqName();
				break;
			case 5:
				return $this->getEafDate();
				break;
			case 6:
				return $this->getReqEmail();
				break;
			case 7:
				return $this->getReqPhone();
				break;
			case 8:
				return $this->getReqClubName();
				break;
			case 9:
				return $this->getAltReqName();
				break;
			case 10:
				return $this->getAltReqPhone();
				break;
			case 11:
				return $this->getAltReqEmail();
				break;
			case 12:
				return $this->getAccountNo();
				break;
			case 13:
				return $this->getCashNeeded();
				break;
			case 14:
				return $this->getCheckPayment();
				break;
			case 15:
				return $this->getVehicleRental();
				break;
			case 16:
				return $this->getHub();
				break;
			case 17:
				return $this->getVisa();
				break;
			case 18:
				return $this->getAfafAtfAwardNo();
				break;
			case 19:
				return $this->getTransFunds();
				break;
			case 20:
				return $this->getOffMaxPurchase();
				break;
			case 21:
				return $this->getCheckMailed();
				break;
			case 22:
				return $this->getTravel();
				break;
			case 23:
				return $this->getCheckPicked();
				break;
			case 24:
				return $this->getEventName();
				break;
			case 25:
				return $this->getDestination();
				break;
			case 26:
				return $this->getEventDate();
				break;
			case 27:
				return $this->getCompName();
				break;
			case 28:
				return $this->getCompAddress();
				break;
			case 29:
				return $this->getCompCity();
				break;
			case 30:
				return $this->getCompState();
				break;
			case 31:
				return $this->getCompZip();
				break;
			case 32:
				return $this->getCompPhone();
				break;
			case 33:
				return $this->getCompFax();
				break;
			case 34:
				return $this->getStudentId();
				break;
			case 35:
				return $this->getPurchaseDesc();
				break;
			case 36:
				return $this->getTotal();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['EafFormInfo'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['EafFormInfo'][$this->getPrimaryKey()] = true;
		$keys = EafFormInfoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEafFormNo(),
			$keys[2] => $this->getVisaNo(),
			$keys[3] => $this->getTxnDueDate(),
			$keys[4] => $this->getReqName(),
			$keys[5] => $this->getEafDate(),
			$keys[6] => $this->getReqEmail(),
			$keys[7] => $this->getReqPhone(),
			$keys[8] => $this->getReqClubName(),
			$keys[9] => $this->getAltReqName(),
			$keys[10] => $this->getAltReqPhone(),
			$keys[11] => $this->getAltReqEmail(),
			$keys[12] => $this->getAccountNo(),
			$keys[13] => $this->getCashNeeded(),
			$keys[14] => $this->getCheckPayment(),
			$keys[15] => $this->getVehicleRental(),
			$keys[16] => $this->getHub(),
			$keys[17] => $this->getVisa(),
			$keys[18] => $this->getAfafAtfAwardNo(),
			$keys[19] => $this->getTransFunds(),
			$keys[20] => $this->getOffMaxPurchase(),
			$keys[21] => $this->getCheckMailed(),
			$keys[22] => $this->getTravel(),
			$keys[23] => $this->getCheckPicked(),
			$keys[24] => $this->getEventName(),
			$keys[25] => $this->getDestination(),
			$keys[26] => $this->getEventDate(),
			$keys[27] => $this->getCompName(),
			$keys[28] => $this->getCompAddress(),
			$keys[29] => $this->getCompCity(),
			$keys[30] => $this->getCompState(),
			$keys[31] => $this->getCompZip(),
			$keys[32] => $this->getCompPhone(),
			$keys[33] => $this->getCompFax(),
			$keys[34] => $this->getStudentId(),
			$keys[35] => $this->getPurchaseDesc(),
			$keys[36] => $this->getTotal(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collEafApprovalss) {
				$result['EafApprovalss'] = $this->collEafApprovalss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EafFormInfoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setEafFormNo($value);
				break;
			case 2:
				$this->setVisaNo($value);
				break;
			case 3:
				$this->setTxnDueDate($value);
				break;
			case 4:
				$this->setReqName($value);
				break;
			case 5:
				$this->setEafDate($value);
				break;
			case 6:
				$this->setReqEmail($value);
				break;
			case 7:
				$this->setReqPhone($value);
				break;
			case 8:
				$this->setReqClubName($value);
				break;
			case 9:
				$this->setAltReqName($value);
				break;
			case 10:
				$this->setAltReqPhone($value);
				break;
			case 11:
				$this->setAltReqEmail($value);
				break;
			case 12:
				$this->setAccountNo($value);
				break;
			case 13:
				$this->setCashNeeded($value);
				break;
			case 14:
				$this->setCheckPayment($value);
				break;
			case 15:
				$this->setVehicleRental($value);
				break;
			case 16:
				$this->setHub($value);
				break;
			case 17:
				$this->setVisa($value);
				break;
			case 18:
				$this->setAfafAtfAwardNo($value);
				break;
			case 19:
				$this->setTransFunds($value);
				break;
			case 20:
				$this->setOffMaxPurchase($value);
				break;
			case 21:
				$this->setCheckMailed($value);
				break;
			case 22:
				$this->setTravel($value);
				break;
			case 23:
				$this->setCheckPicked($value);
				break;
			case 24:
				$this->setEventName($value);
				break;
			case 25:
				$this->setDestination($value);
				break;
			case 26:
				$this->setEventDate($value);
				break;
			case 27:
				$this->setCompName($value);
				break;
			case 28:
				$this->setCompAddress($value);
				break;
			case 29:
				$this->setCompCity($value);
				break;
			case 30:
				$this->setCompState($value);
				break;
			case 31:
				$this->setCompZip($value);
				break;
			case 32:
				$this->setCompPhone($value);
				break;
			case 33:
				$this->setCompFax($value);
				break;
			case 34:
				$this->setStudentId($value);
				break;
			case 35:
				$this->setPurchaseDesc($value);
				break;
			case 36:
				$this->setTotal($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EafFormInfoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEafFormNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setVisaNo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTxnDueDate($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setReqName($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEafDate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setReqEmail($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setReqPhone($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setReqClubName($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAltReqName($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAltReqPhone($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAltReqEmail($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAccountNo($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCashNeeded($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCheckPayment($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setVehicleRental($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setHub($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setVisa($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setAfafAtfAwardNo($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setTransFunds($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setOffMaxPurchase($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCheckMailed($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setTravel($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCheckPicked($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setEventName($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setDestination($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setEventDate($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setCompName($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCompAddress($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setCompCity($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCompState($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCompZip($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setCompPhone($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setCompFax($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setStudentId($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setPurchaseDesc($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setTotal($arr[$keys[36]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(EafFormInfoPeer::DATABASE_NAME);

		if ($this->isColumnModified(EafFormInfoPeer::ID)) $criteria->add(EafFormInfoPeer::ID, $this->id);
		if ($this->isColumnModified(EafFormInfoPeer::EAF_FORM_NO)) $criteria->add(EafFormInfoPeer::EAF_FORM_NO, $this->eaf_form_no);
		if ($this->isColumnModified(EafFormInfoPeer::VISA_NO)) $criteria->add(EafFormInfoPeer::VISA_NO, $this->visa_no);
		if ($this->isColumnModified(EafFormInfoPeer::TXN_DUE_DATE)) $criteria->add(EafFormInfoPeer::TXN_DUE_DATE, $this->txn_due_date);
		if ($this->isColumnModified(EafFormInfoPeer::REQ_NAME)) $criteria->add(EafFormInfoPeer::REQ_NAME, $this->req_name);
		if ($this->isColumnModified(EafFormInfoPeer::EAF_DATE)) $criteria->add(EafFormInfoPeer::EAF_DATE, $this->eaf_date);
		if ($this->isColumnModified(EafFormInfoPeer::REQ_EMAIL)) $criteria->add(EafFormInfoPeer::REQ_EMAIL, $this->req_email);
		if ($this->isColumnModified(EafFormInfoPeer::REQ_PHONE)) $criteria->add(EafFormInfoPeer::REQ_PHONE, $this->req_phone);
		if ($this->isColumnModified(EafFormInfoPeer::REQ_CLUB_NAME)) $criteria->add(EafFormInfoPeer::REQ_CLUB_NAME, $this->req_club_name);
		if ($this->isColumnModified(EafFormInfoPeer::ALT_REQ_NAME)) $criteria->add(EafFormInfoPeer::ALT_REQ_NAME, $this->alt_req_name);
		if ($this->isColumnModified(EafFormInfoPeer::ALT_REQ_PHONE)) $criteria->add(EafFormInfoPeer::ALT_REQ_PHONE, $this->alt_req_phone);
		if ($this->isColumnModified(EafFormInfoPeer::ALT_REQ_EMAIL)) $criteria->add(EafFormInfoPeer::ALT_REQ_EMAIL, $this->alt_req_email);
		if ($this->isColumnModified(EafFormInfoPeer::ACCOUNT_NO)) $criteria->add(EafFormInfoPeer::ACCOUNT_NO, $this->account_no);
		if ($this->isColumnModified(EafFormInfoPeer::CASH_NEEDED)) $criteria->add(EafFormInfoPeer::CASH_NEEDED, $this->cash_needed);
		if ($this->isColumnModified(EafFormInfoPeer::CHECK_PAYMENT)) $criteria->add(EafFormInfoPeer::CHECK_PAYMENT, $this->check_payment);
		if ($this->isColumnModified(EafFormInfoPeer::VEHICLE_RENTAL)) $criteria->add(EafFormInfoPeer::VEHICLE_RENTAL, $this->vehicle_rental);
		if ($this->isColumnModified(EafFormInfoPeer::HUB)) $criteria->add(EafFormInfoPeer::HUB, $this->hub);
		if ($this->isColumnModified(EafFormInfoPeer::VISA)) $criteria->add(EafFormInfoPeer::VISA, $this->visa);
		if ($this->isColumnModified(EafFormInfoPeer::AFAF_ATF_AWARD_NO)) $criteria->add(EafFormInfoPeer::AFAF_ATF_AWARD_NO, $this->afaf_atf_award_no);
		if ($this->isColumnModified(EafFormInfoPeer::TRANS_FUNDS)) $criteria->add(EafFormInfoPeer::TRANS_FUNDS, $this->trans_funds);
		if ($this->isColumnModified(EafFormInfoPeer::OFF_MAX_PURCHASE)) $criteria->add(EafFormInfoPeer::OFF_MAX_PURCHASE, $this->off_max_purchase);
		if ($this->isColumnModified(EafFormInfoPeer::CHECK_MAILED)) $criteria->add(EafFormInfoPeer::CHECK_MAILED, $this->check_mailed);
		if ($this->isColumnModified(EafFormInfoPeer::TRAVEL)) $criteria->add(EafFormInfoPeer::TRAVEL, $this->travel);
		if ($this->isColumnModified(EafFormInfoPeer::CHECK_PICKED)) $criteria->add(EafFormInfoPeer::CHECK_PICKED, $this->check_picked);
		if ($this->isColumnModified(EafFormInfoPeer::EVENT_NAME)) $criteria->add(EafFormInfoPeer::EVENT_NAME, $this->event_name);
		if ($this->isColumnModified(EafFormInfoPeer::DESTINATION)) $criteria->add(EafFormInfoPeer::DESTINATION, $this->destination);
		if ($this->isColumnModified(EafFormInfoPeer::EVENT_DATE)) $criteria->add(EafFormInfoPeer::EVENT_DATE, $this->event_date);
		if ($this->isColumnModified(EafFormInfoPeer::COMP_NAME)) $criteria->add(EafFormInfoPeer::COMP_NAME, $this->comp_name);
		if ($this->isColumnModified(EafFormInfoPeer::COMP_ADDRESS)) $criteria->add(EafFormInfoPeer::COMP_ADDRESS, $this->comp_address);
		if ($this->isColumnModified(EafFormInfoPeer::COMP_CITY)) $criteria->add(EafFormInfoPeer::COMP_CITY, $this->comp_city);
		if ($this->isColumnModified(EafFormInfoPeer::COMP_STATE)) $criteria->add(EafFormInfoPeer::COMP_STATE, $this->comp_state);
		if ($this->isColumnModified(EafFormInfoPeer::COMP_ZIP)) $criteria->add(EafFormInfoPeer::COMP_ZIP, $this->comp_zip);
		if ($this->isColumnModified(EafFormInfoPeer::COMP_PHONE)) $criteria->add(EafFormInfoPeer::COMP_PHONE, $this->comp_phone);
		if ($this->isColumnModified(EafFormInfoPeer::COMP_FAX)) $criteria->add(EafFormInfoPeer::COMP_FAX, $this->comp_fax);
		if ($this->isColumnModified(EafFormInfoPeer::STUDENT_ID)) $criteria->add(EafFormInfoPeer::STUDENT_ID, $this->student_id);
		if ($this->isColumnModified(EafFormInfoPeer::PURCHASE_DESC)) $criteria->add(EafFormInfoPeer::PURCHASE_DESC, $this->purchase_desc);
		if ($this->isColumnModified(EafFormInfoPeer::TOTAL)) $criteria->add(EafFormInfoPeer::TOTAL, $this->total);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EafFormInfoPeer::DATABASE_NAME);
		$criteria->add(EafFormInfoPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of EafFormInfo (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setEafFormNo($this->getEafFormNo());
		$copyObj->setVisaNo($this->getVisaNo());
		$copyObj->setTxnDueDate($this->getTxnDueDate());
		$copyObj->setReqName($this->getReqName());
		$copyObj->setEafDate($this->getEafDate());
		$copyObj->setReqEmail($this->getReqEmail());
		$copyObj->setReqPhone($this->getReqPhone());
		$copyObj->setReqClubName($this->getReqClubName());
		$copyObj->setAltReqName($this->getAltReqName());
		$copyObj->setAltReqPhone($this->getAltReqPhone());
		$copyObj->setAltReqEmail($this->getAltReqEmail());
		$copyObj->setAccountNo($this->getAccountNo());
		$copyObj->setCashNeeded($this->getCashNeeded());
		$copyObj->setCheckPayment($this->getCheckPayment());
		$copyObj->setVehicleRental($this->getVehicleRental());
		$copyObj->setHub($this->getHub());
		$copyObj->setVisa($this->getVisa());
		$copyObj->setAfafAtfAwardNo($this->getAfafAtfAwardNo());
		$copyObj->setTransFunds($this->getTransFunds());
		$copyObj->setOffMaxPurchase($this->getOffMaxPurchase());
		$copyObj->setCheckMailed($this->getCheckMailed());
		$copyObj->setTravel($this->getTravel());
		$copyObj->setCheckPicked($this->getCheckPicked());
		$copyObj->setEventName($this->getEventName());
		$copyObj->setDestination($this->getDestination());
		$copyObj->setEventDate($this->getEventDate());
		$copyObj->setCompName($this->getCompName());
		$copyObj->setCompAddress($this->getCompAddress());
		$copyObj->setCompCity($this->getCompCity());
		$copyObj->setCompState($this->getCompState());
		$copyObj->setCompZip($this->getCompZip());
		$copyObj->setCompPhone($this->getCompPhone());
		$copyObj->setCompFax($this->getCompFax());
		$copyObj->setStudentId($this->getStudentId());
		$copyObj->setPurchaseDesc($this->getPurchaseDesc());
		$copyObj->setTotal($this->getTotal());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getEafApprovalss() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addEafApprovals($relObj->copy($deepCopy));
				}
			}

			//unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     EafFormInfo Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     EafFormInfoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new EafFormInfoPeer();
		}
		return self::$peer;
	}


	/**
	 * Initializes a collection based on the name of a relation.
	 * Avoids crafting an 'init[$relationName]s' method name
	 * that wouldn't work when StandardEnglishPluralizer is used.
	 *
	 * @param      string $relationName The name of the relation to initialize
	 * @return     void
	 */
	public function initRelation($relationName)
	{
		if ('EafApprovals' == $relationName) {
			return $this->initEafApprovalss();
		}
	}

	/**
	 * Clears out the collEafApprovalss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addEafApprovalss()
	 */
	public function clearEafApprovalss()
	{
		$this->collEafApprovalss = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collEafApprovalss collection.
	 *
	 * By default this just sets the collEafApprovalss collection to an empty array (like clearcollEafApprovalss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initEafApprovalss($overrideExisting = true)
	{
		if (null !== $this->collEafApprovalss && !$overrideExisting) {
			return;
		}
		$this->collEafApprovalss = new PropelObjectCollection();
		$this->collEafApprovalss->setModel('EafApprovals');
	}

	/**
	 * Gets an array of EafApprovals objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this EafFormInfo is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array EafApprovals[] List of EafApprovals objects
	 * @throws     PropelException
	 */
	public function getEafApprovalss($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collEafApprovalss || null !== $criteria) {
			if ($this->isNew() && null === $this->collEafApprovalss) {
				// return empty collection
				$this->initEafApprovalss();
			} else {
				$collEafApprovalss = EafApprovalsQuery::create(null, $criteria)
					->filterByEafFormInfo($this)
					->find($con);
				if (null !== $criteria) {
					return $collEafApprovalss;
				}
				$this->collEafApprovalss = $collEafApprovalss;
			}
		}
		return $this->collEafApprovalss;
	}

	/**
	 * Sets a collection of EafApprovals objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $eafApprovalss A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setEafApprovalss(PropelCollection $eafApprovalss, PropelPDO $con = null)
	{
		$this->eafApprovalssScheduledForDeletion = $this->getEafApprovalss(new Criteria(), $con)->diff($eafApprovalss);

		foreach ($eafApprovalss as $eafApprovals) {
			// Fix issue with collection modified by reference
			if ($eafApprovals->isNew()) {
				$eafApprovals->setEafFormInfo($this);
			}
			$this->addEafApprovals($eafApprovals);
		}

		$this->collEafApprovalss = $eafApprovalss;
	}

	/**
	 * Returns the number of related EafApprovals objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related EafApprovals objects.
	 * @throws     PropelException
	 */
	public function countEafApprovalss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collEafApprovalss || null !== $criteria) {
			if ($this->isNew() && null === $this->collEafApprovalss) {
				return 0;
			} else {
				$query = EafApprovalsQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByEafFormInfo($this)
					->count($con);
			}
		} else {
			return count($this->collEafApprovalss);
		}
	}

	/**
	 * Method called to associate a EafApprovals object to this object
	 * through the EafApprovals foreign key attribute.
	 *
	 * @param      EafApprovals $l EafApprovals
	 * @return     EafFormInfo The current object (for fluent API support)
	 */
	public function addEafApprovals(EafApprovals $l)
	{
		if ($this->collEafApprovalss === null) {
			$this->initEafApprovalss();
		}
		if (!$this->collEafApprovalss->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddEafApprovals($l);
		}

		return $this;
	}

	/**
	 * @param	EafApprovals $eafApprovals The eafApprovals object to add.
	 */
	protected function doAddEafApprovals($eafApprovals)
	{
		$this->collEafApprovalss[]= $eafApprovals;
		$eafApprovals->setEafFormInfo($this);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->eaf_form_no = null;
		$this->visa_no = null;
		$this->txn_due_date = null;
		$this->req_name = null;
		$this->eaf_date = null;
		$this->req_email = null;
		$this->req_phone = null;
		$this->req_club_name = null;
		$this->alt_req_name = null;
		$this->alt_req_phone = null;
		$this->alt_req_email = null;
		$this->account_no = null;
		$this->cash_needed = null;
		$this->check_payment = null;
		$this->vehicle_rental = null;
		$this->hub = null;
		$this->visa = null;
		$this->afaf_atf_award_no = null;
		$this->trans_funds = null;
		$this->off_max_purchase = null;
		$this->check_mailed = null;
		$this->travel = null;
		$this->check_picked = null;
		$this->event_name = null;
		$this->destination = null;
		$this->event_date = null;
		$this->comp_name = null;
		$this->comp_address = null;
		$this->comp_city = null;
		$this->comp_state = null;
		$this->comp_zip = null;
		$this->comp_phone = null;
		$this->comp_fax = null;
		$this->student_id = null;
		$this->purchase_desc = null;
		$this->total = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collEafApprovalss) {
				foreach ($this->collEafApprovalss as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collEafApprovalss instanceof PropelCollection) {
			$this->collEafApprovalss->clearIterator();
		}
		$this->collEafApprovalss = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(EafFormInfoPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseEafFormInfo
