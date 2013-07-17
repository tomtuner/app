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
use ClubsORM\QuarterlyReportsPeer;
use ClubsORM\QuarterlyReportsQuery;

/**
 * Base class that represents a row from the 'quarterly_reports' table.
 *
 * 
 *
 * @package    propel.generator.clubs.om
 */
abstract class BaseQuarterlyReports extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ClubsORM\\QuarterlyReportsPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        QuarterlyReportsPeer
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
	 * The value for the quarter field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $quarter;

	/**
	 * The value for the organization_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $organization_id;

	/**
	 * The value for the member_list_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $member_list_id;

	/**
	 * The value for the club_meeting_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $club_meeting_id;

	/**
	 * The value for the club_name field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $club_name;

	/**
	 * The value for the num_active_members field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $num_active_members;

	/**
	 * The value for the num_associate_members field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $num_associate_members;

	/**
	 * The value for the avg_meeting_attendance field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $avg_meeting_attendance;

	/**
	 * The value for the goals field.
	 * @var        string
	 */
	protected $goals;

	/**
	 * The value for the accomplish_goals field.
	 * @var        string
	 */
	protected $accomplish_goals;

	/**
	 * The value for the help field.
	 * @var        string
	 */
	protected $help;

	/**
	 * The value for the other field.
	 * @var        string
	 */
	protected $other;

	/**
	 * The value for the board_changes field.
	 * @var        string
	 */
	protected $board_changes;

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
		$this->quarter = 0;
		$this->organization_id = 0;
		$this->member_list_id = 0;
		$this->club_meeting_id = 0;
		$this->club_name = '';
		$this->num_active_members = 0;
		$this->num_associate_members = 0;
		$this->avg_meeting_attendance = 0;
	}

	/**
	 * Initializes internal state of BaseQuarterlyReports object.
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
	 * Get the [quarter] column value.
	 * 
	 * @return     int
	 */
	public function getQuarter()
	{
		return $this->quarter;
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
	 * Get the [member_list_id] column value.
	 * 
	 * @return     int
	 */
	public function getMemberListId()
	{
		return $this->member_list_id;
	}

	/**
	 * Get the [club_meeting_id] column value.
	 * 
	 * @return     int
	 */
	public function getClubMeetingId()
	{
		return $this->club_meeting_id;
	}

	/**
	 * Get the [club_name] column value.
	 * 
	 * @return     string
	 */
	public function getClubName()
	{
		return $this->club_name;
	}

	/**
	 * Get the [num_active_members] column value.
	 * 
	 * @return     int
	 */
	public function getNumActiveMembers()
	{
		return $this->num_active_members;
	}

	/**
	 * Get the [num_associate_members] column value.
	 * 
	 * @return     int
	 */
	public function getNumAssociateMembers()
	{
		return $this->num_associate_members;
	}

	/**
	 * Get the [avg_meeting_attendance] column value.
	 * 
	 * @return     int
	 */
	public function getAvgMeetingAttendance()
	{
		return $this->avg_meeting_attendance;
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
	 * Get the [accomplish_goals] column value.
	 * 
	 * @return     string
	 */
	public function getAccomplishGoals()
	{
		return $this->accomplish_goals;
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
	 * Get the [other] column value.
	 * 
	 * @return     string
	 */
	public function getOther()
	{
		return $this->other;
	}

	/**
	 * Get the [board_changes] column value.
	 * 
	 * @return     string
	 */
	public function getBoardChanges()
	{
		return $this->board_changes;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyReports The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = QuarterlyReportsPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [year] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyReports The current object (for fluent API support)
	 */
	public function setYear($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->year !== $v) {
			$this->year = $v;
			$this->modifiedColumns[] = QuarterlyReportsPeer::YEAR;
		}

		return $this;
	} // setYear()

	/**
	 * Set the value of [quarter] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyReports The current object (for fluent API support)
	 */
	public function setQuarter($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->quarter !== $v) {
			$this->quarter = $v;
			$this->modifiedColumns[] = QuarterlyReportsPeer::QUARTER;
		}

		return $this;
	} // setQuarter()

	/**
	 * Set the value of [organization_id] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyReports The current object (for fluent API support)
	 */
	public function setOrganizationId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->organization_id !== $v) {
			$this->organization_id = $v;
			$this->modifiedColumns[] = QuarterlyReportsPeer::ORGANIZATION_ID;
		}

		return $this;
	} // setOrganizationId()

	/**
	 * Set the value of [member_list_id] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyReports The current object (for fluent API support)
	 */
	public function setMemberListId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->member_list_id !== $v) {
			$this->member_list_id = $v;
			$this->modifiedColumns[] = QuarterlyReportsPeer::MEMBER_LIST_ID;
		}

		return $this;
	} // setMemberListId()

	/**
	 * Set the value of [club_meeting_id] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyReports The current object (for fluent API support)
	 */
	public function setClubMeetingId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->club_meeting_id !== $v) {
			$this->club_meeting_id = $v;
			$this->modifiedColumns[] = QuarterlyReportsPeer::CLUB_MEETING_ID;
		}

		return $this;
	} // setClubMeetingId()

	/**
	 * Set the value of [club_name] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyReports The current object (for fluent API support)
	 */
	public function setClubName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->club_name !== $v) {
			$this->club_name = $v;
			$this->modifiedColumns[] = QuarterlyReportsPeer::CLUB_NAME;
		}

		return $this;
	} // setClubName()

	/**
	 * Set the value of [num_active_members] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyReports The current object (for fluent API support)
	 */
	public function setNumActiveMembers($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->num_active_members !== $v) {
			$this->num_active_members = $v;
			$this->modifiedColumns[] = QuarterlyReportsPeer::NUM_ACTIVE_MEMBERS;
		}

		return $this;
	} // setNumActiveMembers()

	/**
	 * Set the value of [num_associate_members] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyReports The current object (for fluent API support)
	 */
	public function setNumAssociateMembers($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->num_associate_members !== $v) {
			$this->num_associate_members = $v;
			$this->modifiedColumns[] = QuarterlyReportsPeer::NUM_ASSOCIATE_MEMBERS;
		}

		return $this;
	} // setNumAssociateMembers()

	/**
	 * Set the value of [avg_meeting_attendance] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyReports The current object (for fluent API support)
	 */
	public function setAvgMeetingAttendance($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->avg_meeting_attendance !== $v) {
			$this->avg_meeting_attendance = $v;
			$this->modifiedColumns[] = QuarterlyReportsPeer::AVG_MEETING_ATTENDANCE;
		}

		return $this;
	} // setAvgMeetingAttendance()

	/**
	 * Set the value of [goals] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyReports The current object (for fluent API support)
	 */
	public function setGoals($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->goals !== $v) {
			$this->goals = $v;
			$this->modifiedColumns[] = QuarterlyReportsPeer::GOALS;
		}

		return $this;
	} // setGoals()

	/**
	 * Set the value of [accomplish_goals] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyReports The current object (for fluent API support)
	 */
	public function setAccomplishGoals($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->accomplish_goals !== $v) {
			$this->accomplish_goals = $v;
			$this->modifiedColumns[] = QuarterlyReportsPeer::ACCOMPLISH_GOALS;
		}

		return $this;
	} // setAccomplishGoals()

	/**
	 * Set the value of [help] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyReports The current object (for fluent API support)
	 */
	public function setHelp($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->help !== $v) {
			$this->help = $v;
			$this->modifiedColumns[] = QuarterlyReportsPeer::HELP;
		}

		return $this;
	} // setHelp()

	/**
	 * Set the value of [other] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyReports The current object (for fluent API support)
	 */
	public function setOther($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->other !== $v) {
			$this->other = $v;
			$this->modifiedColumns[] = QuarterlyReportsPeer::OTHER;
		}

		return $this;
	} // setOther()

	/**
	 * Set the value of [board_changes] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyReports The current object (for fluent API support)
	 */
	public function setBoardChanges($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->board_changes !== $v) {
			$this->board_changes = $v;
			$this->modifiedColumns[] = QuarterlyReportsPeer::BOARD_CHANGES;
		}

		return $this;
	} // setBoardChanges()

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

			if ($this->quarter !== 0) {
				return false;
			}

			if ($this->organization_id !== 0) {
				return false;
			}

			if ($this->member_list_id !== 0) {
				return false;
			}

			if ($this->club_meeting_id !== 0) {
				return false;
			}

			if ($this->club_name !== '') {
				return false;
			}

			if ($this->num_active_members !== 0) {
				return false;
			}

			if ($this->num_associate_members !== 0) {
				return false;
			}

			if ($this->avg_meeting_attendance !== 0) {
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
			$this->quarter = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->organization_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->member_list_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->club_meeting_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->club_name = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->num_active_members = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->num_associate_members = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->avg_meeting_attendance = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->goals = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->accomplish_goals = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->help = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->other = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->board_changes = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 15; // 15 = QuarterlyReportsPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating QuarterlyReports object", $e);
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
			$con = Propel::getConnection(QuarterlyReportsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = QuarterlyReportsPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
			$con = Propel::getConnection(QuarterlyReportsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = QuarterlyReportsQuery::create()
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
			$con = Propel::getConnection(QuarterlyReportsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				QuarterlyReportsPeer::addInstanceToPool($this);
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

		$this->modifiedColumns[] = QuarterlyReportsPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . QuarterlyReportsPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(QuarterlyReportsPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(QuarterlyReportsPeer::YEAR)) {
			$modifiedColumns[':p' . $index++]  = '`YEAR`';
		}
		if ($this->isColumnModified(QuarterlyReportsPeer::QUARTER)) {
			$modifiedColumns[':p' . $index++]  = '`QUARTER`';
		}
		if ($this->isColumnModified(QuarterlyReportsPeer::ORGANIZATION_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ORGANIZATION_ID`';
		}
		if ($this->isColumnModified(QuarterlyReportsPeer::MEMBER_LIST_ID)) {
			$modifiedColumns[':p' . $index++]  = '`MEMBER_LIST_ID`';
		}
		if ($this->isColumnModified(QuarterlyReportsPeer::CLUB_MEETING_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CLUB_MEETING_ID`';
		}
		if ($this->isColumnModified(QuarterlyReportsPeer::CLUB_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`CLUB_NAME`';
		}
		if ($this->isColumnModified(QuarterlyReportsPeer::NUM_ACTIVE_MEMBERS)) {
			$modifiedColumns[':p' . $index++]  = '`NUM_ACTIVE_MEMBERS`';
		}
		if ($this->isColumnModified(QuarterlyReportsPeer::NUM_ASSOCIATE_MEMBERS)) {
			$modifiedColumns[':p' . $index++]  = '`NUM_ASSOCIATE_MEMBERS`';
		}
		if ($this->isColumnModified(QuarterlyReportsPeer::AVG_MEETING_ATTENDANCE)) {
			$modifiedColumns[':p' . $index++]  = '`AVG_MEETING_ATTENDANCE`';
		}
		if ($this->isColumnModified(QuarterlyReportsPeer::GOALS)) {
			$modifiedColumns[':p' . $index++]  = '`GOALS`';
		}
		if ($this->isColumnModified(QuarterlyReportsPeer::ACCOMPLISH_GOALS)) {
			$modifiedColumns[':p' . $index++]  = '`ACCOMPLISH_GOALS`';
		}
		if ($this->isColumnModified(QuarterlyReportsPeer::HELP)) {
			$modifiedColumns[':p' . $index++]  = '`HELP`';
		}
		if ($this->isColumnModified(QuarterlyReportsPeer::OTHER)) {
			$modifiedColumns[':p' . $index++]  = '`OTHER`';
		}
		if ($this->isColumnModified(QuarterlyReportsPeer::BOARD_CHANGES)) {
			$modifiedColumns[':p' . $index++]  = '`BOARD_CHANGES`';
		}

		$sql = sprintf(
			'INSERT INTO `quarterly_reports` (%s) VALUES (%s)',
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
					case '`QUARTER`':
						$stmt->bindValue($identifier, $this->quarter, PDO::PARAM_INT);
						break;
					case '`ORGANIZATION_ID`':
						$stmt->bindValue($identifier, $this->organization_id, PDO::PARAM_INT);
						break;
					case '`MEMBER_LIST_ID`':
						$stmt->bindValue($identifier, $this->member_list_id, PDO::PARAM_INT);
						break;
					case '`CLUB_MEETING_ID`':
						$stmt->bindValue($identifier, $this->club_meeting_id, PDO::PARAM_INT);
						break;
					case '`CLUB_NAME`':
						$stmt->bindValue($identifier, $this->club_name, PDO::PARAM_STR);
						break;
					case '`NUM_ACTIVE_MEMBERS`':
						$stmt->bindValue($identifier, $this->num_active_members, PDO::PARAM_INT);
						break;
					case '`NUM_ASSOCIATE_MEMBERS`':
						$stmt->bindValue($identifier, $this->num_associate_members, PDO::PARAM_INT);
						break;
					case '`AVG_MEETING_ATTENDANCE`':
						$stmt->bindValue($identifier, $this->avg_meeting_attendance, PDO::PARAM_INT);
						break;
					case '`GOALS`':
						$stmt->bindValue($identifier, $this->goals, PDO::PARAM_STR);
						break;
					case '`ACCOMPLISH_GOALS`':
						$stmt->bindValue($identifier, $this->accomplish_goals, PDO::PARAM_STR);
						break;
					case '`HELP`':
						$stmt->bindValue($identifier, $this->help, PDO::PARAM_STR);
						break;
					case '`OTHER`':
						$stmt->bindValue($identifier, $this->other, PDO::PARAM_STR);
						break;
					case '`BOARD_CHANGES`':
						$stmt->bindValue($identifier, $this->board_changes, PDO::PARAM_STR);
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


			if (($retval = QuarterlyReportsPeer::doValidate($this, $columns)) !== true) {
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
		$pos = QuarterlyReportsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getQuarter();
				break;
			case 3:
				return $this->getOrganizationId();
				break;
			case 4:
				return $this->getMemberListId();
				break;
			case 5:
				return $this->getClubMeetingId();
				break;
			case 6:
				return $this->getClubName();
				break;
			case 7:
				return $this->getNumActiveMembers();
				break;
			case 8:
				return $this->getNumAssociateMembers();
				break;
			case 9:
				return $this->getAvgMeetingAttendance();
				break;
			case 10:
				return $this->getGoals();
				break;
			case 11:
				return $this->getAccomplishGoals();
				break;
			case 12:
				return $this->getHelp();
				break;
			case 13:
				return $this->getOther();
				break;
			case 14:
				return $this->getBoardChanges();
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
		if (isset($alreadyDumpedObjects['QuarterlyReports'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['QuarterlyReports'][$this->getPrimaryKey()] = true;
		$keys = QuarterlyReportsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getYear(),
			$keys[2] => $this->getQuarter(),
			$keys[3] => $this->getOrganizationId(),
			$keys[4] => $this->getMemberListId(),
			$keys[5] => $this->getClubMeetingId(),
			$keys[6] => $this->getClubName(),
			$keys[7] => $this->getNumActiveMembers(),
			$keys[8] => $this->getNumAssociateMembers(),
			$keys[9] => $this->getAvgMeetingAttendance(),
			$keys[10] => $this->getGoals(),
			$keys[11] => $this->getAccomplishGoals(),
			$keys[12] => $this->getHelp(),
			$keys[13] => $this->getOther(),
			$keys[14] => $this->getBoardChanges(),
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
		$pos = QuarterlyReportsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setQuarter($value);
				break;
			case 3:
				$this->setOrganizationId($value);
				break;
			case 4:
				$this->setMemberListId($value);
				break;
			case 5:
				$this->setClubMeetingId($value);
				break;
			case 6:
				$this->setClubName($value);
				break;
			case 7:
				$this->setNumActiveMembers($value);
				break;
			case 8:
				$this->setNumAssociateMembers($value);
				break;
			case 9:
				$this->setAvgMeetingAttendance($value);
				break;
			case 10:
				$this->setGoals($value);
				break;
			case 11:
				$this->setAccomplishGoals($value);
				break;
			case 12:
				$this->setHelp($value);
				break;
			case 13:
				$this->setOther($value);
				break;
			case 14:
				$this->setBoardChanges($value);
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
		$keys = QuarterlyReportsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setYear($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setQuarter($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setOrganizationId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMemberListId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setClubMeetingId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setClubName($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumActiveMembers($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNumAssociateMembers($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAvgMeetingAttendance($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setGoals($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAccomplishGoals($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setHelp($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setOther($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setBoardChanges($arr[$keys[14]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(QuarterlyReportsPeer::DATABASE_NAME);

		if ($this->isColumnModified(QuarterlyReportsPeer::ID)) $criteria->add(QuarterlyReportsPeer::ID, $this->id);
		if ($this->isColumnModified(QuarterlyReportsPeer::YEAR)) $criteria->add(QuarterlyReportsPeer::YEAR, $this->year);
		if ($this->isColumnModified(QuarterlyReportsPeer::QUARTER)) $criteria->add(QuarterlyReportsPeer::QUARTER, $this->quarter);
		if ($this->isColumnModified(QuarterlyReportsPeer::ORGANIZATION_ID)) $criteria->add(QuarterlyReportsPeer::ORGANIZATION_ID, $this->organization_id);
		if ($this->isColumnModified(QuarterlyReportsPeer::MEMBER_LIST_ID)) $criteria->add(QuarterlyReportsPeer::MEMBER_LIST_ID, $this->member_list_id);
		if ($this->isColumnModified(QuarterlyReportsPeer::CLUB_MEETING_ID)) $criteria->add(QuarterlyReportsPeer::CLUB_MEETING_ID, $this->club_meeting_id);
		if ($this->isColumnModified(QuarterlyReportsPeer::CLUB_NAME)) $criteria->add(QuarterlyReportsPeer::CLUB_NAME, $this->club_name);
		if ($this->isColumnModified(QuarterlyReportsPeer::NUM_ACTIVE_MEMBERS)) $criteria->add(QuarterlyReportsPeer::NUM_ACTIVE_MEMBERS, $this->num_active_members);
		if ($this->isColumnModified(QuarterlyReportsPeer::NUM_ASSOCIATE_MEMBERS)) $criteria->add(QuarterlyReportsPeer::NUM_ASSOCIATE_MEMBERS, $this->num_associate_members);
		if ($this->isColumnModified(QuarterlyReportsPeer::AVG_MEETING_ATTENDANCE)) $criteria->add(QuarterlyReportsPeer::AVG_MEETING_ATTENDANCE, $this->avg_meeting_attendance);
		if ($this->isColumnModified(QuarterlyReportsPeer::GOALS)) $criteria->add(QuarterlyReportsPeer::GOALS, $this->goals);
		if ($this->isColumnModified(QuarterlyReportsPeer::ACCOMPLISH_GOALS)) $criteria->add(QuarterlyReportsPeer::ACCOMPLISH_GOALS, $this->accomplish_goals);
		if ($this->isColumnModified(QuarterlyReportsPeer::HELP)) $criteria->add(QuarterlyReportsPeer::HELP, $this->help);
		if ($this->isColumnModified(QuarterlyReportsPeer::OTHER)) $criteria->add(QuarterlyReportsPeer::OTHER, $this->other);
		if ($this->isColumnModified(QuarterlyReportsPeer::BOARD_CHANGES)) $criteria->add(QuarterlyReportsPeer::BOARD_CHANGES, $this->board_changes);

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
		$criteria = new Criteria(QuarterlyReportsPeer::DATABASE_NAME);
		$criteria->add(QuarterlyReportsPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of QuarterlyReports (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setYear($this->getYear());
		$copyObj->setQuarter($this->getQuarter());
		$copyObj->setOrganizationId($this->getOrganizationId());
		$copyObj->setMemberListId($this->getMemberListId());
		$copyObj->setClubMeetingId($this->getClubMeetingId());
		$copyObj->setClubName($this->getClubName());
		$copyObj->setNumActiveMembers($this->getNumActiveMembers());
		$copyObj->setNumAssociateMembers($this->getNumAssociateMembers());
		$copyObj->setAvgMeetingAttendance($this->getAvgMeetingAttendance());
		$copyObj->setGoals($this->getGoals());
		$copyObj->setAccomplishGoals($this->getAccomplishGoals());
		$copyObj->setHelp($this->getHelp());
		$copyObj->setOther($this->getOther());
		$copyObj->setBoardChanges($this->getBoardChanges());
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
	 * @return     QuarterlyReports Clone of current object.
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
	 * @return     QuarterlyReportsPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new QuarterlyReportsPeer();
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
		$this->quarter = null;
		$this->organization_id = null;
		$this->member_list_id = null;
		$this->club_meeting_id = null;
		$this->club_name = null;
		$this->num_active_members = null;
		$this->num_associate_members = null;
		$this->avg_meeting_attendance = null;
		$this->goals = null;
		$this->accomplish_goals = null;
		$this->help = null;
		$this->other = null;
		$this->board_changes = null;
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
		return (string) $this->exportTo(QuarterlyReportsPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseQuarterlyReports
