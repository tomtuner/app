<?php

namespace NewClubsORM\om;

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
use NewClubsORM\RecognitionDataArchivePeer;
use NewClubsORM\RecognitionDataArchiveQuery;

/**
 * Base class that represents a row from the 'recognition_data_archive' table.
 *
 * 
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseRecognitionDataArchive extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'NewClubsORM\\RecognitionDataArchivePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        RecognitionDataArchivePeer
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
	 * The value for the clubtype field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $clubtype;

	/**
	 * The value for the itf field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $itf;

	/**
	 * The value for the clubname field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $clubname;

	/**
	 * The value for the acronym field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $acronym;

	/**
	 * The value for the url field.
	 * @var        string
	 */
	protected $url;

	/**
	 * The value for the gen_email field.
	 * @var        string
	 */
	protected $gen_email;

	/**
	 * The value for the submitter field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $submitter;

	/**
	 * The value for the s_position field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $s_position;

	/**
	 * The value for the s_email field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $s_email;

	/**
	 * The value for the a_first field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $a_first;

	/**
	 * The value for the a_last field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $a_last;

	/**
	 * The value for the a_cphone field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $a_cphone;

	/**
	 * The value for the a_hphone field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $a_hphone;

	/**
	 * The value for the a_office field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $a_office;

	/**
	 * The value for the a_dept field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $a_dept;

	/**
	 * The value for the a_email field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $a_email;

	/**
	 * The value for the target field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $target;

	/**
	 * The value for the meetings field.
	 * @var        string
	 */
	protected $meetings;

	/**
	 * The value for the membercount field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $membercount;

	/**
	 * The value for the fees field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $fees;

	/**
	 * The value for the elections field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $elections;

	/**
	 * The value for the s_phone field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $s_phone;

	/**
	 * The value for the purpose field.
	 * @var        string
	 */
	protected $purpose;

	/**
	 * The value for the signature field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $signature;

	/**
	 * The value for the org_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $org_id;

	/**
	 * The value for the report_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $report_id;

	/**
	 * The value for the president field.
	 * @var        string
	 */
	protected $president;

	/**
	 * The value for the vice field.
	 * @var        string
	 */
	protected $vice;

	/**
	 * The value for the treasurer field.
	 * @var        string
	 */
	protected $treasurer;

	/**
	 * The value for the secretary field.
	 * @var        string
	 */
	protected $secretary;

	/**
	 * The value for the board field.
	 * @var        string
	 */
	protected $board;

	/**
	 * The value for the members field.
	 * @var        string
	 */
	protected $members;

	/**
	 * The value for the fall field.
	 * @var        string
	 */
	protected $fall;

	/**
	 * The value for the winter field.
	 * @var        string
	 */
	protected $winter;

	/**
	 * The value for the spring field.
	 * @var        string
	 */
	protected $spring;

	/**
	 * The value for the summer field.
	 * @var        string
	 */
	protected $summer;

	/**
	 * The value for the open_house field.
	 * @var        string
	 */
	protected $open_house;

	/**
	 * The value for the promo field.
	 * @var        string
	 */
	protected $promo;

	/**
	 * The value for the sig_pres field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $sig_pres;

	/**
	 * The value for the sig_adv field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $sig_adv;

	/**
	 * The value for the reason field.
	 * @var        string
	 */
	protected $reason;

	/**
	 * The value for the status field.
	 * @var        string
	 */
	protected $status;

	/**
	 * The value for the last_updated field.
	 * @var        string
	 */
	protected $last_updated;

	/**
	 * The value for the date field.
	 * @var        string
	 */
	protected $date;

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
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->clubtype = '';
		$this->itf = '';
		$this->clubname = '';
		$this->acronym = '';
		$this->submitter = '';
		$this->s_position = '';
		$this->s_email = '';
		$this->a_first = '';
		$this->a_last = '';
		$this->a_cphone = '';
		$this->a_hphone = '';
		$this->a_office = '';
		$this->a_dept = '';
		$this->a_email = '';
		$this->target = '';
		$this->membercount = '';
		$this->fees = '';
		$this->elections = '';
		$this->s_phone = '';
		$this->signature = '';
		$this->org_id = 0;
		$this->report_id = 0;
		$this->sig_pres = '';
		$this->sig_adv = '';
	}

	/**
	 * Initializes internal state of BaseRecognitionDataArchive object.
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
	 * Get the [clubtype] column value.
	 * 
	 * @return     string
	 */
	public function getClubtype()
	{
		return $this->clubtype;
	}

	/**
	 * Get the [itf] column value.
	 * 
	 * @return     string
	 */
	public function getItf()
	{
		return $this->itf;
	}

	/**
	 * Get the [clubname] column value.
	 * 
	 * @return     string
	 */
	public function getClubname()
	{
		return $this->clubname;
	}

	/**
	 * Get the [acronym] column value.
	 * 
	 * @return     string
	 */
	public function getAcronym()
	{
		return $this->acronym;
	}

	/**
	 * Get the [url] column value.
	 * 
	 * @return     string
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * Get the [gen_email] column value.
	 * 
	 * @return     string
	 */
	public function getGenEmail()
	{
		return $this->gen_email;
	}

	/**
	 * Get the [submitter] column value.
	 * 
	 * @return     string
	 */
	public function getSubmitter()
	{
		return $this->submitter;
	}

	/**
	 * Get the [s_position] column value.
	 * 
	 * @return     string
	 */
	public function getSPosition()
	{
		return $this->s_position;
	}

	/**
	 * Get the [s_email] column value.
	 * 
	 * @return     string
	 */
	public function getSEmail()
	{
		return $this->s_email;
	}

	/**
	 * Get the [a_first] column value.
	 * 
	 * @return     string
	 */
	public function getAFirst()
	{
		return $this->a_first;
	}

	/**
	 * Get the [a_last] column value.
	 * 
	 * @return     string
	 */
	public function getALast()
	{
		return $this->a_last;
	}

	/**
	 * Get the [a_cphone] column value.
	 * 
	 * @return     string
	 */
	public function getACphone()
	{
		return $this->a_cphone;
	}

	/**
	 * Get the [a_hphone] column value.
	 * 
	 * @return     string
	 */
	public function getAHphone()
	{
		return $this->a_hphone;
	}

	/**
	 * Get the [a_office] column value.
	 * 
	 * @return     string
	 */
	public function getAOffice()
	{
		return $this->a_office;
	}

	/**
	 * Get the [a_dept] column value.
	 * 
	 * @return     string
	 */
	public function getADept()
	{
		return $this->a_dept;
	}

	/**
	 * Get the [a_email] column value.
	 * 
	 * @return     string
	 */
	public function getAEmail()
	{
		return $this->a_email;
	}

	/**
	 * Get the [target] column value.
	 * 
	 * @return     string
	 */
	public function getTarget()
	{
		return $this->target;
	}

	/**
	 * Get the [meetings] column value.
	 * 
	 * @return     string
	 */
	public function getMeetings()
	{
		return $this->meetings;
	}

	/**
	 * Get the [membercount] column value.
	 * 
	 * @return     string
	 */
	public function getMembercount()
	{
		return $this->membercount;
	}

	/**
	 * Get the [fees] column value.
	 * 
	 * @return     string
	 */
	public function getFees()
	{
		return $this->fees;
	}

	/**
	 * Get the [elections] column value.
	 * 
	 * @return     string
	 */
	public function getElections()
	{
		return $this->elections;
	}

	/**
	 * Get the [s_phone] column value.
	 * 
	 * @return     string
	 */
	public function getSPhone()
	{
		return $this->s_phone;
	}

	/**
	 * Get the [purpose] column value.
	 * 
	 * @return     string
	 */
	public function getPurpose()
	{
		return $this->purpose;
	}

	/**
	 * Get the [signature] column value.
	 * 
	 * @return     string
	 */
	public function getSignature()
	{
		return $this->signature;
	}

	/**
	 * Get the [org_id] column value.
	 * 
	 * @return     int
	 */
	public function getOrgId()
	{
		return $this->org_id;
	}

	/**
	 * Get the [report_id] column value.
	 * 
	 * @return     int
	 */
	public function getReportId()
	{
		return $this->report_id;
	}

	/**
	 * Get the [president] column value.
	 * 
	 * @return     string
	 */
	public function getPresident()
	{
		return $this->president;
	}

	/**
	 * Get the [vice] column value.
	 * 
	 * @return     string
	 */
	public function getVice()
	{
		return $this->vice;
	}

	/**
	 * Get the [treasurer] column value.
	 * 
	 * @return     string
	 */
	public function getTreasurer()
	{
		return $this->treasurer;
	}

	/**
	 * Get the [secretary] column value.
	 * 
	 * @return     string
	 */
	public function getSecretary()
	{
		return $this->secretary;
	}

	/**
	 * Get the [board] column value.
	 * 
	 * @return     string
	 */
	public function getBoard()
	{
		return $this->board;
	}

	/**
	 * Get the [members] column value.
	 * 
	 * @return     string
	 */
	public function getMembers()
	{
		return $this->members;
	}

	/**
	 * Get the [fall] column value.
	 * 
	 * @return     string
	 */
	public function getFall()
	{
		return $this->fall;
	}

	/**
	 * Get the [winter] column value.
	 * 
	 * @return     string
	 */
	public function getWinter()
	{
		return $this->winter;
	}

	/**
	 * Get the [spring] column value.
	 * 
	 * @return     string
	 */
	public function getSpring()
	{
		return $this->spring;
	}

	/**
	 * Get the [summer] column value.
	 * 
	 * @return     string
	 */
	public function getSummer()
	{
		return $this->summer;
	}

	/**
	 * Get the [open_house] column value.
	 * 
	 * @return     string
	 */
	public function getOpenHouse()
	{
		return $this->open_house;
	}

	/**
	 * Get the [promo] column value.
	 * 
	 * @return     string
	 */
	public function getPromo()
	{
		return $this->promo;
	}

	/**
	 * Get the [sig_pres] column value.
	 * 
	 * @return     string
	 */
	public function getSigPres()
	{
		return $this->sig_pres;
	}

	/**
	 * Get the [sig_adv] column value.
	 * 
	 * @return     string
	 */
	public function getSigAdv()
	{
		return $this->sig_adv;
	}

	/**
	 * Get the [reason] column value.
	 * 
	 * @return     string
	 */
	public function getReason()
	{
		return $this->reason;
	}

	/**
	 * Get the [status] column value.
	 * 
	 * @return     string
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Get the [optionally formatted] temporal [last_updated] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getLastUpdated($format = '%x')
	{
		if ($this->last_updated === null) {
			return null;
		}


		if ($this->last_updated === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->last_updated);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_updated, true), $x);
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
	 * Get the [optionally formatted] temporal [date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDate($format = '%x')
	{
		if ($this->date === null) {
			return null;
		}


		if ($this->date === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date, true), $x);
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [clubtype] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setClubtype($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->clubtype !== $v) {
			$this->clubtype = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::CLUBTYPE;
		}

		return $this;
	} // setClubtype()

	/**
	 * Set the value of [itf] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setItf($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->itf !== $v) {
			$this->itf = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::ITF;
		}

		return $this;
	} // setItf()

	/**
	 * Set the value of [clubname] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setClubname($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->clubname !== $v) {
			$this->clubname = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::CLUBNAME;
		}

		return $this;
	} // setClubname()

	/**
	 * Set the value of [acronym] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setAcronym($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->acronym !== $v) {
			$this->acronym = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::ACRONYM;
		}

		return $this;
	} // setAcronym()

	/**
	 * Set the value of [url] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setUrl($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->url !== $v) {
			$this->url = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::URL;
		}

		return $this;
	} // setUrl()

	/**
	 * Set the value of [gen_email] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setGenEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->gen_email !== $v) {
			$this->gen_email = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::GEN_EMAIL;
		}

		return $this;
	} // setGenEmail()

	/**
	 * Set the value of [submitter] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setSubmitter($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->submitter !== $v) {
			$this->submitter = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::SUBMITTER;
		}

		return $this;
	} // setSubmitter()

	/**
	 * Set the value of [s_position] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setSPosition($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->s_position !== $v) {
			$this->s_position = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::S_POSITION;
		}

		return $this;
	} // setSPosition()

	/**
	 * Set the value of [s_email] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setSEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->s_email !== $v) {
			$this->s_email = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::S_EMAIL;
		}

		return $this;
	} // setSEmail()

	/**
	 * Set the value of [a_first] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setAFirst($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->a_first !== $v) {
			$this->a_first = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::A_FIRST;
		}

		return $this;
	} // setAFirst()

	/**
	 * Set the value of [a_last] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setALast($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->a_last !== $v) {
			$this->a_last = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::A_LAST;
		}

		return $this;
	} // setALast()

	/**
	 * Set the value of [a_cphone] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setACphone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->a_cphone !== $v) {
			$this->a_cphone = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::A_CPHONE;
		}

		return $this;
	} // setACphone()

	/**
	 * Set the value of [a_hphone] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setAHphone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->a_hphone !== $v) {
			$this->a_hphone = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::A_HPHONE;
		}

		return $this;
	} // setAHphone()

	/**
	 * Set the value of [a_office] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setAOffice($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->a_office !== $v) {
			$this->a_office = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::A_OFFICE;
		}

		return $this;
	} // setAOffice()

	/**
	 * Set the value of [a_dept] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setADept($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->a_dept !== $v) {
			$this->a_dept = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::A_DEPT;
		}

		return $this;
	} // setADept()

	/**
	 * Set the value of [a_email] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setAEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->a_email !== $v) {
			$this->a_email = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::A_EMAIL;
		}

		return $this;
	} // setAEmail()

	/**
	 * Set the value of [target] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setTarget($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->target !== $v) {
			$this->target = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::TARGET;
		}

		return $this;
	} // setTarget()

	/**
	 * Set the value of [meetings] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setMeetings($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->meetings !== $v) {
			$this->meetings = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::MEETINGS;
		}

		return $this;
	} // setMeetings()

	/**
	 * Set the value of [membercount] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setMembercount($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->membercount !== $v) {
			$this->membercount = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::MEMBERCOUNT;
		}

		return $this;
	} // setMembercount()

	/**
	 * Set the value of [fees] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setFees($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fees !== $v) {
			$this->fees = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::FEES;
		}

		return $this;
	} // setFees()

	/**
	 * Set the value of [elections] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setElections($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->elections !== $v) {
			$this->elections = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::ELECTIONS;
		}

		return $this;
	} // setElections()

	/**
	 * Set the value of [s_phone] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setSPhone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->s_phone !== $v) {
			$this->s_phone = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::S_PHONE;
		}

		return $this;
	} // setSPhone()

	/**
	 * Set the value of [purpose] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setPurpose($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->purpose !== $v) {
			$this->purpose = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::PURPOSE;
		}

		return $this;
	} // setPurpose()

	/**
	 * Set the value of [signature] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setSignature($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->signature !== $v) {
			$this->signature = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::SIGNATURE;
		}

		return $this;
	} // setSignature()

	/**
	 * Set the value of [org_id] column.
	 * 
	 * @param      int $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setOrgId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->org_id !== $v) {
			$this->org_id = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::ORG_ID;
		}

		return $this;
	} // setOrgId()

	/**
	 * Set the value of [report_id] column.
	 * 
	 * @param      int $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setReportId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->report_id !== $v) {
			$this->report_id = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::REPORT_ID;
		}

		return $this;
	} // setReportId()

	/**
	 * Set the value of [president] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setPresident($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->president !== $v) {
			$this->president = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::PRESIDENT;
		}

		return $this;
	} // setPresident()

	/**
	 * Set the value of [vice] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setVice($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->vice !== $v) {
			$this->vice = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::VICE;
		}

		return $this;
	} // setVice()

	/**
	 * Set the value of [treasurer] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setTreasurer($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->treasurer !== $v) {
			$this->treasurer = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::TREASURER;
		}

		return $this;
	} // setTreasurer()

	/**
	 * Set the value of [secretary] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setSecretary($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->secretary !== $v) {
			$this->secretary = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::SECRETARY;
		}

		return $this;
	} // setSecretary()

	/**
	 * Set the value of [board] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setBoard($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->board !== $v) {
			$this->board = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::BOARD;
		}

		return $this;
	} // setBoard()

	/**
	 * Set the value of [members] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setMembers($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->members !== $v) {
			$this->members = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::MEMBERS;
		}

		return $this;
	} // setMembers()

	/**
	 * Set the value of [fall] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setFall($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fall !== $v) {
			$this->fall = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::FALL;
		}

		return $this;
	} // setFall()

	/**
	 * Set the value of [winter] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setWinter($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->winter !== $v) {
			$this->winter = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::WINTER;
		}

		return $this;
	} // setWinter()

	/**
	 * Set the value of [spring] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setSpring($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->spring !== $v) {
			$this->spring = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::SPRING;
		}

		return $this;
	} // setSpring()

	/**
	 * Set the value of [summer] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setSummer($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->summer !== $v) {
			$this->summer = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::SUMMER;
		}

		return $this;
	} // setSummer()

	/**
	 * Set the value of [open_house] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setOpenHouse($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->open_house !== $v) {
			$this->open_house = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::OPEN_HOUSE;
		}

		return $this;
	} // setOpenHouse()

	/**
	 * Set the value of [promo] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setPromo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->promo !== $v) {
			$this->promo = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::PROMO;
		}

		return $this;
	} // setPromo()

	/**
	 * Set the value of [sig_pres] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setSigPres($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sig_pres !== $v) {
			$this->sig_pres = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::SIG_PRES;
		}

		return $this;
	} // setSigPres()

	/**
	 * Set the value of [sig_adv] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setSigAdv($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sig_adv !== $v) {
			$this->sig_adv = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::SIG_ADV;
		}

		return $this;
	} // setSigAdv()

	/**
	 * Set the value of [reason] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setReason($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->reason !== $v) {
			$this->reason = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::REASON;
		}

		return $this;
	} // setReason()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = RecognitionDataArchivePeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Sets the value of [last_updated] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setLastUpdated($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->last_updated !== null || $dt !== null) {
			$currentDateAsString = ($this->last_updated !== null && $tmpDt = new DateTime($this->last_updated)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->last_updated = $newDateAsString;
				$this->modifiedColumns[] = RecognitionDataArchivePeer::LAST_UPDATED;
			}
		} // if either are not null

		return $this;
	} // setLastUpdated()

	/**
	 * Sets the value of [date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     RecognitionDataArchive The current object (for fluent API support)
	 */
	public function setDate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->date !== null || $dt !== null) {
			$currentDateAsString = ($this->date !== null && $tmpDt = new DateTime($this->date)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->date = $newDateAsString;
				$this->modifiedColumns[] = RecognitionDataArchivePeer::DATE;
			}
		} // if either are not null

		return $this;
	} // setDate()

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
			if ($this->clubtype !== '') {
				return false;
			}

			if ($this->itf !== '') {
				return false;
			}

			if ($this->clubname !== '') {
				return false;
			}

			if ($this->acronym !== '') {
				return false;
			}

			if ($this->submitter !== '') {
				return false;
			}

			if ($this->s_position !== '') {
				return false;
			}

			if ($this->s_email !== '') {
				return false;
			}

			if ($this->a_first !== '') {
				return false;
			}

			if ($this->a_last !== '') {
				return false;
			}

			if ($this->a_cphone !== '') {
				return false;
			}

			if ($this->a_hphone !== '') {
				return false;
			}

			if ($this->a_office !== '') {
				return false;
			}

			if ($this->a_dept !== '') {
				return false;
			}

			if ($this->a_email !== '') {
				return false;
			}

			if ($this->target !== '') {
				return false;
			}

			if ($this->membercount !== '') {
				return false;
			}

			if ($this->fees !== '') {
				return false;
			}

			if ($this->elections !== '') {
				return false;
			}

			if ($this->s_phone !== '') {
				return false;
			}

			if ($this->signature !== '') {
				return false;
			}

			if ($this->org_id !== 0) {
				return false;
			}

			if ($this->report_id !== 0) {
				return false;
			}

			if ($this->sig_pres !== '') {
				return false;
			}

			if ($this->sig_adv !== '') {
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
			$this->clubtype = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->itf = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->clubname = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->acronym = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->url = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->gen_email = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->submitter = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->s_position = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->s_email = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->a_first = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->a_last = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->a_cphone = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->a_hphone = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->a_office = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->a_dept = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->a_email = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->target = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->meetings = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->membercount = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->fees = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
			$this->elections = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
			$this->s_phone = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
			$this->purpose = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
			$this->signature = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
			$this->org_id = ($row[$startcol + 25] !== null) ? (int) $row[$startcol + 25] : null;
			$this->report_id = ($row[$startcol + 26] !== null) ? (int) $row[$startcol + 26] : null;
			$this->president = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
			$this->vice = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
			$this->treasurer = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
			$this->secretary = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
			$this->board = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
			$this->members = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
			$this->fall = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
			$this->winter = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
			$this->spring = ($row[$startcol + 35] !== null) ? (string) $row[$startcol + 35] : null;
			$this->summer = ($row[$startcol + 36] !== null) ? (string) $row[$startcol + 36] : null;
			$this->open_house = ($row[$startcol + 37] !== null) ? (string) $row[$startcol + 37] : null;
			$this->promo = ($row[$startcol + 38] !== null) ? (string) $row[$startcol + 38] : null;
			$this->sig_pres = ($row[$startcol + 39] !== null) ? (string) $row[$startcol + 39] : null;
			$this->sig_adv = ($row[$startcol + 40] !== null) ? (string) $row[$startcol + 40] : null;
			$this->reason = ($row[$startcol + 41] !== null) ? (string) $row[$startcol + 41] : null;
			$this->status = ($row[$startcol + 42] !== null) ? (string) $row[$startcol + 42] : null;
			$this->last_updated = ($row[$startcol + 43] !== null) ? (string) $row[$startcol + 43] : null;
			$this->date = ($row[$startcol + 44] !== null) ? (string) $row[$startcol + 44] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 45; // 45 = RecognitionDataArchivePeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating RecognitionDataArchive object", $e);
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
			$con = Propel::getConnection(RecognitionDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = RecognitionDataArchivePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

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
			$con = Propel::getConnection(RecognitionDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = RecognitionDataArchiveQuery::create()
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
			$con = Propel::getConnection(RecognitionDataArchivePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				RecognitionDataArchivePeer::addInstanceToPool($this);
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

		$this->modifiedColumns[] = RecognitionDataArchivePeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . RecognitionDataArchivePeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(RecognitionDataArchivePeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::CLUBTYPE)) {
			$modifiedColumns[':p' . $index++]  = '`CLUBTYPE`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::ITF)) {
			$modifiedColumns[':p' . $index++]  = '`ITF`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::CLUBNAME)) {
			$modifiedColumns[':p' . $index++]  = '`CLUBNAME`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::ACRONYM)) {
			$modifiedColumns[':p' . $index++]  = '`ACRONYM`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::URL)) {
			$modifiedColumns[':p' . $index++]  = '`URL`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::GEN_EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`GEN_EMAIL`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::SUBMITTER)) {
			$modifiedColumns[':p' . $index++]  = '`SUBMITTER`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::S_POSITION)) {
			$modifiedColumns[':p' . $index++]  = '`S_POSITION`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::S_EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`S_EMAIL`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::A_FIRST)) {
			$modifiedColumns[':p' . $index++]  = '`A_FIRST`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::A_LAST)) {
			$modifiedColumns[':p' . $index++]  = '`A_LAST`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::A_CPHONE)) {
			$modifiedColumns[':p' . $index++]  = '`A_CPHONE`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::A_HPHONE)) {
			$modifiedColumns[':p' . $index++]  = '`A_HPHONE`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::A_OFFICE)) {
			$modifiedColumns[':p' . $index++]  = '`A_OFFICE`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::A_DEPT)) {
			$modifiedColumns[':p' . $index++]  = '`A_DEPT`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::A_EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`A_EMAIL`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::TARGET)) {
			$modifiedColumns[':p' . $index++]  = '`TARGET`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::MEETINGS)) {
			$modifiedColumns[':p' . $index++]  = '`MEETINGS`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::MEMBERCOUNT)) {
			$modifiedColumns[':p' . $index++]  = '`MEMBERCOUNT`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::FEES)) {
			$modifiedColumns[':p' . $index++]  = '`FEES`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::ELECTIONS)) {
			$modifiedColumns[':p' . $index++]  = '`ELECTIONS`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::S_PHONE)) {
			$modifiedColumns[':p' . $index++]  = '`S_PHONE`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::PURPOSE)) {
			$modifiedColumns[':p' . $index++]  = '`PURPOSE`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::SIGNATURE)) {
			$modifiedColumns[':p' . $index++]  = '`SIGNATURE`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::ORG_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ORG_ID`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::REPORT_ID)) {
			$modifiedColumns[':p' . $index++]  = '`REPORT_ID`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::PRESIDENT)) {
			$modifiedColumns[':p' . $index++]  = '`PRESIDENT`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::VICE)) {
			$modifiedColumns[':p' . $index++]  = '`VICE`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::TREASURER)) {
			$modifiedColumns[':p' . $index++]  = '`TREASURER`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::SECRETARY)) {
			$modifiedColumns[':p' . $index++]  = '`SECRETARY`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::BOARD)) {
			$modifiedColumns[':p' . $index++]  = '`BOARD`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::MEMBERS)) {
			$modifiedColumns[':p' . $index++]  = '`MEMBERS`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::FALL)) {
			$modifiedColumns[':p' . $index++]  = '`FALL`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::WINTER)) {
			$modifiedColumns[':p' . $index++]  = '`WINTER`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::SPRING)) {
			$modifiedColumns[':p' . $index++]  = '`SPRING`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::SUMMER)) {
			$modifiedColumns[':p' . $index++]  = '`SUMMER`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::OPEN_HOUSE)) {
			$modifiedColumns[':p' . $index++]  = '`OPEN_HOUSE`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::PROMO)) {
			$modifiedColumns[':p' . $index++]  = '`PROMO`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::SIG_PRES)) {
			$modifiedColumns[':p' . $index++]  = '`SIG_PRES`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::SIG_ADV)) {
			$modifiedColumns[':p' . $index++]  = '`SIG_ADV`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::REASON)) {
			$modifiedColumns[':p' . $index++]  = '`REASON`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::STATUS)) {
			$modifiedColumns[':p' . $index++]  = '`STATUS`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::LAST_UPDATED)) {
			$modifiedColumns[':p' . $index++]  = '`LAST_UPDATED`';
		}
		if ($this->isColumnModified(RecognitionDataArchivePeer::DATE)) {
			$modifiedColumns[':p' . $index++]  = '`DATE`';
		}

		$sql = sprintf(
			'INSERT INTO `recognition_data_archive` (%s) VALUES (%s)',
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
					case '`CLUBTYPE`':
						$stmt->bindValue($identifier, $this->clubtype, PDO::PARAM_STR);
						break;
					case '`ITF`':
						$stmt->bindValue($identifier, $this->itf, PDO::PARAM_STR);
						break;
					case '`CLUBNAME`':
						$stmt->bindValue($identifier, $this->clubname, PDO::PARAM_STR);
						break;
					case '`ACRONYM`':
						$stmt->bindValue($identifier, $this->acronym, PDO::PARAM_STR);
						break;
					case '`URL`':
						$stmt->bindValue($identifier, $this->url, PDO::PARAM_STR);
						break;
					case '`GEN_EMAIL`':
						$stmt->bindValue($identifier, $this->gen_email, PDO::PARAM_STR);
						break;
					case '`SUBMITTER`':
						$stmt->bindValue($identifier, $this->submitter, PDO::PARAM_STR);
						break;
					case '`S_POSITION`':
						$stmt->bindValue($identifier, $this->s_position, PDO::PARAM_STR);
						break;
					case '`S_EMAIL`':
						$stmt->bindValue($identifier, $this->s_email, PDO::PARAM_STR);
						break;
					case '`A_FIRST`':
						$stmt->bindValue($identifier, $this->a_first, PDO::PARAM_STR);
						break;
					case '`A_LAST`':
						$stmt->bindValue($identifier, $this->a_last, PDO::PARAM_STR);
						break;
					case '`A_CPHONE`':
						$stmt->bindValue($identifier, $this->a_cphone, PDO::PARAM_STR);
						break;
					case '`A_HPHONE`':
						$stmt->bindValue($identifier, $this->a_hphone, PDO::PARAM_STR);
						break;
					case '`A_OFFICE`':
						$stmt->bindValue($identifier, $this->a_office, PDO::PARAM_STR);
						break;
					case '`A_DEPT`':
						$stmt->bindValue($identifier, $this->a_dept, PDO::PARAM_STR);
						break;
					case '`A_EMAIL`':
						$stmt->bindValue($identifier, $this->a_email, PDO::PARAM_STR);
						break;
					case '`TARGET`':
						$stmt->bindValue($identifier, $this->target, PDO::PARAM_STR);
						break;
					case '`MEETINGS`':
						$stmt->bindValue($identifier, $this->meetings, PDO::PARAM_STR);
						break;
					case '`MEMBERCOUNT`':
						$stmt->bindValue($identifier, $this->membercount, PDO::PARAM_STR);
						break;
					case '`FEES`':
						$stmt->bindValue($identifier, $this->fees, PDO::PARAM_STR);
						break;
					case '`ELECTIONS`':
						$stmt->bindValue($identifier, $this->elections, PDO::PARAM_STR);
						break;
					case '`S_PHONE`':
						$stmt->bindValue($identifier, $this->s_phone, PDO::PARAM_STR);
						break;
					case '`PURPOSE`':
						$stmt->bindValue($identifier, $this->purpose, PDO::PARAM_STR);
						break;
					case '`SIGNATURE`':
						$stmt->bindValue($identifier, $this->signature, PDO::PARAM_STR);
						break;
					case '`ORG_ID`':
						$stmt->bindValue($identifier, $this->org_id, PDO::PARAM_INT);
						break;
					case '`REPORT_ID`':
						$stmt->bindValue($identifier, $this->report_id, PDO::PARAM_INT);
						break;
					case '`PRESIDENT`':
						$stmt->bindValue($identifier, $this->president, PDO::PARAM_STR);
						break;
					case '`VICE`':
						$stmt->bindValue($identifier, $this->vice, PDO::PARAM_STR);
						break;
					case '`TREASURER`':
						$stmt->bindValue($identifier, $this->treasurer, PDO::PARAM_STR);
						break;
					case '`SECRETARY`':
						$stmt->bindValue($identifier, $this->secretary, PDO::PARAM_STR);
						break;
					case '`BOARD`':
						$stmt->bindValue($identifier, $this->board, PDO::PARAM_STR);
						break;
					case '`MEMBERS`':
						$stmt->bindValue($identifier, $this->members, PDO::PARAM_STR);
						break;
					case '`FALL`':
						$stmt->bindValue($identifier, $this->fall, PDO::PARAM_STR);
						break;
					case '`WINTER`':
						$stmt->bindValue($identifier, $this->winter, PDO::PARAM_STR);
						break;
					case '`SPRING`':
						$stmt->bindValue($identifier, $this->spring, PDO::PARAM_STR);
						break;
					case '`SUMMER`':
						$stmt->bindValue($identifier, $this->summer, PDO::PARAM_STR);
						break;
					case '`OPEN_HOUSE`':
						$stmt->bindValue($identifier, $this->open_house, PDO::PARAM_STR);
						break;
					case '`PROMO`':
						$stmt->bindValue($identifier, $this->promo, PDO::PARAM_STR);
						break;
					case '`SIG_PRES`':
						$stmt->bindValue($identifier, $this->sig_pres, PDO::PARAM_STR);
						break;
					case '`SIG_ADV`':
						$stmt->bindValue($identifier, $this->sig_adv, PDO::PARAM_STR);
						break;
					case '`REASON`':
						$stmt->bindValue($identifier, $this->reason, PDO::PARAM_STR);
						break;
					case '`STATUS`':
						$stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
						break;
					case '`LAST_UPDATED`':
						$stmt->bindValue($identifier, $this->last_updated, PDO::PARAM_STR);
						break;
					case '`DATE`':
						$stmt->bindValue($identifier, $this->date, PDO::PARAM_STR);
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


			if (($retval = RecognitionDataArchivePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = RecognitionDataArchivePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getClubtype();
				break;
			case 2:
				return $this->getItf();
				break;
			case 3:
				return $this->getClubname();
				break;
			case 4:
				return $this->getAcronym();
				break;
			case 5:
				return $this->getUrl();
				break;
			case 6:
				return $this->getGenEmail();
				break;
			case 7:
				return $this->getSubmitter();
				break;
			case 8:
				return $this->getSPosition();
				break;
			case 9:
				return $this->getSEmail();
				break;
			case 10:
				return $this->getAFirst();
				break;
			case 11:
				return $this->getALast();
				break;
			case 12:
				return $this->getACphone();
				break;
			case 13:
				return $this->getAHphone();
				break;
			case 14:
				return $this->getAOffice();
				break;
			case 15:
				return $this->getADept();
				break;
			case 16:
				return $this->getAEmail();
				break;
			case 17:
				return $this->getTarget();
				break;
			case 18:
				return $this->getMeetings();
				break;
			case 19:
				return $this->getMembercount();
				break;
			case 20:
				return $this->getFees();
				break;
			case 21:
				return $this->getElections();
				break;
			case 22:
				return $this->getSPhone();
				break;
			case 23:
				return $this->getPurpose();
				break;
			case 24:
				return $this->getSignature();
				break;
			case 25:
				return $this->getOrgId();
				break;
			case 26:
				return $this->getReportId();
				break;
			case 27:
				return $this->getPresident();
				break;
			case 28:
				return $this->getVice();
				break;
			case 29:
				return $this->getTreasurer();
				break;
			case 30:
				return $this->getSecretary();
				break;
			case 31:
				return $this->getBoard();
				break;
			case 32:
				return $this->getMembers();
				break;
			case 33:
				return $this->getFall();
				break;
			case 34:
				return $this->getWinter();
				break;
			case 35:
				return $this->getSpring();
				break;
			case 36:
				return $this->getSummer();
				break;
			case 37:
				return $this->getOpenHouse();
				break;
			case 38:
				return $this->getPromo();
				break;
			case 39:
				return $this->getSigPres();
				break;
			case 40:
				return $this->getSigAdv();
				break;
			case 41:
				return $this->getReason();
				break;
			case 42:
				return $this->getStatus();
				break;
			case 43:
				return $this->getLastUpdated();
				break;
			case 44:
				return $this->getDate();
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
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
	{
		if (isset($alreadyDumpedObjects['RecognitionDataArchive'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['RecognitionDataArchive'][$this->getPrimaryKey()] = true;
		$keys = RecognitionDataArchivePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getClubtype(),
			$keys[2] => $this->getItf(),
			$keys[3] => $this->getClubname(),
			$keys[4] => $this->getAcronym(),
			$keys[5] => $this->getUrl(),
			$keys[6] => $this->getGenEmail(),
			$keys[7] => $this->getSubmitter(),
			$keys[8] => $this->getSPosition(),
			$keys[9] => $this->getSEmail(),
			$keys[10] => $this->getAFirst(),
			$keys[11] => $this->getALast(),
			$keys[12] => $this->getACphone(),
			$keys[13] => $this->getAHphone(),
			$keys[14] => $this->getAOffice(),
			$keys[15] => $this->getADept(),
			$keys[16] => $this->getAEmail(),
			$keys[17] => $this->getTarget(),
			$keys[18] => $this->getMeetings(),
			$keys[19] => $this->getMembercount(),
			$keys[20] => $this->getFees(),
			$keys[21] => $this->getElections(),
			$keys[22] => $this->getSPhone(),
			$keys[23] => $this->getPurpose(),
			$keys[24] => $this->getSignature(),
			$keys[25] => $this->getOrgId(),
			$keys[26] => $this->getReportId(),
			$keys[27] => $this->getPresident(),
			$keys[28] => $this->getVice(),
			$keys[29] => $this->getTreasurer(),
			$keys[30] => $this->getSecretary(),
			$keys[31] => $this->getBoard(),
			$keys[32] => $this->getMembers(),
			$keys[33] => $this->getFall(),
			$keys[34] => $this->getWinter(),
			$keys[35] => $this->getSpring(),
			$keys[36] => $this->getSummer(),
			$keys[37] => $this->getOpenHouse(),
			$keys[38] => $this->getPromo(),
			$keys[39] => $this->getSigPres(),
			$keys[40] => $this->getSigAdv(),
			$keys[41] => $this->getReason(),
			$keys[42] => $this->getStatus(),
			$keys[43] => $this->getLastUpdated(),
			$keys[44] => $this->getDate(),
		);
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
		$pos = RecognitionDataArchivePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setClubtype($value);
				break;
			case 2:
				$this->setItf($value);
				break;
			case 3:
				$this->setClubname($value);
				break;
			case 4:
				$this->setAcronym($value);
				break;
			case 5:
				$this->setUrl($value);
				break;
			case 6:
				$this->setGenEmail($value);
				break;
			case 7:
				$this->setSubmitter($value);
				break;
			case 8:
				$this->setSPosition($value);
				break;
			case 9:
				$this->setSEmail($value);
				break;
			case 10:
				$this->setAFirst($value);
				break;
			case 11:
				$this->setALast($value);
				break;
			case 12:
				$this->setACphone($value);
				break;
			case 13:
				$this->setAHphone($value);
				break;
			case 14:
				$this->setAOffice($value);
				break;
			case 15:
				$this->setADept($value);
				break;
			case 16:
				$this->setAEmail($value);
				break;
			case 17:
				$this->setTarget($value);
				break;
			case 18:
				$this->setMeetings($value);
				break;
			case 19:
				$this->setMembercount($value);
				break;
			case 20:
				$this->setFees($value);
				break;
			case 21:
				$this->setElections($value);
				break;
			case 22:
				$this->setSPhone($value);
				break;
			case 23:
				$this->setPurpose($value);
				break;
			case 24:
				$this->setSignature($value);
				break;
			case 25:
				$this->setOrgId($value);
				break;
			case 26:
				$this->setReportId($value);
				break;
			case 27:
				$this->setPresident($value);
				break;
			case 28:
				$this->setVice($value);
				break;
			case 29:
				$this->setTreasurer($value);
				break;
			case 30:
				$this->setSecretary($value);
				break;
			case 31:
				$this->setBoard($value);
				break;
			case 32:
				$this->setMembers($value);
				break;
			case 33:
				$this->setFall($value);
				break;
			case 34:
				$this->setWinter($value);
				break;
			case 35:
				$this->setSpring($value);
				break;
			case 36:
				$this->setSummer($value);
				break;
			case 37:
				$this->setOpenHouse($value);
				break;
			case 38:
				$this->setPromo($value);
				break;
			case 39:
				$this->setSigPres($value);
				break;
			case 40:
				$this->setSigAdv($value);
				break;
			case 41:
				$this->setReason($value);
				break;
			case 42:
				$this->setStatus($value);
				break;
			case 43:
				$this->setLastUpdated($value);
				break;
			case 44:
				$this->setDate($value);
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
		$keys = RecognitionDataArchivePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setClubtype($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setItf($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setClubname($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAcronym($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUrl($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setGenEmail($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSubmitter($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSPosition($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSEmail($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAFirst($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setALast($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setACphone($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAHphone($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAOffice($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setADept($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setAEmail($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setTarget($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setMeetings($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setMembercount($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFees($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setElections($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setSPhone($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setPurpose($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setSignature($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setOrgId($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setReportId($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setPresident($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setVice($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setTreasurer($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setSecretary($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setBoard($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setMembers($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setFall($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setWinter($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setSpring($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setSummer($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setOpenHouse($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setPromo($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setSigPres($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setSigAdv($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setReason($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setStatus($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setLastUpdated($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setDate($arr[$keys[44]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(RecognitionDataArchivePeer::DATABASE_NAME);

		if ($this->isColumnModified(RecognitionDataArchivePeer::ID)) $criteria->add(RecognitionDataArchivePeer::ID, $this->id);
		if ($this->isColumnModified(RecognitionDataArchivePeer::CLUBTYPE)) $criteria->add(RecognitionDataArchivePeer::CLUBTYPE, $this->clubtype);
		if ($this->isColumnModified(RecognitionDataArchivePeer::ITF)) $criteria->add(RecognitionDataArchivePeer::ITF, $this->itf);
		if ($this->isColumnModified(RecognitionDataArchivePeer::CLUBNAME)) $criteria->add(RecognitionDataArchivePeer::CLUBNAME, $this->clubname);
		if ($this->isColumnModified(RecognitionDataArchivePeer::ACRONYM)) $criteria->add(RecognitionDataArchivePeer::ACRONYM, $this->acronym);
		if ($this->isColumnModified(RecognitionDataArchivePeer::URL)) $criteria->add(RecognitionDataArchivePeer::URL, $this->url);
		if ($this->isColumnModified(RecognitionDataArchivePeer::GEN_EMAIL)) $criteria->add(RecognitionDataArchivePeer::GEN_EMAIL, $this->gen_email);
		if ($this->isColumnModified(RecognitionDataArchivePeer::SUBMITTER)) $criteria->add(RecognitionDataArchivePeer::SUBMITTER, $this->submitter);
		if ($this->isColumnModified(RecognitionDataArchivePeer::S_POSITION)) $criteria->add(RecognitionDataArchivePeer::S_POSITION, $this->s_position);
		if ($this->isColumnModified(RecognitionDataArchivePeer::S_EMAIL)) $criteria->add(RecognitionDataArchivePeer::S_EMAIL, $this->s_email);
		if ($this->isColumnModified(RecognitionDataArchivePeer::A_FIRST)) $criteria->add(RecognitionDataArchivePeer::A_FIRST, $this->a_first);
		if ($this->isColumnModified(RecognitionDataArchivePeer::A_LAST)) $criteria->add(RecognitionDataArchivePeer::A_LAST, $this->a_last);
		if ($this->isColumnModified(RecognitionDataArchivePeer::A_CPHONE)) $criteria->add(RecognitionDataArchivePeer::A_CPHONE, $this->a_cphone);
		if ($this->isColumnModified(RecognitionDataArchivePeer::A_HPHONE)) $criteria->add(RecognitionDataArchivePeer::A_HPHONE, $this->a_hphone);
		if ($this->isColumnModified(RecognitionDataArchivePeer::A_OFFICE)) $criteria->add(RecognitionDataArchivePeer::A_OFFICE, $this->a_office);
		if ($this->isColumnModified(RecognitionDataArchivePeer::A_DEPT)) $criteria->add(RecognitionDataArchivePeer::A_DEPT, $this->a_dept);
		if ($this->isColumnModified(RecognitionDataArchivePeer::A_EMAIL)) $criteria->add(RecognitionDataArchivePeer::A_EMAIL, $this->a_email);
		if ($this->isColumnModified(RecognitionDataArchivePeer::TARGET)) $criteria->add(RecognitionDataArchivePeer::TARGET, $this->target);
		if ($this->isColumnModified(RecognitionDataArchivePeer::MEETINGS)) $criteria->add(RecognitionDataArchivePeer::MEETINGS, $this->meetings);
		if ($this->isColumnModified(RecognitionDataArchivePeer::MEMBERCOUNT)) $criteria->add(RecognitionDataArchivePeer::MEMBERCOUNT, $this->membercount);
		if ($this->isColumnModified(RecognitionDataArchivePeer::FEES)) $criteria->add(RecognitionDataArchivePeer::FEES, $this->fees);
		if ($this->isColumnModified(RecognitionDataArchivePeer::ELECTIONS)) $criteria->add(RecognitionDataArchivePeer::ELECTIONS, $this->elections);
		if ($this->isColumnModified(RecognitionDataArchivePeer::S_PHONE)) $criteria->add(RecognitionDataArchivePeer::S_PHONE, $this->s_phone);
		if ($this->isColumnModified(RecognitionDataArchivePeer::PURPOSE)) $criteria->add(RecognitionDataArchivePeer::PURPOSE, $this->purpose);
		if ($this->isColumnModified(RecognitionDataArchivePeer::SIGNATURE)) $criteria->add(RecognitionDataArchivePeer::SIGNATURE, $this->signature);
		if ($this->isColumnModified(RecognitionDataArchivePeer::ORG_ID)) $criteria->add(RecognitionDataArchivePeer::ORG_ID, $this->org_id);
		if ($this->isColumnModified(RecognitionDataArchivePeer::REPORT_ID)) $criteria->add(RecognitionDataArchivePeer::REPORT_ID, $this->report_id);
		if ($this->isColumnModified(RecognitionDataArchivePeer::PRESIDENT)) $criteria->add(RecognitionDataArchivePeer::PRESIDENT, $this->president);
		if ($this->isColumnModified(RecognitionDataArchivePeer::VICE)) $criteria->add(RecognitionDataArchivePeer::VICE, $this->vice);
		if ($this->isColumnModified(RecognitionDataArchivePeer::TREASURER)) $criteria->add(RecognitionDataArchivePeer::TREASURER, $this->treasurer);
		if ($this->isColumnModified(RecognitionDataArchivePeer::SECRETARY)) $criteria->add(RecognitionDataArchivePeer::SECRETARY, $this->secretary);
		if ($this->isColumnModified(RecognitionDataArchivePeer::BOARD)) $criteria->add(RecognitionDataArchivePeer::BOARD, $this->board);
		if ($this->isColumnModified(RecognitionDataArchivePeer::MEMBERS)) $criteria->add(RecognitionDataArchivePeer::MEMBERS, $this->members);
		if ($this->isColumnModified(RecognitionDataArchivePeer::FALL)) $criteria->add(RecognitionDataArchivePeer::FALL, $this->fall);
		if ($this->isColumnModified(RecognitionDataArchivePeer::WINTER)) $criteria->add(RecognitionDataArchivePeer::WINTER, $this->winter);
		if ($this->isColumnModified(RecognitionDataArchivePeer::SPRING)) $criteria->add(RecognitionDataArchivePeer::SPRING, $this->spring);
		if ($this->isColumnModified(RecognitionDataArchivePeer::SUMMER)) $criteria->add(RecognitionDataArchivePeer::SUMMER, $this->summer);
		if ($this->isColumnModified(RecognitionDataArchivePeer::OPEN_HOUSE)) $criteria->add(RecognitionDataArchivePeer::OPEN_HOUSE, $this->open_house);
		if ($this->isColumnModified(RecognitionDataArchivePeer::PROMO)) $criteria->add(RecognitionDataArchivePeer::PROMO, $this->promo);
		if ($this->isColumnModified(RecognitionDataArchivePeer::SIG_PRES)) $criteria->add(RecognitionDataArchivePeer::SIG_PRES, $this->sig_pres);
		if ($this->isColumnModified(RecognitionDataArchivePeer::SIG_ADV)) $criteria->add(RecognitionDataArchivePeer::SIG_ADV, $this->sig_adv);
		if ($this->isColumnModified(RecognitionDataArchivePeer::REASON)) $criteria->add(RecognitionDataArchivePeer::REASON, $this->reason);
		if ($this->isColumnModified(RecognitionDataArchivePeer::STATUS)) $criteria->add(RecognitionDataArchivePeer::STATUS, $this->status);
		if ($this->isColumnModified(RecognitionDataArchivePeer::LAST_UPDATED)) $criteria->add(RecognitionDataArchivePeer::LAST_UPDATED, $this->last_updated);
		if ($this->isColumnModified(RecognitionDataArchivePeer::DATE)) $criteria->add(RecognitionDataArchivePeer::DATE, $this->date);

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
		$criteria = new Criteria(RecognitionDataArchivePeer::DATABASE_NAME);
		$criteria->add(RecognitionDataArchivePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of RecognitionDataArchive (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setClubtype($this->getClubtype());
		$copyObj->setItf($this->getItf());
		$copyObj->setClubname($this->getClubname());
		$copyObj->setAcronym($this->getAcronym());
		$copyObj->setUrl($this->getUrl());
		$copyObj->setGenEmail($this->getGenEmail());
		$copyObj->setSubmitter($this->getSubmitter());
		$copyObj->setSPosition($this->getSPosition());
		$copyObj->setSEmail($this->getSEmail());
		$copyObj->setAFirst($this->getAFirst());
		$copyObj->setALast($this->getALast());
		$copyObj->setACphone($this->getACphone());
		$copyObj->setAHphone($this->getAHphone());
		$copyObj->setAOffice($this->getAOffice());
		$copyObj->setADept($this->getADept());
		$copyObj->setAEmail($this->getAEmail());
		$copyObj->setTarget($this->getTarget());
		$copyObj->setMeetings($this->getMeetings());
		$copyObj->setMembercount($this->getMembercount());
		$copyObj->setFees($this->getFees());
		$copyObj->setElections($this->getElections());
		$copyObj->setSPhone($this->getSPhone());
		$copyObj->setPurpose($this->getPurpose());
		$copyObj->setSignature($this->getSignature());
		$copyObj->setOrgId($this->getOrgId());
		$copyObj->setReportId($this->getReportId());
		$copyObj->setPresident($this->getPresident());
		$copyObj->setVice($this->getVice());
		$copyObj->setTreasurer($this->getTreasurer());
		$copyObj->setSecretary($this->getSecretary());
		$copyObj->setBoard($this->getBoard());
		$copyObj->setMembers($this->getMembers());
		$copyObj->setFall($this->getFall());
		$copyObj->setWinter($this->getWinter());
		$copyObj->setSpring($this->getSpring());
		$copyObj->setSummer($this->getSummer());
		$copyObj->setOpenHouse($this->getOpenHouse());
		$copyObj->setPromo($this->getPromo());
		$copyObj->setSigPres($this->getSigPres());
		$copyObj->setSigAdv($this->getSigAdv());
		$copyObj->setReason($this->getReason());
		$copyObj->setStatus($this->getStatus());
		$copyObj->setLastUpdated($this->getLastUpdated());
		$copyObj->setDate($this->getDate());
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
	 * @return     RecognitionDataArchive Clone of current object.
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
	 * @return     RecognitionDataArchivePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new RecognitionDataArchivePeer();
		}
		return self::$peer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->clubtype = null;
		$this->itf = null;
		$this->clubname = null;
		$this->acronym = null;
		$this->url = null;
		$this->gen_email = null;
		$this->submitter = null;
		$this->s_position = null;
		$this->s_email = null;
		$this->a_first = null;
		$this->a_last = null;
		$this->a_cphone = null;
		$this->a_hphone = null;
		$this->a_office = null;
		$this->a_dept = null;
		$this->a_email = null;
		$this->target = null;
		$this->meetings = null;
		$this->membercount = null;
		$this->fees = null;
		$this->elections = null;
		$this->s_phone = null;
		$this->purpose = null;
		$this->signature = null;
		$this->org_id = null;
		$this->report_id = null;
		$this->president = null;
		$this->vice = null;
		$this->treasurer = null;
		$this->secretary = null;
		$this->board = null;
		$this->members = null;
		$this->fall = null;
		$this->winter = null;
		$this->spring = null;
		$this->summer = null;
		$this->open_house = null;
		$this->promo = null;
		$this->sig_pres = null;
		$this->sig_adv = null;
		$this->reason = null;
		$this->status = null;
		$this->last_updated = null;
		$this->date = null;
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
		} // if ($deep)

	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(RecognitionDataArchivePeer::DEFAULT_STRING_FORMAT);
	}

} // BaseRecognitionDataArchive
