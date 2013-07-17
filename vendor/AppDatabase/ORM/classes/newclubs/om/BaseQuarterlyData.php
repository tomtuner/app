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
use NewClubsORM\QuarterlyDataPeer;
use NewClubsORM\QuarterlyDataQuery;

/**
 * Base class that represents a row from the 'quarterly_data' table.
 *
 * 
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseQuarterlyData extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'NewClubsORM\\QuarterlyDataPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        QuarterlyDataPeer
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
	 * The value for the members field.
	 * @var        string
	 */
	protected $members;

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
		$this->submitted_by = '';
		$this->advisor = '';
	}

	/**
	 * Initializes internal state of BaseQuarterlyData object.
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
	 * Get the [members] column value.
	 * 
	 * @return     string
	 */
	public function getMembers()
	{
		return $this->members;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [report_id] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setReportId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->report_id !== $v) {
			$this->report_id = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::REPORT_ID;
		}

		return $this;
	} // setReportId()

	/**
	 * Set the value of [org_id] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setOrgId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->org_id !== $v) {
			$this->org_id = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::ORG_ID;
		}

		return $this;
	} // setOrgId()

	/**
	 * Set the value of [clubname] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setClubname($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->clubname !== $v) {
			$this->clubname = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::CLUBNAME;
		}

		return $this;
	} // setClubname()

	/**
	 * Set the value of [meeting_place] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setMeetingPlace($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->meeting_place !== $v) {
			$this->meeting_place = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::MEETING_PLACE;
		}

		return $this;
	} // setMeetingPlace()

	/**
	 * Set the value of [day] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setDay($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->day !== $v) {
			$this->day = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::DAY;
		}

		return $this;
	} // setDay()

	/**
	 * Set the value of [time] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setTime($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->time !== $v) {
			$this->time = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::TIME;
		}

		return $this;
	} // setTime()

	/**
	 * Set the value of [active] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setActive($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::ACTIVE;
		}

		return $this;
	} // setActive()

	/**
	 * Set the value of [associate] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setAssociate($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->associate !== $v) {
			$this->associate = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::ASSOCIATE;
		}

		return $this;
	} // setAssociate()

	/**
	 * Set the value of [attendance] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setAttendance($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->attendance !== $v) {
			$this->attendance = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::ATTENDANCE;
		}

		return $this;
	} // setAttendance()

	/**
	 * Set the value of [members] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setMembers($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->members !== $v) {
			$this->members = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::MEMBERS;
		}

		return $this;
	} // setMembers()

	/**
	 * Set the value of [events] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setEvents($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->events !== $v) {
			$this->events = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::EVENTS;
		}

		return $this;
	} // setEvents()

	/**
	 * Set the value of [upcoming] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setUpcoming($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->upcoming !== $v) {
			$this->upcoming = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::UPCOMING;
		}

		return $this;
	} // setUpcoming()

	/**
	 * Set the value of [goals] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setGoals($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->goals !== $v) {
			$this->goals = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::GOALS;
		}

		return $this;
	} // setGoals()

	/**
	 * Set the value of [reachgoals] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setReachgoals($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->reachgoals !== $v) {
			$this->reachgoals = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::REACHGOALS;
		}

		return $this;
	} // setReachgoals()

	/**
	 * Set the value of [help] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setHelp($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->help !== $v) {
			$this->help = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::HELP;
		}

		return $this;
	} // setHelp()

	/**
	 * Set the value of [accomplishments] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setAccomplishments($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->accomplishments !== $v) {
			$this->accomplishments = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::ACCOMPLISHMENTS;
		}

		return $this;
	} // setAccomplishments()

	/**
	 * Set the value of [boardchanges] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setBoardchanges($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->boardchanges !== $v) {
			$this->boardchanges = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::BOARDCHANGES;
		}

		return $this;
	} // setBoardchanges()

	/**
	 * Set the value of [submitted_by] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setSubmittedBy($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->submitted_by !== $v) {
			$this->submitted_by = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::SUBMITTED_BY;
		}

		return $this;
	} // setSubmittedBy()

	/**
	 * Set the value of [advisor] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyData The current object (for fluent API support)
	 */
	public function setAdvisor($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->advisor !== $v) {
			$this->advisor = $v;
			$this->modifiedColumns[] = QuarterlyDataPeer::ADVISOR;
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

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->report_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->org_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->clubname = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->meeting_place = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->day = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->time = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->active = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->associate = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->attendance = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->members = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->events = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->upcoming = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->goals = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->reachgoals = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->help = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->accomplishments = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->boardchanges = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->submitted_by = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->advisor = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 20; // 20 = QuarterlyDataPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating QuarterlyData object", $e);
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
			$con = Propel::getConnection(QuarterlyDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = QuarterlyDataPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
			$con = Propel::getConnection(QuarterlyDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = QuarterlyDataQuery::create()
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
			$con = Propel::getConnection(QuarterlyDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				QuarterlyDataPeer::addInstanceToPool($this);
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

		$this->modifiedColumns[] = QuarterlyDataPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . QuarterlyDataPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(QuarterlyDataPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::REPORT_ID)) {
			$modifiedColumns[':p' . $index++]  = '`REPORT_ID`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::ORG_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ORG_ID`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::CLUBNAME)) {
			$modifiedColumns[':p' . $index++]  = '`CLUBNAME`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::MEETING_PLACE)) {
			$modifiedColumns[':p' . $index++]  = '`MEETING_PLACE`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::DAY)) {
			$modifiedColumns[':p' . $index++]  = '`DAY`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::TIME)) {
			$modifiedColumns[':p' . $index++]  = '`TIME`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::ACTIVE)) {
			$modifiedColumns[':p' . $index++]  = '`ACTIVE`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::ASSOCIATE)) {
			$modifiedColumns[':p' . $index++]  = '`ASSOCIATE`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::ATTENDANCE)) {
			$modifiedColumns[':p' . $index++]  = '`ATTENDANCE`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::MEMBERS)) {
			$modifiedColumns[':p' . $index++]  = '`MEMBERS`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::EVENTS)) {
			$modifiedColumns[':p' . $index++]  = '`EVENTS`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::UPCOMING)) {
			$modifiedColumns[':p' . $index++]  = '`UPCOMING`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::GOALS)) {
			$modifiedColumns[':p' . $index++]  = '`GOALS`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::REACHGOALS)) {
			$modifiedColumns[':p' . $index++]  = '`REACHGOALS`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::HELP)) {
			$modifiedColumns[':p' . $index++]  = '`HELP`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::ACCOMPLISHMENTS)) {
			$modifiedColumns[':p' . $index++]  = '`ACCOMPLISHMENTS`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::BOARDCHANGES)) {
			$modifiedColumns[':p' . $index++]  = '`BOARDCHANGES`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::SUBMITTED_BY)) {
			$modifiedColumns[':p' . $index++]  = '`SUBMITTED_BY`';
		}
		if ($this->isColumnModified(QuarterlyDataPeer::ADVISOR)) {
			$modifiedColumns[':p' . $index++]  = '`ADVISOR`';
		}

		$sql = sprintf(
			'INSERT INTO `quarterly_data` (%s) VALUES (%s)',
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
					case '`MEMBERS`':
						$stmt->bindValue($identifier, $this->members, PDO::PARAM_STR);
						break;
					case '`EVENTS`':
						$stmt->bindValue($identifier, $this->events, PDO::PARAM_STR);
						break;
					case '`UPCOMING`':
						$stmt->bindValue($identifier, $this->upcoming, PDO::PARAM_STR);
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


			if (($retval = QuarterlyDataPeer::doValidate($this, $columns)) !== true) {
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
		$pos = QuarterlyDataPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getReportId();
				break;
			case 2:
				return $this->getOrgId();
				break;
			case 3:
				return $this->getClubname();
				break;
			case 4:
				return $this->getMeetingPlace();
				break;
			case 5:
				return $this->getDay();
				break;
			case 6:
				return $this->getTime();
				break;
			case 7:
				return $this->getActive();
				break;
			case 8:
				return $this->getAssociate();
				break;
			case 9:
				return $this->getAttendance();
				break;
			case 10:
				return $this->getMembers();
				break;
			case 11:
				return $this->getEvents();
				break;
			case 12:
				return $this->getUpcoming();
				break;
			case 13:
				return $this->getGoals();
				break;
			case 14:
				return $this->getReachgoals();
				break;
			case 15:
				return $this->getHelp();
				break;
			case 16:
				return $this->getAccomplishments();
				break;
			case 17:
				return $this->getBoardchanges();
				break;
			case 18:
				return $this->getSubmittedBy();
				break;
			case 19:
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
		if (isset($alreadyDumpedObjects['QuarterlyData'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['QuarterlyData'][$this->getPrimaryKey()] = true;
		$keys = QuarterlyDataPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getReportId(),
			$keys[2] => $this->getOrgId(),
			$keys[3] => $this->getClubname(),
			$keys[4] => $this->getMeetingPlace(),
			$keys[5] => $this->getDay(),
			$keys[6] => $this->getTime(),
			$keys[7] => $this->getActive(),
			$keys[8] => $this->getAssociate(),
			$keys[9] => $this->getAttendance(),
			$keys[10] => $this->getMembers(),
			$keys[11] => $this->getEvents(),
			$keys[12] => $this->getUpcoming(),
			$keys[13] => $this->getGoals(),
			$keys[14] => $this->getReachgoals(),
			$keys[15] => $this->getHelp(),
			$keys[16] => $this->getAccomplishments(),
			$keys[17] => $this->getBoardchanges(),
			$keys[18] => $this->getSubmittedBy(),
			$keys[19] => $this->getAdvisor(),
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
		$pos = QuarterlyDataPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setReportId($value);
				break;
			case 2:
				$this->setOrgId($value);
				break;
			case 3:
				$this->setClubname($value);
				break;
			case 4:
				$this->setMeetingPlace($value);
				break;
			case 5:
				$this->setDay($value);
				break;
			case 6:
				$this->setTime($value);
				break;
			case 7:
				$this->setActive($value);
				break;
			case 8:
				$this->setAssociate($value);
				break;
			case 9:
				$this->setAttendance($value);
				break;
			case 10:
				$this->setMembers($value);
				break;
			case 11:
				$this->setEvents($value);
				break;
			case 12:
				$this->setUpcoming($value);
				break;
			case 13:
				$this->setGoals($value);
				break;
			case 14:
				$this->setReachgoals($value);
				break;
			case 15:
				$this->setHelp($value);
				break;
			case 16:
				$this->setAccomplishments($value);
				break;
			case 17:
				$this->setBoardchanges($value);
				break;
			case 18:
				$this->setSubmittedBy($value);
				break;
			case 19:
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
		$keys = QuarterlyDataPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setReportId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setOrgId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setClubname($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMeetingPlace($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDay($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTime($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setActive($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAssociate($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAttendance($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMembers($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setEvents($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUpcoming($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setGoals($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setReachgoals($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setHelp($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setAccomplishments($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setBoardchanges($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setSubmittedBy($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setAdvisor($arr[$keys[19]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(QuarterlyDataPeer::DATABASE_NAME);

		if ($this->isColumnModified(QuarterlyDataPeer::ID)) $criteria->add(QuarterlyDataPeer::ID, $this->id);
		if ($this->isColumnModified(QuarterlyDataPeer::REPORT_ID)) $criteria->add(QuarterlyDataPeer::REPORT_ID, $this->report_id);
		if ($this->isColumnModified(QuarterlyDataPeer::ORG_ID)) $criteria->add(QuarterlyDataPeer::ORG_ID, $this->org_id);
		if ($this->isColumnModified(QuarterlyDataPeer::CLUBNAME)) $criteria->add(QuarterlyDataPeer::CLUBNAME, $this->clubname);
		if ($this->isColumnModified(QuarterlyDataPeer::MEETING_PLACE)) $criteria->add(QuarterlyDataPeer::MEETING_PLACE, $this->meeting_place);
		if ($this->isColumnModified(QuarterlyDataPeer::DAY)) $criteria->add(QuarterlyDataPeer::DAY, $this->day);
		if ($this->isColumnModified(QuarterlyDataPeer::TIME)) $criteria->add(QuarterlyDataPeer::TIME, $this->time);
		if ($this->isColumnModified(QuarterlyDataPeer::ACTIVE)) $criteria->add(QuarterlyDataPeer::ACTIVE, $this->active);
		if ($this->isColumnModified(QuarterlyDataPeer::ASSOCIATE)) $criteria->add(QuarterlyDataPeer::ASSOCIATE, $this->associate);
		if ($this->isColumnModified(QuarterlyDataPeer::ATTENDANCE)) $criteria->add(QuarterlyDataPeer::ATTENDANCE, $this->attendance);
		if ($this->isColumnModified(QuarterlyDataPeer::MEMBERS)) $criteria->add(QuarterlyDataPeer::MEMBERS, $this->members);
		if ($this->isColumnModified(QuarterlyDataPeer::EVENTS)) $criteria->add(QuarterlyDataPeer::EVENTS, $this->events);
		if ($this->isColumnModified(QuarterlyDataPeer::UPCOMING)) $criteria->add(QuarterlyDataPeer::UPCOMING, $this->upcoming);
		if ($this->isColumnModified(QuarterlyDataPeer::GOALS)) $criteria->add(QuarterlyDataPeer::GOALS, $this->goals);
		if ($this->isColumnModified(QuarterlyDataPeer::REACHGOALS)) $criteria->add(QuarterlyDataPeer::REACHGOALS, $this->reachgoals);
		if ($this->isColumnModified(QuarterlyDataPeer::HELP)) $criteria->add(QuarterlyDataPeer::HELP, $this->help);
		if ($this->isColumnModified(QuarterlyDataPeer::ACCOMPLISHMENTS)) $criteria->add(QuarterlyDataPeer::ACCOMPLISHMENTS, $this->accomplishments);
		if ($this->isColumnModified(QuarterlyDataPeer::BOARDCHANGES)) $criteria->add(QuarterlyDataPeer::BOARDCHANGES, $this->boardchanges);
		if ($this->isColumnModified(QuarterlyDataPeer::SUBMITTED_BY)) $criteria->add(QuarterlyDataPeer::SUBMITTED_BY, $this->submitted_by);
		if ($this->isColumnModified(QuarterlyDataPeer::ADVISOR)) $criteria->add(QuarterlyDataPeer::ADVISOR, $this->advisor);

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
		$criteria = new Criteria(QuarterlyDataPeer::DATABASE_NAME);
		$criteria->add(QuarterlyDataPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of QuarterlyData (or compatible) type.
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
		$copyObj->setMembers($this->getMembers());
		$copyObj->setEvents($this->getEvents());
		$copyObj->setUpcoming($this->getUpcoming());
		$copyObj->setGoals($this->getGoals());
		$copyObj->setReachgoals($this->getReachgoals());
		$copyObj->setHelp($this->getHelp());
		$copyObj->setAccomplishments($this->getAccomplishments());
		$copyObj->setBoardchanges($this->getBoardchanges());
		$copyObj->setSubmittedBy($this->getSubmittedBy());
		$copyObj->setAdvisor($this->getAdvisor());
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
	 * @return     QuarterlyData Clone of current object.
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
	 * @return     QuarterlyDataPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new QuarterlyDataPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->report_id = null;
		$this->org_id = null;
		$this->clubname = null;
		$this->meeting_place = null;
		$this->day = null;
		$this->time = null;
		$this->active = null;
		$this->associate = null;
		$this->attendance = null;
		$this->members = null;
		$this->events = null;
		$this->upcoming = null;
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
		return (string) $this->exportTo(QuarterlyDataPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseQuarterlyData
