<?php

namespace ClubsORM\om;

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
use ClubsORM\YearlyReportsPeer;
use ClubsORM\YearlyReportsQuery;

/**
 * Base class that represents a row from the 'yearly_reports' table.
 *
 * 
 *
 * @package    propel.generator.clubs.om
 */
abstract class BaseYearlyReports extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ClubsORM\\YearlyReportsPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        YearlyReportsPeer
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
	 * The value for the year field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $year;

	/**
	 * The value for the organization_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $organization_id;

	/**
	 * The value for the recognized_on field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $recognized_on;

	/**
	 * The value for the num_members field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $num_members;

	/**
	 * The value for the events_fall field.
	 * @var        string
	 */
	protected $events_fall;

	/**
	 * The value for the events_winter field.
	 * @var        string
	 */
	protected $events_winter;

	/**
	 * The value for the events_spring field.
	 * @var        string
	 */
	protected $events_spring;

	/**
	 * The value for the fundraising_fall field.
	 * @var        string
	 */
	protected $fundraising_fall;

	/**
	 * The value for the fundraising_winter field.
	 * @var        string
	 */
	protected $fundraising_winter;

	/**
	 * The value for the fundraising_spring field.
	 * @var        string
	 */
	protected $fundraising_spring;

	/**
	 * The value for the service_fall field.
	 * @var        string
	 */
	protected $service_fall;

	/**
	 * The value for the service_winter field.
	 * @var        string
	 */
	protected $service_winter;

	/**
	 * The value for the service_spring field.
	 * @var        string
	 */
	protected $service_spring;

	/**
	 * The value for the achievements field.
	 * @var        string
	 */
	protected $achievements;

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
		$this->year = 0;
		$this->organization_id = 0;
		$this->recognized_on = '';
		$this->num_members = 0;
	}

	/**
	 * Initializes internal state of BaseYearlyReports object.
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
	 * Get the [year] column value.
	 * 
	 * @return     int
	 */
	public function getYear()
	{
		return $this->year;
	}

	/**
	 * Get the [organization_id] column value.
	 * 
	 * @return     int
	 */
	public function getOrganizationId()
	{
		return $this->organization_id;
	}

	/**
	 * Get the [recognized_on] column value.
	 * 
	 * @return     string
	 */
	public function getRecognizedOn()
	{
		return $this->recognized_on;
	}

	/**
	 * Get the [num_members] column value.
	 * 
	 * @return     int
	 */
	public function getNumMembers()
	{
		return $this->num_members;
	}

	/**
	 * Get the [events_fall] column value.
	 * 
	 * @return     string
	 */
	public function getEventsFall()
	{
		return $this->events_fall;
	}

	/**
	 * Get the [events_winter] column value.
	 * 
	 * @return     string
	 */
	public function getEventsWinter()
	{
		return $this->events_winter;
	}

	/**
	 * Get the [events_spring] column value.
	 * 
	 * @return     string
	 */
	public function getEventsSpring()
	{
		return $this->events_spring;
	}

	/**
	 * Get the [fundraising_fall] column value.
	 * 
	 * @return     string
	 */
	public function getFundraisingFall()
	{
		return $this->fundraising_fall;
	}

	/**
	 * Get the [fundraising_winter] column value.
	 * 
	 * @return     string
	 */
	public function getFundraisingWinter()
	{
		return $this->fundraising_winter;
	}

	/**
	 * Get the [fundraising_spring] column value.
	 * 
	 * @return     string
	 */
	public function getFundraisingSpring()
	{
		return $this->fundraising_spring;
	}

	/**
	 * Get the [service_fall] column value.
	 * 
	 * @return     string
	 */
	public function getServiceFall()
	{
		return $this->service_fall;
	}

	/**
	 * Get the [service_winter] column value.
	 * 
	 * @return     string
	 */
	public function getServiceWinter()
	{
		return $this->service_winter;
	}

	/**
	 * Get the [service_spring] column value.
	 * 
	 * @return     string
	 */
	public function getServiceSpring()
	{
		return $this->service_spring;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     YearlyReports The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = YearlyReportsPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [year] column.
	 * 
	 * @param      int $v new value
	 * @return     YearlyReports The current object (for fluent API support)
	 */
	public function setYear($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->year !== $v) {
			$this->year = $v;
			$this->modifiedColumns[] = YearlyReportsPeer::YEAR;
		}

		return $this;
	} // setYear()

	/**
	 * Set the value of [organization_id] column.
	 * 
	 * @param      int $v new value
	 * @return     YearlyReports The current object (for fluent API support)
	 */
	public function setOrganizationId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->organization_id !== $v) {
			$this->organization_id = $v;
			$this->modifiedColumns[] = YearlyReportsPeer::ORGANIZATION_ID;
		}

		return $this;
	} // setOrganizationId()

	/**
	 * Set the value of [recognized_on] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyReports The current object (for fluent API support)
	 */
	public function setRecognizedOn($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->recognized_on !== $v) {
			$this->recognized_on = $v;
			$this->modifiedColumns[] = YearlyReportsPeer::RECOGNIZED_ON;
		}

		return $this;
	} // setRecognizedOn()

	/**
	 * Set the value of [num_members] column.
	 * 
	 * @param      int $v new value
	 * @return     YearlyReports The current object (for fluent API support)
	 */
	public function setNumMembers($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->num_members !== $v) {
			$this->num_members = $v;
			$this->modifiedColumns[] = YearlyReportsPeer::NUM_MEMBERS;
		}

		return $this;
	} // setNumMembers()

	/**
	 * Set the value of [events_fall] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyReports The current object (for fluent API support)
	 */
	public function setEventsFall($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->events_fall !== $v) {
			$this->events_fall = $v;
			$this->modifiedColumns[] = YearlyReportsPeer::EVENTS_FALL;
		}

		return $this;
	} // setEventsFall()

	/**
	 * Set the value of [events_winter] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyReports The current object (for fluent API support)
	 */
	public function setEventsWinter($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->events_winter !== $v) {
			$this->events_winter = $v;
			$this->modifiedColumns[] = YearlyReportsPeer::EVENTS_WINTER;
		}

		return $this;
	} // setEventsWinter()

	/**
	 * Set the value of [events_spring] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyReports The current object (for fluent API support)
	 */
	public function setEventsSpring($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->events_spring !== $v) {
			$this->events_spring = $v;
			$this->modifiedColumns[] = YearlyReportsPeer::EVENTS_SPRING;
		}

		return $this;
	} // setEventsSpring()

	/**
	 * Set the value of [fundraising_fall] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyReports The current object (for fluent API support)
	 */
	public function setFundraisingFall($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fundraising_fall !== $v) {
			$this->fundraising_fall = $v;
			$this->modifiedColumns[] = YearlyReportsPeer::FUNDRAISING_FALL;
		}

		return $this;
	} // setFundraisingFall()

	/**
	 * Set the value of [fundraising_winter] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyReports The current object (for fluent API support)
	 */
	public function setFundraisingWinter($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fundraising_winter !== $v) {
			$this->fundraising_winter = $v;
			$this->modifiedColumns[] = YearlyReportsPeer::FUNDRAISING_WINTER;
		}

		return $this;
	} // setFundraisingWinter()

	/**
	 * Set the value of [fundraising_spring] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyReports The current object (for fluent API support)
	 */
	public function setFundraisingSpring($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fundraising_spring !== $v) {
			$this->fundraising_spring = $v;
			$this->modifiedColumns[] = YearlyReportsPeer::FUNDRAISING_SPRING;
		}

		return $this;
	} // setFundraisingSpring()

	/**
	 * Set the value of [service_fall] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyReports The current object (for fluent API support)
	 */
	public function setServiceFall($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->service_fall !== $v) {
			$this->service_fall = $v;
			$this->modifiedColumns[] = YearlyReportsPeer::SERVICE_FALL;
		}

		return $this;
	} // setServiceFall()

	/**
	 * Set the value of [service_winter] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyReports The current object (for fluent API support)
	 */
	public function setServiceWinter($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->service_winter !== $v) {
			$this->service_winter = $v;
			$this->modifiedColumns[] = YearlyReportsPeer::SERVICE_WINTER;
		}

		return $this;
	} // setServiceWinter()

	/**
	 * Set the value of [service_spring] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyReports The current object (for fluent API support)
	 */
	public function setServiceSpring($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->service_spring !== $v) {
			$this->service_spring = $v;
			$this->modifiedColumns[] = YearlyReportsPeer::SERVICE_SPRING;
		}

		return $this;
	} // setServiceSpring()

	/**
	 * Set the value of [achievements] column.
	 * 
	 * @param      string $v new value
	 * @return     YearlyReports The current object (for fluent API support)
	 */
	public function setAchievements($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->achievements !== $v) {
			$this->achievements = $v;
			$this->modifiedColumns[] = YearlyReportsPeer::ACHIEVEMENTS;
		}

		return $this;
	} // setAchievements()

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
			if ($this->year !== 0) {
				return false;
			}

			if ($this->organization_id !== 0) {
				return false;
			}

			if ($this->recognized_on !== '') {
				return false;
			}

			if ($this->num_members !== 0) {
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
			$this->year = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->organization_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->recognized_on = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->num_members = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->events_fall = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->events_winter = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->events_spring = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->fundraising_fall = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->fundraising_winter = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->fundraising_spring = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->service_fall = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->service_winter = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->service_spring = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->achievements = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 15; // 15 = YearlyReportsPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating YearlyReports object", $e);
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
			$con = Propel::getConnection(YearlyReportsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = YearlyReportsPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
			$con = Propel::getConnection(YearlyReportsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = YearlyReportsQuery::create()
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
			$con = Propel::getConnection(YearlyReportsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				YearlyReportsPeer::addInstanceToPool($this);
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

		$this->modifiedColumns[] = YearlyReportsPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . YearlyReportsPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(YearlyReportsPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(YearlyReportsPeer::YEAR)) {
			$modifiedColumns[':p' . $index++]  = '`YEAR`';
		}
		if ($this->isColumnModified(YearlyReportsPeer::ORGANIZATION_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ORGANIZATION_ID`';
		}
		if ($this->isColumnModified(YearlyReportsPeer::RECOGNIZED_ON)) {
			$modifiedColumns[':p' . $index++]  = '`RECOGNIZED_ON`';
		}
		if ($this->isColumnModified(YearlyReportsPeer::NUM_MEMBERS)) {
			$modifiedColumns[':p' . $index++]  = '`NUM_MEMBERS`';
		}
		if ($this->isColumnModified(YearlyReportsPeer::EVENTS_FALL)) {
			$modifiedColumns[':p' . $index++]  = '`EVENTS_FALL`';
		}
		if ($this->isColumnModified(YearlyReportsPeer::EVENTS_WINTER)) {
			$modifiedColumns[':p' . $index++]  = '`EVENTS_WINTER`';
		}
		if ($this->isColumnModified(YearlyReportsPeer::EVENTS_SPRING)) {
			$modifiedColumns[':p' . $index++]  = '`EVENTS_SPRING`';
		}
		if ($this->isColumnModified(YearlyReportsPeer::FUNDRAISING_FALL)) {
			$modifiedColumns[':p' . $index++]  = '`FUNDRAISING_FALL`';
		}
		if ($this->isColumnModified(YearlyReportsPeer::FUNDRAISING_WINTER)) {
			$modifiedColumns[':p' . $index++]  = '`FUNDRAISING_WINTER`';
		}
		if ($this->isColumnModified(YearlyReportsPeer::FUNDRAISING_SPRING)) {
			$modifiedColumns[':p' . $index++]  = '`FUNDRAISING_SPRING`';
		}
		if ($this->isColumnModified(YearlyReportsPeer::SERVICE_FALL)) {
			$modifiedColumns[':p' . $index++]  = '`SERVICE_FALL`';
		}
		if ($this->isColumnModified(YearlyReportsPeer::SERVICE_WINTER)) {
			$modifiedColumns[':p' . $index++]  = '`SERVICE_WINTER`';
		}
		if ($this->isColumnModified(YearlyReportsPeer::SERVICE_SPRING)) {
			$modifiedColumns[':p' . $index++]  = '`SERVICE_SPRING`';
		}
		if ($this->isColumnModified(YearlyReportsPeer::ACHIEVEMENTS)) {
			$modifiedColumns[':p' . $index++]  = '`ACHIEVEMENTS`';
		}

		$sql = sprintf(
			'INSERT INTO `yearly_reports` (%s) VALUES (%s)',
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
					case '`YEAR`':
						$stmt->bindValue($identifier, $this->year, PDO::PARAM_INT);
						break;
					case '`ORGANIZATION_ID`':
						$stmt->bindValue($identifier, $this->organization_id, PDO::PARAM_INT);
						break;
					case '`RECOGNIZED_ON`':
						$stmt->bindValue($identifier, $this->recognized_on, PDO::PARAM_STR);
						break;
					case '`NUM_MEMBERS`':
						$stmt->bindValue($identifier, $this->num_members, PDO::PARAM_INT);
						break;
					case '`EVENTS_FALL`':
						$stmt->bindValue($identifier, $this->events_fall, PDO::PARAM_STR);
						break;
					case '`EVENTS_WINTER`':
						$stmt->bindValue($identifier, $this->events_winter, PDO::PARAM_STR);
						break;
					case '`EVENTS_SPRING`':
						$stmt->bindValue($identifier, $this->events_spring, PDO::PARAM_STR);
						break;
					case '`FUNDRAISING_FALL`':
						$stmt->bindValue($identifier, $this->fundraising_fall, PDO::PARAM_STR);
						break;
					case '`FUNDRAISING_WINTER`':
						$stmt->bindValue($identifier, $this->fundraising_winter, PDO::PARAM_STR);
						break;
					case '`FUNDRAISING_SPRING`':
						$stmt->bindValue($identifier, $this->fundraising_spring, PDO::PARAM_STR);
						break;
					case '`SERVICE_FALL`':
						$stmt->bindValue($identifier, $this->service_fall, PDO::PARAM_STR);
						break;
					case '`SERVICE_WINTER`':
						$stmt->bindValue($identifier, $this->service_winter, PDO::PARAM_STR);
						break;
					case '`SERVICE_SPRING`':
						$stmt->bindValue($identifier, $this->service_spring, PDO::PARAM_STR);
						break;
					case '`ACHIEVEMENTS`':
						$stmt->bindValue($identifier, $this->achievements, PDO::PARAM_STR);
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


			if (($retval = YearlyReportsPeer::doValidate($this, $columns)) !== true) {
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
		$pos = YearlyReportsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getYear();
				break;
			case 2:
				return $this->getOrganizationId();
				break;
			case 3:
				return $this->getRecognizedOn();
				break;
			case 4:
				return $this->getNumMembers();
				break;
			case 5:
				return $this->getEventsFall();
				break;
			case 6:
				return $this->getEventsWinter();
				break;
			case 7:
				return $this->getEventsSpring();
				break;
			case 8:
				return $this->getFundraisingFall();
				break;
			case 9:
				return $this->getFundraisingWinter();
				break;
			case 10:
				return $this->getFundraisingSpring();
				break;
			case 11:
				return $this->getServiceFall();
				break;
			case 12:
				return $this->getServiceWinter();
				break;
			case 13:
				return $this->getServiceSpring();
				break;
			case 14:
				return $this->getAchievements();
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
		if (isset($alreadyDumpedObjects['YearlyReports'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['YearlyReports'][$this->getPrimaryKey()] = true;
		$keys = YearlyReportsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getYear(),
			$keys[2] => $this->getOrganizationId(),
			$keys[3] => $this->getRecognizedOn(),
			$keys[4] => $this->getNumMembers(),
			$keys[5] => $this->getEventsFall(),
			$keys[6] => $this->getEventsWinter(),
			$keys[7] => $this->getEventsSpring(),
			$keys[8] => $this->getFundraisingFall(),
			$keys[9] => $this->getFundraisingWinter(),
			$keys[10] => $this->getFundraisingSpring(),
			$keys[11] => $this->getServiceFall(),
			$keys[12] => $this->getServiceWinter(),
			$keys[13] => $this->getServiceSpring(),
			$keys[14] => $this->getAchievements(),
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
		$pos = YearlyReportsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setYear($value);
				break;
			case 2:
				$this->setOrganizationId($value);
				break;
			case 3:
				$this->setRecognizedOn($value);
				break;
			case 4:
				$this->setNumMembers($value);
				break;
			case 5:
				$this->setEventsFall($value);
				break;
			case 6:
				$this->setEventsWinter($value);
				break;
			case 7:
				$this->setEventsSpring($value);
				break;
			case 8:
				$this->setFundraisingFall($value);
				break;
			case 9:
				$this->setFundraisingWinter($value);
				break;
			case 10:
				$this->setFundraisingSpring($value);
				break;
			case 11:
				$this->setServiceFall($value);
				break;
			case 12:
				$this->setServiceWinter($value);
				break;
			case 13:
				$this->setServiceSpring($value);
				break;
			case 14:
				$this->setAchievements($value);
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
		$keys = YearlyReportsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setYear($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setOrganizationId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRecognizedOn($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumMembers($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEventsFall($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEventsWinter($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEventsSpring($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFundraisingFall($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFundraisingWinter($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFundraisingSpring($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setServiceFall($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setServiceWinter($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setServiceSpring($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAchievements($arr[$keys[14]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(YearlyReportsPeer::DATABASE_NAME);

		if ($this->isColumnModified(YearlyReportsPeer::ID)) $criteria->add(YearlyReportsPeer::ID, $this->id);
		if ($this->isColumnModified(YearlyReportsPeer::YEAR)) $criteria->add(YearlyReportsPeer::YEAR, $this->year);
		if ($this->isColumnModified(YearlyReportsPeer::ORGANIZATION_ID)) $criteria->add(YearlyReportsPeer::ORGANIZATION_ID, $this->organization_id);
		if ($this->isColumnModified(YearlyReportsPeer::RECOGNIZED_ON)) $criteria->add(YearlyReportsPeer::RECOGNIZED_ON, $this->recognized_on);
		if ($this->isColumnModified(YearlyReportsPeer::NUM_MEMBERS)) $criteria->add(YearlyReportsPeer::NUM_MEMBERS, $this->num_members);
		if ($this->isColumnModified(YearlyReportsPeer::EVENTS_FALL)) $criteria->add(YearlyReportsPeer::EVENTS_FALL, $this->events_fall);
		if ($this->isColumnModified(YearlyReportsPeer::EVENTS_WINTER)) $criteria->add(YearlyReportsPeer::EVENTS_WINTER, $this->events_winter);
		if ($this->isColumnModified(YearlyReportsPeer::EVENTS_SPRING)) $criteria->add(YearlyReportsPeer::EVENTS_SPRING, $this->events_spring);
		if ($this->isColumnModified(YearlyReportsPeer::FUNDRAISING_FALL)) $criteria->add(YearlyReportsPeer::FUNDRAISING_FALL, $this->fundraising_fall);
		if ($this->isColumnModified(YearlyReportsPeer::FUNDRAISING_WINTER)) $criteria->add(YearlyReportsPeer::FUNDRAISING_WINTER, $this->fundraising_winter);
		if ($this->isColumnModified(YearlyReportsPeer::FUNDRAISING_SPRING)) $criteria->add(YearlyReportsPeer::FUNDRAISING_SPRING, $this->fundraising_spring);
		if ($this->isColumnModified(YearlyReportsPeer::SERVICE_FALL)) $criteria->add(YearlyReportsPeer::SERVICE_FALL, $this->service_fall);
		if ($this->isColumnModified(YearlyReportsPeer::SERVICE_WINTER)) $criteria->add(YearlyReportsPeer::SERVICE_WINTER, $this->service_winter);
		if ($this->isColumnModified(YearlyReportsPeer::SERVICE_SPRING)) $criteria->add(YearlyReportsPeer::SERVICE_SPRING, $this->service_spring);
		if ($this->isColumnModified(YearlyReportsPeer::ACHIEVEMENTS)) $criteria->add(YearlyReportsPeer::ACHIEVEMENTS, $this->achievements);

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
		$criteria = new Criteria(YearlyReportsPeer::DATABASE_NAME);
		$criteria->add(YearlyReportsPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of YearlyReports (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setYear($this->getYear());
		$copyObj->setOrganizationId($this->getOrganizationId());
		$copyObj->setRecognizedOn($this->getRecognizedOn());
		$copyObj->setNumMembers($this->getNumMembers());
		$copyObj->setEventsFall($this->getEventsFall());
		$copyObj->setEventsWinter($this->getEventsWinter());
		$copyObj->setEventsSpring($this->getEventsSpring());
		$copyObj->setFundraisingFall($this->getFundraisingFall());
		$copyObj->setFundraisingWinter($this->getFundraisingWinter());
		$copyObj->setFundraisingSpring($this->getFundraisingSpring());
		$copyObj->setServiceFall($this->getServiceFall());
		$copyObj->setServiceWinter($this->getServiceWinter());
		$copyObj->setServiceSpring($this->getServiceSpring());
		$copyObj->setAchievements($this->getAchievements());
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
	 * @return     YearlyReports Clone of current object.
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
	 * @return     YearlyReportsPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new YearlyReportsPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->year = null;
		$this->organization_id = null;
		$this->recognized_on = null;
		$this->num_members = null;
		$this->events_fall = null;
		$this->events_winter = null;
		$this->events_spring = null;
		$this->fundraising_fall = null;
		$this->fundraising_winter = null;
		$this->fundraising_spring = null;
		$this->service_fall = null;
		$this->service_winter = null;
		$this->service_spring = null;
		$this->achievements = null;
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
		return (string) $this->exportTo(YearlyReportsPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseYearlyReports
