<?php

namespace OrganizationsORM\om;

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
use OrganizationsORM\EafApprovalsPeer;
use OrganizationsORM\EafApprovalsQuery;
use OrganizationsORM\EafFormInfo;
use OrganizationsORM\EafFormInfoQuery;

/**
 * Base class that represents a row from the 'eaf_approvals' table.
 *
 * 
 *
 * @package    propel.generator.organizations.om
 */
abstract class BaseEafApprovals extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'OrganizationsORM\\EafApprovalsPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        EafApprovalsPeer
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
	 * The value for the eaf_form_no field.
	 * @var        int
	 */
	protected $eaf_form_no;

	/**
	 * The value for the advisor_name field.
	 * @var        string
	 */
	protected $advisor_name;

	/**
	 * The value for the approved field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $approved;

	/**
	 * The value for the notes field.
	 * @var        string
	 */
	protected $notes;

	/**
	 * The value for the approval_date field.
	 * @var        string
	 */
	protected $approval_date;

	/**
	 * @var        EafFormInfo
	 */
	protected $aEafFormInfo;

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
		$this->approved = '0';
	}

	/**
	 * Initializes internal state of BaseEafApprovals object.
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
	 * Get the [eaf_form_no] column value.
	 * 
	 * @return     int
	 */
	public function getEafFormNo()
	{
		return $this->eaf_form_no;
	}

	/**
	 * Get the [advisor_name] column value.
	 * 
	 * @return     string
	 */
	public function getAdvisorName()
	{
		return $this->advisor_name;
	}

	/**
	 * Get the [approved] column value.
	 * 
	 * @return     string
	 */
	public function getApproved()
	{
		return $this->approved;
	}

	/**
	 * Get the [notes] column value.
	 * 
	 * @return     string
	 */
	public function getNotes()
	{
		return $this->notes;
	}

	/**
	 * Get the [optionally formatted] temporal [approval_date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getApprovalDate($format = '%x')
	{
		if ($this->approval_date === null) {
			return null;
		}


		if ($this->approval_date === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->approval_date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->approval_date, true), $x);
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
	 * @return     EafApprovals The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = EafApprovalsPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [eaf_form_no] column.
	 * 
	 * @param      int $v new value
	 * @return     EafApprovals The current object (for fluent API support)
	 */
	public function setEafFormNo($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->eaf_form_no !== $v) {
			$this->eaf_form_no = $v;
			$this->modifiedColumns[] = EafApprovalsPeer::EAF_FORM_NO;
		}

		if ($this->aEafFormInfo !== null && $this->aEafFormInfo->getEafFormNo() !== $v) {
			$this->aEafFormInfo = null;
		}

		return $this;
	} // setEafFormNo()

	/**
	 * Set the value of [advisor_name] column.
	 * 
	 * @param      string $v new value
	 * @return     EafApprovals The current object (for fluent API support)
	 */
	public function setAdvisorName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->advisor_name !== $v) {
			$this->advisor_name = $v;
			$this->modifiedColumns[] = EafApprovalsPeer::ADVISOR_NAME;
		}

		return $this;
	} // setAdvisorName()

	/**
	 * Set the value of [approved] column.
	 * 
	 * @param      string $v new value
	 * @return     EafApprovals The current object (for fluent API support)
	 */
	public function setApproved($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->approved !== $v) {
			$this->approved = $v;
			$this->modifiedColumns[] = EafApprovalsPeer::APPROVED;
		}

		return $this;
	} // setApproved()

	/**
	 * Set the value of [notes] column.
	 * 
	 * @param      string $v new value
	 * @return     EafApprovals The current object (for fluent API support)
	 */
	public function setNotes($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->notes !== $v) {
			$this->notes = $v;
			$this->modifiedColumns[] = EafApprovalsPeer::NOTES;
		}

		return $this;
	} // setNotes()

	/**
	 * Sets the value of [approval_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     EafApprovals The current object (for fluent API support)
	 */
	public function setApprovalDate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->approval_date !== null || $dt !== null) {
			$currentDateAsString = ($this->approval_date !== null && $tmpDt = new DateTime($this->approval_date)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->approval_date = $newDateAsString;
				$this->modifiedColumns[] = EafApprovalsPeer::APPROVAL_DATE;
			}
		} // if either are not null

		return $this;
	} // setApprovalDate()

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
			if ($this->approved !== '0') {
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
			$this->eaf_form_no = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->advisor_name = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->approved = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->notes = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->approval_date = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 6; // 6 = EafApprovalsPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating EafApprovals object", $e);
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

		if ($this->aEafFormInfo !== null && $this->eaf_form_no !== $this->aEafFormInfo->getEafFormNo()) {
			$this->aEafFormInfo = null;
		}
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
			$con = Propel::getConnection(EafApprovalsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = EafApprovalsPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aEafFormInfo = null;
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
			$con = Propel::getConnection(EafApprovalsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = EafApprovalsQuery::create()
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
			$con = Propel::getConnection(EafApprovalsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				EafApprovalsPeer::addInstanceToPool($this);
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

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aEafFormInfo !== null) {
				if ($this->aEafFormInfo->isModified() || $this->aEafFormInfo->isNew()) {
					$affectedRows += $this->aEafFormInfo->save($con);
				}
				$this->setEafFormInfo($this->aEafFormInfo);
			}

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

		$this->modifiedColumns[] = EafApprovalsPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . EafApprovalsPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(EafApprovalsPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(EafApprovalsPeer::EAF_FORM_NO)) {
			$modifiedColumns[':p' . $index++]  = '`EAF_FORM_NO`';
		}
		if ($this->isColumnModified(EafApprovalsPeer::ADVISOR_NAME)) {
			$modifiedColumns[':p' . $index++]  = '`ADVISOR_NAME`';
		}
		if ($this->isColumnModified(EafApprovalsPeer::APPROVED)) {
			$modifiedColumns[':p' . $index++]  = '`APPROVED`';
		}
		if ($this->isColumnModified(EafApprovalsPeer::NOTES)) {
			$modifiedColumns[':p' . $index++]  = '`NOTES`';
		}
		if ($this->isColumnModified(EafApprovalsPeer::APPROVAL_DATE)) {
			$modifiedColumns[':p' . $index++]  = '`APPROVAL_DATE`';
		}

		$sql = sprintf(
			'INSERT INTO `eaf_approvals` (%s) VALUES (%s)',
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
					case '`EAF_FORM_NO`':
						$stmt->bindValue($identifier, $this->eaf_form_no, PDO::PARAM_INT);
						break;
					case '`ADVISOR_NAME`':
						$stmt->bindValue($identifier, $this->advisor_name, PDO::PARAM_STR);
						break;
					case '`APPROVED`':
						$stmt->bindValue($identifier, $this->approved, PDO::PARAM_STR);
						break;
					case '`NOTES`':
						$stmt->bindValue($identifier, $this->notes, PDO::PARAM_STR);
						break;
					case '`APPROVAL_DATE`':
						$stmt->bindValue($identifier, $this->approval_date, PDO::PARAM_STR);
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


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aEafFormInfo !== null) {
				if (!$this->aEafFormInfo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEafFormInfo->getValidationFailures());
				}
			}


			if (($retval = EafApprovalsPeer::doValidate($this, $columns)) !== true) {
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
		$pos = EafApprovalsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getEafFormNo();
				break;
			case 2:
				return $this->getAdvisorName();
				break;
			case 3:
				return $this->getApproved();
				break;
			case 4:
				return $this->getNotes();
				break;
			case 5:
				return $this->getApprovalDate();
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
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['EafApprovals'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['EafApprovals'][$this->getPrimaryKey()] = true;
		$keys = EafApprovalsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEafFormNo(),
			$keys[2] => $this->getAdvisorName(),
			$keys[3] => $this->getApproved(),
			$keys[4] => $this->getNotes(),
			$keys[5] => $this->getApprovalDate(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aEafFormInfo) {
				$result['EafFormInfo'] = $this->aEafFormInfo->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
		}
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
		$pos = EafApprovalsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setEafFormNo($value);
				break;
			case 2:
				$this->setAdvisorName($value);
				break;
			case 3:
				$this->setApproved($value);
				break;
			case 4:
				$this->setNotes($value);
				break;
			case 5:
				$this->setApprovalDate($value);
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
		$keys = EafApprovalsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEafFormNo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAdvisorName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setApproved($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNotes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setApprovalDate($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(EafApprovalsPeer::DATABASE_NAME);

		if ($this->isColumnModified(EafApprovalsPeer::ID)) $criteria->add(EafApprovalsPeer::ID, $this->id);
		if ($this->isColumnModified(EafApprovalsPeer::EAF_FORM_NO)) $criteria->add(EafApprovalsPeer::EAF_FORM_NO, $this->eaf_form_no);
		if ($this->isColumnModified(EafApprovalsPeer::ADVISOR_NAME)) $criteria->add(EafApprovalsPeer::ADVISOR_NAME, $this->advisor_name);
		if ($this->isColumnModified(EafApprovalsPeer::APPROVED)) $criteria->add(EafApprovalsPeer::APPROVED, $this->approved);
		if ($this->isColumnModified(EafApprovalsPeer::NOTES)) $criteria->add(EafApprovalsPeer::NOTES, $this->notes);
		if ($this->isColumnModified(EafApprovalsPeer::APPROVAL_DATE)) $criteria->add(EafApprovalsPeer::APPROVAL_DATE, $this->approval_date);

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
		$criteria = new Criteria(EafApprovalsPeer::DATABASE_NAME);
		$criteria->add(EafApprovalsPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of EafApprovals (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setEafFormNo($this->getEafFormNo());
		$copyObj->setAdvisorName($this->getAdvisorName());
		$copyObj->setApproved($this->getApproved());
		$copyObj->setNotes($this->getNotes());
		$copyObj->setApprovalDate($this->getApprovalDate());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			//unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)

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
	 * @return     EafApprovals Clone of current object.
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
	 * @return     EafApprovalsPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new EafApprovalsPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a EafFormInfo object.
	 *
	 * @param      EafFormInfo $v
	 * @return     EafApprovals The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setEafFormInfo(EafFormInfo $v = null)
	{
		if ($v === null) {
			$this->setEafFormNo(NULL);
		} else {
			$this->setEafFormNo($v->getEafFormNo());
		}

		$this->aEafFormInfo = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the EafFormInfo object, it will not be re-added.
		if ($v !== null) {
			$v->addEafApprovals($this);
		}

		return $this;
	}


	/**
	 * Get the associated EafFormInfo object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     EafFormInfo The associated EafFormInfo object.
	 * @throws     PropelException
	 */
	public function getEafFormInfo(PropelPDO $con = null)
	{
		if ($this->aEafFormInfo === null && ($this->eaf_form_no !== null)) {
			$this->aEafFormInfo = EafFormInfoQuery::create()
				->filterByEafApprovals($this) // here
				->findOne($con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aEafFormInfo->addEafApprovalss($this);
			 */
		}
		return $this->aEafFormInfo;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->eaf_form_no = null;
		$this->advisor_name = null;
		$this->approved = null;
		$this->notes = null;
		$this->approval_date = null;
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

		$this->aEafFormInfo = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(EafApprovalsPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseEafApprovals
