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
use NewClubsORM\RecognitionDataPeer;
use NewClubsORM\RecognitionDataQuery;

/**
 * Base class that represents a row from the 'recognition_data' table.
 *
 * 
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseRecognitionData extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'NewClubsORM\\RecognitionDataPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        RecognitionDataPeer
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
	 * @var        string
	 */
	protected $acronym;

	/**
	 * The value for the sports_club field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $sports_club;

	/**
	 * The value for the season field.
	 * @var        string
	 */
	protected $season;

	/**
	 * The value for the cfirst field.
	 * @var        string
	 */
	protected $cfirst;

	/**
	 * The value for the clast field.
	 * @var        string
	 */
	protected $clast;

	/**
	 * The value for the cphone field.
	 * @var        string
	 */
	protected $cphone;

	/**
	 * The value for the cemail field.
	 * @var        string
	 */
	protected $cemail;

	/**
	 * The value for the league field.
	 * @var        string
	 */
	protected $league;

	/**
	 * The value for the leaguefees field.
	 * @var        string
	 */
	protected $leaguefees;

	/**
	 * The value for the sports_travel field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $sports_travel;

	/**
	 * The value for the sportsexpenses field.
	 * @var        string
	 */
	protected $sportsexpenses;

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
	 * @var        string
	 */
	protected $a_hphone;

	/**
	 * The value for the a_office field.
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
	 * @var        string
	 */
	protected $membercount;

	/**
	 * The value for the fees field.
	 * @var        string
	 */
	protected $fees;

	/**
	 * The value for the elections field.
	 * @var        string
	 */
	protected $elections;

	/**
	 * The value for the s_phone field.
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
		$this->sports_club = false;
		$this->sports_travel = false;
		$this->submitter = '';
		$this->s_position = '';
		$this->s_email = '';
		$this->a_first = '';
		$this->a_last = '';
		$this->a_cphone = '';
		$this->a_dept = '';
		$this->a_email = '';
		$this->signature = '';
		$this->org_id = 0;
		$this->report_id = 0;
		$this->sig_pres = '';
		$this->sig_adv = '';
	}

	/**
	 * Initializes internal state of BaseRecognitionData object.
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
	 * Get the [sports_club] column value.
	 * 
	 * @return     boolean
	 */
	public function getSportsClub()
	{
		return $this->sports_club;
	}

	/**
	 * Get the [season] column value.
	 * 
	 * @return     string
	 */
	public function getSeason()
	{
		return $this->season;
	}

	/**
	 * Get the [cfirst] column value.
	 * 
	 * @return     string
	 */
	public function getCfirst()
	{
		return $this->cfirst;
	}

	/**
	 * Get the [clast] column value.
	 * 
	 * @return     string
	 */
	public function getClast()
	{
		return $this->clast;
	}

	/**
	 * Get the [cphone] column value.
	 * 
	 * @return     string
	 */
	public function getCphone()
	{
		return $this->cphone;
	}

	/**
	 * Get the [cemail] column value.
	 * 
	 * @return     string
	 */
	public function getCemail()
	{
		return $this->cemail;
	}

	/**
	 * Get the [league] column value.
	 * 
	 * @return     string
	 */
	public function getLeague()
	{
		return $this->league;
	}

	/**
	 * Get the [leaguefees] column value.
	 * 
	 * @return     string
	 */
	public function getLeaguefees()
	{
		return $this->leaguefees;
	}

	/**
	 * Get the [sports_travel] column value.
	 * 
	 * @return     boolean
	 */
	public function getSportsTravel()
	{
		return $this->sports_travel;
	}

	/**
	 * Get the [sportsexpenses] column value.
	 * 
	 * @return     string
	 */
	public function getSportsexpenses()
	{
		return $this->sportsexpenses;
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
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [clubtype] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setClubtype($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->clubtype !== $v) {
			$this->clubtype = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::CLUBTYPE;
		}

		return $this;
	} // setClubtype()

	/**
	 * Set the value of [itf] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setItf($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->itf !== $v) {
			$this->itf = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::ITF;
		}

		return $this;
	} // setItf()

	/**
	 * Set the value of [clubname] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setClubname($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->clubname !== $v) {
			$this->clubname = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::CLUBNAME;
		}

		return $this;
	} // setClubname()

	/**
	 * Set the value of [acronym] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setAcronym($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->acronym !== $v) {
			$this->acronym = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::ACRONYM;
		}

		return $this;
	} // setAcronym()

	/**
	 * Sets the value of the [sports_club] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setSportsClub($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->sports_club !== $v) {
			$this->sports_club = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::SPORTS_CLUB;
		}

		return $this;
	} // setSportsClub()

	/**
	 * Set the value of [season] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setSeason($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->season !== $v) {
			$this->season = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::SEASON;
		}

		return $this;
	} // setSeason()

	/**
	 * Set the value of [cfirst] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setCfirst($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cfirst !== $v) {
			$this->cfirst = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::CFIRST;
		}

		return $this;
	} // setCfirst()

	/**
	 * Set the value of [clast] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setClast($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->clast !== $v) {
			$this->clast = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::CLAST;
		}

		return $this;
	} // setClast()

	/**
	 * Set the value of [cphone] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setCphone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cphone !== $v) {
			$this->cphone = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::CPHONE;
		}

		return $this;
	} // setCphone()

	/**
	 * Set the value of [cemail] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setCemail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cemail !== $v) {
			$this->cemail = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::CEMAIL;
		}

		return $this;
	} // setCemail()

	/**
	 * Set the value of [league] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setLeague($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->league !== $v) {
			$this->league = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::LEAGUE;
		}

		return $this;
	} // setLeague()

	/**
	 * Set the value of [leaguefees] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setLeaguefees($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->leaguefees !== $v) {
			$this->leaguefees = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::LEAGUEFEES;
		}

		return $this;
	} // setLeaguefees()

	/**
	 * Sets the value of the [sports_travel] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setSportsTravel($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->sports_travel !== $v) {
			$this->sports_travel = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::SPORTS_TRAVEL;
		}

		return $this;
	} // setSportsTravel()

	/**
	 * Set the value of [sportsexpenses] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setSportsexpenses($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sportsexpenses !== $v) {
			$this->sportsexpenses = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::SPORTSEXPENSES;
		}

		return $this;
	} // setSportsexpenses()

	/**
	 * Set the value of [url] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setUrl($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->url !== $v) {
			$this->url = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::URL;
		}

		return $this;
	} // setUrl()

	/**
	 * Set the value of [gen_email] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setGenEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->gen_email !== $v) {
			$this->gen_email = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::GEN_EMAIL;
		}

		return $this;
	} // setGenEmail()

	/**
	 * Set the value of [submitter] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setSubmitter($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->submitter !== $v) {
			$this->submitter = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::SUBMITTER;
		}

		return $this;
	} // setSubmitter()

	/**
	 * Set the value of [s_position] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setSPosition($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->s_position !== $v) {
			$this->s_position = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::S_POSITION;
		}

		return $this;
	} // setSPosition()

	/**
	 * Set the value of [s_email] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setSEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->s_email !== $v) {
			$this->s_email = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::S_EMAIL;
		}

		return $this;
	} // setSEmail()

	/**
	 * Set the value of [a_first] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setAFirst($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->a_first !== $v) {
			$this->a_first = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::A_FIRST;
		}

		return $this;
	} // setAFirst()

	/**
	 * Set the value of [a_last] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setALast($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->a_last !== $v) {
			$this->a_last = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::A_LAST;
		}

		return $this;
	} // setALast()

	/**
	 * Set the value of [a_cphone] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setACphone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->a_cphone !== $v) {
			$this->a_cphone = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::A_CPHONE;
		}

		return $this;
	} // setACphone()

	/**
	 * Set the value of [a_hphone] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setAHphone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->a_hphone !== $v) {
			$this->a_hphone = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::A_HPHONE;
		}

		return $this;
	} // setAHphone()

	/**
	 * Set the value of [a_office] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setAOffice($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->a_office !== $v) {
			$this->a_office = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::A_OFFICE;
		}

		return $this;
	} // setAOffice()

	/**
	 * Set the value of [a_dept] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setADept($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->a_dept !== $v) {
			$this->a_dept = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::A_DEPT;
		}

		return $this;
	} // setADept()

	/**
	 * Set the value of [a_email] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setAEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->a_email !== $v) {
			$this->a_email = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::A_EMAIL;
		}

		return $this;
	} // setAEmail()

	/**
	 * Set the value of [target] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setTarget($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->target !== $v) {
			$this->target = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::TARGET;
		}

		return $this;
	} // setTarget()

	/**
	 * Set the value of [meetings] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setMeetings($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->meetings !== $v) {
			$this->meetings = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::MEETINGS;
		}

		return $this;
	} // setMeetings()

	/**
	 * Set the value of [membercount] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setMembercount($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->membercount !== $v) {
			$this->membercount = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::MEMBERCOUNT;
		}

		return $this;
	} // setMembercount()

	/**
	 * Set the value of [fees] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setFees($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fees !== $v) {
			$this->fees = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::FEES;
		}

		return $this;
	} // setFees()

	/**
	 * Set the value of [elections] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setElections($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->elections !== $v) {
			$this->elections = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::ELECTIONS;
		}

		return $this;
	} // setElections()

	/**
	 * Set the value of [s_phone] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setSPhone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->s_phone !== $v) {
			$this->s_phone = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::S_PHONE;
		}

		return $this;
	} // setSPhone()

	/**
	 * Set the value of [purpose] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setPurpose($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->purpose !== $v) {
			$this->purpose = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::PURPOSE;
		}

		return $this;
	} // setPurpose()

	/**
	 * Set the value of [signature] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setSignature($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->signature !== $v) {
			$this->signature = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::SIGNATURE;
		}

		return $this;
	} // setSignature()

	/**
	 * Set the value of [org_id] column.
	 * 
	 * @param      int $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setOrgId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->org_id !== $v) {
			$this->org_id = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::ORG_ID;
		}

		return $this;
	} // setOrgId()

	/**
	 * Set the value of [report_id] column.
	 * 
	 * @param      int $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setReportId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->report_id !== $v) {
			$this->report_id = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::REPORT_ID;
		}

		return $this;
	} // setReportId()

	/**
	 * Set the value of [president] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setPresident($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->president !== $v) {
			$this->president = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::PRESIDENT;
		}

		return $this;
	} // setPresident()

	/**
	 * Set the value of [vice] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setVice($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->vice !== $v) {
			$this->vice = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::VICE;
		}

		return $this;
	} // setVice()

	/**
	 * Set the value of [treasurer] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setTreasurer($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->treasurer !== $v) {
			$this->treasurer = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::TREASURER;
		}

		return $this;
	} // setTreasurer()

	/**
	 * Set the value of [secretary] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setSecretary($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->secretary !== $v) {
			$this->secretary = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::SECRETARY;
		}

		return $this;
	} // setSecretary()

	/**
	 * Set the value of [board] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setBoard($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->board !== $v) {
			$this->board = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::BOARD;
		}

		return $this;
	} // setBoard()

	/**
	 * Set the value of [members] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setMembers($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->members !== $v) {
			$this->members = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::MEMBERS;
		}

		return $this;
	} // setMembers()

	/**
	 * Set the value of [fall] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setFall($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fall !== $v) {
			$this->fall = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::FALL;
		}

		return $this;
	} // setFall()

	/**
	 * Set the value of [winter] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setWinter($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->winter !== $v) {
			$this->winter = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::WINTER;
		}

		return $this;
	} // setWinter()

	/**
	 * Set the value of [spring] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setSpring($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->spring !== $v) {
			$this->spring = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::SPRING;
		}

		return $this;
	} // setSpring()

	/**
	 * Set the value of [summer] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setSummer($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->summer !== $v) {
			$this->summer = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::SUMMER;
		}

		return $this;
	} // setSummer()

	/**
	 * Set the value of [open_house] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setOpenHouse($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->open_house !== $v) {
			$this->open_house = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::OPEN_HOUSE;
		}

		return $this;
	} // setOpenHouse()

	/**
	 * Set the value of [promo] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setPromo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->promo !== $v) {
			$this->promo = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::PROMO;
		}

		return $this;
	} // setPromo()

	/**
	 * Set the value of [sig_pres] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setSigPres($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sig_pres !== $v) {
			$this->sig_pres = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::SIG_PRES;
		}

		return $this;
	} // setSigPres()

	/**
	 * Set the value of [sig_adv] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setSigAdv($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sig_adv !== $v) {
			$this->sig_adv = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::SIG_ADV;
		}

		return $this;
	} // setSigAdv()

	/**
	 * Set the value of [reason] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setReason($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->reason !== $v) {
			$this->reason = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::REASON;
		}

		return $this;
	} // setReason()

	/**
	 * Set the value of [status] column.
	 * 
	 * @param      string $v new value
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setStatus($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = RecognitionDataPeer::STATUS;
		}

		return $this;
	} // setStatus()

	/**
	 * Sets the value of [last_updated] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setLastUpdated($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->last_updated !== null || $dt !== null) {
			$currentDateAsString = ($this->last_updated !== null && $tmpDt = new DateTime($this->last_updated)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->last_updated = $newDateAsString;
				$this->modifiedColumns[] = RecognitionDataPeer::LAST_UPDATED;
			}
		} // if either are not null

		return $this;
	} // setLastUpdated()

	/**
	 * Sets the value of [date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     RecognitionData The current object (for fluent API support)
	 */
	public function setDate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->date !== null || $dt !== null) {
			$currentDateAsString = ($this->date !== null && $tmpDt = new DateTime($this->date)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->date = $newDateAsString;
				$this->modifiedColumns[] = RecognitionDataPeer::DATE;
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

			if ($this->sports_club !== false) {
				return false;
			}

			if ($this->sports_travel !== false) {
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

			if ($this->a_dept !== '') {
				return false;
			}

			if ($this->a_email !== '') {
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
			$this->sports_club = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->season = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->cfirst = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->clast = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->cphone = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->cemail = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->league = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->leaguefees = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->sports_travel = ($row[$startcol + 13] !== null) ? (boolean) $row[$startcol + 13] : null;
			$this->sportsexpenses = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->url = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->gen_email = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->submitter = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->s_position = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->s_email = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->a_first = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
			$this->a_last = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
			$this->a_cphone = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
			$this->a_hphone = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
			$this->a_office = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
			$this->a_dept = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
			$this->a_email = ($row[$startcol + 26] !== null) ? (string) $row[$startcol + 26] : null;
			$this->target = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
			$this->meetings = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
			$this->membercount = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
			$this->fees = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
			$this->elections = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
			$this->s_phone = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
			$this->purpose = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
			$this->signature = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
			$this->org_id = ($row[$startcol + 35] !== null) ? (int) $row[$startcol + 35] : null;
			$this->report_id = ($row[$startcol + 36] !== null) ? (int) $row[$startcol + 36] : null;
			$this->president = ($row[$startcol + 37] !== null) ? (string) $row[$startcol + 37] : null;
			$this->vice = ($row[$startcol + 38] !== null) ? (string) $row[$startcol + 38] : null;
			$this->treasurer = ($row[$startcol + 39] !== null) ? (string) $row[$startcol + 39] : null;
			$this->secretary = ($row[$startcol + 40] !== null) ? (string) $row[$startcol + 40] : null;
			$this->board = ($row[$startcol + 41] !== null) ? (string) $row[$startcol + 41] : null;
			$this->members = ($row[$startcol + 42] !== null) ? (string) $row[$startcol + 42] : null;
			$this->fall = ($row[$startcol + 43] !== null) ? (string) $row[$startcol + 43] : null;
			$this->winter = ($row[$startcol + 44] !== null) ? (string) $row[$startcol + 44] : null;
			$this->spring = ($row[$startcol + 45] !== null) ? (string) $row[$startcol + 45] : null;
			$this->summer = ($row[$startcol + 46] !== null) ? (string) $row[$startcol + 46] : null;
			$this->open_house = ($row[$startcol + 47] !== null) ? (string) $row[$startcol + 47] : null;
			$this->promo = ($row[$startcol + 48] !== null) ? (string) $row[$startcol + 48] : null;
			$this->sig_pres = ($row[$startcol + 49] !== null) ? (string) $row[$startcol + 49] : null;
			$this->sig_adv = ($row[$startcol + 50] !== null) ? (string) $row[$startcol + 50] : null;
			$this->reason = ($row[$startcol + 51] !== null) ? (string) $row[$startcol + 51] : null;
			$this->status = ($row[$startcol + 52] !== null) ? (string) $row[$startcol + 52] : null;
			$this->last_updated = ($row[$startcol + 53] !== null) ? (string) $row[$startcol + 53] : null;
			$this->date = ($row[$startcol + 54] !== null) ? (string) $row[$startcol + 54] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 55; // 55 = RecognitionDataPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating RecognitionData object", $e);
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
			$con = Propel::getConnection(RecognitionDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = RecognitionDataPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
			$con = Propel::getConnection(RecognitionDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = RecognitionDataQuery::create()
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
			$con = Propel::getConnection(RecognitionDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				RecognitionDataPeer::addInstanceToPool($this);
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

		$this->modifiedColumns[] = RecognitionDataPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . RecognitionDataPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(RecognitionDataPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::CLUBTYPE)) {
			$modifiedColumns[':p' . $index++]  = '`CLUBTYPE`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::ITF)) {
			$modifiedColumns[':p' . $index++]  = '`ITF`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::CLUBNAME)) {
			$modifiedColumns[':p' . $index++]  = '`CLUBNAME`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::ACRONYM)) {
			$modifiedColumns[':p' . $index++]  = '`ACRONYM`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::SPORTS_CLUB)) {
			$modifiedColumns[':p' . $index++]  = '`SPORTS_CLUB`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::SEASON)) {
			$modifiedColumns[':p' . $index++]  = '`SEASON`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::CFIRST)) {
			$modifiedColumns[':p' . $index++]  = '`CFIRST`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::CLAST)) {
			$modifiedColumns[':p' . $index++]  = '`CLAST`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::CPHONE)) {
			$modifiedColumns[':p' . $index++]  = '`CPHONE`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::CEMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`CEMAIL`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::LEAGUE)) {
			$modifiedColumns[':p' . $index++]  = '`LEAGUE`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::LEAGUEFEES)) {
			$modifiedColumns[':p' . $index++]  = '`LEAGUEFEES`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::SPORTS_TRAVEL)) {
			$modifiedColumns[':p' . $index++]  = '`SPORTS_TRAVEL`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::SPORTSEXPENSES)) {
			$modifiedColumns[':p' . $index++]  = '`SPORTSEXPENSES`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::URL)) {
			$modifiedColumns[':p' . $index++]  = '`URL`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::GEN_EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`GEN_EMAIL`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::SUBMITTER)) {
			$modifiedColumns[':p' . $index++]  = '`SUBMITTER`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::S_POSITION)) {
			$modifiedColumns[':p' . $index++]  = '`S_POSITION`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::S_EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`S_EMAIL`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::A_FIRST)) {
			$modifiedColumns[':p' . $index++]  = '`A_FIRST`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::A_LAST)) {
			$modifiedColumns[':p' . $index++]  = '`A_LAST`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::A_CPHONE)) {
			$modifiedColumns[':p' . $index++]  = '`A_CPHONE`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::A_HPHONE)) {
			$modifiedColumns[':p' . $index++]  = '`A_HPHONE`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::A_OFFICE)) {
			$modifiedColumns[':p' . $index++]  = '`A_OFFICE`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::A_DEPT)) {
			$modifiedColumns[':p' . $index++]  = '`A_DEPT`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::A_EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`A_EMAIL`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::TARGET)) {
			$modifiedColumns[':p' . $index++]  = '`TARGET`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::MEETINGS)) {
			$modifiedColumns[':p' . $index++]  = '`MEETINGS`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::MEMBERCOUNT)) {
			$modifiedColumns[':p' . $index++]  = '`MEMBERCOUNT`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::FEES)) {
			$modifiedColumns[':p' . $index++]  = '`FEES`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::ELECTIONS)) {
			$modifiedColumns[':p' . $index++]  = '`ELECTIONS`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::S_PHONE)) {
			$modifiedColumns[':p' . $index++]  = '`S_PHONE`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::PURPOSE)) {
			$modifiedColumns[':p' . $index++]  = '`PURPOSE`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::SIGNATURE)) {
			$modifiedColumns[':p' . $index++]  = '`SIGNATURE`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::ORG_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ORG_ID`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::REPORT_ID)) {
			$modifiedColumns[':p' . $index++]  = '`REPORT_ID`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::PRESIDENT)) {
			$modifiedColumns[':p' . $index++]  = '`PRESIDENT`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::VICE)) {
			$modifiedColumns[':p' . $index++]  = '`VICE`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::TREASURER)) {
			$modifiedColumns[':p' . $index++]  = '`TREASURER`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::SECRETARY)) {
			$modifiedColumns[':p' . $index++]  = '`SECRETARY`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::BOARD)) {
			$modifiedColumns[':p' . $index++]  = '`BOARD`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::MEMBERS)) {
			$modifiedColumns[':p' . $index++]  = '`MEMBERS`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::FALL)) {
			$modifiedColumns[':p' . $index++]  = '`FALL`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::WINTER)) {
			$modifiedColumns[':p' . $index++]  = '`WINTER`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::SPRING)) {
			$modifiedColumns[':p' . $index++]  = '`SPRING`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::SUMMER)) {
			$modifiedColumns[':p' . $index++]  = '`SUMMER`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::OPEN_HOUSE)) {
			$modifiedColumns[':p' . $index++]  = '`OPEN_HOUSE`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::PROMO)) {
			$modifiedColumns[':p' . $index++]  = '`PROMO`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::SIG_PRES)) {
			$modifiedColumns[':p' . $index++]  = '`SIG_PRES`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::SIG_ADV)) {
			$modifiedColumns[':p' . $index++]  = '`SIG_ADV`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::REASON)) {
			$modifiedColumns[':p' . $index++]  = '`REASON`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::STATUS)) {
			$modifiedColumns[':p' . $index++]  = '`STATUS`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::LAST_UPDATED)) {
			$modifiedColumns[':p' . $index++]  = '`LAST_UPDATED`';
		}
		if ($this->isColumnModified(RecognitionDataPeer::DATE)) {
			$modifiedColumns[':p' . $index++]  = '`DATE`';
		}

		$sql = sprintf(
			'INSERT INTO `recognition_data` (%s) VALUES (%s)',
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
					case '`SPORTS_CLUB`':
						$stmt->bindValue($identifier, (int) $this->sports_club, PDO::PARAM_INT);
						break;
					case '`SEASON`':
						$stmt->bindValue($identifier, $this->season, PDO::PARAM_STR);
						break;
					case '`CFIRST`':
						$stmt->bindValue($identifier, $this->cfirst, PDO::PARAM_STR);
						break;
					case '`CLAST`':
						$stmt->bindValue($identifier, $this->clast, PDO::PARAM_STR);
						break;
					case '`CPHONE`':
						$stmt->bindValue($identifier, $this->cphone, PDO::PARAM_STR);
						break;
					case '`CEMAIL`':
						$stmt->bindValue($identifier, $this->cemail, PDO::PARAM_STR);
						break;
					case '`LEAGUE`':
						$stmt->bindValue($identifier, $this->league, PDO::PARAM_STR);
						break;
					case '`LEAGUEFEES`':
						$stmt->bindValue($identifier, $this->leaguefees, PDO::PARAM_STR);
						break;
					case '`SPORTS_TRAVEL`':
						$stmt->bindValue($identifier, (int) $this->sports_travel, PDO::PARAM_INT);
						break;
					case '`SPORTSEXPENSES`':
						$stmt->bindValue($identifier, $this->sportsexpenses, PDO::PARAM_STR);
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


			if (($retval = RecognitionDataPeer::doValidate($this, $columns)) !== true) {
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
		$pos = RecognitionDataPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getSportsClub();
				break;
			case 6:
				return $this->getSeason();
				break;
			case 7:
				return $this->getCfirst();
				break;
			case 8:
				return $this->getClast();
				break;
			case 9:
				return $this->getCphone();
				break;
			case 10:
				return $this->getCemail();
				break;
			case 11:
				return $this->getLeague();
				break;
			case 12:
				return $this->getLeaguefees();
				break;
			case 13:
				return $this->getSportsTravel();
				break;
			case 14:
				return $this->getSportsexpenses();
				break;
			case 15:
				return $this->getUrl();
				break;
			case 16:
				return $this->getGenEmail();
				break;
			case 17:
				return $this->getSubmitter();
				break;
			case 18:
				return $this->getSPosition();
				break;
			case 19:
				return $this->getSEmail();
				break;
			case 20:
				return $this->getAFirst();
				break;
			case 21:
				return $this->getALast();
				break;
			case 22:
				return $this->getACphone();
				break;
			case 23:
				return $this->getAHphone();
				break;
			case 24:
				return $this->getAOffice();
				break;
			case 25:
				return $this->getADept();
				break;
			case 26:
				return $this->getAEmail();
				break;
			case 27:
				return $this->getTarget();
				break;
			case 28:
				return $this->getMeetings();
				break;
			case 29:
				return $this->getMembercount();
				break;
			case 30:
				return $this->getFees();
				break;
			case 31:
				return $this->getElections();
				break;
			case 32:
				return $this->getSPhone();
				break;
			case 33:
				return $this->getPurpose();
				break;
			case 34:
				return $this->getSignature();
				break;
			case 35:
				return $this->getOrgId();
				break;
			case 36:
				return $this->getReportId();
				break;
			case 37:
				return $this->getPresident();
				break;
			case 38:
				return $this->getVice();
				break;
			case 39:
				return $this->getTreasurer();
				break;
			case 40:
				return $this->getSecretary();
				break;
			case 41:
				return $this->getBoard();
				break;
			case 42:
				return $this->getMembers();
				break;
			case 43:
				return $this->getFall();
				break;
			case 44:
				return $this->getWinter();
				break;
			case 45:
				return $this->getSpring();
				break;
			case 46:
				return $this->getSummer();
				break;
			case 47:
				return $this->getOpenHouse();
				break;
			case 48:
				return $this->getPromo();
				break;
			case 49:
				return $this->getSigPres();
				break;
			case 50:
				return $this->getSigAdv();
				break;
			case 51:
				return $this->getReason();
				break;
			case 52:
				return $this->getStatus();
				break;
			case 53:
				return $this->getLastUpdated();
				break;
			case 54:
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
		if (isset($alreadyDumpedObjects['RecognitionData'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['RecognitionData'][$this->getPrimaryKey()] = true;
		$keys = RecognitionDataPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getClubtype(),
			$keys[2] => $this->getItf(),
			$keys[3] => $this->getClubname(),
			$keys[4] => $this->getAcronym(),
			$keys[5] => $this->getSportsClub(),
			$keys[6] => $this->getSeason(),
			$keys[7] => $this->getCfirst(),
			$keys[8] => $this->getClast(),
			$keys[9] => $this->getCphone(),
			$keys[10] => $this->getCemail(),
			$keys[11] => $this->getLeague(),
			$keys[12] => $this->getLeaguefees(),
			$keys[13] => $this->getSportsTravel(),
			$keys[14] => $this->getSportsexpenses(),
			$keys[15] => $this->getUrl(),
			$keys[16] => $this->getGenEmail(),
			$keys[17] => $this->getSubmitter(),
			$keys[18] => $this->getSPosition(),
			$keys[19] => $this->getSEmail(),
			$keys[20] => $this->getAFirst(),
			$keys[21] => $this->getALast(),
			$keys[22] => $this->getACphone(),
			$keys[23] => $this->getAHphone(),
			$keys[24] => $this->getAOffice(),
			$keys[25] => $this->getADept(),
			$keys[26] => $this->getAEmail(),
			$keys[27] => $this->getTarget(),
			$keys[28] => $this->getMeetings(),
			$keys[29] => $this->getMembercount(),
			$keys[30] => $this->getFees(),
			$keys[31] => $this->getElections(),
			$keys[32] => $this->getSPhone(),
			$keys[33] => $this->getPurpose(),
			$keys[34] => $this->getSignature(),
			$keys[35] => $this->getOrgId(),
			$keys[36] => $this->getReportId(),
			$keys[37] => $this->getPresident(),
			$keys[38] => $this->getVice(),
			$keys[39] => $this->getTreasurer(),
			$keys[40] => $this->getSecretary(),
			$keys[41] => $this->getBoard(),
			$keys[42] => $this->getMembers(),
			$keys[43] => $this->getFall(),
			$keys[44] => $this->getWinter(),
			$keys[45] => $this->getSpring(),
			$keys[46] => $this->getSummer(),
			$keys[47] => $this->getOpenHouse(),
			$keys[48] => $this->getPromo(),
			$keys[49] => $this->getSigPres(),
			$keys[50] => $this->getSigAdv(),
			$keys[51] => $this->getReason(),
			$keys[52] => $this->getStatus(),
			$keys[53] => $this->getLastUpdated(),
			$keys[54] => $this->getDate(),
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
		$pos = RecognitionDataPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setSportsClub($value);
				break;
			case 6:
				$this->setSeason($value);
				break;
			case 7:
				$this->setCfirst($value);
				break;
			case 8:
				$this->setClast($value);
				break;
			case 9:
				$this->setCphone($value);
				break;
			case 10:
				$this->setCemail($value);
				break;
			case 11:
				$this->setLeague($value);
				break;
			case 12:
				$this->setLeaguefees($value);
				break;
			case 13:
				$this->setSportsTravel($value);
				break;
			case 14:
				$this->setSportsexpenses($value);
				break;
			case 15:
				$this->setUrl($value);
				break;
			case 16:
				$this->setGenEmail($value);
				break;
			case 17:
				$this->setSubmitter($value);
				break;
			case 18:
				$this->setSPosition($value);
				break;
			case 19:
				$this->setSEmail($value);
				break;
			case 20:
				$this->setAFirst($value);
				break;
			case 21:
				$this->setALast($value);
				break;
			case 22:
				$this->setACphone($value);
				break;
			case 23:
				$this->setAHphone($value);
				break;
			case 24:
				$this->setAOffice($value);
				break;
			case 25:
				$this->setADept($value);
				break;
			case 26:
				$this->setAEmail($value);
				break;
			case 27:
				$this->setTarget($value);
				break;
			case 28:
				$this->setMeetings($value);
				break;
			case 29:
				$this->setMembercount($value);
				break;
			case 30:
				$this->setFees($value);
				break;
			case 31:
				$this->setElections($value);
				break;
			case 32:
				$this->setSPhone($value);
				break;
			case 33:
				$this->setPurpose($value);
				break;
			case 34:
				$this->setSignature($value);
				break;
			case 35:
				$this->setOrgId($value);
				break;
			case 36:
				$this->setReportId($value);
				break;
			case 37:
				$this->setPresident($value);
				break;
			case 38:
				$this->setVice($value);
				break;
			case 39:
				$this->setTreasurer($value);
				break;
			case 40:
				$this->setSecretary($value);
				break;
			case 41:
				$this->setBoard($value);
				break;
			case 42:
				$this->setMembers($value);
				break;
			case 43:
				$this->setFall($value);
				break;
			case 44:
				$this->setWinter($value);
				break;
			case 45:
				$this->setSpring($value);
				break;
			case 46:
				$this->setSummer($value);
				break;
			case 47:
				$this->setOpenHouse($value);
				break;
			case 48:
				$this->setPromo($value);
				break;
			case 49:
				$this->setSigPres($value);
				break;
			case 50:
				$this->setSigAdv($value);
				break;
			case 51:
				$this->setReason($value);
				break;
			case 52:
				$this->setStatus($value);
				break;
			case 53:
				$this->setLastUpdated($value);
				break;
			case 54:
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
		$keys = RecognitionDataPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setClubtype($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setItf($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setClubname($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAcronym($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSportsClub($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSeason($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCfirst($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setClast($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCphone($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCemail($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setLeague($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setLeaguefees($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setSportsTravel($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setSportsexpenses($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUrl($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setGenEmail($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setSubmitter($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setSPosition($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setSEmail($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setAFirst($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setALast($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setACphone($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setAHphone($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setAOffice($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setADept($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setAEmail($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setTarget($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setMeetings($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setMembercount($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setFees($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setElections($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setSPhone($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setPurpose($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setSignature($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setOrgId($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setReportId($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setPresident($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setVice($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setTreasurer($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setSecretary($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setBoard($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setMembers($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setFall($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setWinter($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setSpring($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setSummer($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setOpenHouse($arr[$keys[47]]);
		if (array_key_exists($keys[48], $arr)) $this->setPromo($arr[$keys[48]]);
		if (array_key_exists($keys[49], $arr)) $this->setSigPres($arr[$keys[49]]);
		if (array_key_exists($keys[50], $arr)) $this->setSigAdv($arr[$keys[50]]);
		if (array_key_exists($keys[51], $arr)) $this->setReason($arr[$keys[51]]);
		if (array_key_exists($keys[52], $arr)) $this->setStatus($arr[$keys[52]]);
		if (array_key_exists($keys[53], $arr)) $this->setLastUpdated($arr[$keys[53]]);
		if (array_key_exists($keys[54], $arr)) $this->setDate($arr[$keys[54]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(RecognitionDataPeer::DATABASE_NAME);

		if ($this->isColumnModified(RecognitionDataPeer::ID)) $criteria->add(RecognitionDataPeer::ID, $this->id);
		if ($this->isColumnModified(RecognitionDataPeer::CLUBTYPE)) $criteria->add(RecognitionDataPeer::CLUBTYPE, $this->clubtype);
		if ($this->isColumnModified(RecognitionDataPeer::ITF)) $criteria->add(RecognitionDataPeer::ITF, $this->itf);
		if ($this->isColumnModified(RecognitionDataPeer::CLUBNAME)) $criteria->add(RecognitionDataPeer::CLUBNAME, $this->clubname);
		if ($this->isColumnModified(RecognitionDataPeer::ACRONYM)) $criteria->add(RecognitionDataPeer::ACRONYM, $this->acronym);
		if ($this->isColumnModified(RecognitionDataPeer::SPORTS_CLUB)) $criteria->add(RecognitionDataPeer::SPORTS_CLUB, $this->sports_club);
		if ($this->isColumnModified(RecognitionDataPeer::SEASON)) $criteria->add(RecognitionDataPeer::SEASON, $this->season);
		if ($this->isColumnModified(RecognitionDataPeer::CFIRST)) $criteria->add(RecognitionDataPeer::CFIRST, $this->cfirst);
		if ($this->isColumnModified(RecognitionDataPeer::CLAST)) $criteria->add(RecognitionDataPeer::CLAST, $this->clast);
		if ($this->isColumnModified(RecognitionDataPeer::CPHONE)) $criteria->add(RecognitionDataPeer::CPHONE, $this->cphone);
		if ($this->isColumnModified(RecognitionDataPeer::CEMAIL)) $criteria->add(RecognitionDataPeer::CEMAIL, $this->cemail);
		if ($this->isColumnModified(RecognitionDataPeer::LEAGUE)) $criteria->add(RecognitionDataPeer::LEAGUE, $this->league);
		if ($this->isColumnModified(RecognitionDataPeer::LEAGUEFEES)) $criteria->add(RecognitionDataPeer::LEAGUEFEES, $this->leaguefees);
		if ($this->isColumnModified(RecognitionDataPeer::SPORTS_TRAVEL)) $criteria->add(RecognitionDataPeer::SPORTS_TRAVEL, $this->sports_travel);
		if ($this->isColumnModified(RecognitionDataPeer::SPORTSEXPENSES)) $criteria->add(RecognitionDataPeer::SPORTSEXPENSES, $this->sportsexpenses);
		if ($this->isColumnModified(RecognitionDataPeer::URL)) $criteria->add(RecognitionDataPeer::URL, $this->url);
		if ($this->isColumnModified(RecognitionDataPeer::GEN_EMAIL)) $criteria->add(RecognitionDataPeer::GEN_EMAIL, $this->gen_email);
		if ($this->isColumnModified(RecognitionDataPeer::SUBMITTER)) $criteria->add(RecognitionDataPeer::SUBMITTER, $this->submitter);
		if ($this->isColumnModified(RecognitionDataPeer::S_POSITION)) $criteria->add(RecognitionDataPeer::S_POSITION, $this->s_position);
		if ($this->isColumnModified(RecognitionDataPeer::S_EMAIL)) $criteria->add(RecognitionDataPeer::S_EMAIL, $this->s_email);
		if ($this->isColumnModified(RecognitionDataPeer::A_FIRST)) $criteria->add(RecognitionDataPeer::A_FIRST, $this->a_first);
		if ($this->isColumnModified(RecognitionDataPeer::A_LAST)) $criteria->add(RecognitionDataPeer::A_LAST, $this->a_last);
		if ($this->isColumnModified(RecognitionDataPeer::A_CPHONE)) $criteria->add(RecognitionDataPeer::A_CPHONE, $this->a_cphone);
		if ($this->isColumnModified(RecognitionDataPeer::A_HPHONE)) $criteria->add(RecognitionDataPeer::A_HPHONE, $this->a_hphone);
		if ($this->isColumnModified(RecognitionDataPeer::A_OFFICE)) $criteria->add(RecognitionDataPeer::A_OFFICE, $this->a_office);
		if ($this->isColumnModified(RecognitionDataPeer::A_DEPT)) $criteria->add(RecognitionDataPeer::A_DEPT, $this->a_dept);
		if ($this->isColumnModified(RecognitionDataPeer::A_EMAIL)) $criteria->add(RecognitionDataPeer::A_EMAIL, $this->a_email);
		if ($this->isColumnModified(RecognitionDataPeer::TARGET)) $criteria->add(RecognitionDataPeer::TARGET, $this->target);
		if ($this->isColumnModified(RecognitionDataPeer::MEETINGS)) $criteria->add(RecognitionDataPeer::MEETINGS, $this->meetings);
		if ($this->isColumnModified(RecognitionDataPeer::MEMBERCOUNT)) $criteria->add(RecognitionDataPeer::MEMBERCOUNT, $this->membercount);
		if ($this->isColumnModified(RecognitionDataPeer::FEES)) $criteria->add(RecognitionDataPeer::FEES, $this->fees);
		if ($this->isColumnModified(RecognitionDataPeer::ELECTIONS)) $criteria->add(RecognitionDataPeer::ELECTIONS, $this->elections);
		if ($this->isColumnModified(RecognitionDataPeer::S_PHONE)) $criteria->add(RecognitionDataPeer::S_PHONE, $this->s_phone);
		if ($this->isColumnModified(RecognitionDataPeer::PURPOSE)) $criteria->add(RecognitionDataPeer::PURPOSE, $this->purpose);
		if ($this->isColumnModified(RecognitionDataPeer::SIGNATURE)) $criteria->add(RecognitionDataPeer::SIGNATURE, $this->signature);
		if ($this->isColumnModified(RecognitionDataPeer::ORG_ID)) $criteria->add(RecognitionDataPeer::ORG_ID, $this->org_id);
		if ($this->isColumnModified(RecognitionDataPeer::REPORT_ID)) $criteria->add(RecognitionDataPeer::REPORT_ID, $this->report_id);
		if ($this->isColumnModified(RecognitionDataPeer::PRESIDENT)) $criteria->add(RecognitionDataPeer::PRESIDENT, $this->president);
		if ($this->isColumnModified(RecognitionDataPeer::VICE)) $criteria->add(RecognitionDataPeer::VICE, $this->vice);
		if ($this->isColumnModified(RecognitionDataPeer::TREASURER)) $criteria->add(RecognitionDataPeer::TREASURER, $this->treasurer);
		if ($this->isColumnModified(RecognitionDataPeer::SECRETARY)) $criteria->add(RecognitionDataPeer::SECRETARY, $this->secretary);
		if ($this->isColumnModified(RecognitionDataPeer::BOARD)) $criteria->add(RecognitionDataPeer::BOARD, $this->board);
		if ($this->isColumnModified(RecognitionDataPeer::MEMBERS)) $criteria->add(RecognitionDataPeer::MEMBERS, $this->members);
		if ($this->isColumnModified(RecognitionDataPeer::FALL)) $criteria->add(RecognitionDataPeer::FALL, $this->fall);
		if ($this->isColumnModified(RecognitionDataPeer::WINTER)) $criteria->add(RecognitionDataPeer::WINTER, $this->winter);
		if ($this->isColumnModified(RecognitionDataPeer::SPRING)) $criteria->add(RecognitionDataPeer::SPRING, $this->spring);
		if ($this->isColumnModified(RecognitionDataPeer::SUMMER)) $criteria->add(RecognitionDataPeer::SUMMER, $this->summer);
		if ($this->isColumnModified(RecognitionDataPeer::OPEN_HOUSE)) $criteria->add(RecognitionDataPeer::OPEN_HOUSE, $this->open_house);
		if ($this->isColumnModified(RecognitionDataPeer::PROMO)) $criteria->add(RecognitionDataPeer::PROMO, $this->promo);
		if ($this->isColumnModified(RecognitionDataPeer::SIG_PRES)) $criteria->add(RecognitionDataPeer::SIG_PRES, $this->sig_pres);
		if ($this->isColumnModified(RecognitionDataPeer::SIG_ADV)) $criteria->add(RecognitionDataPeer::SIG_ADV, $this->sig_adv);
		if ($this->isColumnModified(RecognitionDataPeer::REASON)) $criteria->add(RecognitionDataPeer::REASON, $this->reason);
		if ($this->isColumnModified(RecognitionDataPeer::STATUS)) $criteria->add(RecognitionDataPeer::STATUS, $this->status);
		if ($this->isColumnModified(RecognitionDataPeer::LAST_UPDATED)) $criteria->add(RecognitionDataPeer::LAST_UPDATED, $this->last_updated);
		if ($this->isColumnModified(RecognitionDataPeer::DATE)) $criteria->add(RecognitionDataPeer::DATE, $this->date);

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
		$criteria = new Criteria(RecognitionDataPeer::DATABASE_NAME);
		$criteria->add(RecognitionDataPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of RecognitionData (or compatible) type.
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
		$copyObj->setSportsClub($this->getSportsClub());
		$copyObj->setSeason($this->getSeason());
		$copyObj->setCfirst($this->getCfirst());
		$copyObj->setClast($this->getClast());
		$copyObj->setCphone($this->getCphone());
		$copyObj->setCemail($this->getCemail());
		$copyObj->setLeague($this->getLeague());
		$copyObj->setLeaguefees($this->getLeaguefees());
		$copyObj->setSportsTravel($this->getSportsTravel());
		$copyObj->setSportsexpenses($this->getSportsexpenses());
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
	 * @return     RecognitionData Clone of current object.
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
	 * @return     RecognitionDataPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new RecognitionDataPeer();
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
		$this->sports_club = null;
		$this->season = null;
		$this->cfirst = null;
		$this->clast = null;
		$this->cphone = null;
		$this->cemail = null;
		$this->league = null;
		$this->leaguefees = null;
		$this->sports_travel = null;
		$this->sportsexpenses = null;
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
		return (string) $this->exportTo(RecognitionDataPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseRecognitionData
