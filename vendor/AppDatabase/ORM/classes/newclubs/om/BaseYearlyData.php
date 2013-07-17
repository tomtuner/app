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
use NewClubsORM\YearlyDataPeer;
use NewClubsORM\YearlyDataQuery;

/**
 * Base class that represents a row from the 'yearly_data' table.
 *
 * 
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseYearlyData extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'NewClubsORM\\YearlyDataPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        YearlyDataPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

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
	 * The value for the recognized field.
	 * @var        string
	 */
	protected $recognized;

	/**
	 * The value for the members field.
	 * @var        string
	 */
	protected $members;

	/**
	 * The value for the fall_participation field.
	 * @var        string
	 */
	protected $fall_participation;

	/**
	 * The value for the winter_participation field.
	 * @var        string
	 */
	protected $winter_participation;

	/**
	 * The value for the spring_participation field.
	 * @var        string
	 */
	protected $spring_participation;

	/**
	 * The value for the fall_fund field.
	 * @var        string
	 */
	protected $fall_fund;

	/**
	 * The value for the winter_fund field.
	 * @var        string
	 */
	protected $winter_fund;

	/**
	 * The value for the spring_fund field.
	 * @var        string
	 */
	protected $spring_fund;

	/**
	 * The value for the fall_cs field.
	 * @var        string
	 */
	protected $fall_cs;

	/**
	 * The value for the winter_cs field.
	 * @var        string
	 */
	protected $winter_cs;

	/**
	 * The value for the spring_cs field.
	 * @var        string
	 */
	protected $spring_cs;

	/**
	 * The value for the achievements field.
	 * @var        string
	 */
	protected $achievements;

	/**
	 * The value for the submitter field.
	 * @var        string
	 */
	protected $submitter;

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
		$this->org_id = 0;
		$this->report_id = 0;
	}

	/**
	 * Initializes internal state of BaseYearlyData object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
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
	 * Get the [recognized] column value.
	 * 
	 * @return     string
	 */
	public function getRecognized()
	{
		return $this->recognized;
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
	 * Get the [fall_participation] column value.
	 * 
	 * @return     string
	 */
	public function getFallParticipation()
	{
		return $this->fall_participation;
	}

	/**
	 * Get the [winter_participation] column value.
	 * 
	 * @return     string
	 */
	public function getWinterParticipation()
	{
		return $this->winter_participation;
	}

	/**
	 * Get the [spring_participation] column value.
	 * 
	 * @return     string
	 */
	public function getSpringParticipation()
	{
		return $this->spring_participation;
	}

	/**
	 * Get the [fall_fund] column value.
	 * 
	 * @return     string
	 */
	public function getFallFund()
	{
		return $this->fall_fund;
	}

	/**
	 * Get the [winter_fund] column value.
	 * 
	 * @return     string
	 */
	public function getWinterFund()
	{
		return $this->winter_fund;
	}

	/**
	 * Get the [spring_fund] column value.
	 * 
	 * @return     string
	 */
	public function getSpringFund()
	{
		return $this->spring_fund;
	}

	/**
	 * Get the [fall_cs] column value.
	 * 
	 * @return     string
	 */
	public function getFallCs()
	{
		return $this->fall_cs;
	}

	/**
	 * Get the [winter_cs] column value.
	 * 
	 * @return     string
	 */
	public function getWinterCs()
	{
		return $this->winter_cs;
	}

	/**
	 * Get the [spring_cs] column value.
	 * 
	 * @return     string
	 */
	public function getSpringCs()
	{
		return $this->spring_cs;
	}

	/**
	 * Get the [achievements] column value.
	 * 
	 * @return     string
	 */
	public function getAchievements()
	{
		return $this->achievements;
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
	 * Set the value of [org_id] column.
	 * 
	 * @param      int $v new value
	 * @return     YearlyData The current object (for fluent API support)
	 */
	public function setOrgId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->org_id !== $v) {
			$this->org_id = $v;
			$this->modifiedColumns[] = YearlyDataPeer::ORG_ID;
		}

		return $this;
	} // setOrgId()

	/**
	 * Set the value of [report_id] column.
	 * 
	 * @param      int $v new value
	 * @return     YearlyData The current object (for fluent API support)
	 */
	public function setReportId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->report_id !== $v) {
			$this->report_id = $v;
			$this->modifiedColumns[] = YearlyDataPeer::REPORT_ID;
		}

		return $this;
	} // setReportId()

	/**
	 * Set the value of [recognized] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyData The current object (for fluent API support)
	 */
	public function setRecognized($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->recognized !== $v) {
			$this->recognized = $v;
			$this->modifiedColumns[] = YearlyDataPeer::RECOGNIZED;
		}

		return $this;
	} // setRecognized()

	/**
	 * Set the value of [members] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyData The current object (for fluent API support)
	 */
	public function setMembers($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->members !== $v) {
			$this->members = $v;
			$this->modifiedColumns[] = YearlyDataPeer::MEMBERS;
		}

		return $this;
	} // setMembers()

	/**
	 * Set the value of [fall_participation] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyData The current object (for fluent API support)
	 */
	public function setFallParticipation($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fall_participation !== $v) {
			$this->fall_participation = $v;
			$this->modifiedColumns[] = YearlyDataPeer::FALL_PARTICIPATION;
		}

		return $this;
	} // setFallParticipation()

	/**
	 * Set the value of [winter_participation] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyData The current object (for fluent API support)
	 */
	public function setWinterParticipation($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->winter_participation !== $v) {
			$this->winter_participation = $v;
			$this->modifiedColumns[] = YearlyDataPeer::WINTER_PARTICIPATION;
		}

		return $this;
	} // setWinterParticipation()

	/**
	 * Set the value of [spring_participation] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyData The current object (for fluent API support)
	 */
	public function setSpringParticipation($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->spring_participation !== $v) {
			$this->spring_participation = $v;
			$this->modifiedColumns[] = YearlyDataPeer::SPRING_PARTICIPATION;
		}

		return $this;
	} // setSpringParticipation()

	/**
	 * Set the value of [fall_fund] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyData The current object (for fluent API support)
	 */
	public function setFallFund($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fall_fund !== $v) {
			$this->fall_fund = $v;
			$this->modifiedColumns[] = YearlyDataPeer::FALL_FUND;
		}

		return $this;
	} // setFallFund()

	/**
	 * Set the value of [winter_fund] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyData The current object (for fluent API support)
	 */
	public function setWinterFund($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->winter_fund !== $v) {
			$this->winter_fund = $v;
			$this->modifiedColumns[] = YearlyDataPeer::WINTER_FUND;
		}

		return $this;
	} // setWinterFund()

	/**
	 * Set the value of [spring_fund] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyData The current object (for fluent API support)
	 */
	public function setSpringFund($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->spring_fund !== $v) {
			$this->spring_fund = $v;
			$this->modifiedColumns[] = YearlyDataPeer::SPRING_FUND;
		}

		return $this;
	} // setSpringFund()

	/**
	 * Set the value of [fall_cs] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyData The current object (for fluent API support)
	 */
	public function setFallCs($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fall_cs !== $v) {
			$this->fall_cs = $v;
			$this->modifiedColumns[] = YearlyDataPeer::FALL_CS;
		}

		return $this;
	} // setFallCs()

	/**
	 * Set the value of [winter_cs] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyData The current object (for fluent API support)
	 */
	public function setWinterCs($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->winter_cs !== $v) {
			$this->winter_cs = $v;
			$this->modifiedColumns[] = YearlyDataPeer::WINTER_CS;
		}

		return $this;
	} // setWinterCs()

	/**
	 * Set the value of [spring_cs] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyData The current object (for fluent API support)
	 */
	public function setSpringCs($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->spring_cs !== $v) {
			$this->spring_cs = $v;
			$this->modifiedColumns[] = YearlyDataPeer::SPRING_CS;
		}

		return $this;
	} // setSpringCs()

	/**
	 * Set the value of [achievements] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyData The current object (for fluent API support)
	 */
	public function setAchievements($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->achievements !== $v) {
			$this->achievements = $v;
			$this->modifiedColumns[] = YearlyDataPeer::ACHIEVEMENTS;
		}

		return $this;
	} // setAchievements()

	/**
	 * Set the value of [submitter] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyData The current object (for fluent API support)
	 */
	public function setSubmitter($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->submitter !== $v) {
			$this->submitter = $v;
			$this->modifiedColumns[] = YearlyDataPeer::SUBMITTER;
		}

		return $this;
	} // setSubmitter()

	/**
	 * Sets the value of [date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     YearlyData The current object (for fluent API support)
	 */
	public function setDate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->date !== null || $dt !== null) {
			$currentDateAsString = ($this->date !== null && $tmpDt = new DateTime($this->date)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->date = $newDateAsString;
				$this->modifiedColumns[] = YearlyDataPeer::DATE;
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
			if ($this->org_id !== 0) {
				return false;
			}

			if ($this->report_id !== 0) {
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

			$this->org_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->report_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->recognized = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->members = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->fall_participation = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->winter_participation = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->spring_participation = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->fall_fund = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->winter_fund = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->spring_fund = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->fall_cs = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->winter_cs = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->spring_cs = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->achievements = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->submitter = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->date = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 16; // 16 = YearlyDataPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating YearlyData object", $e);
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
			$con = Propel::getConnection(YearlyDataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = YearlyDataPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
			$con = Propel::getConnection(YearlyDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = YearlyDataQuery::create()
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
			$con = Propel::getConnection(YearlyDataPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				YearlyDataPeer::addInstanceToPool($this);
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
		if ($this->isColumnModified(YearlyDataPeer::ORG_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ORG_ID`';
		}
		if ($this->isColumnModified(YearlyDataPeer::REPORT_ID)) {
			$modifiedColumns[':p' . $index++]  = '`REPORT_ID`';
		}
		if ($this->isColumnModified(YearlyDataPeer::RECOGNIZED)) {
			$modifiedColumns[':p' . $index++]  = '`RECOGNIZED`';
		}
		if ($this->isColumnModified(YearlyDataPeer::MEMBERS)) {
			$modifiedColumns[':p' . $index++]  = '`MEMBERS`';
		}
		if ($this->isColumnModified(YearlyDataPeer::FALL_PARTICIPATION)) {
			$modifiedColumns[':p' . $index++]  = '`FALL_PARTICIPATION`';
		}
		if ($this->isColumnModified(YearlyDataPeer::WINTER_PARTICIPATION)) {
			$modifiedColumns[':p' . $index++]  = '`WINTER_PARTICIPATION`';
		}
		if ($this->isColumnModified(YearlyDataPeer::SPRING_PARTICIPATION)) {
			$modifiedColumns[':p' . $index++]  = '`SPRING_PARTICIPATION`';
		}
		if ($this->isColumnModified(YearlyDataPeer::FALL_FUND)) {
			$modifiedColumns[':p' . $index++]  = '`FALL_FUND`';
		}
		if ($this->isColumnModified(YearlyDataPeer::WINTER_FUND)) {
			$modifiedColumns[':p' . $index++]  = '`WINTER_FUND`';
		}
		if ($this->isColumnModified(YearlyDataPeer::SPRING_FUND)) {
			$modifiedColumns[':p' . $index++]  = '`SPRING_FUND`';
		}
		if ($this->isColumnModified(YearlyDataPeer::FALL_CS)) {
			$modifiedColumns[':p' . $index++]  = '`FALL_CS`';
		}
		if ($this->isColumnModified(YearlyDataPeer::WINTER_CS)) {
			$modifiedColumns[':p' . $index++]  = '`WINTER_CS`';
		}
		if ($this->isColumnModified(YearlyDataPeer::SPRING_CS)) {
			$modifiedColumns[':p' . $index++]  = '`SPRING_CS`';
		}
		if ($this->isColumnModified(YearlyDataPeer::ACHIEVEMENTS)) {
			$modifiedColumns[':p' . $index++]  = '`ACHIEVEMENTS`';
		}
		if ($this->isColumnModified(YearlyDataPeer::SUBMITTER)) {
			$modifiedColumns[':p' . $index++]  = '`SUBMITTER`';
		}
		if ($this->isColumnModified(YearlyDataPeer::DATE)) {
			$modifiedColumns[':p' . $index++]  = '`DATE`';
		}

		$sql = sprintf(
			'INSERT INTO `yearly_data` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`ORG_ID`':
						$stmt->bindValue($identifier, $this->org_id, PDO::PARAM_INT);
						break;
					case '`REPORT_ID`':
						$stmt->bindValue($identifier, $this->report_id, PDO::PARAM_INT);
						break;
					case '`RECOGNIZED`':
						$stmt->bindValue($identifier, $this->recognized, PDO::PARAM_STR);
						break;
					case '`MEMBERS`':
						$stmt->bindValue($identifier, $this->members, PDO::PARAM_STR);
						break;
					case '`FALL_PARTICIPATION`':
						$stmt->bindValue($identifier, $this->fall_participation, PDO::PARAM_STR);
						break;
					case '`WINTER_PARTICIPATION`':
						$stmt->bindValue($identifier, $this->winter_participation, PDO::PARAM_STR);
						break;
					case '`SPRING_PARTICIPATION`':
						$stmt->bindValue($identifier, $this->spring_participation, PDO::PARAM_STR);
						break;
					case '`FALL_FUND`':
						$stmt->bindValue($identifier, $this->fall_fund, PDO::PARAM_STR);
						break;
					case '`WINTER_FUND`':
						$stmt->bindValue($identifier, $this->winter_fund, PDO::PARAM_STR);
						break;
					case '`SPRING_FUND`':
						$stmt->bindValue($identifier, $this->spring_fund, PDO::PARAM_STR);
						break;
					case '`FALL_CS`':
						$stmt->bindValue($identifier, $this->fall_cs, PDO::PARAM_STR);
						break;
					case '`WINTER_CS`':
						$stmt->bindValue($identifier, $this->winter_cs, PDO::PARAM_STR);
						break;
					case '`SPRING_CS`':
						$stmt->bindValue($identifier, $this->spring_cs, PDO::PARAM_STR);
						break;
					case '`ACHIEVEMENTS`':
						$stmt->bindValue($identifier, $this->achievements, PDO::PARAM_STR);
						break;
					case '`SUBMITTER`':
						$stmt->bindValue($identifier, $this->submitter, PDO::PARAM_STR);
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


			if (($retval = YearlyDataPeer::doValidate($this, $columns)) !== true) {
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
		$pos = YearlyDataPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getOrgId();
				break;
			case 1:
				return $this->getReportId();
				break;
			case 2:
				return $this->getRecognized();
				break;
			case 3:
				return $this->getMembers();
				break;
			case 4:
				return $this->getFallParticipation();
				break;
			case 5:
				return $this->getWinterParticipation();
				break;
			case 6:
				return $this->getSpringParticipation();
				break;
			case 7:
				return $this->getFallFund();
				break;
			case 8:
				return $this->getWinterFund();
				break;
			case 9:
				return $this->getSpringFund();
				break;
			case 10:
				return $this->getFallCs();
				break;
			case 11:
				return $this->getWinterCs();
				break;
			case 12:
				return $this->getSpringCs();
				break;
			case 13:
				return $this->getAchievements();
				break;
			case 14:
				return $this->getSubmitter();
				break;
			case 15:
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
		if (isset($alreadyDumpedObjects['YearlyData'][serialize($this->getPrimaryKey())])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['YearlyData'][serialize($this->getPrimaryKey())] = true;
		$keys = YearlyDataPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getOrgId(),
			$keys[1] => $this->getReportId(),
			$keys[2] => $this->getRecognized(),
			$keys[3] => $this->getMembers(),
			$keys[4] => $this->getFallParticipation(),
			$keys[5] => $this->getWinterParticipation(),
			$keys[6] => $this->getSpringParticipation(),
			$keys[7] => $this->getFallFund(),
			$keys[8] => $this->getWinterFund(),
			$keys[9] => $this->getSpringFund(),
			$keys[10] => $this->getFallCs(),
			$keys[11] => $this->getWinterCs(),
			$keys[12] => $this->getSpringCs(),
			$keys[13] => $this->getAchievements(),
			$keys[14] => $this->getSubmitter(),
			$keys[15] => $this->getDate(),
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
		$pos = YearlyDataPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setOrgId($value);
				break;
			case 1:
				$this->setReportId($value);
				break;
			case 2:
				$this->setRecognized($value);
				break;
			case 3:
				$this->setMembers($value);
				break;
			case 4:
				$this->setFallParticipation($value);
				break;
			case 5:
				$this->setWinterParticipation($value);
				break;
			case 6:
				$this->setSpringParticipation($value);
				break;
			case 7:
				$this->setFallFund($value);
				break;
			case 8:
				$this->setWinterFund($value);
				break;
			case 9:
				$this->setSpringFund($value);
				break;
			case 10:
				$this->setFallCs($value);
				break;
			case 11:
				$this->setWinterCs($value);
				break;
			case 12:
				$this->setSpringCs($value);
				break;
			case 13:
				$this->setAchievements($value);
				break;
			case 14:
				$this->setSubmitter($value);
				break;
			case 15:
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
		$keys = YearlyDataPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setOrgId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setReportId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRecognized($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMembers($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFallParticipation($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setWinterParticipation($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSpringParticipation($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFallFund($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setWinterFund($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSpringFund($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFallCs($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setWinterCs($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setSpringCs($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAchievements($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setSubmitter($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDate($arr[$keys[15]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(YearlyDataPeer::DATABASE_NAME);

		if ($this->isColumnModified(YearlyDataPeer::ORG_ID)) $criteria->add(YearlyDataPeer::ORG_ID, $this->org_id);
		if ($this->isColumnModified(YearlyDataPeer::REPORT_ID)) $criteria->add(YearlyDataPeer::REPORT_ID, $this->report_id);
		if ($this->isColumnModified(YearlyDataPeer::RECOGNIZED)) $criteria->add(YearlyDataPeer::RECOGNIZED, $this->recognized);
		if ($this->isColumnModified(YearlyDataPeer::MEMBERS)) $criteria->add(YearlyDataPeer::MEMBERS, $this->members);
		if ($this->isColumnModified(YearlyDataPeer::FALL_PARTICIPATION)) $criteria->add(YearlyDataPeer::FALL_PARTICIPATION, $this->fall_participation);
		if ($this->isColumnModified(YearlyDataPeer::WINTER_PARTICIPATION)) $criteria->add(YearlyDataPeer::WINTER_PARTICIPATION, $this->winter_participation);
		if ($this->isColumnModified(YearlyDataPeer::SPRING_PARTICIPATION)) $criteria->add(YearlyDataPeer::SPRING_PARTICIPATION, $this->spring_participation);
		if ($this->isColumnModified(YearlyDataPeer::FALL_FUND)) $criteria->add(YearlyDataPeer::FALL_FUND, $this->fall_fund);
		if ($this->isColumnModified(YearlyDataPeer::WINTER_FUND)) $criteria->add(YearlyDataPeer::WINTER_FUND, $this->winter_fund);
		if ($this->isColumnModified(YearlyDataPeer::SPRING_FUND)) $criteria->add(YearlyDataPeer::SPRING_FUND, $this->spring_fund);
		if ($this->isColumnModified(YearlyDataPeer::FALL_CS)) $criteria->add(YearlyDataPeer::FALL_CS, $this->fall_cs);
		if ($this->isColumnModified(YearlyDataPeer::WINTER_CS)) $criteria->add(YearlyDataPeer::WINTER_CS, $this->winter_cs);
		if ($this->isColumnModified(YearlyDataPeer::SPRING_CS)) $criteria->add(YearlyDataPeer::SPRING_CS, $this->spring_cs);
		if ($this->isColumnModified(YearlyDataPeer::ACHIEVEMENTS)) $criteria->add(YearlyDataPeer::ACHIEVEMENTS, $this->achievements);
		if ($this->isColumnModified(YearlyDataPeer::SUBMITTER)) $criteria->add(YearlyDataPeer::SUBMITTER, $this->submitter);
		if ($this->isColumnModified(YearlyDataPeer::DATE)) $criteria->add(YearlyDataPeer::DATE, $this->date);

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
		$criteria = new Criteria(YearlyDataPeer::DATABASE_NAME);
		$criteria->add(YearlyDataPeer::ORG_ID, $this->org_id);
		$criteria->add(YearlyDataPeer::REPORT_ID, $this->report_id);

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
		$pks[0] = $this->getOrgId();
		$pks[1] = $this->getReportId();

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
		$this->setOrgId($keys[0]);
		$this->setReportId($keys[1]);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return (null === $this->getOrgId()) && (null === $this->getReportId());
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of YearlyData (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setOrgId($this->getOrgId());
		$copyObj->setReportId($this->getReportId());
		$copyObj->setRecognized($this->getRecognized());
		$copyObj->setMembers($this->getMembers());
		$copyObj->setFallParticipation($this->getFallParticipation());
		$copyObj->setWinterParticipation($this->getWinterParticipation());
		$copyObj->setSpringParticipation($this->getSpringParticipation());
		$copyObj->setFallFund($this->getFallFund());
		$copyObj->setWinterFund($this->getWinterFund());
		$copyObj->setSpringFund($this->getSpringFund());
		$copyObj->setFallCs($this->getFallCs());
		$copyObj->setWinterCs($this->getWinterCs());
		$copyObj->setSpringCs($this->getSpringCs());
		$copyObj->setAchievements($this->getAchievements());
		$copyObj->setSubmitter($this->getSubmitter());
		$copyObj->setDate($this->getDate());
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
	 * @return     YearlyData Clone of current object.
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
	 * @return     YearlyDataPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new YearlyDataPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->org_id = null;
		$this->report_id = null;
		$this->recognized = null;
		$this->members = null;
		$this->fall_participation = null;
		$this->winter_participation = null;
		$this->spring_participation = null;
		$this->fall_fund = null;
		$this->winter_fund = null;
		$this->spring_fund = null;
		$this->fall_cs = null;
		$this->winter_cs = null;
		$this->spring_cs = null;
		$this->achievements = null;
		$this->submitter = null;
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
		return (string) $this->exportTo(YearlyDataPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseYearlyData
