<?php

namespace ClubsORM\om;

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
use ClubsORM\ClubMeetingsPeer;
use ClubsORM\ClubMeetingsQuery;

/**
 * Base class that represents a row from the 'club_meetings' table.
 *
 * 
 *
 * @package    propel.generator.clubs.om
 */
abstract class BaseClubMeetings extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ClubsORM\\ClubMeetingsPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ClubMeetingsPeer
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
	 * The value for the location field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $location;

	/**
	 * The value for the starts_at field.
	 * @var        string
	 */
	protected $starts_at;

	/**
	 * The value for the ends_at field.
	 * @var        string
	 */
	protected $ends_at;

	/**
	 * The value for the monday field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $monday;

	/**
	 * The value for the tuesday field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $tuesday;

	/**
	 * The value for the wednesday field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $wednesday;

	/**
	 * The value for the thursday field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $thursday;

	/**
	 * The value for the friday field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $friday;

	/**
	 * The value for the saturday field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $saturday;

	/**
	 * The value for the sunday field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $sunday;

	/**
	 * The value for the other field.
	 * @var        string
	 */
	protected $other;

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
		$this->location = '';
		$this->monday = false;
		$this->tuesday = false;
		$this->wednesday = false;
		$this->thursday = false;
		$this->friday = false;
		$this->saturday = false;
		$this->sunday = false;
	}

	/**
	 * Initializes internal state of BaseClubMeetings object.
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
	 * Get the [location] column value.
	 * 
	 * @return     string
	 */
	public function getLocation()
	{
		return $this->location;
	}

	/**
	 * Get the [optionally formatted] temporal [starts_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getStartsAt($format = '%X')
	{
		if ($this->starts_at === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->starts_at);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->starts_at, true), $x);
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
	 * Get the [optionally formatted] temporal [ends_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getEndsAt($format = '%X')
	{
		if ($this->ends_at === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->ends_at);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->ends_at, true), $x);
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
	 * Get the [monday] column value.
	 * 
	 * @return     boolean
	 */
	public function getMonday()
	{
		return $this->monday;
	}

	/**
	 * Get the [tuesday] column value.
	 * 
	 * @return     boolean
	 */
	public function getTuesday()
	{
		return $this->tuesday;
	}

	/**
	 * Get the [wednesday] column value.
	 * 
	 * @return     boolean
	 */
	public function getWednesday()
	{
		return $this->wednesday;
	}

	/**
	 * Get the [thursday] column value.
	 * 
	 * @return     boolean
	 */
	public function getThursday()
	{
		return $this->thursday;
	}

	/**
	 * Get the [friday] column value.
	 * 
	 * @return     boolean
	 */
	public function getFriday()
	{
		return $this->friday;
	}

	/**
	 * Get the [saturday] column value.
	 * 
	 * @return     boolean
	 */
	public function getSaturday()
	{
		return $this->saturday;
	}

	/**
	 * Get the [sunday] column value.
	 * 
	 * @return     boolean
	 */
	public function getSunday()
	{
		return $this->sunday;
	}

	/**
	 * Get the [other] column value.
	 * 
	 * @return     string
	 */
	public function getOther()
	{
		return $this->other;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     ClubMeetings The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ClubMeetingsPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [location] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubMeetings The current object (for fluent API support)
	 */
	public function setLocation($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->location !== $v) {
			$this->location = $v;
			$this->modifiedColumns[] = ClubMeetingsPeer::LOCATION;
		}

		return $this;
	} // setLocation()

	/**
	 * Sets the value of [starts_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     ClubMeetings The current object (for fluent API support)
	 */
	public function setStartsAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->starts_at !== null || $dt !== null) {
			$currentDateAsString = ($this->starts_at !== null && $tmpDt = new DateTime($this->starts_at)) ? $tmpDt->format('H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->starts_at = $newDateAsString;
				$this->modifiedColumns[] = ClubMeetingsPeer::STARTS_AT;
			}
		} // if either are not null

		return $this;
	} // setStartsAt()

	/**
	 * Sets the value of [ends_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     ClubMeetings The current object (for fluent API support)
	 */
	public function setEndsAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->ends_at !== null || $dt !== null) {
			$currentDateAsString = ($this->ends_at !== null && $tmpDt = new DateTime($this->ends_at)) ? $tmpDt->format('H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->ends_at = $newDateAsString;
				$this->modifiedColumns[] = ClubMeetingsPeer::ENDS_AT;
			}
		} // if either are not null

		return $this;
	} // setEndsAt()

	/**
	 * Sets the value of the [monday] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     ClubMeetings The current object (for fluent API support)
	 */
	public function setMonday($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->monday !== $v) {
			$this->monday = $v;
			$this->modifiedColumns[] = ClubMeetingsPeer::MONDAY;
		}

		return $this;
	} // setMonday()

	/**
	 * Sets the value of the [tuesday] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     ClubMeetings The current object (for fluent API support)
	 */
	public function setTuesday($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->tuesday !== $v) {
			$this->tuesday = $v;
			$this->modifiedColumns[] = ClubMeetingsPeer::TUESDAY;
		}

		return $this;
	} // setTuesday()

	/**
	 * Sets the value of the [wednesday] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     ClubMeetings The current object (for fluent API support)
	 */
	public function setWednesday($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->wednesday !== $v) {
			$this->wednesday = $v;
			$this->modifiedColumns[] = ClubMeetingsPeer::WEDNESDAY;
		}

		return $this;
	} // setWednesday()

	/**
	 * Sets the value of the [thursday] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     ClubMeetings The current object (for fluent API support)
	 */
	public function setThursday($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->thursday !== $v) {
			$this->thursday = $v;
			$this->modifiedColumns[] = ClubMeetingsPeer::THURSDAY;
		}

		return $this;
	} // setThursday()

	/**
	 * Sets the value of the [friday] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     ClubMeetings The current object (for fluent API support)
	 */
	public function setFriday($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->friday !== $v) {
			$this->friday = $v;
			$this->modifiedColumns[] = ClubMeetingsPeer::FRIDAY;
		}

		return $this;
	} // setFriday()

	/**
	 * Sets the value of the [saturday] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     ClubMeetings The current object (for fluent API support)
	 */
	public function setSaturday($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->saturday !== $v) {
			$this->saturday = $v;
			$this->modifiedColumns[] = ClubMeetingsPeer::SATURDAY;
		}

		return $this;
	} // setSaturday()

	/**
	 * Sets the value of the [sunday] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     ClubMeetings The current object (for fluent API support)
	 */
	public function setSunday($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->sunday !== $v) {
			$this->sunday = $v;
			$this->modifiedColumns[] = ClubMeetingsPeer::SUNDAY;
		}

		return $this;
	} // setSunday()

	/**
	 * Set the value of [other] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubMeetings The current object (for fluent API support)
	 */
	public function setOther($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->other !== $v) {
			$this->other = $v;
			$this->modifiedColumns[] = ClubMeetingsPeer::OTHER;
		}

		return $this;
	} // setOther()

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
			if ($this->location !== '') {
				return false;
			}

			if ($this->monday !== false) {
				return false;
			}

			if ($this->tuesday !== false) {
				return false;
			}

			if ($this->wednesday !== false) {
				return false;
			}

			if ($this->thursday !== false) {
				return false;
			}

			if ($this->friday !== false) {
				return false;
			}

			if ($this->saturday !== false) {
				return false;
			}

			if ($this->sunday !== false) {
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
			$this->location = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->starts_at = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->ends_at = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->monday = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
			$this->tuesday = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->wednesday = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
			$this->thursday = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
			$this->friday = ($row[$startcol + 8] !== null) ? (boolean) $row[$startcol + 8] : null;
			$this->saturday = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
			$this->sunday = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
			$this->other = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 12; // 12 = ClubMeetingsPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating ClubMeetings object", $e);
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
			$con = Propel::getConnection(ClubMeetingsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ClubMeetingsPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
			$con = Propel::getConnection(ClubMeetingsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = ClubMeetingsQuery::create()
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
			$con = Propel::getConnection(ClubMeetingsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ClubMeetingsPeer::addInstanceToPool($this);
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

		$this->modifiedColumns[] = ClubMeetingsPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . ClubMeetingsPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(ClubMeetingsPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(ClubMeetingsPeer::LOCATION)) {
			$modifiedColumns[':p' . $index++]  = '`LOCATION`';
		}
		if ($this->isColumnModified(ClubMeetingsPeer::STARTS_AT)) {
			$modifiedColumns[':p' . $index++]  = '`STARTS_AT`';
		}
		if ($this->isColumnModified(ClubMeetingsPeer::ENDS_AT)) {
			$modifiedColumns[':p' . $index++]  = '`ENDS_AT`';
		}
		if ($this->isColumnModified(ClubMeetingsPeer::MONDAY)) {
			$modifiedColumns[':p' . $index++]  = '`MONDAY`';
		}
		if ($this->isColumnModified(ClubMeetingsPeer::TUESDAY)) {
			$modifiedColumns[':p' . $index++]  = '`TUESDAY`';
		}
		if ($this->isColumnModified(ClubMeetingsPeer::WEDNESDAY)) {
			$modifiedColumns[':p' . $index++]  = '`WEDNESDAY`';
		}
		if ($this->isColumnModified(ClubMeetingsPeer::THURSDAY)) {
			$modifiedColumns[':p' . $index++]  = '`THURSDAY`';
		}
		if ($this->isColumnModified(ClubMeetingsPeer::FRIDAY)) {
			$modifiedColumns[':p' . $index++]  = '`FRIDAY`';
		}
		if ($this->isColumnModified(ClubMeetingsPeer::SATURDAY)) {
			$modifiedColumns[':p' . $index++]  = '`SATURDAY`';
		}
		if ($this->isColumnModified(ClubMeetingsPeer::SUNDAY)) {
			$modifiedColumns[':p' . $index++]  = '`SUNDAY`';
		}
		if ($this->isColumnModified(ClubMeetingsPeer::OTHER)) {
			$modifiedColumns[':p' . $index++]  = '`OTHER`';
		}

		$sql = sprintf(
			'INSERT INTO `club_meetings` (%s) VALUES (%s)',
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
					case '`LOCATION`':
						$stmt->bindValue($identifier, $this->location, PDO::PARAM_STR);
						break;
					case '`STARTS_AT`':
						$stmt->bindValue($identifier, $this->starts_at, PDO::PARAM_STR);
						break;
					case '`ENDS_AT`':
						$stmt->bindValue($identifier, $this->ends_at, PDO::PARAM_STR);
						break;
					case '`MONDAY`':
						$stmt->bindValue($identifier, (int) $this->monday, PDO::PARAM_INT);
						break;
					case '`TUESDAY`':
						$stmt->bindValue($identifier, (int) $this->tuesday, PDO::PARAM_INT);
						break;
					case '`WEDNESDAY`':
						$stmt->bindValue($identifier, (int) $this->wednesday, PDO::PARAM_INT);
						break;
					case '`THURSDAY`':
						$stmt->bindValue($identifier, (int) $this->thursday, PDO::PARAM_INT);
						break;
					case '`FRIDAY`':
						$stmt->bindValue($identifier, (int) $this->friday, PDO::PARAM_INT);
						break;
					case '`SATURDAY`':
						$stmt->bindValue($identifier, (int) $this->saturday, PDO::PARAM_INT);
						break;
					case '`SUNDAY`':
						$stmt->bindValue($identifier, (int) $this->sunday, PDO::PARAM_INT);
						break;
					case '`OTHER`':
						$stmt->bindValue($identifier, $this->other, PDO::PARAM_STR);
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


			if (($retval = ClubMeetingsPeer::doValidate($this, $columns)) !== true) {
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
		$pos = ClubMeetingsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getLocation();
				break;
			case 2:
				return $this->getStartsAt();
				break;
			case 3:
				return $this->getEndsAt();
				break;
			case 4:
				return $this->getMonday();
				break;
			case 5:
				return $this->getTuesday();
				break;
			case 6:
				return $this->getWednesday();
				break;
			case 7:
				return $this->getThursday();
				break;
			case 8:
				return $this->getFriday();
				break;
			case 9:
				return $this->getSaturday();
				break;
			case 10:
				return $this->getSunday();
				break;
			case 11:
				return $this->getOther();
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
		if (isset($alreadyDumpedObjects['ClubMeetings'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['ClubMeetings'][$this->getPrimaryKey()] = true;
		$keys = ClubMeetingsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getLocation(),
			$keys[2] => $this->getStartsAt(),
			$keys[3] => $this->getEndsAt(),
			$keys[4] => $this->getMonday(),
			$keys[5] => $this->getTuesday(),
			$keys[6] => $this->getWednesday(),
			$keys[7] => $this->getThursday(),
			$keys[8] => $this->getFriday(),
			$keys[9] => $this->getSaturday(),
			$keys[10] => $this->getSunday(),
			$keys[11] => $this->getOther(),
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
		$pos = ClubMeetingsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setLocation($value);
				break;
			case 2:
				$this->setStartsAt($value);
				break;
			case 3:
				$this->setEndsAt($value);
				break;
			case 4:
				$this->setMonday($value);
				break;
			case 5:
				$this->setTuesday($value);
				break;
			case 6:
				$this->setWednesday($value);
				break;
			case 7:
				$this->setThursday($value);
				break;
			case 8:
				$this->setFriday($value);
				break;
			case 9:
				$this->setSaturday($value);
				break;
			case 10:
				$this->setSunday($value);
				break;
			case 11:
				$this->setOther($value);
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
		$keys = ClubMeetingsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLocation($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setStartsAt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEndsAt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonday($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTuesday($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setWednesday($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setThursday($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFriday($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSaturday($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSunday($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setOther($arr[$keys[11]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ClubMeetingsPeer::DATABASE_NAME);

		if ($this->isColumnModified(ClubMeetingsPeer::ID)) $criteria->add(ClubMeetingsPeer::ID, $this->id);
		if ($this->isColumnModified(ClubMeetingsPeer::LOCATION)) $criteria->add(ClubMeetingsPeer::LOCATION, $this->location);
		if ($this->isColumnModified(ClubMeetingsPeer::STARTS_AT)) $criteria->add(ClubMeetingsPeer::STARTS_AT, $this->starts_at);
		if ($this->isColumnModified(ClubMeetingsPeer::ENDS_AT)) $criteria->add(ClubMeetingsPeer::ENDS_AT, $this->ends_at);
		if ($this->isColumnModified(ClubMeetingsPeer::MONDAY)) $criteria->add(ClubMeetingsPeer::MONDAY, $this->monday);
		if ($this->isColumnModified(ClubMeetingsPeer::TUESDAY)) $criteria->add(ClubMeetingsPeer::TUESDAY, $this->tuesday);
		if ($this->isColumnModified(ClubMeetingsPeer::WEDNESDAY)) $criteria->add(ClubMeetingsPeer::WEDNESDAY, $this->wednesday);
		if ($this->isColumnModified(ClubMeetingsPeer::THURSDAY)) $criteria->add(ClubMeetingsPeer::THURSDAY, $this->thursday);
		if ($this->isColumnModified(ClubMeetingsPeer::FRIDAY)) $criteria->add(ClubMeetingsPeer::FRIDAY, $this->friday);
		if ($this->isColumnModified(ClubMeetingsPeer::SATURDAY)) $criteria->add(ClubMeetingsPeer::SATURDAY, $this->saturday);
		if ($this->isColumnModified(ClubMeetingsPeer::SUNDAY)) $criteria->add(ClubMeetingsPeer::SUNDAY, $this->sunday);
		if ($this->isColumnModified(ClubMeetingsPeer::OTHER)) $criteria->add(ClubMeetingsPeer::OTHER, $this->other);

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
		$criteria = new Criteria(ClubMeetingsPeer::DATABASE_NAME);
		$criteria->add(ClubMeetingsPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ClubMeetings (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setLocation($this->getLocation());
		$copyObj->setStartsAt($this->getStartsAt());
		$copyObj->setEndsAt($this->getEndsAt());
		$copyObj->setMonday($this->getMonday());
		$copyObj->setTuesday($this->getTuesday());
		$copyObj->setWednesday($this->getWednesday());
		$copyObj->setThursday($this->getThursday());
		$copyObj->setFriday($this->getFriday());
		$copyObj->setSaturday($this->getSaturday());
		$copyObj->setSunday($this->getSunday());
		$copyObj->setOther($this->getOther());
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
	 * @return     ClubMeetings Clone of current object.
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
	 * @return     ClubMeetingsPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ClubMeetingsPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->location = null;
		$this->starts_at = null;
		$this->ends_at = null;
		$this->monday = null;
		$this->tuesday = null;
		$this->wednesday = null;
		$this->thursday = null;
		$this->friday = null;
		$this->saturday = null;
		$this->sunday = null;
		$this->other = null;
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
		return (string) $this->exportTo(ClubMeetingsPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseClubMeetings
