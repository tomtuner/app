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
use NewClubsORM\QuarterlyEventsPeer;
use NewClubsORM\QuarterlyEventsQuery;

/**
 * Base class that represents a row from the 'quarterly_events' table.
 *
 * 
 *
 * @package    propel.generator.newclubs.om
 */
abstract class BaseQuarterlyEvents extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'NewClubsORM\\QuarterlyEventsPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        QuarterlyEventsPeer
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
	 * The value for the quarterly_data_id field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $quarterly_data_id;

	/**
	 * The value for the type field.
	 * Note: this column has a database default value of: 'Fundraiser'
	 * @var        string
	 */
	protected $type;

	/**
	 * The value for the held_on field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $held_on;

	/**
	 * The value for the num_members field.
	 * @var        int
	 */
	protected $num_members;

	/**
	 * The value for the num_outside field.
	 * @var        int
	 */
	protected $num_outside;

	/**
	 * The value for the description field.
	 * @var        string
	 */
	protected $description;

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
		$this->quarterly_data_id = 0;
		$this->type = 'Fundraiser';
		$this->held_on = '';
	}

	/**
	 * Initializes internal state of BaseQuarterlyEvents object.
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
	 * Get the [quarterly_data_id] column value.
	 * 
	 * @return     int
	 */
	public function getQuarterlyDataId()
	{
		return $this->quarterly_data_id;
	}

	/**
	 * Get the [type] column value.
	 * 
	 * @return     string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Get the [held_on] column value.
	 * 
	 * @return     string
	 */
	public function getHeldOn()
	{
		return $this->held_on;
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
	 * Get the [num_outside] column value.
	 * 
	 * @return     int
	 */
	public function getNumOutside()
	{
		return $this->num_outside;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyEvents The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = QuarterlyEventsPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [quarterly_data_id] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyEvents The current object (for fluent API support)
	 */
	public function setQuarterlyDataId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->quarterly_data_id !== $v) {
			$this->quarterly_data_id = $v;
			$this->modifiedColumns[] = QuarterlyEventsPeer::QUARTERLY_DATA_ID;
		}

		return $this;
	} // setQuarterlyDataId()

	/**
	 * Set the value of [type] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyEvents The current object (for fluent API support)
	 */
	public function setType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = QuarterlyEventsPeer::TYPE;
		}

		return $this;
	} // setType()

	/**
	 * Set the value of [held_on] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyEvents The current object (for fluent API support)
	 */
	public function setHeldOn($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->held_on !== $v) {
			$this->held_on = $v;
			$this->modifiedColumns[] = QuarterlyEventsPeer::HELD_ON;
		}

		return $this;
	} // setHeldOn()

	/**
	 * Set the value of [num_members] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyEvents The current object (for fluent API support)
	 */
	public function setNumMembers($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->num_members !== $v) {
			$this->num_members = $v;
			$this->modifiedColumns[] = QuarterlyEventsPeer::NUM_MEMBERS;
		}

		return $this;
	} // setNumMembers()

	/**
	 * Set the value of [num_outside] column.
	 * 
	 * @param      int $v new value
	 * @return     QuarterlyEvents The current object (for fluent API support)
	 */
	public function setNumOutside($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->num_outside !== $v) {
			$this->num_outside = $v;
			$this->modifiedColumns[] = QuarterlyEventsPeer::NUM_OUTSIDE;
		}

		return $this;
	} // setNumOutside()

	/**
	 * Set the value of [description] column.
	 * 
	 * @param      string $v new value
	 * @return     QuarterlyEvents The current object (for fluent API support)
	 */
	public function setDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = QuarterlyEventsPeer::DESCRIPTION;
		}

		return $this;
	} // setDescription()

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
			if ($this->quarterly_data_id !== 0) {
				return false;
			}

			if ($this->type !== 'Fundraiser') {
				return false;
			}

			if ($this->held_on !== '') {
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
			$this->quarterly_data_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->type = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->held_on = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->num_members = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->num_outside = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->description = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 7; // 7 = QuarterlyEventsPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating QuarterlyEvents object", $e);
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
			$con = Propel::getConnection(QuarterlyEventsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = QuarterlyEventsPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
			$con = Propel::getConnection(QuarterlyEventsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = QuarterlyEventsQuery::create()
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
			$con = Propel::getConnection(QuarterlyEventsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				QuarterlyEventsPeer::addInstanceToPool($this);
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

		$this->modifiedColumns[] = QuarterlyEventsPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . QuarterlyEventsPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(QuarterlyEventsPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(QuarterlyEventsPeer::QUARTERLY_DATA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`QUARTERLY_DATA_ID`';
		}
		if ($this->isColumnModified(QuarterlyEventsPeer::TYPE)) {
			$modifiedColumns[':p' . $index++]  = '`TYPE`';
		}
		if ($this->isColumnModified(QuarterlyEventsPeer::HELD_ON)) {
			$modifiedColumns[':p' . $index++]  = '`HELD_ON`';
		}
		if ($this->isColumnModified(QuarterlyEventsPeer::NUM_MEMBERS)) {
			$modifiedColumns[':p' . $index++]  = '`NUM_MEMBERS`';
		}
		if ($this->isColumnModified(QuarterlyEventsPeer::NUM_OUTSIDE)) {
			$modifiedColumns[':p' . $index++]  = '`NUM_OUTSIDE`';
		}
		if ($this->isColumnModified(QuarterlyEventsPeer::DESCRIPTION)) {
			$modifiedColumns[':p' . $index++]  = '`DESCRIPTION`';
		}

		$sql = sprintf(
			'INSERT INTO `quarterly_events` (%s) VALUES (%s)',
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
					case '`QUARTERLY_DATA_ID`':
						$stmt->bindValue($identifier, $this->quarterly_data_id, PDO::PARAM_INT);
						break;
					case '`TYPE`':
						$stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
						break;
					case '`HELD_ON`':
						$stmt->bindValue($identifier, $this->held_on, PDO::PARAM_STR);
						break;
					case '`NUM_MEMBERS`':
						$stmt->bindValue($identifier, $this->num_members, PDO::PARAM_INT);
						break;
					case '`NUM_OUTSIDE`':
						$stmt->bindValue($identifier, $this->num_outside, PDO::PARAM_INT);
						break;
					case '`DESCRIPTION`':
						$stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);
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


			if (($retval = QuarterlyEventsPeer::doValidate($this, $columns)) !== true) {
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
		$pos = QuarterlyEventsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getQuarterlyDataId();
				break;
			case 2:
				return $this->getType();
				break;
			case 3:
				return $this->getHeldOn();
				break;
			case 4:
				return $this->getNumMembers();
				break;
			case 5:
				return $this->getNumOutside();
				break;
			case 6:
				return $this->getDescription();
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
		if (isset($alreadyDumpedObjects['QuarterlyEvents'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['QuarterlyEvents'][$this->getPrimaryKey()] = true;
		$keys = QuarterlyEventsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getQuarterlyDataId(),
			$keys[2] => $this->getType(),
			$keys[3] => $this->getHeldOn(),
			$keys[4] => $this->getNumMembers(),
			$keys[5] => $this->getNumOutside(),
			$keys[6] => $this->getDescription(),
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
		$pos = QuarterlyEventsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setQuarterlyDataId($value);
				break;
			case 2:
				$this->setType($value);
				break;
			case 3:
				$this->setHeldOn($value);
				break;
			case 4:
				$this->setNumMembers($value);
				break;
			case 5:
				$this->setNumOutside($value);
				break;
			case 6:
				$this->setDescription($value);
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
		$keys = QuarterlyEventsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setQuarterlyDataId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setType($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setHeldOn($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNumMembers($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumOutside($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDescription($arr[$keys[6]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(QuarterlyEventsPeer::DATABASE_NAME);

		if ($this->isColumnModified(QuarterlyEventsPeer::ID)) $criteria->add(QuarterlyEventsPeer::ID, $this->id);
		if ($this->isColumnModified(QuarterlyEventsPeer::QUARTERLY_DATA_ID)) $criteria->add(QuarterlyEventsPeer::QUARTERLY_DATA_ID, $this->quarterly_data_id);
		if ($this->isColumnModified(QuarterlyEventsPeer::TYPE)) $criteria->add(QuarterlyEventsPeer::TYPE, $this->type);
		if ($this->isColumnModified(QuarterlyEventsPeer::HELD_ON)) $criteria->add(QuarterlyEventsPeer::HELD_ON, $this->held_on);
		if ($this->isColumnModified(QuarterlyEventsPeer::NUM_MEMBERS)) $criteria->add(QuarterlyEventsPeer::NUM_MEMBERS, $this->num_members);
		if ($this->isColumnModified(QuarterlyEventsPeer::NUM_OUTSIDE)) $criteria->add(QuarterlyEventsPeer::NUM_OUTSIDE, $this->num_outside);
		if ($this->isColumnModified(QuarterlyEventsPeer::DESCRIPTION)) $criteria->add(QuarterlyEventsPeer::DESCRIPTION, $this->description);

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
		$criteria = new Criteria(QuarterlyEventsPeer::DATABASE_NAME);
		$criteria->add(QuarterlyEventsPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of QuarterlyEvents (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setQuarterlyDataId($this->getQuarterlyDataId());
		$copyObj->setType($this->getType());
		$copyObj->setHeldOn($this->getHeldOn());
		$copyObj->setNumMembers($this->getNumMembers());
		$copyObj->setNumOutside($this->getNumOutside());
		$copyObj->setDescription($this->getDescription());
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
	 * @return     QuarterlyEvents Clone of current object.
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
	 * @return     QuarterlyEventsPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new QuarterlyEventsPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->quarterly_data_id = null;
		$this->type = null;
		$this->held_on = null;
		$this->num_members = null;
		$this->num_outside = null;
		$this->description = null;
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
		return (string) $this->exportTo(QuarterlyEventsPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseQuarterlyEvents
