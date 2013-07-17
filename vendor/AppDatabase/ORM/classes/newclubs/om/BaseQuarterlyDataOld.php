<?php

namespace NewClubsORM\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use NewClubsORM\QuarterlyDataOldPeer;
use NewClubsORM\QuarterlyDataOldQuery;

/**
 * Base class that represents a row from the 'quarterly_data_old' table.
 *
 * 
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseQuarterlyDataOld extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'NewClubsORM\\QuarterlyDataOldPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        QuarterlyDataOldPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the report_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $report_id;

	/**
	 * The value for the org_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $org_id;

	/**
	 * The value for the clubname field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $clubname;

	/**
	 * The value for the meeting_place field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $meeting_place;

	/**
	 * The value for the day field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $day;

	/**
	 * The value for the time field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $time;

	/**
	 * The value for the active field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $active;

	/**
	 * The value for the associate field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $associate;

	/**
	 * The value for the attendance field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $attendance;

	/**
	 * The value for the cos field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $cos;

	/**
	 * The value for the cias field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $cias;

	/**
	 * The value for the cob field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $cob;

	/**
	 * The value for the coe field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $coe;

	/**
	 * The value for the cla field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $cla;

	/**
	 * The value for the ntid field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $ntid;

	/**
	 * The value for the gccis field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $gccis;

	/**
	 * The value for the cast field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $cast;

	/**
	 * The value for the nonrit field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $nonrit;

	/**
	 * The value for the one field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $one;

	/**
	 * The value for the two field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $two;

	/**
	 * The value for the three field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $three;

	/**
	 * The value for the four field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $four;

	/**
	 * The value for the five field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $five;

	/**
	 * The value for the g field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $g;

	/**
	 * The value for the other_year field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $other_year;

	/**
	 * The value for the asian field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $asian;

	/**
	 * The value for the african field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $african;

	/**
	 * The value for the native field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $native;

	/**
	 * The value for the latino field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $latino;

	/**
	 * The value for the caucasian field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $caucasian;

	/**
	 * The value for the international field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $international;

	/**
	 * The value for the other field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $other;

	/**
	 * The value for the male field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $male;

	/**
	 * The value for the female field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $female;

	/**
	 * The value for the events field.
	 * @var        string
	 */
	protected $events;

	/**
	 * The value for the upcoming field.
	 * @var        string
	 */
	protected $upcoming;

	/**
	 * The value for the members field.
	 * @var        string
	 */
	protected $members;

	/**
	 * The value for the goals field.
	 * @var        string
	 */
	protected $goals;

	/**
	 * The value for the reachgoals field.
	 * @var        string
	 */
	protected $reachgoals;

	/**
	 * The value for the help field.
	 * @var        string
	 */
	protected $help;

	/**
	 * The value for the accomplishments field.
	 * @var        string
	 */
	protected $accomplishments;

	/**
	 * The value for the boardchanges field.
	 * @var        string
	 */
	protected $boardchanges;

	/**
	 * The value for the submitted_by field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $submitted_by;

	/**
	 * The value for the advisor field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $advisor;

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
		$this->report_id = 0;
		$this->org_id = 0;
		$this->clubname = '';
		$this->meeting_place = '';
		$this->day = '';
		$this->time = '';
		$this->active = 0;
		$this->associate = 0;
		$this->attendance = 0;
		$this->cos = 0;
		$this->cias = 0;
		$this->cob = 0;
		$this->coe = 0;
		$this->cla = 0;
		$this->ntid = 0;
		$this->gccis = 0;
		$this->cast = 0;
		$this->nonrit = 0;
		$this->one = 0;
		$this->two = 0;
		$this->three = 0;
		$this->four = 0;
		$this->five = 0;
		$this->g = 0;
		$this->other_year = 0;
		$this->asian = 0;
		$this->african = 0;
		$this->native = 0;
		$this->latino = 0;
		$this->caucasian = 0;
		$this->international = 0;
		$this->other = 0;
		$this->male = 0;
		$this->female = 0;
		$this->submitted_by = '';
		$this->advisor = '';
	}

	/**
	 * Initializes internal state of BaseQuarterlyDataOld object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
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
	 * Get the [org_id] column value.
	 * 
	 * @return     int
	 */
	public function getOrgId()
	{
		return $this->org_id;
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
	 * Get the [meeting_place] column value.
	 * 
	 * @return     string
	 */
	public function getMeetingPlace()
	{
		return $this->meeting_place;
	}

	/**
	 * Get the [day] column value.
	 * 
	 * @return     string
	 */
	public function getDay()
	{
		return $this->day;
	}

	/**
	 * Get the [time] column value.
	 * 
	 * @return     string
	 */
	public function getTime()
	{
		return $this->time;
	}

	/**
	 * Get the [active] column value.
	 * 
	 * @return     int
	 */
	public function getActive()
	{
		return $this->active;
	}

	/**
	 * Get the [associate] column value.
	 * 
	 * @return     int
	 */
	public function getAssociate()
	{
		return $this->associate;
	}

	/**
	 * Get the [attendance] column value.
	 * 
	 * @return     int
	 */
	public function getAttendance()
	{
		return $this->attendance;
	}

	/**
	 * Get the [cos] column value.
	 * 
	 * @return     int
	 */
	public function getCos()
	{
		return $this->cos;
	}

	/**
	 * Get the [cias] column value.
	 * 
	 * @return     int
	 */
	public function getCias()
	{
		return $this->cias;
	}

	/**
	 * Get the [cob] column value.
	 * 
	 * @return     int
	 */
	public function getCob()
	{
		return $this->cob;
	}

	/**
	 * Get the [coe] column value.
	 * 
	 * @return     int
	 */
	public function getCoe()
	{
		return $this->coe;
	}

	/**
	 * Get the [cla] column value.
	 * 
	 * @return     int
	 */
	public function getCla()
	{
		return $this->cla;
	}

	/**
	 * Get the [ntid] column value.
	 * 
	 * @return     int
	 */
	public function getNtid()
	{
		return $this->ntid;
	}

	/**
	 * Get the [gccis] column value.
	 * 
	 * @return     int
	 */
	public function getGccis()
	{
		return $this->gccis;
	}

	/**
	 * Get the [cast] column value.
	 * 
	 * @return     int
	 */
	public function getCast()
	{
		return $this->cast;
	}

	/**
	 * Get the [nonrit] column value.
	 * 
	 * @return     int
	 */
	public function getNonrit()
	{
		return $this->nonrit;
	}

	/**
	 * Get the [one] column value.
	 * 
	 * @return     int
	 */
	public function getOne()
	{
		return $this->one;
	}

	/**
	 * Get the [two] column value.
	 * 
	 * @return     int
	 */
	public function getTwo()
	{
		return $this->two;
	}

	/**
	 * Get the [three] column value.
	 * 
	 * @return     int
	 */
	public function getThree()
	{
		return $this->three;
	}

	/**
	 * Get the [four] column value.
	 * 
	 * @return     int
	 */
	public function getFour()
	{
		return $this->four;
	}

	/**
	 * Get the [five] column value.
	 * 
	 * @return     int
	 */
	public function getFive()
	{
		return $this->five;
	}

	/**
	 * Get the [g] column value.
	 * 
	 * @return     int
	 */
	public function getG()
	{
		return $this->g;
	}

	/**
	 * Get the [other_year] column value.
	 * 
	 * @return     int
	 */
	public function getOtherYear()
	{
		return $this->other_year;
	}

	/**
	 * Get the [asian] column value.
	 * 
	 * @return     int
	 */
	public function getAsian()
	{
		return $this->asian;
	}

	/**
	 * Get the [african] column value.
	 * 
	 * @return     int
	 */
	public function getAfrican()
	{
		return $this->african;
	}

	/**
	 * Get the [native] column value.
	 * 
	 * @return     int
	 */
	public function getNative()
	{
		return $this->native;
	}

	/**
	 * Get the [latino] column value.
	 * 
	 * @return     int
	 */
	public function getLatino()
	{
		return $this->latino;
	}

	/**
	 * Get the [caucasian] column value.
	 * 
	 * @return     int
	 */
	public function getCaucasian()
	{
		return $this->caucasian;
	}

	/**
	 * Get the [international] column value.
	 * 
	 * @return     int
	 */
	public function getInternational()
	{
		return $this->international;
	}

	/**
	 * Get the [other] column value.
	 * 
	 * @return     int
	 */
	public function getOther()
	{
		return $this->other;
	}

	/**
	 * Get the [male] column value.
	 * 
	 * @return     int
	 */
	public function getMale()
	{
		return $this->male;
	}

	/**
	 * Get the [female] column value.
	 * 
	 * @return     int
	 */
	public function getFemale()
	{
		return $this->female;
	}

	/**
	 * Get the [events] column value.
	 * 
	 * @return     string
	 */
	public function getEvents()
	{
		return $this->events;
	}

	/**
	 * Get the [upcoming] column value.
	 * 
	 * @return     string
	 */
	public function getUpcoming()
	{
		return $this->upcoming;
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
	 * Get the [goals] column value.
	 * 
	 * @return     string
	 */
	public function getGoals()
	{
		return $this->goals;
	}

	/**
	 * Get the [reachgoals] column value.
	 * 
	 * @return     string
	 */
	public function getReachgoals()
	{
		return $this->reachgoals;
	}

	/**
	 * Get the [help] column value.
	 * 
	 * @return     string
	 */
	public function getHelp()
	{
		return $this->help;
	}

	/**
	 * Get the [accomplishments] column value.
	 * 
	 * @return     string
	 */
	public function getAccomplishments()
	{
		return $this->accomplishments;
	}

	/**
	 * Get the [boardchanges] column value.
	 * 
	 * @return     string
	 */
	public function getBoardchanges()
	{
		return $this->boardchanges;
	}

	/**
	 * Get the [submitted_by] column value.
	 * 
	 * @return     string
	 */
	public function getSubmittedBy()
	{
		return $this->submitted_by;
	}

	/**
	 * Get the [advisor] column value.
	 * 
	 * @return     string
	 */
	public function getAdvisor()
	{
		return $this->advisor;
	}

	/**
	 * Set the value of [report_id] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setReportId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->report_id !== $v) {
			$this->report_id = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::REPORT_ID;
		}

		return $this;
	} // setReportId()

	/**
	 * Set the value of [org_id] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setOrgId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->org_id !== $v) {
			$this->org_id = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::ORG_ID;
		}

		return $this;
	} // setOrgId()

	/**
	 * Set the value of [clubname] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setClubname($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->clubname !== $v) {
			$this->clubname = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::CLUBNAME;
		}

		return $this;
	} // setClubname()

	/**
	 * Set the value of [meeting_place] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setMeetingPlace($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->meeting_place !== $v) {
			$this->meeting_place = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::MEETING_PLACE;
		}

		return $this;
	} // setMeetingPlace()

	/**
	 * Set the value of [day] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setDay($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->day !== $v) {
			$this->day = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::DAY;
		}

		return $this;
	} // setDay()

	/**
	 * Set the value of [time] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setTime($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->time !== $v) {
			$this->time = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::TIME;
		}

		return $this;
	} // setTime()

	/**
	 * Set the value of [active] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setActive($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::ACTIVE;
		}

		return $this;
	} // setActive()

	/**
	 * Set the value of [associate] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setAssociate($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->associate !== $v) {
			$this->associate = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::ASSOCIATE;
		}

		return $this;
	} // setAssociate()

	/**
	 * Set the value of [attendance] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setAttendance($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->attendance !== $v) {
			$this->attendance = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::ATTENDANCE;
		}

		return $this;
	} // setAttendance()

	/**
	 * Set the value of [cos] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setCos($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cos !== $v) {
			$this->cos = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::COS;
		}

		return $this;
	} // setCos()

	/**
	 * Set the value of [cias] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setCias($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cias !== $v) {
			$this->cias = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::CIAS;
		}

		return $this;
	} // setCias()

	/**
	 * Set the value of [cob] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setCob($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cob !== $v) {
			$this->cob = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::COB;
		}

		return $this;
	} // setCob()

	/**
	 * Set the value of [coe] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setCoe($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->coe !== $v) {
			$this->coe = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::COE;
		}

		return $this;
	} // setCoe()

	/**
	 * Set the value of [cla] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setCla($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cla !== $v) {
			$this->cla = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::CLA;
		}

		return $this;
	} // setCla()

	/**
	 * Set the value of [ntid] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setNtid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->ntid !== $v) {
			$this->ntid = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::NTID;
		}

		return $this;
	} // setNtid()

	/**
	 * Set the value of [gccis] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setGccis($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->gccis !== $v) {
			$this->gccis = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::GCCIS;
		}

		return $this;
	} // setGccis()

	/**
	 * Set the value of [cast] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setCast($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cast !== $v) {
			$this->cast = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::CAST;
		}

		return $this;
	} // setCast()

	/**
	 * Set the value of [nonrit] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setNonrit($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->nonrit !== $v) {
			$this->nonrit = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::NONRIT;
		}

		return $this;
	} // setNonrit()

	/**
	 * Set the value of [one] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setOne($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->one !== $v) {
			$this->one = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::ONE;
		}

		return $this;
	} // setOne()

	/**
	 * Set the value of [two] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setTwo($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->two !== $v) {
			$this->two = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::TWO;
		}

		return $this;
	} // setTwo()

	/**
	 * Set the value of [three] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setThree($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->three !== $v) {
			$this->three = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::THREE;
		}

		return $this;
	} // setThree()

	/**
	 * Set the value of [four] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setFour($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->four !== $v) {
			$this->four = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::FOUR;
		}

		return $this;
	} // setFour()

	/**
	 * Set the value of [five] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setFive($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->five !== $v) {
			$this->five = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::FIVE;
		}

		return $this;
	} // setFive()

	/**
	 * Set the value of [g] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setG($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->g !== $v) {
			$this->g = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::G;
		}

		return $this;
	} // setG()

	/**
	 * Set the value of [other_year] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setOtherYear($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->other_year !== $v) {
			$this->other_year = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::OTHER_YEAR;
		}

		return $this;
	} // setOtherYear()

	/**
	 * Set the value of [asian] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setAsian($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->asian !== $v) {
			$this->asian = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::ASIAN;
		}

		return $this;
	} // setAsian()

	/**
	 * Set the value of [african] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setAfrican($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->african !== $v) {
			$this->african = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::AFRICAN;
		}

		return $this;
	} // setAfrican()

	/**
	 * Set the value of [native] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setNative($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->native !== $v) {
			$this->native = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::NATIVE;
		}

		return $this;
	} // setNative()

	/**
	 * Set the value of [latino] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setLatino($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->latino !== $v) {
			$this->latino = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::LATINO;
		}

		return $this;
	} // setLatino()

	/**
	 * Set the value of [caucasian] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setCaucasian($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->caucasian !== $v) {
			$this->caucasian = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::CAUCASIAN;
		}

		return $this;
	} // setCaucasian()

	/**
	 * Set the value of [international] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setInternational($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->international !== $v) {
			$this->international = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::INTERNATIONAL;
		}

		return $this;
	} // setInternational()

	/**
	 * Set the value of [other] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setOther($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->other !== $v) {
			$this->other = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::OTHER;
		}

		return $this;
	} // setOther()

	/**
	 * Set the value of [male] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setMale($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->male !== $v) {
			$this->male = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::MALE;
		}

		return $this;
	} // setMale()

	/**
	 * Set the value of [female] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setFemale($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->female !== $v) {
			$this->female = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::FEMALE;
		}

		return $this;
	} // setFemale()

	/**
	 * Set the value of [events] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setEvents($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->events !== $v) {
			$this->events = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::EVENTS;
		}

		return $this;
	} // setEvents()

	/**
	 * Set the value of [upcoming] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setUpcoming($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->upcoming !== $v) {
			$this->upcoming = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::UPCOMING;
		}

		return $this;
	} // setUpcoming()

	/**
	 * Set the value of [members] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setMembers($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->members !== $v) {
			$this->members = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::MEMBERS;
		}

		return $this;
	} // setMembers()

	/**
	 * Set the value of [goals] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setGoals($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->goals !== $v) {
			$this->goals = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::GOALS;
		}

		return $this;
	} // setGoals()

	/**
	 * Set the value of [reachgoals] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setReachgoals($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->reachgoals !== $v) {
			$this->reachgoals = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::REACHGOALS;
		}

		return $this;
	} // setReachgoals()

	/**
	 * Set the value of [help] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setHelp($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->help !== $v) {
			$this->help = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::HELP;
		}

		return $this;
	} // setHelp()

	/**
	 * Set the value of [accomplishments] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setAccomplishments($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->accomplishments !== $v) {
			$this->accomplishments = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::ACCOMPLISHMENTS;
		}

		return $this;
	} // setAccomplishments()

	/**
	 * Set the value of [boardchanges] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setBoardchanges($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->boardchanges !== $v) {
			$this->boardchanges = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::BOARDCHANGES;
		}

		return $this;
	} // setBoardchanges()

	/**
	 * Set the value of [submitted_by] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setSubmittedBy($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->submitted_by !== $v) {
			$this->submitted_by = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::SUBMITTED_BY;
		}

		return $this;
	} // setSubmittedBy()

	/**
	 * Set the value of [advisor] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyDataOld The current object (for fluent API support)
	 */
	public function setAdvisor($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->advisor !== $v) {
			$this->advisor = $v;
			$this->modifiedColumns[] = QuarterlyDataOldPeer::ADVISOR;
		}

		return $this;
	} // setAdvisor()

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
			if ($this->report_id !== 0) {
				return false;
			}

			if ($this->org_id !== 0) {
				return false;
			}

			if ($this->clubname !== '') {
				return false;
			}

			if ($this->meeting_place !== '') {
				return false;
			}

			if ($this->day !== '') {
				return false;
			}

			if ($this->time !== '') {
				return false;
			}

			if ($this->active !== 0) {
				return false;
			}

			if ($this->associate !== 0) {
				return false;
			}

			if ($this->attendance !== 0) {
				return false;
			}

			if ($this->cos !== 0) {
				return false;
			}

			if ($this->cias !== 0) {
				return false;
			}

			if ($this->cob !== 0) {
				return false;
			}

			if ($this->coe !== 0) {
				return false;
			}

			if ($this->cla !== 0) {
				return false;
			}

			if ($this->ntid !== 0) {
				return false;
			}

			if ($this->gccis !== 0) {
				return false;
			}

			if ($this->cast !== 0) {
				return false;
			}

			if ($this->nonrit !== 0) {
				return false;
			}

			if ($this->one !== 0) {
				return false;
			}

			if ($this->two !== 0) {
				return false;
			}

			if ($this->three !== 0) {
				return false;
			}

			if ($this->four !== 0) {
				return false;
			}

			if ($this->five !== 0) {
				return false;
			}

			if ($this->g !== 0) {
				return false;
			}

			if ($this->other_year !== 0) {
				return false;
			}

			if ($this->asian !== 0) {
				return false;
			}

			if ($this->african !== 0) {
				return false;
			}

			if ($this->native !== 0) {
				return false;
			}

			if ($this->latino !== 0) {
				return false;
			}

			if ($this->caucasian !== 0) {
				return false;
			}

			if ($this->international !== 0) {
				return false;
			}

			if ($this->other !== 0) {
				return false;
			}

			if ($this->male !== 0) {
				return false;
			}

			if ($this->female !== 0) {
				return false;
			}

			if ($this->submitted_by !== '') {
				return false;
			}

			if ($this->advisor !== '') {
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

			$this->report_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->org_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->clubname = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->meeting_place = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->day = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->time = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->active = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->associate = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->attendance = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->cos = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->cias = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->cob = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->coe = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->cla = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->ntid = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
			$this->gccis = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
			$this->cast = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
			$this->nonrit = ($row[$startcol + 17] !== null) ? (int) $row[$startcol + 17] : null;
			$this->one = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
			$this->two = ($row[$startcol + 19] !== null) ? (int) $row[$startcol + 19] : null;
			$this->three = ($row[$startcol + 20] !== null) ? (int) $row[$startcol + 20] : null;
			$this->four = ($row[$startcol + 21] !== null) ? (int) $row[$startcol + 21] : null;
			$this->five = ($row[$startcol + 22] !== null) ? (int) $row[$startcol + 22] : null;
			$this->g = ($row[$startcol + 23] !== null) ? (int) $row[$startcol + 23] : null;
			$this->other_year = ($row[$startcol + 24] !== null) ? (int) $row[$startcol + 24] : null;
			$this->asian = ($row[$startcol + 25] !== null) ? (int) $row[$startcol + 25] : null;
			$this->african = ($row[$startcol + 26] !== null) ? (int) $row[$startcol + 26] : null;
			$this->native = ($row[$startcol + 27] !== null) ? (int) $row[$startcol + 27] : null;
			$this->latino = ($row[$startcol + 28] !== null) ? (int) $row[$startcol + 28] : null;
			$this->caucasian = ($row[$startcol + 29] !== null) ? (int) $row[$startcol + 29] : null;
			$this->international = ($row[$startcol + 30] !== null) ? (int) $row[$startcol + 30] : null;
			$this->other = ($row[$startcol + 31] !== null) ? (int) $row[$startcol + 31] : null;
			$this->male = ($row[$startcol + 32] !== null) ? (int) $row[$startcol + 32] : null;
			$this->female = ($row[$startcol + 33] !== null) ? (int) $row[$startcol + 33] : null;
			$this->events = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
			$this->upcoming = ($row[$startcol + 35] !== null) ? (string) $row[$startcol + 35] : null;
			$this->members = ($row[$startcol + 36] !== null) ? (string) $row[$startcol + 36] : null;
			$this->goals = ($row[$startcol + 37] !== null) ? (string) $row[$startcol + 37] : null;
			$this->reachgoals = ($row[$startcol + 38] !== null) ? (string) $row[$startcol + 38] : null;
			$this->help = ($row[$startcol + 39] !== null) ? (string) $row[$startcol + 39] : null;
			$this->accomplishments = ($row[$startcol + 40] !== null) ? (string) $row[$startcol + 40] : null;
			$this->boardchanges = ($row[$startcol + 41] !== null) ? (string) $row[$startcol + 41] : null;
			$this->submitted_by = ($row[$startcol + 42] !== null) ? (string) $row[$startcol + 42] : null;
			$this->advisor = ($row[$startcol + 43] !== null) ? (string) $row[$startcol + 43] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 44; // 44 = QuarterlyDataOldPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating QuarterlyDataOld object", $e);
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
			$con = Propel::getConnection(QuarterlyDataOldPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = QuarterlyDataOldPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
			$con = Propel::getConnection(QuarterlyDataOldPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = QuarterlyDataOldQuery::create()
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
			$con = Propel::getConnection(QuarterlyDataOldPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				QuarterlyDataOldPeer::addInstanceToPool($this);
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


		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(QuarterlyDataOldPeer::REPORT_ID)) {
			$modifiedColumns[':p' . $index++]  = '`REPORT_ID`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::ORG_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ORG_ID`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::CLUBNAME)) {
			$modifiedColumns[':p' . $index++]  = '`CLUBNAME`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::MEETING_PLACE)) {
			$modifiedColumns[':p' . $index++]  = '`MEETING_PLACE`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::DAY)) {
			$modifiedColumns[':p' . $index++]  = '`DAY`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::TIME)) {
			$modifiedColumns[':p' . $index++]  = '`TIME`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::ACTIVE)) {
			$modifiedColumns[':p' . $index++]  = '`ACTIVE`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::ASSOCIATE)) {
			$modifiedColumns[':p' . $index++]  = '`ASSOCIATE`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::ATTENDANCE)) {
			$modifiedColumns[':p' . $index++]  = '`ATTENDANCE`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::COS)) {
			$modifiedColumns[':p' . $index++]  = '`COS`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::CIAS)) {
			$modifiedColumns[':p' . $index++]  = '`CIAS`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::COB)) {
			$modifiedColumns[':p' . $index++]  = '`COB`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::COE)) {
			$modifiedColumns[':p' . $index++]  = '`COE`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::CLA)) {
			$modifiedColumns[':p' . $index++]  = '`CLA`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::NTID)) {
			$modifiedColumns[':p' . $index++]  = '`NTID`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::GCCIS)) {
			$modifiedColumns[':p' . $index++]  = '`GCCIS`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::CAST)) {
			$modifiedColumns[':p' . $index++]  = '`CAST`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::NONRIT)) {
			$modifiedColumns[':p' . $index++]  = '`NONRIT`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::ONE)) {
			$modifiedColumns[':p' . $index++]  = '`ONE`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::TWO)) {
			$modifiedColumns[':p' . $index++]  = '`TWO`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::THREE)) {
			$modifiedColumns[':p' . $index++]  = '`THREE`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::FOUR)) {
			$modifiedColumns[':p' . $index++]  = '`FOUR`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::FIVE)) {
			$modifiedColumns[':p' . $index++]  = '`FIVE`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::G)) {
			$modifiedColumns[':p' . $index++]  = '`G`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::OTHER_YEAR)) {
			$modifiedColumns[':p' . $index++]  = '`OTHER_YEAR`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::ASIAN)) {
			$modifiedColumns[':p' . $index++]  = '`ASIAN`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::AFRICAN)) {
			$modifiedColumns[':p' . $index++]  = '`AFRICAN`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::NATIVE)) {
			$modifiedColumns[':p' . $index++]  = '`NATIVE`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::LATINO)) {
			$modifiedColumns[':p' . $index++]  = '`LATINO`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::CAUCASIAN)) {
			$modifiedColumns[':p' . $index++]  = '`CAUCASIAN`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::INTERNATIONAL)) {
			$modifiedColumns[':p' . $index++]  = '`INTERNATIONAL`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::OTHER)) {
			$modifiedColumns[':p' . $index++]  = '`OTHER`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::MALE)) {
			$modifiedColumns[':p' . $index++]  = '`MALE`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::FEMALE)) {
			$modifiedColumns[':p' . $index++]  = '`FEMALE`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::EVENTS)) {
			$modifiedColumns[':p' . $index++]  = '`EVENTS`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::UPCOMING)) {
			$modifiedColumns[':p' . $index++]  = '`UPCOMING`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::MEMBERS)) {
			$modifiedColumns[':p' . $index++]  = '`MEMBERS`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::GOALS)) {
			$modifiedColumns[':p' . $index++]  = '`GOALS`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::REACHGOALS)) {
			$modifiedColumns[':p' . $index++]  = '`REACHGOALS`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::HELP)) {
			$modifiedColumns[':p' . $index++]  = '`HELP`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::ACCOMPLISHMENTS)) {
			$modifiedColumns[':p' . $index++]  = '`ACCOMPLISHMENTS`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::BOARDCHANGES)) {
			$modifiedColumns[':p' . $index++]  = '`BOARDCHANGES`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::SUBMITTED_BY)) {
			$modifiedColumns[':p' . $index++]  = '`SUBMITTED_BY`';
		}
		if ($this->isColumnModified(QuarterlyDataOldPeer::ADVISOR)) {
			$modifiedColumns[':p' . $index++]  = '`ADVISOR`';
		}

		$sql = sprintf(
			'INSERT INTO `quarterly_data_old` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`REPORT_ID`':
						$stmt->bindValue($identifier, $this->report_id, PDO::PARAM_INT);
						break;
					case '`ORG_ID`':
						$stmt->bindValue($identifier, $this->org_id, PDO::PARAM_INT);
						break;
					case '`CLUBNAME`':
						$stmt->bindValue($identifier, $this->clubname, PDO::PARAM_STR);
						break;
					case '`MEETING_PLACE`':
						$stmt->bindValue($identifier, $this->meeting_place, PDO::PARAM_STR);
						break;
					case '`DAY`':
						$stmt->bindValue($identifier, $this->day, PDO::PARAM_STR);
						break;
					case '`TIME`':
						$stmt->bindValue($identifier, $this->time, PDO::PARAM_STR);
						break;
					case '`ACTIVE`':
						$stmt->bindValue($identifier, $this->active, PDO::PARAM_INT);
						break;
					case '`ASSOCIATE`':
						$stmt->bindValue($identifier, $this->associate, PDO::PARAM_INT);
						break;
					case '`ATTENDANCE`':
						$stmt->bindValue($identifier, $this->attendance, PDO::PARAM_INT);
						break;
					case '`COS`':
						$stmt->bindValue($identifier, $this->cos, PDO::PARAM_INT);
						break;
					case '`CIAS`':
						$stmt->bindValue($identifier, $this->cias, PDO::PARAM_INT);
						break;
					case '`COB`':
						$stmt->bindValue($identifier, $this->cob, PDO::PARAM_INT);
						break;
					case '`COE`':
						$stmt->bindValue($identifier, $this->coe, PDO::PARAM_INT);
						break;
					case '`CLA`':
						$stmt->bindValue($identifier, $this->cla, PDO::PARAM_INT);
						break;
					case '`NTID`':
						$stmt->bindValue($identifier, $this->ntid, PDO::PARAM_INT);
						break;
					case '`GCCIS`':
						$stmt->bindValue($identifier, $this->gccis, PDO::PARAM_INT);
						break;
					case '`CAST`':
						$stmt->bindValue($identifier, $this->cast, PDO::PARAM_INT);
						break;
					case '`NONRIT`':
						$stmt->bindValue($identifier, $this->nonrit, PDO::PARAM_INT);
						break;
					case '`ONE`':
						$stmt->bindValue($identifier, $this->one, PDO::PARAM_INT);
						break;
					case '`TWO`':
						$stmt->bindValue($identifier, $this->two, PDO::PARAM_INT);
						break;
					case '`THREE`':
						$stmt->bindValue($identifier, $this->three, PDO::PARAM_INT);
						break;
					case '`FOUR`':
						$stmt->bindValue($identifier, $this->four, PDO::PARAM_INT);
						break;
					case '`FIVE`':
						$stmt->bindValue($identifier, $this->five, PDO::PARAM_INT);
						break;
					case '`G`':
						$stmt->bindValue($identifier, $this->g, PDO::PARAM_INT);
						break;
					case '`OTHER_YEAR`':
						$stmt->bindValue($identifier, $this->other_year, PDO::PARAM_INT);
						break;
					case '`ASIAN`':
						$stmt->bindValue($identifier, $this->asian, PDO::PARAM_INT);
						break;
					case '`AFRICAN`':
						$stmt->bindValue($identifier, $this->african, PDO::PARAM_INT);
						break;
					case '`NATIVE`':
						$stmt->bindValue($identifier, $this->native, PDO::PARAM_INT);
						break;
					case '`LATINO`':
						$stmt->bindValue($identifier, $this->latino, PDO::PARAM_INT);
						break;
					case '`CAUCASIAN`':
						$stmt->bindValue($identifier, $this->caucasian, PDO::PARAM_INT);
						break;
					case '`INTERNATIONAL`':
						$stmt->bindValue($identifier, $this->international, PDO::PARAM_INT);
						break;
					case '`OTHER`':
						$stmt->bindValue($identifier, $this->other, PDO::PARAM_INT);
						break;
					case '`MALE`':
						$stmt->bindValue($identifier, $this->male, PDO::PARAM_INT);
						break;
					case '`FEMALE`':
						$stmt->bindValue($identifier, $this->female, PDO::PARAM_INT);
						break;
					case '`EVENTS`':
						$stmt->bindValue($identifier, $this->events, PDO::PARAM_STR);
						break;
					case '`UPCOMING`':
						$stmt->bindValue($identifier, $this->upcoming, PDO::PARAM_STR);
						break;
					case '`MEMBERS`':
						$stmt->bindValue($identifier, $this->members, PDO::PARAM_STR);
						break;
					case '`GOALS`':
						$stmt->bindValue($identifier, $this->goals, PDO::PARAM_STR);
						break;
					case '`REACHGOALS`':
						$stmt->bindValue($identifier, $this->reachgoals, PDO::PARAM_STR);
						break;
					case '`HELP`':
						$stmt->bindValue($identifier, $this->help, PDO::PARAM_STR);
						break;
					case '`ACCOMPLISHMENTS`':
						$stmt->bindValue($identifier, $this->accomplishments, PDO::PARAM_STR);
						break;
					case '`BOARDCHANGES`':
						$stmt->bindValue($identifier, $this->boardchanges, PDO::PARAM_STR);
						break;
					case '`SUBMITTED_BY`':
						$stmt->bindValue($identifier, $this->submitted_by, PDO::PARAM_STR);
						break;
					case '`ADVISOR`':
						$stmt->bindValue($identifier, $this->advisor, PDO::PARAM_STR);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

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


			if (($retval = QuarterlyDataOldPeer::doValidate($this, $columns)) !== true) {
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
		$pos = QuarterlyDataOldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getReportId();
				break;
			case 1:
				return $this->getOrgId();
				break;
			case 2:
				return $this->getClubname();
				break;
			case 3:
				return $this->getMeetingPlace();
				break;
			case 4:
				return $this->getDay();
				break;
			case 5:
				return $this->getTime();
				break;
			case 6:
				return $this->getActive();
				break;
			case 7:
				return $this->getAssociate();
				break;
			case 8:
				return $this->getAttendance();
				break;
			case 9:
				return $this->getCos();
				break;
			case 10:
				return $this->getCias();
				break;
			case 11:
				return $this->getCob();
				break;
			case 12:
				return $this->getCoe();
				break;
			case 13:
				return $this->getCla();
				break;
			case 14:
				return $this->getNtid();
				break;
			case 15:
				return $this->getGccis();
				break;
			case 16:
				return $this->getCast();
				break;
			case 17:
				return $this->getNonrit();
				break;
			case 18:
				return $this->getOne();
				break;
			case 19:
				return $this->getTwo();
				break;
			case 20:
				return $this->getThree();
				break;
			case 21:
				return $this->getFour();
				break;
			case 22:
				return $this->getFive();
				break;
			case 23:
				return $this->getG();
				break;
			case 24:
				return $this->getOtherYear();
				break;
			case 25:
				return $this->getAsian();
				break;
			case 26:
				return $this->getAfrican();
				break;
			case 27:
				return $this->getNative();
				break;
			case 28:
				return $this->getLatino();
				break;
			case 29:
				return $this->getCaucasian();
				break;
			case 30:
				return $this->getInternational();
				break;
			case 31:
				return $this->getOther();
				break;
			case 32:
				return $this->getMale();
				break;
			case 33:
				return $this->getFemale();
				break;
			case 34:
				return $this->getEvents();
				break;
			case 35:
				return $this->getUpcoming();
				break;
			case 36:
				return $this->getMembers();
				break;
			case 37:
				return $this->getGoals();
				break;
			case 38:
				return $this->getReachgoals();
				break;
			case 39:
				return $this->getHelp();
				break;
			case 40:
				return $this->getAccomplishments();
				break;
			case 41:
				return $this->getBoardchanges();
				break;
			case 42:
				return $this->getSubmittedBy();
				break;
			case 43:
				return $this->getAdvisor();
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
		if (isset($alreadyDumpedObjects['QuarterlyDataOld'][serialize($this->getPrimaryKey())])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['QuarterlyDataOld'][serialize($this->getPrimaryKey())] = true;
		$keys = QuarterlyDataOldPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReportId(),
			$keys[1] => $this->getOrgId(),
			$keys[2] => $this->getClubname(),
			$keys[3] => $this->getMeetingPlace(),
			$keys[4] => $this->getDay(),
			$keys[5] => $this->getTime(),
			$keys[6] => $this->getActive(),
			$keys[7] => $this->getAssociate(),
			$keys[8] => $this->getAttendance(),
			$keys[9] => $this->getCos(),
			$keys[10] => $this->getCias(),
			$keys[11] => $this->getCob(),
			$keys[12] => $this->getCoe(),
			$keys[13] => $this->getCla(),
			$keys[14] => $this->getNtid(),
			$keys[15] => $this->getGccis(),
			$keys[16] => $this->getCast(),
			$keys[17] => $this->getNonrit(),
			$keys[18] => $this->getOne(),
			$keys[19] => $this->getTwo(),
			$keys[20] => $this->getThree(),
			$keys[21] => $this->getFour(),
			$keys[22] => $this->getFive(),
			$keys[23] => $this->getG(),
			$keys[24] => $this->getOtherYear(),
			$keys[25] => $this->getAsian(),
			$keys[26] => $this->getAfrican(),
			$keys[27] => $this->getNative(),
			$keys[28] => $this->getLatino(),
			$keys[29] => $this->getCaucasian(),
			$keys[30] => $this->getInternational(),
			$keys[31] => $this->getOther(),
			$keys[32] => $this->getMale(),
			$keys[33] => $this->getFemale(),
			$keys[34] => $this->getEvents(),
			$keys[35] => $this->getUpcoming(),
			$keys[36] => $this->getMembers(),
			$keys[37] => $this->getGoals(),
			$keys[38] => $this->getReachgoals(),
			$keys[39] => $this->getHelp(),
			$keys[40] => $this->getAccomplishments(),
			$keys[41] => $this->getBoardchanges(),
			$keys[42] => $this->getSubmittedBy(),
			$keys[43] => $this->getAdvisor(),
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
		$pos = QuarterlyDataOldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setReportId($value);
				break;
			case 1:
				$this->setOrgId($value);
				break;
			case 2:
				$this->setClubname($value);
				break;
			case 3:
				$this->setMeetingPlace($value);
				break;
			case 4:
				$this->setDay($value);
				break;
			case 5:
				$this->setTime($value);
				break;
			case 6:
				$this->setActive($value);
				break;
			case 7:
				$this->setAssociate($value);
				break;
			case 8:
				$this->setAttendance($value);
				break;
			case 9:
				$this->setCos($value);
				break;
			case 10:
				$this->setCias($value);
				break;
			case 11:
				$this->setCob($value);
				break;
			case 12:
				$this->setCoe($value);
				break;
			case 13:
				$this->setCla($value);
				break;
			case 14:
				$this->setNtid($value);
				break;
			case 15:
				$this->setGccis($value);
				break;
			case 16:
				$this->setCast($value);
				break;
			case 17:
				$this->setNonrit($value);
				break;
			case 18:
				$this->setOne($value);
				break;
			case 19:
				$this->setTwo($value);
				break;
			case 20:
				$this->setThree($value);
				break;
			case 21:
				$this->setFour($value);
				break;
			case 22:
				$this->setFive($value);
				break;
			case 23:
				$this->setG($value);
				break;
			case 24:
				$this->setOtherYear($value);
				break;
			case 25:
				$this->setAsian($value);
				break;
			case 26:
				$this->setAfrican($value);
				break;
			case 27:
				$this->setNative($value);
				break;
			case 28:
				$this->setLatino($value);
				break;
			case 29:
				$this->setCaucasian($value);
				break;
			case 30:
				$this->setInternational($value);
				break;
			case 31:
				$this->setOther($value);
				break;
			case 32:
				$this->setMale($value);
				break;
			case 33:
				$this->setFemale($value);
				break;
			case 34:
				$this->setEvents($value);
				break;
			case 35:
				$this->setUpcoming($value);
				break;
			case 36:
				$this->setMembers($value);
				break;
			case 37:
				$this->setGoals($value);
				break;
			case 38:
				$this->setReachgoals($value);
				break;
			case 39:
				$this->setHelp($value);
				break;
			case 40:
				$this->setAccomplishments($value);
				break;
			case 41:
				$this->setBoardchanges($value);
				break;
			case 42:
				$this->setSubmittedBy($value);
				break;
			case 43:
				$this->setAdvisor($value);
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
		$keys = QuarterlyDataOldPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReportId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setOrgId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setClubname($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMeetingPlace($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDay($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTime($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setActive($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAssociate($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAttendance($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCos($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCias($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCob($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCoe($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCla($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setNtid($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setGccis($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCast($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setNonrit($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setOne($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setTwo($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setThree($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFour($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setFive($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setG($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setOtherYear($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setAsian($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setAfrican($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setNative($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setLatino($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setCaucasian($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setInternational($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setOther($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setMale($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setFemale($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setEvents($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setUpcoming($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setMembers($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setGoals($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setReachgoals($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setHelp($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setAccomplishments($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setBoardchanges($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setSubmittedBy($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setAdvisor($arr[$keys[43]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(QuarterlyDataOldPeer::DATABASE_NAME);

		if ($this->isColumnModified(QuarterlyDataOldPeer::REPORT_ID)) $criteria->add(QuarterlyDataOldPeer::REPORT_ID, $this->report_id);
		if ($this->isColumnModified(QuarterlyDataOldPeer::ORG_ID)) $criteria->add(QuarterlyDataOldPeer::ORG_ID, $this->org_id);
		if ($this->isColumnModified(QuarterlyDataOldPeer::CLUBNAME)) $criteria->add(QuarterlyDataOldPeer::CLUBNAME, $this->clubname);
		if ($this->isColumnModified(QuarterlyDataOldPeer::MEETING_PLACE)) $criteria->add(QuarterlyDataOldPeer::MEETING_PLACE, $this->meeting_place);
		if ($this->isColumnModified(QuarterlyDataOldPeer::DAY)) $criteria->add(QuarterlyDataOldPeer::DAY, $this->day);
		if ($this->isColumnModified(QuarterlyDataOldPeer::TIME)) $criteria->add(QuarterlyDataOldPeer::TIME, $this->time);
		if ($this->isColumnModified(QuarterlyDataOldPeer::ACTIVE)) $criteria->add(QuarterlyDataOldPeer::ACTIVE, $this->active);
		if ($this->isColumnModified(QuarterlyDataOldPeer::ASSOCIATE)) $criteria->add(QuarterlyDataOldPeer::ASSOCIATE, $this->associate);
		if ($this->isColumnModified(QuarterlyDataOldPeer::ATTENDANCE)) $criteria->add(QuarterlyDataOldPeer::ATTENDANCE, $this->attendance);
		if ($this->isColumnModified(QuarterlyDataOldPeer::COS)) $criteria->add(QuarterlyDataOldPeer::COS, $this->cos);
		if ($this->isColumnModified(QuarterlyDataOldPeer::CIAS)) $criteria->add(QuarterlyDataOldPeer::CIAS, $this->cias);
		if ($this->isColumnModified(QuarterlyDataOldPeer::COB)) $criteria->add(QuarterlyDataOldPeer::COB, $this->cob);
		if ($this->isColumnModified(QuarterlyDataOldPeer::COE)) $criteria->add(QuarterlyDataOldPeer::COE, $this->coe);
		if ($this->isColumnModified(QuarterlyDataOldPeer::CLA)) $criteria->add(QuarterlyDataOldPeer::CLA, $this->cla);
		if ($this->isColumnModified(QuarterlyDataOldPeer::NTID)) $criteria->add(QuarterlyDataOldPeer::NTID, $this->ntid);
		if ($this->isColumnModified(QuarterlyDataOldPeer::GCCIS)) $criteria->add(QuarterlyDataOldPeer::GCCIS, $this->gccis);
		if ($this->isColumnModified(QuarterlyDataOldPeer::CAST)) $criteria->add(QuarterlyDataOldPeer::CAST, $this->cast);
		if ($this->isColumnModified(QuarterlyDataOldPeer::NONRIT)) $criteria->add(QuarterlyDataOldPeer::NONRIT, $this->nonrit);
		if ($this->isColumnModified(QuarterlyDataOldPeer::ONE)) $criteria->add(QuarterlyDataOldPeer::ONE, $this->one);
		if ($this->isColumnModified(QuarterlyDataOldPeer::TWO)) $criteria->add(QuarterlyDataOldPeer::TWO, $this->two);
		if ($this->isColumnModified(QuarterlyDataOldPeer::THREE)) $criteria->add(QuarterlyDataOldPeer::THREE, $this->three);
		if ($this->isColumnModified(QuarterlyDataOldPeer::FOUR)) $criteria->add(QuarterlyDataOldPeer::FOUR, $this->four);
		if ($this->isColumnModified(QuarterlyDataOldPeer::FIVE)) $criteria->add(QuarterlyDataOldPeer::FIVE, $this->five);
		if ($this->isColumnModified(QuarterlyDataOldPeer::G)) $criteria->add(QuarterlyDataOldPeer::G, $this->g);
		if ($this->isColumnModified(QuarterlyDataOldPeer::OTHER_YEAR)) $criteria->add(QuarterlyDataOldPeer::OTHER_YEAR, $this->other_year);
		if ($this->isColumnModified(QuarterlyDataOldPeer::ASIAN)) $criteria->add(QuarterlyDataOldPeer::ASIAN, $this->asian);
		if ($this->isColumnModified(QuarterlyDataOldPeer::AFRICAN)) $criteria->add(QuarterlyDataOldPeer::AFRICAN, $this->african);
		if ($this->isColumnModified(QuarterlyDataOldPeer::NATIVE)) $criteria->add(QuarterlyDataOldPeer::NATIVE, $this->native);
		if ($this->isColumnModified(QuarterlyDataOldPeer::LATINO)) $criteria->add(QuarterlyDataOldPeer::LATINO, $this->latino);
		if ($this->isColumnModified(QuarterlyDataOldPeer::CAUCASIAN)) $criteria->add(QuarterlyDataOldPeer::CAUCASIAN, $this->caucasian);
		if ($this->isColumnModified(QuarterlyDataOldPeer::INTERNATIONAL)) $criteria->add(QuarterlyDataOldPeer::INTERNATIONAL, $this->international);
		if ($this->isColumnModified(QuarterlyDataOldPeer::OTHER)) $criteria->add(QuarterlyDataOldPeer::OTHER, $this->other);
		if ($this->isColumnModified(QuarterlyDataOldPeer::MALE)) $criteria->add(QuarterlyDataOldPeer::MALE, $this->male);
		if ($this->isColumnModified(QuarterlyDataOldPeer::FEMALE)) $criteria->add(QuarterlyDataOldPeer::FEMALE, $this->female);
		if ($this->isColumnModified(QuarterlyDataOldPeer::EVENTS)) $criteria->add(QuarterlyDataOldPeer::EVENTS, $this->events);
		if ($this->isColumnModified(QuarterlyDataOldPeer::UPCOMING)) $criteria->add(QuarterlyDataOldPeer::UPCOMING, $this->upcoming);
		if ($this->isColumnModified(QuarterlyDataOldPeer::MEMBERS)) $criteria->add(QuarterlyDataOldPeer::MEMBERS, $this->members);
		if ($this->isColumnModified(QuarterlyDataOldPeer::GOALS)) $criteria->add(QuarterlyDataOldPeer::GOALS, $this->goals);
		if ($this->isColumnModified(QuarterlyDataOldPeer::REACHGOALS)) $criteria->add(QuarterlyDataOldPeer::REACHGOALS, $this->reachgoals);
		if ($this->isColumnModified(QuarterlyDataOldPeer::HELP)) $criteria->add(QuarterlyDataOldPeer::HELP, $this->help);
		if ($this->isColumnModified(QuarterlyDataOldPeer::ACCOMPLISHMENTS)) $criteria->add(QuarterlyDataOldPeer::ACCOMPLISHMENTS, $this->accomplishments);
		if ($this->isColumnModified(QuarterlyDataOldPeer::BOARDCHANGES)) $criteria->add(QuarterlyDataOldPeer::BOARDCHANGES, $this->boardchanges);
		if ($this->isColumnModified(QuarterlyDataOldPeer::SUBMITTED_BY)) $criteria->add(QuarterlyDataOldPeer::SUBMITTED_BY, $this->submitted_by);
		if ($this->isColumnModified(QuarterlyDataOldPeer::ADVISOR)) $criteria->add(QuarterlyDataOldPeer::ADVISOR, $this->advisor);

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
		$criteria = new Criteria(QuarterlyDataOldPeer::DATABASE_NAME);
		$criteria->add(QuarterlyDataOldPeer::REPORT_ID, $this->report_id);
		$criteria->add(QuarterlyDataOldPeer::ORG_ID, $this->org_id);

		return $criteria;
	}

	/**
	 * Returns the composite primary key for this object.
	 * The array elements will be in same order as specified in XML.
	 * @return     array
	 */
	public function getPrimaryKey()
	{
		$pks = array();
		$pks[0] = $this->getReportId();
		$pks[1] = $this->getOrgId();

		return $pks;
	}

	/**
	 * Set the [composite] primary key.
	 *
	 * @param      array $keys The elements of the composite key (order must match the order in XML file).
	 * @return     void
	 */
	public function setPrimaryKey($keys)
	{
		$this->setReportId($keys[0]);
		$this->setOrgId($keys[1]);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return (null === $this->getReportId()) && (null === $this->getOrgId());
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of QuarterlyDataOld (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setReportId($this->getReportId());
		$copyObj->setOrgId($this->getOrgId());
		$copyObj->setClubname($this->getClubname());
		$copyObj->setMeetingPlace($this->getMeetingPlace());
		$copyObj->setDay($this->getDay());
		$copyObj->setTime($this->getTime());
		$copyObj->setActive($this->getActive());
		$copyObj->setAssociate($this->getAssociate());
		$copyObj->setAttendance($this->getAttendance());
		$copyObj->setCos($this->getCos());
		$copyObj->setCias($this->getCias());
		$copyObj->setCob($this->getCob());
		$copyObj->setCoe($this->getCoe());
		$copyObj->setCla($this->getCla());
		$copyObj->setNtid($this->getNtid());
		$copyObj->setGccis($this->getGccis());
		$copyObj->setCast($this->getCast());
		$copyObj->setNonrit($this->getNonrit());
		$copyObj->setOne($this->getOne());
		$copyObj->setTwo($this->getTwo());
		$copyObj->setThree($this->getThree());
		$copyObj->setFour($this->getFour());
		$copyObj->setFive($this->getFive());
		$copyObj->setG($this->getG());
		$copyObj->setOtherYear($this->getOtherYear());
		$copyObj->setAsian($this->getAsian());
		$copyObj->setAfrican($this->getAfrican());
		$copyObj->setNative($this->getNative());
		$copyObj->setLatino($this->getLatino());
		$copyObj->setCaucasian($this->getCaucasian());
		$copyObj->setInternational($this->getInternational());
		$copyObj->setOther($this->getOther());
		$copyObj->setMale($this->getMale());
		$copyObj->setFemale($this->getFemale());
		$copyObj->setEvents($this->getEvents());
		$copyObj->setUpcoming($this->getUpcoming());
		$copyObj->setMembers($this->getMembers());
		$copyObj->setGoals($this->getGoals());
		$copyObj->setReachgoals($this->getReachgoals());
		$copyObj->setHelp($this->getHelp());
		$copyObj->setAccomplishments($this->getAccomplishments());
		$copyObj->setBoardchanges($this->getBoardchanges());
		$copyObj->setSubmittedBy($this->getSubmittedBy());
		$copyObj->setAdvisor($this->getAdvisor());
		if ($makeNew) {
			$copyObj->setNew(true);
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
	 * @return     QuarterlyDataOld Clone of current object.
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
	 * @return     QuarterlyDataOldPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new QuarterlyDataOldPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->report_id = null;
		$this->org_id = null;
		$this->clubname = null;
		$this->meeting_place = null;
		$this->day = null;
		$this->time = null;
		$this->active = null;
		$this->associate = null;
		$this->attendance = null;
		$this->cos = null;
		$this->cias = null;
		$this->cob = null;
		$this->coe = null;
		$this->cla = null;
		$this->ntid = null;
		$this->gccis = null;
		$this->cast = null;
		$this->nonrit = null;
		$this->one = null;
		$this->two = null;
		$this->three = null;
		$this->four = null;
		$this->five = null;
		$this->g = null;
		$this->other_year = null;
		$this->asian = null;
		$this->african = null;
		$this->native = null;
		$this->latino = null;
		$this->caucasian = null;
		$this->international = null;
		$this->other = null;
		$this->male = null;
		$this->female = null;
		$this->events = null;
		$this->upcoming = null;
		$this->members = null;
		$this->goals = null;
		$this->reachgoals = null;
		$this->help = null;
		$this->accomplishments = null;
		$this->boardchanges = null;
		$this->submitted_by = null;
		$this->advisor = null;
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
		return (string) $this->exportTo(QuarterlyDataOldPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseQuarterlyDataOld
