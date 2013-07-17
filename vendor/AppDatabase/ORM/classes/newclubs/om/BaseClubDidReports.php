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
use NewClubsORM\ClubDidReportsPeer;
use NewClubsORM\ClubDidReportsQuery;

/**
 * Base class that represents a row from the 'club_did_reports' table.
 *
 * 
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseClubDidReports extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'NewClubsORM\\ClubDidReportsPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ClubDidReportsPeer
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
	 * The value for the date_submitted field.
	 * Note: this column has a database default value of: NULL
	 * @var        string
	 */
	protected $date_submitted;

	/**
	 * The value for the uniqueid field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $uniqueid;

	/**
	 * The value for the submit_type field.
	 * Note: this column has a database default value of: 'Submitted'
	 * @var        string
	 */
	protected $submit_type;

	/**
	 * The value for the advisor_approved field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $advisor_approved;

	/**
	 * The value for the ccl_approved field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $ccl_approved;

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
		$this->date_submitted = NULL;
		$this->uniqueid = '0';
		$this->submit_type = 'Submitted';
		$this->advisor_approved = false;
		$this->ccl_approved = false;
	}

	/**
	 * Initializes internal state of BaseClubDidReports object.
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
	 * Get the [optionally formatted] temporal [date_submitted] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDateSubmitted($format = '%x')
	{
		if ($this->date_submitted === null) {
			return null;
		}


		if ($this->date_submitted === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->date_submitted);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->date_submitted, true), $x);
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
	 * Get the [uniqueid] column value.
	 * 
	 * @return     string
	 */
	public function getUniqueid()
	{
		return $this->uniqueid;
	}

	/**
	 * Get the [submit_type] column value.
	 * 
	 * @return     string
	 */
	public function getSubmitType()
	{
		return $this->submit_type;
	}

	/**
	 * Get the [advisor_approved] column value.
	 * 
	 * @return     boolean
	 */
	public function getAdvisorApproved()
	{
		return $this->advisor_approved;
	}

	/**
	 * Get the [ccl_approved] column value.
	 * 
	 * @return     boolean
	 */
	public function getCclApproved()
	{
		return $this->ccl_approved;
	}

	/**
	 * Set the value of [org_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ClubDidReports The current object (for fluent API support)
	 */
	public function setOrgId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->org_id !== $v) {
			$this->org_id = $v;
			$this->modifiedColumns[] = ClubDidReportsPeer::ORG_ID;
		}

		return $this;
	} // setOrgId()

	/**
	 * Set the value of [report_id] column.
	 * 
	 * @param      int $v new value
	 * @return     ClubDidReports The current object (for fluent API support)
	 */
	public function setReportId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->report_id !== $v) {
			$this->report_id = $v;
			$this->modifiedColumns[] = ClubDidReportsPeer::REPORT_ID;
		}

		return $this;
	} // setReportId()

	/**
	 * Sets the value of [date_submitted] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     ClubDidReports The current object (for fluent API support)
	 */
	public function setDateSubmitted($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->date_submitted !== null || $dt !== null) {
			$currentDateAsString = ($this->date_submitted !== null && $tmpDt = new DateTime($this->date_submitted)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
				|| ($dt->format('Y-m-d') === NULL) // or the entered value matches the default
				 ) {
				$this->date_submitted = $newDateAsString;
				$this->modifiedColumns[] = ClubDidReportsPeer::DATE_SUBMITTED;
			}
		} // if either are not null

		return $this;
	} // setDateSubmitted()

	/**
	 * Set the value of [uniqueid] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubDidReports The current object (for fluent API support)
	 */
	public function setUniqueid($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->uniqueid !== $v) {
			$this->uniqueid = $v;
			$this->modifiedColumns[] = ClubDidReportsPeer::UNIQUEID;
		}

		return $this;
	} // setUniqueid()

	/**
	 * Set the value of [submit_type] column.
	 * 
	 * @param      string $v new value
	 * @return     ClubDidReports The current object (for fluent API support)
	 */
	public function setSubmitType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->submit_type !== $v) {
			$this->submit_type = $v;
			$this->modifiedColumns[] = ClubDidReportsPeer::SUBMIT_TYPE;
		}

		return $this;
	} // setSubmitType()

	/**
	 * Sets the value of the [advisor_approved] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     ClubDidReports The current object (for fluent API support)
	 */
	public function setAdvisorApproved($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->advisor_approved !== $v) {
			$this->advisor_approved = $v;
			$this->modifiedColumns[] = ClubDidReportsPeer::ADVISOR_APPROVED;
		}

		return $this;
	} // setAdvisorApproved()

	/**
	 * Sets the value of the [ccl_approved] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     ClubDidReports The current object (for fluent API support)
	 */
	public function setCclApproved($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->ccl_approved !== $v) {
			$this->ccl_approved = $v;
			$this->modifiedColumns[] = ClubDidReportsPeer::CCL_APPROVED;
		}

		return $this;
	} // setCclApproved()

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

			if ($this->date_submitted !== NULL) {
				return false;
			}

			if ($this->uniqueid !== '0') {
				return false;
			}

			if ($this->submit_type !== 'Submitted') {
				return false;
			}

			if ($this->advisor_approved !== false) {
				return false;
			}

			if ($this->ccl_approved !== false) {
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
			$this->date_submitted = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->uniqueid = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->submit_type = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->advisor_approved = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->ccl_approved = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 7; // 7 = ClubDidReportsPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating ClubDidReports object", $e);
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
			$con = Propel::getConnection(ClubDidReportsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ClubDidReportsPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
			$con = Propel::getConnection(ClubDidReportsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = ClubDidReportsQuery::create()
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
			$con = Propel::getConnection(ClubDidReportsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ClubDidReportsPeer::addInstanceToPool($this);
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
		if ($this->isColumnModified(ClubDidReportsPeer::ORG_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ORG_ID`';
		}
		if ($this->isColumnModified(ClubDidReportsPeer::REPORT_ID)) {
			$modifiedColumns[':p' . $index++]  = '`REPORT_ID`';
		}
		if ($this->isColumnModified(ClubDidReportsPeer::DATE_SUBMITTED)) {
			$modifiedColumns[':p' . $index++]  = '`DATE_SUBMITTED`';
		}
		if ($this->isColumnModified(ClubDidReportsPeer::UNIQUEID)) {
			$modifiedColumns[':p' . $index++]  = '`UNIQUEID`';
		}
		if ($this->isColumnModified(ClubDidReportsPeer::SUBMIT_TYPE)) {
			$modifiedColumns[':p' . $index++]  = '`SUBMIT_TYPE`';
		}
		if ($this->isColumnModified(ClubDidReportsPeer::ADVISOR_APPROVED)) {
			$modifiedColumns[':p' . $index++]  = '`ADVISOR_APPROVED`';
		}
		if ($this->isColumnModified(ClubDidReportsPeer::CCL_APPROVED)) {
			$modifiedColumns[':p' . $index++]  = '`CCL_APPROVED`';
		}

		$sql = sprintf(
			'INSERT INTO `club_did_reports` (%s) VALUES (%s)',
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
					case '`DATE_SUBMITTED`':
						$stmt->bindValue($identifier, $this->date_submitted, PDO::PARAM_STR);
						break;
					case '`UNIQUEID`':
						$stmt->bindValue($identifier, $this->uniqueid, PDO::PARAM_STR);
						break;
					case '`SUBMIT_TYPE`':
						$stmt->bindValue($identifier, $this->submit_type, PDO::PARAM_STR);
						break;
					case '`ADVISOR_APPROVED`':
						$stmt->bindValue($identifier, (int) $this->advisor_approved, PDO::PARAM_INT);
						break;
					case '`CCL_APPROVED`':
						$stmt->bindValue($identifier, (int) $this->ccl_approved, PDO::PARAM_INT);
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


			if (($retval = ClubDidReportsPeer::doValidate($this, $columns)) !== true) {
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
		$pos = ClubDidReportsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDateSubmitted();
				break;
			case 3:
				return $this->getUniqueid();
				break;
			case 4:
				return $this->getSubmitType();
				break;
			case 5:
				return $this->getAdvisorApproved();
				break;
			case 6:
				return $this->getCclApproved();
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
		if (isset($alreadyDumpedObjects['ClubDidReports'][serialize($this->getPrimaryKey())])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['ClubDidReports'][serialize($this->getPrimaryKey())] = true;
		$keys = ClubDidReportsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getOrgId(),
			$keys[1] => $this->getReportId(),
			$keys[2] => $this->getDateSubmitted(),
			$keys[3] => $this->getUniqueid(),
			$keys[4] => $this->getSubmitType(),
			$keys[5] => $this->getAdvisorApproved(),
			$keys[6] => $this->getCclApproved(),
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
		$pos = ClubDidReportsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDateSubmitted($value);
				break;
			case 3:
				$this->setUniqueid($value);
				break;
			case 4:
				$this->setSubmitType($value);
				break;
			case 5:
				$this->setAdvisorApproved($value);
				break;
			case 6:
				$this->setCclApproved($value);
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
		$keys = ClubDidReportsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setOrgId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setReportId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDateSubmitted($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUniqueid($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSubmitType($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAdvisorApproved($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCclApproved($arr[$keys[6]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ClubDidReportsPeer::DATABASE_NAME);

		if ($this->isColumnModified(ClubDidReportsPeer::ORG_ID)) $criteria->add(ClubDidReportsPeer::ORG_ID, $this->org_id);
		if ($this->isColumnModified(ClubDidReportsPeer::REPORT_ID)) $criteria->add(ClubDidReportsPeer::REPORT_ID, $this->report_id);
		if ($this->isColumnModified(ClubDidReportsPeer::DATE_SUBMITTED)) $criteria->add(ClubDidReportsPeer::DATE_SUBMITTED, $this->date_submitted);
		if ($this->isColumnModified(ClubDidReportsPeer::UNIQUEID)) $criteria->add(ClubDidReportsPeer::UNIQUEID, $this->uniqueid);
		if ($this->isColumnModified(ClubDidReportsPeer::SUBMIT_TYPE)) $criteria->add(ClubDidReportsPeer::SUBMIT_TYPE, $this->submit_type);
		if ($this->isColumnModified(ClubDidReportsPeer::ADVISOR_APPROVED)) $criteria->add(ClubDidReportsPeer::ADVISOR_APPROVED, $this->advisor_approved);
		if ($this->isColumnModified(ClubDidReportsPeer::CCL_APPROVED)) $criteria->add(ClubDidReportsPeer::CCL_APPROVED, $this->ccl_approved);

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
		$criteria = new Criteria(ClubDidReportsPeer::DATABASE_NAME);
		$criteria->add(ClubDidReportsPeer::ORG_ID, $this->org_id);
		$criteria->add(ClubDidReportsPeer::REPORT_ID, $this->report_id);

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
	 * @param      object $copyObj An object of ClubDidReports (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setOrgId($this->getOrgId());
		$copyObj->setReportId($this->getReportId());
		$copyObj->setDateSubmitted($this->getDateSubmitted());
		$copyObj->setUniqueid($this->getUniqueid());
		$copyObj->setSubmitType($this->getSubmitType());
		$copyObj->setAdvisorApproved($this->getAdvisorApproved());
		$copyObj->setCclApproved($this->getCclApproved());
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
	 * @return     ClubDidReports Clone of current object.
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
	 * @return     ClubDidReportsPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ClubDidReportsPeer();
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
		$this->date_submitted = null;
		$this->uniqueid = null;
		$this->submit_type = null;
		$this->advisor_approved = null;
		$this->ccl_approved = null;
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
		return (string) $this->exportTo(ClubDidReportsPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseClubDidReports
