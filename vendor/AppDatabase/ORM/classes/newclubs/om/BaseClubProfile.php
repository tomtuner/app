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
use NewClubsORM\ClubProfilePeer;
use NewClubsORM\ClubProfileQuery;

/**
 * Base class that represents a row from the 'club_profile' table.
 *
 * 
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseClubProfile extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'NewClubsORM\\ClubProfilePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ClubProfilePeer
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
	 * The value for the org_id field.
	 * @var        int
	 */
	protected $org_id;

	/**
	 * The value for the acronym field.
	 * @var        string
	 */
	protected $acronym;

	/**
	 * The value for the listname field.
	 * @var        string
	 */
	protected $listname;

	/**
	 * The value for the project field.
	 * @var        int
	 */
	protected $project;

	/**
	 * The value for the date_formed field.
	 * Note: this column has a database default value of: NULL
	 * @var        string
	 */
	protected $date_formed;

	/**
	 * The value for the description field.
	 * @var        string
	 */
	protected $description;

	/**
	 * The value for the category_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $category_id;

	/**
	 * The value for the cluster_id field.
	 * Note: this column has a database default value of: 1
	 * @var        int
	 */
	protected $cluster_id;

	/**
	 * The value for the second_cluster_id field.
	 * Note: this column has a database default value of: 7
	 * @var        int
	 */
	protected $second_cluster_id;

	/**
	 * The value for the web_site field.
	 * @var        string
	 */
	protected $web_site;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the constitution_date field.
	 * @var        string
	 */
	protected $constitution_date;

	/**
	 * The value for the lastmodified_ccl field.
	 * @var        string
	 */
	protected $lastmodified_ccl;

	/**
	 * The value for the lastmodified_club field.
	 * @var        string
	 */
	protected $lastmodified_club;

	/**
	 * The value for the initial_meeting field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $initial_meeting;

	/**
	 * The value for the inactive field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $inactive;

	/**
	 * The value for the recognized field.
	 * Note: this column has a database default value of: NULL
	 * @var        string
	 */
	protected $recognized;

	/**
	 * The value for the show_web field.
	 * Note: this column has a database default value of: 1
	 * @var        int
	 */
	protected $show_web;

	/**
	 * The value for the meeting_day field.
	 * @var        string
	 */
	protected $meeting_day;

	/**
	 * The value for the meeting_time field.
	 * @var        string
	 */
	protected $meeting_time;

	/**
	 * The value for the meeting_loc field.
	 * @var        string
	 */
	protected $meeting_loc;

	/**
	 * The value for the meeting_freq field.
	 * @var        string
	 */
	protected $meeting_freq;

	/**
	 * The value for the financial_tier field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $financial_tier;

	/**
	 * The value for the financial_tier_date field.
	 * Note: this column has a database default value of: NULL
	 * @var        string
	 */
	protected $financial_tier_date;

	/**
	 * The value for the crb_exempt field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $crb_exempt;

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
		$this->date_formed = NULL;
		$this->category_id = 0;
		$this->cluster_id = 1;
		$this->second_cluster_id = 7;
		$this->initial_meeting = 0;
		$this->inactive = 0;
		$this->recognized = NULL;
		$this->show_web = 1;
		$this->financial_tier = '';
		$this->financial_tier_date = NULL;
		$this->crb_exempt = false;
		$this->sports_club = false;
		$this->sports_travel = false;
	}

	/**
	 * Initializes internal state of BaseClubProfile object.
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
	 * Get the [org_id] column value.
	 * 
	 * @return     int
	 */
	public function getOrgId()
	{
		return $this->org_id;
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
	 * Get the [listname] column value.
	 * 
	 * @return     string
	 */
	public function getListname()
	{
		return $this->listname;
	}

	/**
	 * Get the [project] column value.
	 * 
	 * @return     int
	 */
	public function getProject()
	{
		return $this->project;
	}

	/**
	 * Get the [optionally formatted] temporal [date_formed] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDateFormed($format = '%x')
	{
		if ($this->date_formed === null) {
			return null;
		}


		if ($this->date_formed === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->date_formed);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date_formed, true), $x);
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
	 * Get the [description] column value.
	 * 
	 * @return     string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Get the [category_id] column value.
	 * 
	 * @return     int
	 */
	public function getCategoryId()
	{
		return $this->category_id;
	}

	/**
	 * Get the [cluster_id] column value.
	 * 
	 * @return     int
	 */
	public function getClusterId()
	{
		return $this->cluster_id;
	}

	/**
	 * Get the [second_cluster_id] column value.
	 * 
	 * @return     int
	 */
	public function getSecondClusterId()
	{
		return $this->second_cluster_id;
	}

	/**
	 * Get the [web_site] column value.
	 * 
	 * @return     string
	 */
	public function getWebSite()
	{
		return $this->web_site;
	}

	/**
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the [optionally formatted] temporal [constitution_date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getConstitutionDate($format = '%x')
	{
		if ($this->constitution_date === null) {
			return null;
		}


		if ($this->constitution_date === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->constitution_date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->constitution_date, true), $x);
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
	 * Get the [optionally formatted] temporal [lastmodified_ccl] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getLastmodifiedCcl($format = '%x')
	{
		if ($this->lastmodified_ccl === null) {
			return null;
		}


		if ($this->lastmodified_ccl === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->lastmodified_ccl);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->lastmodified_ccl, true), $x);
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
	 * Get the [optionally formatted] temporal [lastmodified_club] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getLastmodifiedClub($format = '%x')
	{
		if ($this->lastmodified_club === null) {
			return null;
		}


		if ($this->lastmodified_club === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->lastmodified_club);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->lastmodified_club, true), $x);
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
	 * Get the [initial_meeting] column value.
	 * 
	 * @return     int
	 */
	public function getInitialMeeting()
	{
		return $this->initial_meeting;
	}

	/**
	 * Get the [inactive] column value.
	 * 
	 * @return     int
	 */
	public function getInactive()
	{
		return $this->inactive;
	}

	/**
	 * Get the [optionally formatted] temporal [recognized] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getRecognized($format = '%x')
	{
		if ($this->recognized === null) {
			return null;
		}


		if ($this->recognized === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->recognized);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->recognized, true), $x);
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
	 * Get the [show_web] column value.
	 * 
	 * @return     int
	 */
	public function getShowWeb()
	{
		return $this->show_web;
	}

	/**
	 * Get the [meeting_day] column value.
	 * 
	 * @return     string
	 */
	public function getMeetingDay()
	{
		return $this->meeting_day;
	}

	/**
	 * Get the [meeting_time] column value.
	 * 
	 * @return     string
	 */
	public function getMeetingTime()
	{
		return $this->meeting_time;
	}

	/**
	 * Get the [meeting_loc] column value.
	 * 
	 * @return     string
	 */
	public function getMeetingLoc()
	{
		return $this->meeting_loc;
	}

	/**
	 * Get the [meeting_freq] column value.
	 * 
	 * @return     string
	 */
	public function getMeetingFreq()
	{
		return $this->meeting_freq;
	}

	/**
	 * Get the [financial_tier] column value.
	 * 
	 * @return     string
	 */
	public function getFinancialTier()
	{
		return $this->financial_tier;
	}

	/**
	 * Get the [optionally formatted] temporal [financial_tier_date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getFinancialTierDate($format = '%x')
	{
		if ($this->financial_tier_date === null) {
			return null;
		}


		if ($this->financial_tier_date === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->financial_tier_date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->financial_tier_date, true), $x);
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
	 * Get the [crb_exempt] column value.
	 * 
	 * @return     boolean
	 */
	public function getCrbExempt()
	{
		return $this->crb_exempt;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ClubProfilePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [org_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setOrgId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->org_id !== $v) {
			$this->org_id = $v;
			$this->modifiedColumns[] = ClubProfilePeer::ORG_ID;
		}

		return $this;
	} // setOrgId()

	/**
	 * Set the value of [acronym] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setAcronym($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->acronym !== $v) {
			$this->acronym = $v;
			$this->modifiedColumns[] = ClubProfilePeer::ACRONYM;
		}

		return $this;
	} // setAcronym()

	/**
	 * Set the value of [listname] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setListname($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->listname !== $v) {
			$this->listname = $v;
			$this->modifiedColumns[] = ClubProfilePeer::LISTNAME;
		}

		return $this;
	} // setListname()

	/**
	 * Set the value of [project] column.
	 * 
	 * @param      int $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setProject($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->project !== $v) {
			$this->project = $v;
			$this->modifiedColumns[] = ClubProfilePeer::PROJECT;
		}

		return $this;
	} // setProject()

	/**
	 * Sets the value of [date_formed] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setDateFormed($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->date_formed !== null || $dt !== null) {
			$currentDateAsString = ($this->date_formed !== null && $tmpDt = new DateTime($this->date_formed)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
				|| ($dt->format('Y-m-d') === NULL) // or the entered value matches the default
				 ) {
				$this->date_formed = $newDateAsString;
				$this->modifiedColumns[] = ClubProfilePeer::DATE_FORMED;
			}
		} // if either are not null

		return $this;
	} // setDateFormed()

	/**
	 * Set the value of [description] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = ClubProfilePeer::DESCRIPTION;
		}

		return $this;
	} // setDescription()

	/**
	 * Set the value of [category_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setCategoryId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->category_id !== $v) {
			$this->category_id = $v;
			$this->modifiedColumns[] = ClubProfilePeer::CATEGORY_ID;
		}

		return $this;
	} // setCategoryId()

	/**
	 * Set the value of [cluster_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setClusterId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cluster_id !== $v) {
			$this->cluster_id = $v;
			$this->modifiedColumns[] = ClubProfilePeer::CLUSTER_ID;
		}

		return $this;
	} // setClusterId()

	/**
	 * Set the value of [second_cluster_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setSecondClusterId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->second_cluster_id !== $v) {
			$this->second_cluster_id = $v;
			$this->modifiedColumns[] = ClubProfilePeer::SECOND_CLUSTER_ID;
		}

		return $this;
	} // setSecondClusterId()

	/**
	 * Set the value of [web_site] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setWebSite($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->web_site !== $v) {
			$this->web_site = $v;
			$this->modifiedColumns[] = ClubProfilePeer::WEB_SITE;
		}

		return $this;
	} // setWebSite()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ClubProfilePeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Sets the value of [constitution_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setConstitutionDate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->constitution_date !== null || $dt !== null) {
			$currentDateAsString = ($this->constitution_date !== null && $tmpDt = new DateTime($this->constitution_date)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->constitution_date = $newDateAsString;
				$this->modifiedColumns[] = ClubProfilePeer::CONSTITUTION_DATE;
			}
		} // if either are not null

		return $this;
	} // setConstitutionDate()

	/**
	 * Sets the value of [lastmodified_ccl] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setLastmodifiedCcl($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->lastmodified_ccl !== null || $dt !== null) {
			$currentDateAsString = ($this->lastmodified_ccl !== null && $tmpDt = new DateTime($this->lastmodified_ccl)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->lastmodified_ccl = $newDateAsString;
				$this->modifiedColumns[] = ClubProfilePeer::LASTMODIFIED_CCL;
			}
		} // if either are not null

		return $this;
	} // setLastmodifiedCcl()

	/**
	 * Sets the value of [lastmodified_club] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setLastmodifiedClub($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->lastmodified_club !== null || $dt !== null) {
			$currentDateAsString = ($this->lastmodified_club !== null && $tmpDt = new DateTime($this->lastmodified_club)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->lastmodified_club = $newDateAsString;
				$this->modifiedColumns[] = ClubProfilePeer::LASTMODIFIED_CLUB;
			}
		} // if either are not null

		return $this;
	} // setLastmodifiedClub()

	/**
	 * Set the value of [initial_meeting] column.
	 * 
	 * @param      int $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setInitialMeeting($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->initial_meeting !== $v) {
			$this->initial_meeting = $v;
			$this->modifiedColumns[] = ClubProfilePeer::INITIAL_MEETING;
		}

		return $this;
	} // setInitialMeeting()

	/**
	 * Set the value of [inactive] column.
	 * 
	 * @param      int $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setInactive($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->inactive !== $v) {
			$this->inactive = $v;
			$this->modifiedColumns[] = ClubProfilePeer::INACTIVE;
		}

		return $this;
	} // setInactive()

	/**
	 * Sets the value of [recognized] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setRecognized($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->recognized !== null || $dt !== null) {
			$currentDateAsString = ($this->recognized !== null && $tmpDt = new DateTime($this->recognized)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
				|| ($dt->format('Y-m-d') === NULL) // or the entered value matches the default
				 ) {
				$this->recognized = $newDateAsString;
				$this->modifiedColumns[] = ClubProfilePeer::RECOGNIZED;
			}
		} // if either are not null

		return $this;
	} // setRecognized()

	/**
	 * Set the value of [show_web] column.
	 * 
	 * @param      int $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setShowWeb($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->show_web !== $v) {
			$this->show_web = $v;
			$this->modifiedColumns[] = ClubProfilePeer::SHOW_WEB;
		}

		return $this;
	} // setShowWeb()

	/**
	 * Set the value of [meeting_day] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setMeetingDay($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->meeting_day !== $v) {
			$this->meeting_day = $v;
			$this->modifiedColumns[] = ClubProfilePeer::MEETING_DAY;
		}

		return $this;
	} // setMeetingDay()

	/**
	 * Set the value of [meeting_time] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setMeetingTime($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->meeting_time !== $v) {
			$this->meeting_time = $v;
			$this->modifiedColumns[] = ClubProfilePeer::MEETING_TIME;
		}

		return $this;
	} // setMeetingTime()

	/**
	 * Set the value of [meeting_loc] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setMeetingLoc($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->meeting_loc !== $v) {
			$this->meeting_loc = $v;
			$this->modifiedColumns[] = ClubProfilePeer::MEETING_LOC;
		}

		return $this;
	} // setMeetingLoc()

	/**
	 * Set the value of [meeting_freq] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setMeetingFreq($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->meeting_freq !== $v) {
			$this->meeting_freq = $v;
			$this->modifiedColumns[] = ClubProfilePeer::MEETING_FREQ;
		}

		return $this;
	} // setMeetingFreq()

	/**
	 * Set the value of [financial_tier] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setFinancialTier($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->financial_tier !== $v) {
			$this->financial_tier = $v;
			$this->modifiedColumns[] = ClubProfilePeer::FINANCIAL_TIER;
		}

		return $this;
	} // setFinancialTier()

	/**
	 * Sets the value of [financial_tier_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setFinancialTierDate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->financial_tier_date !== null || $dt !== null) {
			$currentDateAsString = ($this->financial_tier_date !== null && $tmpDt = new DateTime($this->financial_tier_date)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
				|| ($dt->format('Y-m-d') === NULL) // or the entered value matches the default
				 ) {
				$this->financial_tier_date = $newDateAsString;
				$this->modifiedColumns[] = ClubProfilePeer::FINANCIAL_TIER_DATE;
			}
		} // if either are not null

		return $this;
	} // setFinancialTierDate()

	/**
	 * Sets the value of the [crb_exempt] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setCrbExempt($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->crb_exempt !== $v) {
			$this->crb_exempt = $v;
			$this->modifiedColumns[] = ClubProfilePeer::CRB_EXEMPT;
		}

		return $this;
	} // setCrbExempt()

	/**
	 * Sets the value of the [sports_club] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     ClubProfile The current object (for fluent API support)
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
			$this->modifiedColumns[] = ClubProfilePeer::SPORTS_CLUB;
		}

		return $this;
	} // setSportsClub()

	/**
	 * Set the value of [season] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setSeason($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->season !== $v) {
			$this->season = $v;
			$this->modifiedColumns[] = ClubProfilePeer::SEASON;
		}

		return $this;
	} // setSeason()

	/**
	 * Set the value of [cfirst] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setCfirst($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cfirst !== $v) {
			$this->cfirst = $v;
			$this->modifiedColumns[] = ClubProfilePeer::CFIRST;
		}

		return $this;
	} // setCfirst()

	/**
	 * Set the value of [clast] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setClast($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->clast !== $v) {
			$this->clast = $v;
			$this->modifiedColumns[] = ClubProfilePeer::CLAST;
		}

		return $this;
	} // setClast()

	/**
	 * Set the value of [cphone] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setCphone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cphone !== $v) {
			$this->cphone = $v;
			$this->modifiedColumns[] = ClubProfilePeer::CPHONE;
		}

		return $this;
	} // setCphone()

	/**
	 * Set the value of [cemail] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setCemail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cemail !== $v) {
			$this->cemail = $v;
			$this->modifiedColumns[] = ClubProfilePeer::CEMAIL;
		}

		return $this;
	} // setCemail()

	/**
	 * Set the value of [league] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setLeague($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->league !== $v) {
			$this->league = $v;
			$this->modifiedColumns[] = ClubProfilePeer::LEAGUE;
		}

		return $this;
	} // setLeague()

	/**
	 * Set the value of [leaguefees] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setLeaguefees($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->leaguefees !== $v) {
			$this->leaguefees = $v;
			$this->modifiedColumns[] = ClubProfilePeer::LEAGUEFEES;
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
	 * @return     ClubProfile The current object (for fluent API support)
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
			$this->modifiedColumns[] = ClubProfilePeer::SPORTS_TRAVEL;
		}

		return $this;
	} // setSportsTravel()

	/**
	 * Set the value of [sportsexpenses] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubProfile The current object (for fluent API support)
	 */
	public function setSportsexpenses($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sportsexpenses !== $v) {
			$this->sportsexpenses = $v;
			$this->modifiedColumns[] = ClubProfilePeer::SPORTSEXPENSES;
		}

		return $this;
	} // setSportsexpenses()

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
			if ($this->date_formed !== NULL) {
				return false;
			}

			if ($this->category_id !== 0) {
				return false;
			}

			if ($this->cluster_id !== 1) {
				return false;
			}

			if ($this->second_cluster_id !== 7) {
				return false;
			}

			if ($this->initial_meeting !== 0) {
				return false;
			}

			if ($this->inactive !== 0) {
				return false;
			}

			if ($this->recognized !== NULL) {
				return false;
			}

			if ($this->show_web !== 1) {
				return false;
			}

			if ($this->financial_tier !== '') {
				return false;
			}

			if ($this->financial_tier_date !== NULL) {
				return false;
			}

			if ($this->crb_exempt !== false) {
				return false;
			}

			if ($this->sports_club !== false) {
				return false;
			}

			if ($this->sports_travel !== false) {
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
			$this->org_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->acronym = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->listname = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->project = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->date_formed = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->description = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->category_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->cluster_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->second_cluster_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->web_site = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->email = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->constitution_date = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->lastmodified_ccl = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->lastmodified_club = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->initial_meeting = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
			$this->inactive = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
			$this->recognized = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->show_web = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
			$this->meeting_day = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->meeting_time = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
			$this->meeting_loc = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
			$this->meeting_freq = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
			$this->financial_tier = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
			$this->financial_tier_date = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
			$this->crb_exempt = ($row[$startcol + 25] !== null) ? (boolean) $row[$startcol + 25] : null;
			$this->sports_club = ($row[$startcol + 26] !== null) ? (boolean) $row[$startcol + 26] : null;
			$this->season = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
			$this->cfirst = ($row[$startcol + 28] !== null) ? (string) $row[$startcol + 28] : null;
			$this->clast = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
			$this->cphone = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
			$this->cemail = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
			$this->league = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
			$this->leaguefees = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
			$this->sports_travel = ($row[$startcol + 34] !== null) ? (boolean) $row[$startcol + 34] : null;
			$this->sportsexpenses = ($row[$startcol + 35] !== null) ? (string) $row[$startcol + 35] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 36; // 36 = ClubProfilePeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating ClubProfile object", $e);
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
			$con = Propel::getConnection(ClubProfilePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ClubProfilePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
			$con = Propel::getConnection(ClubProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = ClubProfileQuery::create()
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
			$con = Propel::getConnection(ClubProfilePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ClubProfilePeer::addInstanceToPool($this);
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

		$this->modifiedColumns[] = ClubProfilePeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . ClubProfilePeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(ClubProfilePeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(ClubProfilePeer::ORG_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ORG_ID`';
		}
		if ($this->isColumnModified(ClubProfilePeer::ACRONYM)) {
			$modifiedColumns[':p' . $index++]  = '`ACRONYM`';
		}
		if ($this->isColumnModified(ClubProfilePeer::LISTNAME)) {
			$modifiedColumns[':p' . $index++]  = '`LISTNAME`';
		}
		if ($this->isColumnModified(ClubProfilePeer::PROJECT)) {
			$modifiedColumns[':p' . $index++]  = '`PROJECT`';
		}
		if ($this->isColumnModified(ClubProfilePeer::DATE_FORMED)) {
			$modifiedColumns[':p' . $index++]  = '`DATE_FORMED`';
		}
		if ($this->isColumnModified(ClubProfilePeer::DESCRIPTION)) {
			$modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
		}
		if ($this->isColumnModified(ClubProfilePeer::CATEGORY_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CATEGORY_ID`';
		}
		if ($this->isColumnModified(ClubProfilePeer::CLUSTER_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CLUSTER_ID`';
		}
		if ($this->isColumnModified(ClubProfilePeer::SECOND_CLUSTER_ID)) {
			$modifiedColumns[':p' . $index++]  = '`SECOND_CLUSTER_ID`';
		}
		if ($this->isColumnModified(ClubProfilePeer::WEB_SITE)) {
			$modifiedColumns[':p' . $index++]  = '`WEB_SITE`';
		}
		if ($this->isColumnModified(ClubProfilePeer::EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`EMAIL`';
		}
		if ($this->isColumnModified(ClubProfilePeer::CONSTITUTION_DATE)) {
			$modifiedColumns[':p' . $index++]  = '`CONSTITUTION_DATE`';
		}
		if ($this->isColumnModified(ClubProfilePeer::LASTMODIFIED_CCL)) {
			$modifiedColumns[':p' . $index++]  = '`LASTMODIFIED_CCL`';
		}
		if ($this->isColumnModified(ClubProfilePeer::LASTMODIFIED_CLUB)) {
			$modifiedColumns[':p' . $index++]  = '`LASTMODIFIED_CLUB`';
		}
		if ($this->isColumnModified(ClubProfilePeer::INITIAL_MEETING)) {
			$modifiedColumns[':p' . $index++]  = '`INITIAL_MEETING`';
		}
		if ($this->isColumnModified(ClubProfilePeer::INACTIVE)) {
			$modifiedColumns[':p' . $index++]  = '`INACTIVE`';
		}
		if ($this->isColumnModified(ClubProfilePeer::RECOGNIZED)) {
			$modifiedColumns[':p' . $index++]  = '`RECOGNIZED`';
		}
		if ($this->isColumnModified(ClubProfilePeer::SHOW_WEB)) {
			$modifiedColumns[':p' . $index++]  = '`SHOW_WEB`';
		}
		if ($this->isColumnModified(ClubProfilePeer::MEETING_DAY)) {
			$modifiedColumns[':p' . $index++]  = '`MEETING_DAY`';
		}
		if ($this->isColumnModified(ClubProfilePeer::MEETING_TIME)) {
			$modifiedColumns[':p' . $index++]  = '`MEETING_TIME`';
		}
		if ($this->isColumnModified(ClubProfilePeer::MEETING_LOC)) {
			$modifiedColumns[':p' . $index++]  = '`MEETING_LOC`';
		}
		if ($this->isColumnModified(ClubProfilePeer::MEETING_FREQ)) {
			$modifiedColumns[':p' . $index++]  = '`MEETING_FREQ`';
		}
		if ($this->isColumnModified(ClubProfilePeer::FINANCIAL_TIER)) {
			$modifiedColumns[':p' . $index++]  = '`FINANCIAL_TIER`';
		}
		if ($this->isColumnModified(ClubProfilePeer::FINANCIAL_TIER_DATE)) {
			$modifiedColumns[':p' . $index++]  = '`FINANCIAL_TIER_DATE`';
		}
		if ($this->isColumnModified(ClubProfilePeer::CRB_EXEMPT)) {
			$modifiedColumns[':p' . $index++]  = '`CRB_EXEMPT`';
		}
		if ($this->isColumnModified(ClubProfilePeer::SPORTS_CLUB)) {
			$modifiedColumns[':p' . $index++]  = '`SPORTS_CLUB`';
		}
		if ($this->isColumnModified(ClubProfilePeer::SEASON)) {
			$modifiedColumns[':p' . $index++]  = '`SEASON`';
		}
		if ($this->isColumnModified(ClubProfilePeer::CFIRST)) {
			$modifiedColumns[':p' . $index++]  = '`CFIRST`';
		}
		if ($this->isColumnModified(ClubProfilePeer::CLAST)) {
			$modifiedColumns[':p' . $index++]  = '`CLAST`';
		}
		if ($this->isColumnModified(ClubProfilePeer::CPHONE)) {
			$modifiedColumns[':p' . $index++]  = '`CPHONE`';
		}
		if ($this->isColumnModified(ClubProfilePeer::CEMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`CEMAIL`';
		}
		if ($this->isColumnModified(ClubProfilePeer::LEAGUE)) {
			$modifiedColumns[':p' . $index++]  = '`LEAGUE`';
		}
		if ($this->isColumnModified(ClubProfilePeer::LEAGUEFEES)) {
			$modifiedColumns[':p' . $index++]  = '`LEAGUEFEES`';
		}
		if ($this->isColumnModified(ClubProfilePeer::SPORTS_TRAVEL)) {
			$modifiedColumns[':p' . $index++]  = '`SPORTS_TRAVEL`';
		}
		if ($this->isColumnModified(ClubProfilePeer::SPORTSEXPENSES)) {
			$modifiedColumns[':p' . $index++]  = '`SPORTSEXPENSES`';
		}

		$sql = sprintf(
			'INSERT INTO `club_profile` (%s) VALUES (%s)',
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
					case '`ORG_ID`':
						$stmt->bindValue($identifier, $this->org_id, PDO::PARAM_INT);
						break;
					case '`ACRONYM`':
						$stmt->bindValue($identifier, $this->acronym, PDO::PARAM_STR);
						break;
					case '`LISTNAME`':
						$stmt->bindValue($identifier, $this->listname, PDO::PARAM_STR);
						break;
					case '`PROJECT`':
						$stmt->bindValue($identifier, $this->project, PDO::PARAM_INT);
						break;
					case '`DATE_FORMED`':
						$stmt->bindValue($identifier, $this->date_formed, PDO::PARAM_STR);
						break;
					case '`DESCRIPTION`':
						$stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
						break;
					case '`CATEGORY_ID`':
						$stmt->bindValue($identifier, $this->category_id, PDO::PARAM_INT);
						break;
					case '`CLUSTER_ID`':
						$stmt->bindValue($identifier, $this->cluster_id, PDO::PARAM_INT);
						break;
					case '`SECOND_CLUSTER_ID`':
						$stmt->bindValue($identifier, $this->second_cluster_id, PDO::PARAM_INT);
						break;
					case '`WEB_SITE`':
						$stmt->bindValue($identifier, $this->web_site, PDO::PARAM_STR);
						break;
					case '`EMAIL`':
						$stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
						break;
					case '`CONSTITUTION_DATE`':
						$stmt->bindValue($identifier, $this->constitution_date, PDO::PARAM_STR);
						break;
					case '`LASTMODIFIED_CCL`':
						$stmt->bindValue($identifier, $this->lastmodified_ccl, PDO::PARAM_STR);
						break;
					case '`LASTMODIFIED_CLUB`':
						$stmt->bindValue($identifier, $this->lastmodified_club, PDO::PARAM_STR);
						break;
					case '`INITIAL_MEETING`':
						$stmt->bindValue($identifier, $this->initial_meeting, PDO::PARAM_INT);
						break;
					case '`INACTIVE`':
						$stmt->bindValue($identifier, $this->inactive, PDO::PARAM_INT);
						break;
					case '`RECOGNIZED`':
						$stmt->bindValue($identifier, $this->recognized, PDO::PARAM_STR);
						break;
					case '`SHOW_WEB`':
						$stmt->bindValue($identifier, $this->show_web, PDO::PARAM_INT);
						break;
					case '`MEETING_DAY`':
						$stmt->bindValue($identifier, $this->meeting_day, PDO::PARAM_STR);
						break;
					case '`MEETING_TIME`':
						$stmt->bindValue($identifier, $this->meeting_time, PDO::PARAM_STR);
						break;
					case '`MEETING_LOC`':
						$stmt->bindValue($identifier, $this->meeting_loc, PDO::PARAM_STR);
						break;
					case '`MEETING_FREQ`':
						$stmt->bindValue($identifier, $this->meeting_freq, PDO::PARAM_STR);
						break;
					case '`FINANCIAL_TIER`':
						$stmt->bindValue($identifier, $this->financial_tier, PDO::PARAM_STR);
						break;
					case '`FINANCIAL_TIER_DATE`':
						$stmt->bindValue($identifier, $this->financial_tier_date, PDO::PARAM_STR);
						break;
					case '`CRB_EXEMPT`':
						$stmt->bindValue($identifier, (int) $this->crb_exempt, PDO::PARAM_INT);
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


			if (($retval = ClubProfilePeer::doValidate($this, $columns)) !== true) {
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
		$pos = ClubProfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getOrgId();
				break;
			case 2:
				return $this->getAcronym();
				break;
			case 3:
				return $this->getListname();
				break;
			case 4:
				return $this->getProject();
				break;
			case 5:
				return $this->getDateFormed();
				break;
			case 6:
				return $this->getDescription();
				break;
			case 7:
				return $this->getCategoryId();
				break;
			case 8:
				return $this->getClusterId();
				break;
			case 9:
				return $this->getSecondClusterId();
				break;
			case 10:
				return $this->getWebSite();
				break;
			case 11:
				return $this->getEmail();
				break;
			case 12:
				return $this->getConstitutionDate();
				break;
			case 13:
				return $this->getLastmodifiedCcl();
				break;
			case 14:
				return $this->getLastmodifiedClub();
				break;
			case 15:
				return $this->getInitialMeeting();
				break;
			case 16:
				return $this->getInactive();
				break;
			case 17:
				return $this->getRecognized();
				break;
			case 18:
				return $this->getShowWeb();
				break;
			case 19:
				return $this->getMeetingDay();
				break;
			case 20:
				return $this->getMeetingTime();
				break;
			case 21:
				return $this->getMeetingLoc();
				break;
			case 22:
				return $this->getMeetingFreq();
				break;
			case 23:
				return $this->getFinancialTier();
				break;
			case 24:
				return $this->getFinancialTierDate();
				break;
			case 25:
				return $this->getCrbExempt();
				break;
			case 26:
				return $this->getSportsClub();
				break;
			case 27:
				return $this->getSeason();
				break;
			case 28:
				return $this->getCfirst();
				break;
			case 29:
				return $this->getClast();
				break;
			case 30:
				return $this->getCphone();
				break;
			case 31:
				return $this->getCemail();
				break;
			case 32:
				return $this->getLeague();
				break;
			case 33:
				return $this->getLeaguefees();
				break;
			case 34:
				return $this->getSportsTravel();
				break;
			case 35:
				return $this->getSportsexpenses();
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
		if (isset($alreadyDumpedObjects['ClubProfile'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['ClubProfile'][$this->getPrimaryKey()] = true;
		$keys = ClubProfilePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getOrgId(),
			$keys[2] => $this->getAcronym(),
			$keys[3] => $this->getListname(),
			$keys[4] => $this->getProject(),
			$keys[5] => $this->getDateFormed(),
			$keys[6] => $this->getDescription(),
			$keys[7] => $this->getCategoryId(),
			$keys[8] => $this->getClusterId(),
			$keys[9] => $this->getSecondClusterId(),
			$keys[10] => $this->getWebSite(),
			$keys[11] => $this->getEmail(),
			$keys[12] => $this->getConstitutionDate(),
			$keys[13] => $this->getLastmodifiedCcl(),
			$keys[14] => $this->getLastmodifiedClub(),
			$keys[15] => $this->getInitialMeeting(),
			$keys[16] => $this->getInactive(),
			$keys[17] => $this->getRecognized(),
			$keys[18] => $this->getShowWeb(),
			$keys[19] => $this->getMeetingDay(),
			$keys[20] => $this->getMeetingTime(),
			$keys[21] => $this->getMeetingLoc(),
			$keys[22] => $this->getMeetingFreq(),
			$keys[23] => $this->getFinancialTier(),
			$keys[24] => $this->getFinancialTierDate(),
			$keys[25] => $this->getCrbExempt(),
			$keys[26] => $this->getSportsClub(),
			$keys[27] => $this->getSeason(),
			$keys[28] => $this->getCfirst(),
			$keys[29] => $this->getClast(),
			$keys[30] => $this->getCphone(),
			$keys[31] => $this->getCemail(),
			$keys[32] => $this->getLeague(),
			$keys[33] => $this->getLeaguefees(),
			$keys[34] => $this->getSportsTravel(),
			$keys[35] => $this->getSportsexpenses(),
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
		$pos = ClubProfilePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setOrgId($value);
				break;
			case 2:
				$this->setAcronym($value);
				break;
			case 3:
				$this->setListname($value);
				break;
			case 4:
				$this->setProject($value);
				break;
			case 5:
				$this->setDateFormed($value);
				break;
			case 6:
				$this->setDescription($value);
				break;
			case 7:
				$this->setCategoryId($value);
				break;
			case 8:
				$this->setClusterId($value);
				break;
			case 9:
				$this->setSecondClusterId($value);
				break;
			case 10:
				$this->setWebSite($value);
				break;
			case 11:
				$this->setEmail($value);
				break;
			case 12:
				$this->setConstitutionDate($value);
				break;
			case 13:
				$this->setLastmodifiedCcl($value);
				break;
			case 14:
				$this->setLastmodifiedClub($value);
				break;
			case 15:
				$this->setInitialMeeting($value);
				break;
			case 16:
				$this->setInactive($value);
				break;
			case 17:
				$this->setRecognized($value);
				break;
			case 18:
				$this->setShowWeb($value);
				break;
			case 19:
				$this->setMeetingDay($value);
				break;
			case 20:
				$this->setMeetingTime($value);
				break;
			case 21:
				$this->setMeetingLoc($value);
				break;
			case 22:
				$this->setMeetingFreq($value);
				break;
			case 23:
				$this->setFinancialTier($value);
				break;
			case 24:
				$this->setFinancialTierDate($value);
				break;
			case 25:
				$this->setCrbExempt($value);
				break;
			case 26:
				$this->setSportsClub($value);
				break;
			case 27:
				$this->setSeason($value);
				break;
			case 28:
				$this->setCfirst($value);
				break;
			case 29:
				$this->setClast($value);
				break;
			case 30:
				$this->setCphone($value);
				break;
			case 31:
				$this->setCemail($value);
				break;
			case 32:
				$this->setLeague($value);
				break;
			case 33:
				$this->setLeaguefees($value);
				break;
			case 34:
				$this->setSportsTravel($value);
				break;
			case 35:
				$this->setSportsexpenses($value);
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
		$keys = ClubProfilePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setOrgId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAcronym($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setListname($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setProject($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDateFormed($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDescription($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCategoryId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setClusterId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSecondClusterId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setWebSite($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setEmail($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setConstitutionDate($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setLastmodifiedCcl($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setLastmodifiedClub($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setInitialMeeting($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setInactive($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setRecognized($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setShowWeb($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setMeetingDay($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setMeetingTime($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setMeetingLoc($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setMeetingFreq($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setFinancialTier($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setFinancialTierDate($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCrbExempt($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setSportsClub($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setSeason($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCfirst($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setClast($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCphone($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCemail($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setLeague($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setLeaguefees($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setSportsTravel($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setSportsexpenses($arr[$keys[35]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ClubProfilePeer::DATABASE_NAME);

		if ($this->isColumnModified(ClubProfilePeer::ID)) $criteria->add(ClubProfilePeer::ID, $this->id);
		if ($this->isColumnModified(ClubProfilePeer::ORG_ID)) $criteria->add(ClubProfilePeer::ORG_ID, $this->org_id);
		if ($this->isColumnModified(ClubProfilePeer::ACRONYM)) $criteria->add(ClubProfilePeer::ACRONYM, $this->acronym);
		if ($this->isColumnModified(ClubProfilePeer::LISTNAME)) $criteria->add(ClubProfilePeer::LISTNAME, $this->listname);
		if ($this->isColumnModified(ClubProfilePeer::PROJECT)) $criteria->add(ClubProfilePeer::PROJECT, $this->project);
		if ($this->isColumnModified(ClubProfilePeer::DATE_FORMED)) $criteria->add(ClubProfilePeer::DATE_FORMED, $this->date_formed);
		if ($this->isColumnModified(ClubProfilePeer::DESCRIPTION)) $criteria->add(ClubProfilePeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(ClubProfilePeer::CATEGORY_ID)) $criteria->add(ClubProfilePeer::CATEGORY_ID, $this->category_id);
		if ($this->isColumnModified(ClubProfilePeer::CLUSTER_ID)) $criteria->add(ClubProfilePeer::CLUSTER_ID, $this->cluster_id);
		if ($this->isColumnModified(ClubProfilePeer::SECOND_CLUSTER_ID)) $criteria->add(ClubProfilePeer::SECOND_CLUSTER_ID, $this->second_cluster_id);
		if ($this->isColumnModified(ClubProfilePeer::WEB_SITE)) $criteria->add(ClubProfilePeer::WEB_SITE, $this->web_site);
		if ($this->isColumnModified(ClubProfilePeer::EMAIL)) $criteria->add(ClubProfilePeer::EMAIL, $this->email);
		if ($this->isColumnModified(ClubProfilePeer::CONSTITUTION_DATE)) $criteria->add(ClubProfilePeer::CONSTITUTION_DATE, $this->constitution_date);
		if ($this->isColumnModified(ClubProfilePeer::LASTMODIFIED_CCL)) $criteria->add(ClubProfilePeer::LASTMODIFIED_CCL, $this->lastmodified_ccl);
		if ($this->isColumnModified(ClubProfilePeer::LASTMODIFIED_CLUB)) $criteria->add(ClubProfilePeer::LASTMODIFIED_CLUB, $this->lastmodified_club);
		if ($this->isColumnModified(ClubProfilePeer::INITIAL_MEETING)) $criteria->add(ClubProfilePeer::INITIAL_MEETING, $this->initial_meeting);
		if ($this->isColumnModified(ClubProfilePeer::INACTIVE)) $criteria->add(ClubProfilePeer::INACTIVE, $this->inactive);
		if ($this->isColumnModified(ClubProfilePeer::RECOGNIZED)) $criteria->add(ClubProfilePeer::RECOGNIZED, $this->recognized);
		if ($this->isColumnModified(ClubProfilePeer::SHOW_WEB)) $criteria->add(ClubProfilePeer::SHOW_WEB, $this->show_web);
		if ($this->isColumnModified(ClubProfilePeer::MEETING_DAY)) $criteria->add(ClubProfilePeer::MEETING_DAY, $this->meeting_day);
		if ($this->isColumnModified(ClubProfilePeer::MEETING_TIME)) $criteria->add(ClubProfilePeer::MEETING_TIME, $this->meeting_time);
		if ($this->isColumnModified(ClubProfilePeer::MEETING_LOC)) $criteria->add(ClubProfilePeer::MEETING_LOC, $this->meeting_loc);
		if ($this->isColumnModified(ClubProfilePeer::MEETING_FREQ)) $criteria->add(ClubProfilePeer::MEETING_FREQ, $this->meeting_freq);
		if ($this->isColumnModified(ClubProfilePeer::FINANCIAL_TIER)) $criteria->add(ClubProfilePeer::FINANCIAL_TIER, $this->financial_tier);
		if ($this->isColumnModified(ClubProfilePeer::FINANCIAL_TIER_DATE)) $criteria->add(ClubProfilePeer::FINANCIAL_TIER_DATE, $this->financial_tier_date);
		if ($this->isColumnModified(ClubProfilePeer::CRB_EXEMPT)) $criteria->add(ClubProfilePeer::CRB_EXEMPT, $this->crb_exempt);
		if ($this->isColumnModified(ClubProfilePeer::SPORTS_CLUB)) $criteria->add(ClubProfilePeer::SPORTS_CLUB, $this->sports_club);
		if ($this->isColumnModified(ClubProfilePeer::SEASON)) $criteria->add(ClubProfilePeer::SEASON, $this->season);
		if ($this->isColumnModified(ClubProfilePeer::CFIRST)) $criteria->add(ClubProfilePeer::CFIRST, $this->cfirst);
		if ($this->isColumnModified(ClubProfilePeer::CLAST)) $criteria->add(ClubProfilePeer::CLAST, $this->clast);
		if ($this->isColumnModified(ClubProfilePeer::CPHONE)) $criteria->add(ClubProfilePeer::CPHONE, $this->cphone);
		if ($this->isColumnModified(ClubProfilePeer::CEMAIL)) $criteria->add(ClubProfilePeer::CEMAIL, $this->cemail);
		if ($this->isColumnModified(ClubProfilePeer::LEAGUE)) $criteria->add(ClubProfilePeer::LEAGUE, $this->league);
		if ($this->isColumnModified(ClubProfilePeer::LEAGUEFEES)) $criteria->add(ClubProfilePeer::LEAGUEFEES, $this->leaguefees);
		if ($this->isColumnModified(ClubProfilePeer::SPORTS_TRAVEL)) $criteria->add(ClubProfilePeer::SPORTS_TRAVEL, $this->sports_travel);
		if ($this->isColumnModified(ClubProfilePeer::SPORTSEXPENSES)) $criteria->add(ClubProfilePeer::SPORTSEXPENSES, $this->sportsexpenses);

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
		$criteria = new Criteria(ClubProfilePeer::DATABASE_NAME);
		$criteria->add(ClubProfilePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ClubProfile (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setOrgId($this->getOrgId());
		$copyObj->setAcronym($this->getAcronym());
		$copyObj->setListname($this->getListname());
		$copyObj->setProject($this->getProject());
		$copyObj->setDateFormed($this->getDateFormed());
		$copyObj->setDescription($this->getDescription());
		$copyObj->setCategoryId($this->getCategoryId());
		$copyObj->setClusterId($this->getClusterId());
		$copyObj->setSecondClusterId($this->getSecondClusterId());
		$copyObj->setWebSite($this->getWebSite());
		$copyObj->setEmail($this->getEmail());
		$copyObj->setConstitutionDate($this->getConstitutionDate());
		$copyObj->setLastmodifiedCcl($this->getLastmodifiedCcl());
		$copyObj->setLastmodifiedClub($this->getLastmodifiedClub());
		$copyObj->setInitialMeeting($this->getInitialMeeting());
		$copyObj->setInactive($this->getInactive());
		$copyObj->setRecognized($this->getRecognized());
		$copyObj->setShowWeb($this->getShowWeb());
		$copyObj->setMeetingDay($this->getMeetingDay());
		$copyObj->setMeetingTime($this->getMeetingTime());
		$copyObj->setMeetingLoc($this->getMeetingLoc());
		$copyObj->setMeetingFreq($this->getMeetingFreq());
		$copyObj->setFinancialTier($this->getFinancialTier());
		$copyObj->setFinancialTierDate($this->getFinancialTierDate());
		$copyObj->setCrbExempt($this->getCrbExempt());
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
	 * @return     ClubProfile Clone of current object.
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
	 * @return     ClubProfilePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ClubProfilePeer();
		}
		return self::$peer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->org_id = null;
		$this->acronym = null;
		$this->listname = null;
		$this->project = null;
		$this->date_formed = null;
		$this->description = null;
		$this->category_id = null;
		$this->cluster_id = null;
		$this->second_cluster_id = null;
		$this->web_site = null;
		$this->email = null;
		$this->constitution_date = null;
		$this->lastmodified_ccl = null;
		$this->lastmodified_club = null;
		$this->initial_meeting = null;
		$this->inactive = null;
		$this->recognized = null;
		$this->show_web = null;
		$this->meeting_day = null;
		$this->meeting_time = null;
		$this->meeting_loc = null;
		$this->meeting_freq = null;
		$this->financial_tier = null;
		$this->financial_tier_date = null;
		$this->crb_exempt = null;
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
		return (string) $this->exportTo(ClubProfilePeer::DEFAULT_STRING_FORMAT);
	}

} // BaseClubProfile
