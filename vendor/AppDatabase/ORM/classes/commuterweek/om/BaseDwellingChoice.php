<?php

namespace CommuterWeekORM\om;

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
use CommuterWeekORM\Commuter;
use CommuterWeekORM\CommuterQuery;
use CommuterWeekORM\DwellingChoicePeer;
use CommuterWeekORM\DwellingChoiceQuery;

/**
 * Base class that represents a row from the 'dwelling_choice' table.
 *
 * 
 *
 * @package    propel.generator.commuterweek.om
 */
abstract class BaseDwellingChoice extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'CommuterWeekORM\\DwellingChoicePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        DwellingChoicePeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the dwelling_choice_id field.
	 * @var        int
	 */
	protected $dwelling_choice_id;

	/**
	 * The value for the dwelling_choice_type field.
	 * @var        string
	 */
	protected $dwelling_choice_type;

	/**
	 * @var        array Commuter[] Collection to store aggregation of Commuter objects.
	 */
	protected $collCommuters;

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
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $commutersScheduledForDeletion = null;

	/**
	 * Get the [dwelling_choice_id] column value.
	 * 
	 * @return     int
	 */
	public function getDwellingChoiceId()
	{
		return $this->dwelling_choice_id;
	}

	/**
	 * Get the [dwelling_choice_type] column value.
	 * 
	 * @return     string
	 */
	public function getDwellingChoiceType()
	{
		return $this->dwelling_choice_type;
	}

	/**
	 * Set the value of [dwelling_choice_id] column.
	 * 
	 * @param      int $v new value
	 * @return     DwellingChoice The current object (for fluent API support)
	 */
	public function setDwellingChoiceId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->dwelling_choice_id !== $v) {
			$this->dwelling_choice_id = $v;
			$this->modifiedColumns[] = DwellingChoicePeer::DWELLING_CHOICE_ID;
		}

		return $this;
	} // setDwellingChoiceId()

	/**
	 * Set the value of [dwelling_choice_type] column.
	 * 
	 * @param      string $v new value
	 * @return     DwellingChoice The current object (for fluent API support)
	 */
	public function setDwellingChoiceType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->dwelling_choice_type !== $v) {
			$this->dwelling_choice_type = $v;
			$this->modifiedColumns[] = DwellingChoicePeer::DWELLING_CHOICE_TYPE;
		}

		return $this;
	} // setDwellingChoiceType()

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

			$this->dwelling_choice_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->dwelling_choice_type = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 2; // 2 = DwellingChoicePeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating DwellingChoice object", $e);
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
			$con = Propel::getConnection(DwellingChoicePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = DwellingChoicePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collCommuters = null;

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
			$con = Propel::getConnection(DwellingChoicePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = DwellingChoiceQuery::create()
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
			$con = Propel::getConnection(DwellingChoicePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				DwellingChoicePeer::addInstanceToPool($this);
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

			if ($this->commutersScheduledForDeletion !== null) {
				if (!$this->commutersScheduledForDeletion->isEmpty()) {
					CommuterQuery::create()
						->filterByPrimaryKeys($this->commutersScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->commutersScheduledForDeletion = null;
				}
			}

			if ($this->collCommuters !== null) {
				foreach ($this->collCommuters as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
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

		$this->modifiedColumns[] = DwellingChoicePeer::DWELLING_CHOICE_ID;
		if (null !== $this->dwelling_choice_id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . DwellingChoicePeer::DWELLING_CHOICE_ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(DwellingChoicePeer::DWELLING_CHOICE_ID)) {
			$modifiedColumns[':p' . $index++]  = '`DWELLING_CHOICE_ID`';
		}
		if ($this->isColumnModified(DwellingChoicePeer::DWELLING_CHOICE_TYPE)) {
			$modifiedColumns[':p' . $index++]  = '`DWELLING_CHOICE_TYPE`';
		}

		$sql = sprintf(
			'INSERT INTO `dwelling_choice` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`DWELLING_CHOICE_ID`':
						$stmt->bindValue($identifier, $this->dwelling_choice_id, PDO::PARAM_INT);
						break;
					case '`DWELLING_CHOICE_TYPE`':
						$stmt->bindValue($identifier, $this->dwelling_choice_type, PDO::PARAM_STR);
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
		$this->setDwellingChoiceId($pk);

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


			if (($retval = DwellingChoicePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCommuters !== null) {
					foreach ($this->collCommuters as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$pos = DwellingChoicePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDwellingChoiceId();
				break;
			case 1:
				return $this->getDwellingChoiceType();
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
		if (isset($alreadyDumpedObjects['DwellingChoice'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['DwellingChoice'][$this->getPrimaryKey()] = true;
		$keys = DwellingChoicePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDwellingChoiceId(),
			$keys[1] => $this->getDwellingChoiceType(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collCommuters) {
				$result['Commuters'] = $this->collCommuters->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = DwellingChoicePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDwellingChoiceId($value);
				break;
			case 1:
				$this->setDwellingChoiceType($value);
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
		$keys = DwellingChoicePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDwellingChoiceId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDwellingChoiceType($arr[$keys[1]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(DwellingChoicePeer::DATABASE_NAME);

		if ($this->isColumnModified(DwellingChoicePeer::DWELLING_CHOICE_ID)) $criteria->add(DwellingChoicePeer::DWELLING_CHOICE_ID, $this->dwelling_choice_id);
		if ($this->isColumnModified(DwellingChoicePeer::DWELLING_CHOICE_TYPE)) $criteria->add(DwellingChoicePeer::DWELLING_CHOICE_TYPE, $this->dwelling_choice_type);

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
		$criteria = new Criteria(DwellingChoicePeer::DATABASE_NAME);
		$criteria->add(DwellingChoicePeer::DWELLING_CHOICE_ID, $this->dwelling_choice_id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getDwellingChoiceId();
	}

	/**
	 * Generic method to set the primary key (dwelling_choice_id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setDwellingChoiceId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getDwellingChoiceId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of DwellingChoice (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setDwellingChoiceType($this->getDwellingChoiceType());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getCommuters() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCommuter($relObj->copy($deepCopy));
				}
			}

			//unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setDwellingChoiceId(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     DwellingChoice Clone of current object.
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
	 * @return     DwellingChoicePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new DwellingChoicePeer();
		}
		return self::$peer;
	}


	/**
	 * Initializes a collection based on the name of a relation.
	 * Avoids crafting an 'init[$relationName]s' method name
	 * that wouldn't work when StandardEnglishPluralizer is used.
	 *
	 * @param      string $relationName The name of the relation to initialize
	 * @return     void
	 */
	public function initRelation($relationName)
	{
		if ('Commuter' == $relationName) {
			return $this->initCommuters();
		}
	}

	/**
	 * Clears out the collCommuters collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCommuters()
	 */
	public function clearCommuters()
	{
		$this->collCommuters = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCommuters collection.
	 *
	 * By default this just sets the collCommuters collection to an empty array (like clearcollCommuters());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initCommuters($overrideExisting = true)
	{
		if (null !== $this->collCommuters && !$overrideExisting) {
			return;
		}
		$this->collCommuters = new PropelObjectCollection();
		$this->collCommuters->setModel('Commuter');
	}

	/**
	 * Gets an array of Commuter objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this DwellingChoice is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Commuter[] List of Commuter objects
	 * @throws     PropelException
	 */
	public function getCommuters($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCommuters || null !== $criteria) {
			if ($this->isNew() && null === $this->collCommuters) {
				// return empty collection
				$this->initCommuters();
			} else {
				$collCommuters = CommuterQuery::create(null, $criteria)
					->filterByDwellingChoice($this)
					->find($con);
				if (null !== $criteria) {
					return $collCommuters;
				}
				$this->collCommuters = $collCommuters;
			}
		}
		return $this->collCommuters;
	}

	/**
	 * Sets a collection of Commuter objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $commuters A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setCommuters(PropelCollection $commuters, PropelPDO $con = null)
	{
		$this->commutersScheduledForDeletion = $this->getCommuters(new Criteria(), $con)->diff($commuters);

		foreach ($commuters as $commuter) {
			// Fix issue with collection modified by reference
			if ($commuter->isNew()) {
				$commuter->setDwellingChoice($this);
			}
			$this->addCommuter($commuter);
		}

		$this->collCommuters = $commuters;
	}

	/**
	 * Returns the number of related Commuter objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Commuter objects.
	 * @throws     PropelException
	 */
	public function countCommuters(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCommuters || null !== $criteria) {
			if ($this->isNew() && null === $this->collCommuters) {
				return 0;
			} else {
				$query = CommuterQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByDwellingChoice($this)
					->count($con);
			}
		} else {
			return count($this->collCommuters);
		}
	}

	/**
	 * Method called to associate a Commuter object to this object
	 * through the Commuter foreign key attribute.
	 *
	 * @param      Commuter $l Commuter
	 * @return     DwellingChoice The current object (for fluent API support)
	 */
	public function addCommuter(Commuter $l)
	{
		if ($this->collCommuters === null) {
			$this->initCommuters();
		}
		if (!$this->collCommuters->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddCommuter($l);
		}

		return $this;
	}

	/**
	 * @param	Commuter $commuter The commuter object to add.
	 */
	protected function doAddCommuter($commuter)
	{
		$this->collCommuters[]= $commuter;
		$commuter->setDwellingChoice($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this DwellingChoice is new, it will return
	 * an empty collection; or if this DwellingChoice has previously
	 * been saved, it will retrieve related Commuters from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in DwellingChoice.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Commuter[] List of Commuter objects
	 */
	public function getCommutersJoinRoommateType($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CommuterQuery::create(null, $criteria);
		$query->joinWith('RoommateType', $join_behavior);

		return $this->getCommuters($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this DwellingChoice is new, it will return
	 * an empty collection; or if this DwellingChoice has previously
	 * been saved, it will retrieve related Commuters from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in DwellingChoice.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Commuter[] List of Commuter objects
	 */
	public function getCommutersJoinRitCollege($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CommuterQuery::create(null, $criteria);
		$query->joinWith('RitCollege', $join_behavior);

		return $this->getCommuters($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->dwelling_choice_id = null;
		$this->dwelling_choice_type = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
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
			if ($this->collCommuters) {
				foreach ($this->collCommuters as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collCommuters instanceof PropelCollection) {
			$this->collCommuters->clearIterator();
		}
		$this->collCommuters = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(DwellingChoicePeer::DEFAULT_STRING_FORMAT);
	}

} // BaseDwellingChoice
